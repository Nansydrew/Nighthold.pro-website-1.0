<?php

namespace App\Services\Json;

use App\Models\Characters\Reputation;
use App\Models\Faction;
use App\Models\Fraction;
use App\Services\Achievements as Achievements;
use App\Services\Item;
use App\Services\Text;
use App\Services\Utils;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class reputationJson {

    private static $guid = 0;
    public static $factions = array();
    private static $reputation = array();
    private static $faction_ids = array();

    public static function reputation($server, $characters)
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

        if($days_between >= 30.0) {
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

        return [
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
            "reputations" => [
                "region" => "eu",
                "reputations" => self::infoReputation()
            ]
        ];
    }

    public static function reputationModel($server, $characters)
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

        self::InitReputation($char->guid);

        return [
            "region" => "eu",
            "reputations" => self::infoReputation()
        ];
    }

    private static function infoReputation()
    {
        $data = [];
        $reputation = self::GetReputation();
        if(is_array($reputation)) {
            foreach($reputation as $category_id => $categories) {
                $data[] = [
                    "id" => "guild",
                    "max" => false,
                    "name" => self::GetFactionNameFromDB($category_id),
                    "reputations" => self::buildReputation($categories)
                ];
            }
        }
        return $data;
    }

    private static function buildReputation($categories) {
        $data = [];
        if(is_array($categories)) {
            foreach($categories as $subcat_id => $subcategories) {
                if(isset($subcategories['id'])) {
                    $data[] = [
                        "id" => $subcategories['id'],
                        "max" => self::maxProcent($subcategories['adjusted']),
                        "name" => self::GetFactionNameFromDB($subcategories['id']),
                        "maxValue" => $subcategories['cap'],
                        "standing" => __('reputation.reputation_rank_' . $subcategories['type']),
                        "standingType" => [
                            "enum" => $subcategories['enum'],
                            "id" => $subcategories['type'],
                            "name" => __('reputation.reputation_rank_' . $subcategories['type']),
                            "slug" => "превознесение"
                        ],
                        "value" => $subcategories['adjusted'],
                    ];
                } elseif(isset($subcategories[0])) {
                    foreach($subcategories as $catid => $cat) {
                        if ($cat['adjusted'] === 999) {
                            $data[] = [
                                "id" => $cat['id'],
                                "max" => self::maxProcent($cat['adjusted']),
                                "name" => self::GetFactionNameFromDB($cat['id']),
                                "standing" => __('reputation.reputation_rank_' . $cat['type']),
                                "standingType" => [
                                    "enum" => $cat['enum'],
                                    "id" => $cat['type'],
                                    "name" => __('reputation.reputation_rank_' . $cat['type']),
                                    "slug" => "превознесение"
                                ]
                            ];
                        } else {
                            $data[] = [
                                "id" => $cat['id'],
                                "max" => self::maxProcent($cat['adjusted']),
                                "name" => self::GetFactionNameFromDB($cat['id']),
                                "maxValue" => $cat['cap'],
                                "standing" => __('reputation.reputation_rank_' . $cat['type']),
                                "standingType" => [
                                    "enum" => $cat['enum'],
                                    "id" => $cat['type'],
                                    "name" => __('reputation.reputation_rank_' . $cat['type']),
                                    "slug" => "превознесение"
                                ],
                                "value" => $cat['adjusted'],
                            ];
                        }
                    }
                }
            }
        }
        return $data;
    }

    public static function InitReputation($guid): bool
    {
        if($guid <= 0) {
            return false;
        }
        self::$guid = $guid;
        self::LoadCharacterReputation();
        self::SortReputation();
        self::LoadFactions();
        return true;
    }

    private static function LoadCharacterReputation()
    {
        self::$reputation = Reputation::where('guid', self::$guid)->get();
        if(!self::$reputation) {
            return false;
        }
        return true;
    }

    private static function SortReputation(): void
    {
        if(!self::$reputation) {
            return;
        }
        $rep = array();
        foreach(self::$reputation as $faction) {
            $rep[$faction['faction']] = $faction;
        }
        self::$reputation = $rep;
        unset($rep);
    }

    private static function LoadFactions(): void
    {
        $factions = Fraction::whereIn('id', self::GetFactionsIDs())->get();

        if(!$factions) {
            return;
        }
        // Default categories
        $categories = array(
            // World of Warcraft (Classic)
            1118 => array(
                // Horde
                67 => array(
                    'order' => 1,
                    'side'  => 1
                ),
                // Horde Forces
                892 => array(
                    'order' => 2,
                    'side'  => 1
                ),
                // Alliance
                469 => array(
                    'order' => 1,
                    'side'  => 0
                ),
                // Alliance Forces
                891 => array(
                    'order' => 2,
                    'side'  => 0
                ),
                // Steamwheedle Cartel
                169 => array(
                    'order' => 3,
                    'side'  => -1
                )
            ),
            // The Burning Crusade
            980 => array(
                // Shattrath
                936 => array(
                    'order' => 1,
                    'side'  => -1
                )
            ),
            // Wrath of the Lich King
            1097 => array(
                // Sholazar Basin
                1117 => array(
                    'order' => 1,
                    'side'  => -1
                ),
                // Horde Expedition
                1052 => array(
                    'order' => 2,
                    'side'  => 1
                ),
                // Alliance Vanguard
                1037 => array(
                    'order' => 2,
                    'side'  => 0
                ),
            ),
            // Other
            0 => array(
                // Wintersaber trainers
                589 => array(
                    'order' => 1,
                    'side'  => 0
                ),
                // Syndicat
                70 => array(
                    'order' => 2,
                    'side'  => -1
                )
            )
        );
        $storage = array();
        foreach($factions as $faction) {
            // Standing & adjusted values
            $standing = min(42999, self::$reputation[$faction['id']]['standing']);
            $type = 7;
            $enum = "EXALTED";
            $rep_cap = 999;
            $rep_adjusted = $standing - 42000;
            if($standing < -6000) {
                $type = 0;
                $enum = "STRANGER";
                $rep_cap = 36000;
                $rep_adjusted = $standing + 42000;
            }
            elseif($standing < -3000) {
                $type = 1;
                $enum = "STRANGER";
                $rep_cap = 3000;
                $rep_adjusted = $standing + 6000;
            }
            elseif($standing < 0) {
                $type = 2;
                $enum = "STRANGER";
                $rep_cap = 3000;
                $rep_adjusted = $standing + 3000;
            }
            elseif($standing < 3000) {
                $type = 3;
                $enum = "NEUTRAL";
                $rep_cap = 3000;
                $rep_adjusted = $standing;
            }
            elseif($standing < 9000) {
                $type = 4;
                $enum = "FRIENDLY";
                $rep_cap = 6000;
                $rep_adjusted = $standing - 3000;
            }
            elseif($standing < 21000) {
                $type = 5;
                $enum = "HONORED";
                $rep_cap = 12000;
                $rep_adjusted = $standing - 9000;
            }
            elseif($standing < 42000) {
                $type = 6;
                $enum = "REVERED";
                $rep_cap = 21000;
                $rep_adjusted = $standing - 21000;
            }
            $faction['standing'] = self::$reputation[$faction['id']]['standing'];
            $faction['type'] = $type;
            $faction['cap'] = $rep_cap;
            $faction['enum'] = $enum;
            $faction['adjusted'] = $rep_adjusted;
            $faction['percent'] = Utils::percentageOf($rep_cap, $rep_adjusted);
            if(isset($categories[$faction['category']])) {
                if(!isset($storage[$faction['category']])) {
                    $storage[$faction['category']] = array();
                }
                $storage[$faction['category']][] = $faction;
            }
            else {
                foreach($categories as $catId => $subcat) {
                    if(isset($categories[$catId][$faction['category']])) {
                        if(!isset($categories[$catId][$faction['category']])) {
                            $categories[$catId][$faction['category']] = array();
                        }
                        $storage[$catId][$faction['category']][] = $faction;
                    }
                }
            }
        }
        self::$factions = $storage;
        unset($storage);
    }

    private static function GetFactionsIDs(): array
    {
        if(!self::$faction_ids) {
            if(!self::$reputation) {
                self::LoadCharacterReputation();
            }
            $ids = array();
            foreach(self::$reputation as $rep) {
                $ids[] = $rep['faction'];
            }
            self::$faction_ids = $ids;
        }
        return self::$faction_ids;
    }

    public static function GetReputation(): array
    {
        return self::$factions;
    }

    public static function GetFactionNameFromDB($faction_id) {
        if($faction_id == 0) {
            return '';
        }
        return Fraction::where('id', $faction_id)->first()['name_ru'];
    }

    private static function maxProcent($procent)
    {
        if ($procent === 43000) {
            return true;
        }
        return false;
    }

}
