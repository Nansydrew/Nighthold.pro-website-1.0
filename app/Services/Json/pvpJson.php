<?php

namespace App\Services\Json;

use App\Models\Characters\Arena;
use App\Services\Achievements as Achievements;
use App\Services\Item;
use App\Services\Text;
use App\Services\Utils;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class pvpJson {

    public static function pvpModel($server, $characters)
    {
        DB::query()->macro('firstOrFail', function () {
            if ($record = $this->first()) {
                return $record;
            }
            return abort(404);
        });

        $char = DB::connection('characters')
            ->table('characters')
            ->select('guid', 'name', 'race', 'class', 'gender', 'level', 'health', 'mana', 'activespec', 'chosenTitle', 'logout_time')
            ->where('name', Str::ucfirst($characters))
            ->firstOrFail();

        Achievements::Initialize($char->guid);

        $info = new Item();
        $info->LoadInventory($char->guid);
        $info->CalculateAverageItemLevel();

        $pvp = DB::connection('characters')
            ->table('character_honor')
            ->select('Guid', 'CurrentHonorAtLevel', 'HonorLevel', 'PrestigeLevel')
            ->where('Guid', $char->guid)
            ->first();

        $arena2 = Arena::where('guid', $char->guid)->where('bracket', 0)->first();
        $arena3 = Arena::where('guid', $char->guid)->where('bracket', 1)->first();
        $battlegrounds = Arena::where('guid', $char->guid)->where('bracket', 3)->first();

        return [
            "battlegrounds" => [
                ["games" => 0, "lossCount" => 0, "name" => "Два Пика", "winCount" => 0, "winPercent" => 0],
                ["games" => 0,"lossCount" => 0,"name" => "Сверкающие копи","winCount" => 0,"winPercent" => 0],
                ["games" => 0,"lossCount" => 0,"name" => "Битва за Гилнеас","winCount" => 0,"winPercent" => 0],
                ["games" => 0,"lossCount" => 0,"name" => "Око Бури (рейтинговое)","winCount" => 0,"winPercent" => 0],
                ["games" => 0,"lossCount" => 0,"name" => "Храм Котмогу","winCount" => 0,"winPercent" => 0],
                ["games" => 0,"lossCount" => 0,"name" => "Бурлящий берег","winCount" => 0,"winPercent" => 0],
                ["games" => 0,"lossCount" => 0,"name" => "Ущелье Песни Войны","winCount" => 0,"winPercent" => 0],
                ["games" => 0,"lossCount" => 0,"name" => "Низина Арати","winCount" => 0,"winPercent" => 0],
                ["games" => 0,"lossCount" => 0,"name" => "Каньон Суровых Ветров","winCount" => 0,"winPercent" => 0]
            ],
            "honorableKills" => [
                "tier" => 500,
                "value" => $pvp->CurrentHonorAtLevel ?? 0
            ],
            "prestige" => ["honorLevel" => $pvp->HonorLevel ?? 0],
            "ratings" => Utils::pvp($arena2, $arena3, $battlegrounds),
            "region" => "eu"
        ];
    }

    public static function pvp($server, $characters)
    {
        DB::query()->macro('firstOrFail', function () {
            if ($record = $this->first()) {
                return $record;
            }
            return abort(404);
        });

        $char = DB::connection('characters')
            ->table('characters')
            ->select('guid', 'name', 'race', 'class', 'gender', 'level', 'health', 'mana', 'activespec', 'chosenTitle', 'logout_time')
            ->where('name', Str::ucfirst($characters))
            ->firstOrFail();

        $guild = DB::connection('characters')
            ->table('guild_member')
            ->leftJoin('guild', 'guild_member.guildid', '=', 'guild.guildid')
            ->where('guild_member.guid', $char->guid)
            ->first();

        $date = strtotime(date('d.m.Y'));

        $lastLogin = strtotime(Text::lastLoginCharacters($char->logout_time));
        $days_between = ceil(abs($lastLogin - $date) / 86400);

        if($days_between >= 60.0) {
            $isOutdated = true;
        } else {
            $isOutdated = false;
        }
        Achievements::Initialize($char->guid);

        $info = new Item();
        $info->LoadInventory($char->guid);
        $info->CalculateAverageItemLevel();

        $chosenTitle = DB::table('chartitles')
            ->select('Name_Lang', 'Name1_Lang')
            ->where('ID', $char->chosenTitle)
            ->first();

        return [
            "lqip" => [
                "fileName" => "armory_bg_covenant_kyrian.jpg","base64" => "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAf/AABEIAAgACgMBEQACEQEDEQH/xAGiAAABBQEBAQEBAQAAAAAAAAAAAQIDBAUGBwgJCgsQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+gEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoLEQACAQIEBAMEBwUEBAABAncAAQIDEQQFITEGEkFRB2FxEyIygQgUQpGhscEJIzNS8BVictEKFiQ04SXxFxgZGiYnKCkqNTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqCg4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2dri4+Tl5ufo6ery8/T19vf4+fr/2gAMAwEAAhEDEQA/AP435/DnwniuNae51fwS0t5cwNoyafqjS6bY20t4txMbjyIXm8yO0VLeOFMqm+VZdsvCftGMlwhPEZjiI0MvgqmKVXB4bCVVHDUaFWu6kqfLUUatqVLlpU48y0Tv7zsvKUcxaw8faVNKbVWWt5VIw5dHezUpc0m7L7NtFr7c3w//AGUyzGD4ofClISxMKXC+PGuEiJ/drOyeFHQzKmBKUZlLhirEYJ9n2fh19mnhlH7KliKcpKPRSl9qVt5dXqccVnfLH2lZe05Vz8sKijz297lV9I3vZdEf/9k=","palette" => ["#969fc1","#5c5daa","#5691d5","#324459","#0c2577","#5a5ccc"]
            ],
            "character" => [
                "achievement" => Achievements::GetAchievementsPoints(),
                "avatar" => ["url" => Utils::imageClass($char->race, $char->gender)],
                "averageItemLevel" => Item::GetAVGItemLevel(),
                "bust" => [
                    "url" => "https://render-eu.worldofwarcraft.com/character/howling-fjord/116/174340212-inset.jpg"
                ],
                "class" => [
                    'enum' => __('characters.class_key_'.$char->class),
                    'id' => $char->class,
                    'name' => __('characters.class_'.$char->class),
                    'slug' => Str::slug(__('characters.class_'.$char->class))
                ],
                "faction" => Utils::faction($char->race),
                "gender" => [
                    'enum' => __('characters.gender_'.$char->gender),
                    'id' => $char->gender,
                    'name' => __('characters.gender_name_'.$char->gender),
                    'slug' => Str::slug(__('characters.gender_'.$char->gender))
                ],
                "guild" => [
                    "name"=> $guild->name ?? '',
                    "url"=> route('guild.show', [Str::slug($guild->name ?? '')])
                ],
                "lastUpdatedTimestamp" => ["epoch" => 1617234225000,"iso8601" => "2021-03-31T23:43:45Z"],
                "level" => $char->level,
                "name" => $char->name,
                "race" => [
                    'enum' => mb_strtoupper(__('characters.key_race_'.$char->race)),
                    'id' => $char->race,
                    'name' => __('characters.race_'.$char->race),
                    'slug' => __('characters.key_race_'.$char->race)
                ],
                "realm" => ["name" => "WoWLegions","slug" => "wowlegions"],
                "region" => "eu",
                "spec" => Utils::characterSpec($char->class, $char->activespec),
                "title" => "{name}" . Utils::chosenTitle($chosenTitle, $char->gender),
                "url" => route('characters.show', [$char->name]),
                "achievementUrl" => route('achievements', [$char->name]),
                "isOutdated" => $isOutdated,
                "prefix" => Utils::chosenTitle($chosenTitle, $char->gender),
                "background" => [
                    "url" => "https://render-eu.worldofwarcraft.com/profile-backgrounds/v2/armory_bg_covenant_kyrian.jpg",
                    "color" => "#07050c"
                ]
            ],
            "pvp" => [
                "battlegrounds" => [
                    ["games" => 5, "lossCount" => 2, "name" => "Два Пика", "winCount" => 3, "winPercent" => 60],
                    ["games" => 4,"lossCount" => 3,"name" => "Сверкающие копи","winCount" => 1,"winPercent" => 25],
                    ["games" => 4,"lossCount" => 0,"name" => "Битва за Гилнеас","winCount" => 4,"winPercent" => 100],
                    ["games" => 4,"lossCount" => 2,"name" => "Око Бури (рейтинговое)","winCount" => 2,"winPercent" => 50],
                    ["games" => 2,"lossCount" => 0,"name" => "Храм Котмогу","winCount" => 2,"winPercent" => 100],
                    ["games" => 5,"lossCount" => 2,"name" => "Бурлящий берег","winCount" => 3,"winPercent" => 60],
                    ["games" => 4,"lossCount" => 2,"name" => "Ущелье Песни Войны","winCount" => 2,"winPercent" => 50],
                    ["games" => 3,"lossCount" => 2,"name" => "Низина Арати","winCount" => 1,"winPercent" => 33],
                    ["games" => 11,"lossCount" => 7,"name" => "Каньон Суровых Ветров","winCount" => 4,"winPercent" => 36]
                ],
                "honorableKills" => [
                    "tier" => 500,
                    "value" => 768
                ],
                "prestige" => ["honorLevel" => 47],
                "ratings" => [
                    "2v2" => [
                        "winCount" => 0,
                        "lossCount" => 0,
                        "total" => 0,
                        "rating" => 0,
                        "tier" => [
                            "id" => 1,
                            "icon" => [
                                "url" => "https://bnetcmsus-a.akamaihd.net/cms/template_resource/RJ6XE5WS8D6G1528483047503.png"
                            ]
                        ]
                    ],
                    "3v3" => [
                        "winCount" => 0,
                        "lossCount" => 0,
                        "total" => 0,
                        "rating" => 0,
                        "tier" => [
                            "id" => 1,
                            "icon" => [
                                "url" => "https://bnetcmsus-a.akamaihd.net/cms/template_resource/RJ6XE5WS8D6G1528483047503.png"]
                        ]
                    ],
                    "battlegrounds" => [
                        "lossCount" => 14,
                        "rating" => 1653,
                        "tier" => [
                            "id" => 18,
                            "name" => "Претендент",
                            "icon" => [
                                "url" => "https://bnetcmsus-a.akamaihd.net/cms/template_resource/Q4TDZMWJS1DC1528483047584.png"]
                        ],
                        "winCount" => 15,
                        "total" => 29,
                        "winLoss" => 0.5172413793103449
                    ]
                ],
                "region" => "eu"
            ]
        ];
    }
}
