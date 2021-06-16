<?php

    namespace App\Services;

    use App\Models\Characters\Arena;
    use App\Models\Raid;
    use App\Services\Achievements as Achievements;

    use App\Services\Logs\Log;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Str;

    class Characters {
        private static $guid           = 0;
        private static $account        = 0;
        private static $name           = null;
        private static $race           = 0;
        private static $class          = 0;
        private static $gender         = 0;
        private static $level          = 0;
        private static $playerBytes    = 0;
        private static $playerBytes2   = 0;
        private static $playerFlags    = 0;
        private static $totalKills     = 0;
        private static $chosenTitle    = 0;
        private static $health         = 0;
        private static $honorLevel     = 0;
        private static $honor          = 0;
        private static $activeTalentGroup     = 0;
        private static $equipmentCache = 0;

        /* Extra Variables */
        private static $m_server       = -1;
        private static $realmSlug      = null;
        private static $realmName      = null;
        private static $realmID        = 0;

        private static $guildId        = 0;
        private static $guildName      = null;
        private static $factionID      = -1;
        private static $title_info     = [];
        private static $class_name     = null;
        private static $class_key      = null;
        private static $race_name      = null;
        private static $race_key       = null;
        private static $power_type     = 0;
        private static $item_level     = [];
        private static $role           = 0;
        private static $next_pvp       = 2;
        private static $last_update    = 0;

        // Storages
        private static $professions    = [];
        private static $info_stats     = [];
        private static $fullTalentData = [];
        private static $cache_item     = [];
        private static $m_items        = [];
        private static $talents        = []; // Character talents
        private static $talent_build   = []; // Talent Build
        private static $talent_points  = []; // Talent Points (e.g., 51/15/5)
        private static $stats_holder   = [];
        private static $rating         = [];
        private static $data           = null;
        private static $audit          = []; // Character audit
        private static $stats_bonuses  = []; // Enchants/gems bonuses
        private static $pvp_data       = []; // Character PvP Data (Arena Teams)
        private static $m_skills       = []; // Character skills
        private static $m_mounts       = []; // Character companions & mounts
        private static $m_mounts_count = []; // Character companions & mounts counters (collected / not collected)
        private static $m_spells       = []; // Character spells
        private static $logout_time       = null;
        private static $totaltime      = null;

        public static function LoadCharacter($name, $realm_id, $full = true, $initialBuild = true): int
        {
            if(!is_string($name) || $name == null) {
                Log::WriteError('%s : name must be a string (%s given.)!', __METHOD__, gettype($name));
                return 1;
            }
            if(!$realm_id || $realm_id == 0) {
                Log::WriteError('%s : realm ID must be > 0!', __METHOD__);
                return 1;
            }
            if(!isset(config('servers.realm')[$realm_id])) {
                Log::WriteError('%s : unable to find realm with ID #%d. Check your configs.', __METHOD__, $realm_id);
                return 1;
            }

            self::$name = mb_convert_case($name, MB_CASE_TITLE, "UTF-8");

            if(!self::LoadCharacterFieldsFromDB()) {
                return 1;
            }
            self::$realmID = $realm_id;
            self::$realmName = config('servers.realm')[$realm_id]['name'];
            self::$realmSlug = config('servers.realm')[$realm_id]['slug'];
            self::$m_server = config('servers.realm')[$realm_id]['type'];

            self::HandleEquipmentCacheInfo();
            if($full) {
                self::$class_name = __('character.class_' . self::$class . '_' . self::$gender);
                self::$race_name = __('character.race_' . self::$race . '_' . self::$gender);
                self::$class_key = __('character.class_key' . self::$class);
                self::$race_key = __('character.key_race_' . self::$race);
                Achievements::Initialize(self::$guid);
            }
            if(self::$chosenTitle > 0) {
                self::HandleChosenTitleInfo();
            }

            self::SetPowerType();
            return 3;
        }

        public static function data() {
            if (self::$level < 10 && self::$activeTalentGroup) {
                return abort(512);
            }
            $date = strtotime(date('d.m.Y'));
            $lastLogin = strtotime(Text::lastLoginCharacters(self::$logout_time));
            $days_between = ceil(abs($lastLogin - $date) / 86400);

            if($days_between >= 60.0) {
                $isOutdated = true;
            } else {
                $isOutdated = false;
            }

            $arena2 = Arena::where('guid', self::$guid)->where('slot', 0)->first();
            $arena3 = Arena::where('guid', self::$guid)->where('slot', 1)->first();
            $battlegrounds = Arena::where('guid', self::$guid)->where('slot', 3)->first();

            Achievements::Initialize(self::$guid);

            $info = new Item();
            $info->LoadInventory(self::$guid);
            $info->CalculateAverageItemLevel();

            $data = [
                "lqip" => [
                    "fileName" => "armory_bg_covenant_venthyr.jpg",
                    "base64" => "data => image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAf/AABEIAAgACgMBEQACEQEDEQH/xAGiAAABBQEBAQEBAQAAAAAAAAAAAQIDBAUGBwgJCgsQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+gEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoLEQACAQIEBAMEBwUEBAABAncAAQIDEQQFITEGEkFRB2FxEyIygQgUQpGhscEJIzNS8BVictEKFiQ04SXxFxgZGiYnKCkqNTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqCg4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2dri4+Tl5ufo6ery8/T19vf4+fr/2gAMAwEAAhEDEQA/AP4tIj8PFt7y5a4HnutlcaXYW90qW8ALOmoWF99oMUgdQyTW8sO9D5ezexclfOp1sQ4xoyjKM4OcKlaVNWqW5fZVafI5rldmpxkoyTl8KSPfxmGwzxHt6Lozo1YwqqhCpJToucW6mGqOrCm3Kk2lGceaD5dJ62Mkap4XUBTbWLEAAsbiUkkcZJBAJPXIAHoBXTaXWvK/W0Fa/l5HmuOrthY2u7e/La+n2j//2Q==","palette" => ["#651110","#ec1b11","#5e392d","#796c4c","#ce8d59","#764722"]],
                "character" => [
                    "achievement" => Achievements::GetAchievementsPoints(),
                    "avatar" => [
                        "url" => Utils::imageClass(self::$race, self::$gender)
                    ],
                    "averageItemLevel" => Item::GetAVGItemLevel(),
                    "bust" => [
                        "url" => "https://render-eu.worldofwarcraft.com/character/die-ewige-wacht/192/157998272-inset.jpg"],
                    "class" => [
                        "enum" => __('characters.class_key_'.self::$class),
                        "id" => self::$class,
                        "name" => __('characters.class_'.self::$class),
                        "slug" => Str::slug(__('characters.class_'.self::$class))
                    ],
                    "covenant" => [
                        "description" => "Вентиры – аристократы, чьим заботам поручаются души, обремененные злобой и гордыней. Они направляют грешников на трудный путь к искуплению, добывая при этом аниму для нужд своего мира.","enum" => "VENTHYR","id" => 2,"name" => "Вентиры","renown" => ["rank" => 40],"slug" => "venthyr"],
                    "faction" => Utils::faction(self::$race),
                    "gear" => Item::itemInfo(),
                    "gender" => [
                        'enum' => __('characters.gender_'.self::$gender),
                        'id' => self::$gender,
                        'name' => __('characters.gender_name_'.self::$gender),
                        'slug' => Str::slug(__('characters.gender_'.self::$gender))
                    ],
                    "guild" => [
                        "name"=> self::$guildName ?? '',
                        "url"=> route('guild.show', [self::$realmSlug, Str::slug(self::$guildName ?? '')])
                    ],
                    "lastUpdatedTimestamp" => [
                        "epoch" => 1622835492000,"iso8601" => "2021-06-04T19:38:12Z"],
                    "level" => self::$level,
                    "mythicKeystoneDungeons" => [],
                    "name" => self::$name,
                    "pve" => [
                        "id" => "темные-земли",
                        "name" => "Темные Земли",
                        "raids" =>  self::raids(self::$name, self::$guid)
                    ],
                    "pvp" => [
                        "honorableKills" => [
                            "tier" => 1000,"value" => self::$honor],
                        "prestige" => ["honorLevel" => self::$honorLevel],
                        "ratings" => Utils::pvp($arena2, $arena3, $battlegrounds),
                        "region" => "eu"
                    ],
                    "race" => [
                        'enum' => mb_strtoupper(__('characters.key_race_'.self::$race)),
                        'id' => self::$race,
                        'name' => __('characters.race_'.self::$race),
                        'slug' => __('characters.key_race_'.self::$race)
                    ],
                    "realm" => [
                        "name" => self::$realmName,"slug" => self::$realmSlug],
                    "region" => "eu",
                    "render" => [
                        "staticFallback" => [
                            "url" => Utils::renderBackground(self::$class, self::$race, self::$gender)
                        ],
                        "foregroundFallback" => [
                            "url" => Utils::renderRaw(self::$race, self::$gender)
                        ],
                        "background" => [
                            "url" => "https://render-eu.worldofwarcraft.com/profile-backgrounds/v2/armory_bg_covenant_kyrian.jpg",
                            "color" => "#07050c"
                        ],
                        "shadow" => [
                            "url" => "https://render-eu.worldofwarcraft.com/profile-foreground/foreground-shadow.png"
                        ],
                        "static" => [
                            "url" => Utils::renderBackground(self::$class, self::$race, self::$gender)
                        ],
                        "foreground" => [
                            "url" => Utils::renderRaw(self::$race, self::$gender)
                        ]
                    ],
                    "renderRaw" => [
                        "url" => Utils::renderRaw(self::$race, self::$gender)],
                    "spec" => Utils::characterSpec(self::$class, self::$activeTalentGroup),
                    "specs" => Utils::specCharacters(self::$class, self::$activeTalentGroup, self::$guid),
                    "stats" => Utils::statsChar(self::$health, self::$class, self::$activeTalentGroup),
                    "title" => "Истребительница [name]",
                    "url" => route('characters.show', [self::$realmSlug, mb_strtolower(self::$name)]),
                    "achievementUrl" => route('achievements', [self::$realmSlug, mb_strtolower(self::$name)]),
                    "isOutdated" => $isOutdated,
                    "prefix" => "Истребительница"
                ],
                "summary" => [
                    "character" => [
                        "achievement" => Achievements::GetAchievementsPoints(),
                        "avatar" => [
                            "url" => Utils::imageClass(self::$race, self::$gender)
                        ],
                        "averageItemLevel" => Item::GetAVGItemLevel(),
                        "bust" => [
                            "url" => "https://render-eu.worldofwarcraft.com/character/die-ewige-wacht/192/157998272-inset.jpg"],
                        "class" => [
                            "enum" => __('characters.class_key_'.self::$class),
                            "id" => self::$class,
                            "name" => __('characters.class_'.self::$class),
                            "slug" => Str::slug(__('characters.class_'.self::$class))
                        ],
                        "covenant" => [
                            "description" => "Вентиры – аристократы, чьим заботам поручаются души, обремененные злобой и гордыней. Они направляют грешников на трудный путь к искуплению, добывая при этом аниму для нужд своего мира.","enum" => "VENTHYR","id" => 2,"name" => "Вентиры","renown" => ["rank" => 40],"slug" => "venthyr"],
                        "faction" => Utils::faction(self::$race),
                        "gear" => Item::itemInfo(),
                        "gender" => [
                            'enum' => __('characters.gender_'.self::$gender),
                            'id' => self::$gender,
                            'name' => __('characters.gender_name_'.self::$gender),
                            'slug' => Str::slug(__('characters.gender_'.self::$gender))
                        ],
                        "guild" => [
                            "name"=> $guildName ?? '',
                            "url"=> route('guild.show', [self::$realmSlug, Str::slug($guild->name ?? '')])
                        ],
                        "lastUpdatedTimestamp" => [
                            "epoch" => 1622835492000,"iso8601" => "2021-06-04T19:38:12Z"],
                        "level" => self::$level,
                        "mythicKeystoneDungeons" => [],
                        "name" => self::$name,
                        "pve" => [
                            "id" => "темные-земли","name" => "Темные Земли",
                            "raids" =>  self::raids(self::$name, self::$guid)
                        ],
                        "pvp" => [
                            "honorableKills" => [
                                "tier" => 1000,"value" => self::$honor],
                            "prestige" => ["honorLevel" => self::$honorLevel],
                            "ratings" => Utils::pvp($arena2, $arena3, $battlegrounds),
                            "region" => "eu"
                        ],
                        "race" => [
                            'enum' => mb_strtoupper(__('characters.key_race_'.self::$race)),
                            'id' => self::$race,
                            'name' => __('characters.race_'.self::$race),
                            'slug' => __('characters.key_race_'.self::$race)
                        ],
                        "realm" => [
                            "name" => self::$realmName,"slug" => self::$realmSlug],
                        "region" => "eu",
                        "render" => [
                            "staticFallback" => [
                                "url" => Utils::renderBackground(self::$class, self::$race, self::$gender)
                            ],
                            "foregroundFallback" => [
                                "url" => Utils::renderRaw(self::$race, self::$gender)
                            ],
                            "background" => [
                                "url" => "https://render-eu.worldofwarcraft.com/profile-backgrounds/v2/armory_bg_covenant_kyrian.jpg",
                                "color" => "#07050c"
                            ],
                            "shadow" => [
                                "url" => "https://render-eu.worldofwarcraft.com/profile-foreground/foreground-shadow.png"
                            ],
                            "static" => [
                                "url" => Utils::renderBackground(self::$class, self::$race, self::$gender)
                            ],
                            "foreground" => [
                                "url" => Utils::renderRaw(self::$race, self::$gender)
                            ]
                        ],
                        "renderRaw" => [
                            "url" => Utils::renderRaw(self::$race, self::$gender)],
                        "spec" => Utils::characterSpec(self::$class, self::$activeTalentGroup),
                        "specs" => Utils::specCharacters(self::$class, self::$activeTalentGroup, self::$guid),
                        "stats" => Utils::statsChar(self::$health, self::$class, self::$activeTalentGroup),
                        "title" => "Истребительница [name]",
                        "url" => route('characters.show', [self::$realmSlug, mb_strtolower(self::$name)]),
                        "achievementUrl" => route('achievements', [self::$realmSlug, mb_strtolower(self::$name)]),
                        "isOutdated" => $isOutdated,
                        "prefix" => "Истребительница"
                    ],
                    "specs" => Utils::specCharacters(self::$class, self::$activeTalentGroup, self::$guid),
                    "pets" => [],
                    "raids" => self::raids(self::$name, self::$guid),
                    "pvp" => [
                        "honorableKills" => [
                            "tier" => 1000,"value" => self::$honor],
                        "prestige" => ["honorLevel" => self::$honorLevel],
                        "ratings" => Utils::pvp($arena2, $arena3, $battlegrounds),
                        "region" => "eu"
                    ],
                    "region" => "eu",
                    "mythicKeystoneDungeons" => []
                ]
            ];

            if(!isset($guildName))
            {
                unset($data['character']['guild']);
                unset($data['summary']['character']['guild']);
            }
            if(!isset($chosenTitle))
            {
                unset($data['character']['suffix']); /////  Тактик
                unset($data['character']['title']); //// Тактик {name}
                unset($data['summary']['character']['suffix']); /////  Тактик
                unset($data['summary']['character']['title']); //// Тактик {name}
            }
            ///dd($data);
            return json_encode($data, JSON_UNESCAPED_UNICODE);
        }

        public static function GetTitleInfo($info) {
            return self::$title_info[$info] ?? false;
        }

        public static function raids($name, $guid) {
            $raid = Raid::where('key', 'темные-земли')->get();
            $raids = [];
            foreach ($raid as $item) {
                $raids[] = [
                    "description" => $item->description,
                    "difficulties" => self::diffiCulties($item, $guid),
                    "icon" => ["url" => asset('storage/'. Utils::ImagesLogo($item->icon))],
                    "id" => $item->ids,
                    "level" => $item->level,
                    "location" => $item->location,
                    "name" => $item->name,
                    "players" => $item->players,
                    "url" => route('raid.details', [self::$realmSlug, $name, $item->key, $item->ids]),
                    "bg" => ""
                ];
            }
            return $raids;
        }

        public static function boss($boss, $guid) {
            $bosses = [];
            foreach ($boss as $item) {
                $info = DB::connection('characters')
                    ->table('character_skills')
                    ->where('guid', $guid)
                    ->where('skill', $item->id_boss)
                    ->first();
                $bosses[] = ["killCount" => $info->value ?? 0,"name" => $item->name];
            }
            return $bosses;
        }

        public static function bossKillCount($boss, $guid) {
            $count = 0;
            $i = 0;
            foreach ($boss as $item) {
                $count = DB::connection('characters')
                    ->table('character_skills')
                    ->where('guid', $guid)
                    ->where('skill', $item->id_boss)
                    ->where('value', '>', 0)
                    ->first();
                if ($count) {
                    $i++;
                }
            }
            return $i;
        }

        private static function diffiCulties($raid, $guid)
        {
            $raids = [];

            if($raid->lfr === 1 ) {
                $raids[] = [
                    "bosses" => self::boss($raid->bosses, $guid),
                    "count" => self::bossKillCount($raid->bosses, $guid),
                    "difficulty" => ["enum" => "LFR","id" => 0,"name" => "СПР","slug" => "спр"],
                    "id" => "LFR",
                    "name" => "СПР",
                    "progress" => ["enum" => "IN_PROGRESS","id" => 1,"name" => "In Progress","slug" => "in-progress"],
                    "total" => $raid->bossCount
                ];
            }
            if($raid->normal === 1) {
                $raids[] = [
                    "bosses" => self::boss($raid->bosses, $guid),
                    "count" => self::bossKillCount($raid->bosses, $guid),
                    "difficulty" => ["enum" => "NORMAL","id" => 1,"name" => "Обычный","slug" => "обычный"],
                    "id" => "NORMAL",
                    "name" => "Обычный",
                    "progress" => ["enum" => "IN_PROGRESS","id" => 1,"name" => "In Progress","slug" => "in-progress"],
                    "total" => $raid->bossCount
                ];
            }
            if($raid->heroic === 1) {
                $raids[] = [
                    "bosses" => self::boss($raid->bosses, $guid),
                    "count" => self::bossKillCount($raid->bosses, $guid),
                    "difficulty" => ["enum" => "HEROIC","id" => 2,"name" => "Героический","slug" => "героический"],
                    "id" => "HEROIC",
                    "name" => "Героический",
                    "progress" => ["enum" => "IN_PROGRESS","id" => 1,"name" => "In Progress","slug" => "in-progress"],
                    "total" => $raid->bossCount
                ];
            }
            if($raid->mythic === 1) {
                $raids[] = [
                    "bosses" => self::boss($raid->bosses, $guid),
                    "count" => self::bossKillCount($raid->bosses, $guid),
                    "difficulty" => ["enum" => "MYTHIC","id" => 3,"name" => "Эпохальный","slug" => "эпохальный"],
                    "id" => "MYTHIC",
                    "name" => "Эпохальный",
                    "progress" => ["enum" => "IN_PROGRESS","id" => 1,"name" => "In Progress","slug" => "in-progress"],
                    "total" => $raid->bossCount
                ];
            }

            return $raids;
        }

        private static function LoadCharacterFieldsFromDB()
        {
            if(!self::$name) {
                Log::WriteError('%s : name was not provided.', __METHOD__);
                return false;
            }
            $fields = DB::connection('characters')->selectOne(/** @lang text */
                'SELECT
            characters.guid,
            characters.account,
            characters.name,
            characters.race,
            characters.class,
            characters.gender,
            characters.level,
            characters.playerFlags,
            characters.totalKills,
            characters.chosenTitle,
            characters.health,
            characters.honorLevel,
            characters.honor,
            characters.activeTalentGroup,
            characters.equipmentCache,
            characters.totaltime,
            characters.logout_time,
            guild_member.guildid AS guildId,
            guild.name AS guildName
            FROM characters AS characters
            LEFT JOIN guild_member AS guild_member ON guild_member.guid=characters.guid
            LEFT JOIN guild AS guild ON guild.guildid=guild_member.guildid
            WHERE BINARY characters.name = ? LIMIT 1', [self::$name]);
            if(!$fields) {
                Log::WriteError('%s : character %s was not found in `characters` table!', __METHOD__, self::$name);
                return false;
            }
            foreach($fields as $field_name => $field_value) {
                self::${$field_name} = $field_value;
            }
            return true;
        }

        private static function HandleEquipmentCacheInfo(): void
        {
            if(is_array(self::$equipmentCache)) {
                // Already converted, return true.
                return;
            }
            $cache = explode(' ', self::$equipmentCache);
            if(!is_array($cache)) {
                Log::WriteError('%s : unable to convert equipmentCache field to array for character %s (GUID: %d)!', __METHOD__, self::$name, self::$guid);
                return;
            }
            self::$equipmentCache = $cache;
            $cacheCount = count(self::$equipmentCache);
            if($cacheCount < 37) {
                for($i = $cacheCount; $i < 38; $i++) {
                    self::$equipmentCache[$i] = null;
                }
            }
        }

        private static function HandleChosenTitleInfo()
        {
            $title_data = DB::table('chartitles')->where('id', self::$chosenTitle)->first();
            if(!$title_data) {
                Log::WriteError('%s: character %s (GUID: %d) has wrong chosenTitle ID (%d) or there is no data for %s', __METHOD__, self::$name, self::$guid, self::$chosenTitle);
                return false;
            }
            ///self::$title_info['place'] = $title_data['place'];
            switch(self::$gender) {
                case 0:
                    self::$title_info['title'] = $title_data->Name_Lang;
                    break;
                case 1:
                    self::$title_info['title'] = $title_data->Name1_Lang;
                    break;
            }
            return true;
        }

        private static function SetPowerType()
        {
            switch(self::$class) {
                case 1:
                    self::$power_type = 1;
                    break;
                case 4:
                    self::$power_type = 3;
                    break;
                case 6:
                    self::$power_type = 6;
                    break;
                case 3:
                    self::$power_type = 2;
                    break;
                default:
                    self::$power_type = 0;
                    break;
            }
            return true;
        }
    }
