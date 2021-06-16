<?php

namespace App\Services\Json;

use App\Services\Achievements as Achievements;
use App\Services\Item;
use App\Services\Text;
use App\Services\Utils;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class achievementsJson {

    /**
     * @var array
     */
    private static $achievement_ids;
    /**
     * @var \Illuminate\Support\Collection
     */
    private static $achievements_storage;

    public static function achievementsModel($server, $characters)
    {
        DB::query()->macro('firstOrFail', function () {
            if ($record = $this->first()) {
                return $record;
            }
            return abort(512);
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

        $chosenTitle = DB::table('chartitles')
            ->select('Name_Lang', 'Name1_Lang')
            ->where('ID', $char->chosenTitle)
            ->first();

        $info = new Item();
        $info->LoadInventory($char->guid);
        $info->CalculateAverageItemLevel();

        Achievements::Initialize($char->guid);

        $achievements = Achievements::AchievementCategoryHome(-1);

        $data =  [
            "categories" => self::categories($achievements, $char->guid)
        ];

        if(!isset($guild))
        {
            unset($data['character']['guild']);
        }

        return $data;
    }

    public static function achievements($server, $characters)
    {
        DB::query()->macro('firstOrFail', function () {
            if ($record = $this->first()) {
                return $record;
            }
            return abort(512);
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

        $chosenTitle = DB::table('chartitles')
            ->select('Name_Lang', 'Name1_Lang')
            ->where('ID', $char->chosenTitle)
            ->first();

        $info = new Item();
        $info->LoadInventory($char->guid);
        $info->CalculateAverageItemLevel();

        Achievements::Initialize($char->guid);

        $data = [
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
            "achievementIndex" => [
                "categories" => [
                    [
                        "count" => 26,
                        "name" => "Персонаж",
                        "points" => 345,
                        "slug" => "character",
                        "total" => 26,
                        "totalPoints" => 345,
                        "url" => "character"],
                    [
                        "count" => 241,
                        "name" => "PvP",
                        "points" => 2650,
                        "slug" => "player-vs-player",
                        "total" => 309,
                        "totalPoints" => 3430,
                        "url" => "player-vs-player"],
                    [
                        "count" => 321,"name" => "Задания","points" => 3130,"slug" => "quests","total" => 363,"totalPoints" => 3450,"url" => "quests"],
                    [
                        "count" => 256,"name" => "Исследование","points" => 2795,"slug" => "exploration","total" => 350,"totalPoints" => 3640,"url" => "exploration"],
                    [
                        "count" => 207,"name" => "Игровые события","points" => 1960,"slug" => "world-events","total" => 213,"totalPoints" => 2020,"url" => "world-events"],
                    [
                        "count" => 1164,"name" => "Подземелья и рейды","points" => 12360,"slug" => "dungeons-raids","total" => 1188,"totalPoints" => 12615,"url" => "dungeons-raids"],
                    [
                        "count" => 240,"name" => "Профессии","points" => 2475,"slug" => "professions","total" => 275,"totalPoints" => 3005,"url" => "professions"],
                    [
                        "count" => 115,"name" => "Репутация","points" => 1210,"slug" => "reputation","total" => 132,"totalPoints" => 1350,"url" => "reputation"],
                    [
                        "count" => 101,"name" => "Битвы питомцев","points" => 710,"slug" => "pet-battles","total" => 185,"totalPoints" => 1240,"url" => "pet-battles"],
                    [
                        "count" => 98,"name" => "Коллекции","points" => 925,"slug" => "collections","total" => 109,"totalPoints" => 1020,"url" => "collections"],
                    [
                        "count" => 373,"name" => "Особый контент","points" => 3205,"slug" => "expansion-features","total" => 467,"totalPoints" => 4010,"url" => "expansion-features"],
                    [
                        "count" => 176,"name" => "Великие подвиги","slug" => "feats-of-strength","url" => "feats-of-strength"],
                    [
                        "count" => 386,"name" => "Наследие","slug" => "legacy","url" => "legacy"]
                ]
            ]
        ];

        if(!isset($guild))
        {
            unset($data['character']['guild']);
        }

        return $data;
    }

    private static function categories($achievements, $guid)
    {
        $data = [];
        foreach ($achievements as $item) {

            $data[] = [
                "count" => 26,
                "name" => $item->Name_Lang,
                "points" => self::totalPoints($item->ID, $guid),
                "slug" => "character",
                "total" => 26,
                "totalPoints" => 345,
                "url" => "character"
            ];
        }
        return $data;
    }

    private static function totalPoints($ID, $guid)
    {
        $progress = DB::connection('characters')->table('character_achievement')->where("guid", $guid)->get();
        return DB::table('achievement')->whereIn('id', self::GetAchievementsIDs($guid))->sum('points');
    }

    private static function GetAchievementsIDs($guid) {
            self::$achievement_ids = array();
            self::$achievements_storage = self::$achievements_storage = DB::connection('characters')->table('character_achievement')->where('guid', $guid)->orderBy('date', 'desc')->get();
            foreach(self::$achievements_storage as $achievement) {
                self::$achievement_ids[] = $achievement->achievement;
            }
        return self::$achievement_ids;
    }
}
