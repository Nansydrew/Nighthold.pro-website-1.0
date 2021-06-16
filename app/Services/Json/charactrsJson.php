<?php

namespace App\Services\Json;

use App\Models\Characters\Arena;
use App\Models\Raid;
use App\Services\Achievements as Achievements;
use App\Services\Item;
use App\Services\Text;
use App\Services\Utils;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class charactrsJson {

    public static function models($server, $name) {
        DB::query()->macro('firstOrFail', function () {
        if ($record = $this->first()) {
        return $record;
        }
        return abort(512);
        });

        $char = DB::connection('characters')
        ->table('characters')
        ->select('guid', 'name', 'race', 'class', 'gender', 'level', 'health', 'mana', 'activespec', 'chosenTitle', 'logout_time')
        ->where('name', Str::ucfirst($name))
        ->firstOrFail();

        if ($char->level <= 10) {
        return abort(512);
        }

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

        $guild = DB::connection('characters')
            ->table('guild_member')
            ->leftJoin('guild', 'guild_member.guildid', '=', 'guild.guildid')
            ->where('guild_member.guid', $char->guid)
            ->first();

        $pvp = DB::connection('characters')
            ->table('character_honor')
            ->select('Guid', 'CurrentHonorAtLevel', 'HonorLevel', 'PrestigeLevel')
            ->where('Guid', $char->guid)
            ->first();

        $arena2 = Arena::where('guid', $char->guid)->where('bracket', 0)->first();
        $arena3 = Arena::where('guid', $char->guid)->where('bracket', 1)->first();
        $battlegrounds = Arena::where('guid', $char->guid)->where('bracket', 3)->first();

        Achievements::Initialize($char->guid);

        $info = new Item();
        $info->LoadInventory($char->guid);
        $info->CalculateAverageItemLevel();

        $data = [
            "lqip" => [
                "fileName" => "armory_bg_covenant_kyrian.jpg",
                "base64" => "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAf/AABEIAAgACgMBEQACEQEDEQH/xAGiAAABBQEBAQEBAQAAAAAAAAAAAQIDBAUGBwgJCgsQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+gEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoLEQACAQIEBAMEBwUEBAABAncAAQIDEQQFITEGEkFRB2FxEyIygQgUQpGhscEJIzNS8BVictEKFiQ04SXxFxgZGiYnKCkqNTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqCg4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2dri4+Tl5ufo6ery8/T19vf4+fr/2gAMAwEAAhEDEQA/AP435/DnwniuNae51fwS0t5cwNoyafqjS6bY20t4txMbjyIXm8yO0VLeOFMqm+VZdsvCftGMlwhPEZjiI0MvgqmKVXB4bCVVHDUaFWu6kqfLUUatqVLlpU48y0Tv7zsvKUcxaw8faVNKbVWWt5VIw5dHezUpc0m7L7NtFr7c3w//AGUyzGD4ofClISxMKXC+PGuEiJ/drOyeFHQzKmBKUZlLhirEYJ9n2fh19mnhlH7KliKcpKPRSl9qVt5dXqccVnfLH2lZe05Vz8sKijz297lV9I3vZdEf/9k=",
                "palette" => ["#969fc1","#5c5daa","#5691d5","#324459","#0c2577","#5a5ccc"]
            ],
            "character" => [
                "achievement" => Achievements::GetAchievementsPoints(),
                "avatar" => [
                    "url" => Utils::imageClass(self::$race, self::$gender)
                ],
                "averageItemLevel" => Item::GetAVGItemLevel(),
                "bust" => [
                    "url" => "https => //render-eu.worldofwarcraft.com/character/die-ewige-wacht/192/157998272-inset.jpg"
                ],
                "class" => [
                    'enum' => __('characters.class_key_'.self::$class),
                    'id' => self::$class,
                    'name' => __('characters.class_'.self::$class),
                    'slug' => Str::slug(__('characters.class_'.self::$class))
                ],
                "covenant" => [
                    "description" => "Некролорды вознаграждают сильных и избавляются от слабых. Амбициозные и свирепые души становятся частью бессмертной армии, стоящей на страже Темных Земель.",
                    "enum" => "NECROLORD",
                    "id" => 4,
                    "name" => "Некролорды",
                    "renown" => [
                        "rank" => 38
                    ],
                    "slug" => "necrolord"
                ],
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
                "lastUpdatedTimestamp" => ["epoch" => 1616645340000,"iso8601" => "2021-03-25T04:09Z"],
                "level" => self::$level,
                "mythicKeystoneDungeons" => [],
                "name" => self::$name,
                "pve" => self::raids(self::$name, self::$guid),
                "pvp" => Utils::pvp($arena2, $arena3, $battlegrounds),
                "race" => [
                    'enum' => mb_strtoupper(__('characters.key_race_'.self::$race)),
                    'id' => self::$race,
                    'name' => __('characters.race_'.self::$race),
                    'slug' => __('characters.key_race_'.self::$race)
                ],
                "realm" => ["name" => self::$realmName,"slug" => self::$realmSlug],
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
                "renderRaw" => ["url" => Utils::renderRaw(self::$race, self::$gender)],
                "spec" => Utils::characterSpec(self::$class, self::$activeTalentGroup),
                "specs" => Utils::specCharacters(self::$class, self::$activeTalentGroup, self::$guid),
                "stats" => Utils::statsChar(self::$health, self::$class),
                "title" => "[name], " . self::GetTitleInfo('title'),
                "url" => route('characters.show', [self::$realmSlug, mb_strtolower(self::$name)]),
                "achievementUrl" => route('achievements', [self::$realmSlug, mb_strtolower(self::$name)]),
                "isOutdated" => $isOutdated,
                "suffix" => self::GetTitleInfo('title')
            ],
            "summary" => [
                "character" => [
                    "achievement" => Achievements::GetAchievementsPoints(),
                    "avatar" => ["url" => Utils::imageClass(self::$race, self::$gender)],
                    "averageItemLevel" => Item::GetAVGItemLevel(),
                    "class" => [
                        'enum' => __('characters.class_key_'.self::$class),
                        'id' => self::$class,
                        'name' => __('characters.class_'.self::$class),
                        'slug' => Str::slug(__('characters.class_'.self::$class))
                    ],
                    "covenant" => [
                        "description" => "Некролорды вознаграждают сильных и избавляются от слабых. Амбициозные и свирепые души становятся частью бессмертной армии, стоящей на страже Темных Земель.",
                        "enum" => "NECROLORD",
                        "id" => 4,
                        "name" => "Некролорды",
                        "renown" => [
                            "rank" => 38
                        ],
                        "slug" => "necrolord"
                    ],
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
                    "lastUpdatedTimestamp" => ["epoch" => 1616645340000,"iso8601" => "2021-03-25T04 => 09Z"],
                    "level" => self::$level,
                    "name" => self::$name,
                    "pve" => [
                        "id" => "legion",
                        "name" => "Legion",
                        "raids" => [
                            [
                                "description" => "Титаны создали Изумрудный Сон по образу и подобию самого Азерота. Идеальное зеркало, в котором отражается зеленый цветущий мир – каким он был бы, если бы так называемая \"цивилизация\" не исказила его. Много лет друиды и хранители – те, кто ближе всего к природе – отмечали признаки чужеродного присутствия в Изумрудном Сне. Ныне по Сну стремительно расползается порча, наведенная Легионом и Владыкой Кошмара Ксавием. Если не пресечь ее в корне, она может поразить весь Азерот.","difficulties" => [["bosses" => [["killCount" => 0,"name" => "Низендра"],["killCount" => 0,"name" => "Ил'гинот, Сердце Порчи"],["killCount" => 0,"name" => "Элерет Дикая Лань"],["killCount" => 0,"name" => "Урсок"],["killCount" => 0,"name" => "Драконы Кошмара"],["killCount" => 0,"name" => "Кенарий"],["killCount" => 0,"name" => "Ксавий"]],"count" => 0,"difficulty" => ["enum" => "LFR","id" => 0,"name" => "СПР","slug" => "спр"],"id" => "LFR","name" => "СПР","progress" => ["enum" => "NONE","id" => 0,"name" => "Not Started","slug" => "not-started"],"total" => 7],["bosses" => [["killCount" => 1,"lastTimestamp" => 1474887094000,"name" => "Низендра"],["killCount" => 1,"lastTimestamp" => 1474889793000,"name" => "Ил'гинот, Сердце Порчи"],["killCount" => 1,"lastTimestamp" => 1474889060000,"name" => "Элерет Дикая Лань"],["killCount" => 1,"lastTimestamp" => 1474887845000,"name" => "Урсок"],["killCount" => 1,"lastTimestamp" => 1474888567000,"name" => "Драконы Кошмара"],["killCount" => 1,"lastTimestamp" => 1474890336000,"name" => "Кенарий"],["killCount" => 1,"lastTimestamp" => 1474891071000,"name" => "Ксавий"]],"count" => 7,"difficulty" => ["enum" => "NORMAL","id" => 1,"name" => "Обычный","slug" => "обычный"],"id" => "NORMAL","name" => "Обычный","progress" => ["enum" => "COMPLETE","id" => 2,"name" => "Completed","slug" => "completed"],"total" => 7],["bosses" => [["killCount" => 5,"lastTimestamp" => 1478201917000,"name" => "Низендра"],["killCount" => 5,"lastTimestamp" => 1478204396000,"name" => "Ил'гинот, Сердце Порчи"],["killCount" => 5,"lastTimestamp" => 1478203701000,"name" => "Элерет Дикая Лань"],["killCount" => 5,"lastTimestamp" => 1478202571000,"name" => "Урсок"],["killCount" => 5,"lastTimestamp" => 1478203219000,"name" => "Драконы Кошмара"],["killCount" => 5,"lastTimestamp" => 1478204847000,"name" => "Кенарий"],["killCount" => 5,"lastTimestamp" => 1478205482000,"name" => "Ксавий"]],"count" => 7,"difficulty" => ["enum" => "HEROIC","id" => 2,"name" => "Героический","slug" => "героический"],"id" => "HEROIC","name" => "Героический","progress" => ["enum" => "COMPLETE","id" => 2,"name" => "Completed","slug" => "completed"],"total" => 7],["bosses" => [["killCount" => 0,"name" => "Низендра"],["killCount" => 0,"name" => "Ил'гинот, Сердце Порчи"],["killCount" => 0,"name" => "Элерет Дикая Лань"],["killCount" => 0,"name" => "Урсок"],["killCount" => 0,"name" => "Драконы Кошмара"],["killCount" => 0,"name" => "Кенарий"],["killCount" => 0,"name" => "Ксавий"]],"count" => 0,"difficulty" => ["enum" => "MYTHIC","id" => 3,"name" => "Эпохальный","slug" => "эпохальный"],"id" => "MYTHIC","name" => "Эпохальный","progress" => ["enum" => "NONE","id" => 0,"name" => "Not Started","slug" => "not-started"],"total" => 7]],"icon" => ["url" => "https://render-eu.worldofwarcraft.com/zones/the-emerald-nightmare-small.jpg"],"id" => "изумрудный-кошмар","level" => 45,"location" => "Валь'шара","name" => "Изумрудный Кошмар","players" => "10-30 Гибкий (20 Эпохальный)","url" => "/character/eu/howling-fjord/иллиняша/pve/raids/legion/изумрудный-кошмар/details.frag","bg" => ""],
                            [
                                "description" => "Один томится в заточении в Чертогах Доблести с тех пор, как его предал Локен. Тем временем Хелия строит козни в своем царстве теней, покушаясь на души его воинов-валарьяров. Но недавно в земли Штормхейма пришли великие герои. Один призывает этих храбрецов пройти последнее испытание в надежде, что их сила и решимость помогут сместить баланс сил в его пользу и покончить с Хелией.","difficulties" => [["bosses" => [["killCount" => 0,"name" => "Один"],["killCount" => 0,"name" => "Гарм"],["killCount" => 0,"name" => "Хелия"]],"count" => 0,"difficulty" => ["enum" => "LFR","id" => 0,"name" => "СПР","slug" => "спр"],"id" => "LFR","name" => "СПР","progress" => ["enum" => "NONE","id" => 0,"name" => "Not Started","slug" => "not-started"],"total" => 3],["bosses" => [["killCount" => 0,"name" => "Один"],["killCount" => 0,"name" => "Гарм"],["killCount" => 0,"name" => "Хелия"]],"count" => 0,"difficulty" => ["enum" => "NORMAL","id" => 1,"name" => "Обычный","slug" => "обычный"],"id" => "NORMAL","name" => "Обычный","progress" => ["enum" => "NONE","id" => 0,"name" => "Not Started","slug" => "not-started"],"total" => 3],["bosses" => [["killCount" => 6,"lastTimestamp" => 1484588894000,"name" => "Один"],["killCount" => 6,"lastTimestamp" => 1484589453000,"name" => "Гарм"],["killCount" => 6,"lastTimestamp" => 1484590051000,"name" => "Хелия"]],"count" => 3,"difficulty" => ["enum" => "HEROIC","id" => 2,"name" => "Героический","slug" => "героический"],"id" => "HEROIC","name" => "Героический","progress" => ["enum" => "COMPLETE","id" => 2,"name" => "Completed","slug" => "completed"],"total" => 3],["bosses" => [["killCount" => 0,"name" => "Один"],["killCount" => 0,"name" => "Гарм"],["killCount" => 0,"name" => "Хелия"]],"count" => 0,"difficulty" => ["enum" => "MYTHIC","id" => 3,"name" => "Эпохальный","slug" => "эпохальный"],"id" => "MYTHIC","name" => "Эпохальный","progress" => ["enum" => "NONE","id" => 0,"name" => "Not Started","slug" => "not-started"],"total" => 3]],"icon" => ["url" => "https://render-eu.worldofwarcraft.com/zones/trial-of-valor-small.jpg"],"id" => "испытание-доблести","level" => 45,"location" => "Испытание доблести","name" => "Испытание доблести","players" => "10-30 Гибкий (20 Эпохальный)","url" => "/character/eu/howling-fjord/иллиняша/pve/raids/legion/испытание-доблести/details.frag","bg" => ""],
                            [
                                "description" => "Цитадель Ночи – самое большое сооружение на Расколотых островах и одно из самых величественных во всем Азероте. Это зримое свидетельство высот, которых достигла цивилизация ночнорожденных. Эта тихая гавань вдали от скорбей мира построена вокруг Ночного Колодца, источника тайной магии, много веков питающего Сурамар. Но на другой стороне гавани над тем, что было прежде храмом Элуны, сгущается буря Скверны, а в дворцовых стенах обосновался сам Гул'дан, так что беды здесь не закончились, а лишь начинаются.","difficulties" => [["bosses" => [["killCount" => 0,"name" => "Скорпирон"],["killCount" => 0,"name" => "Хрономатическая аномалия"],["killCount" => 0,"name" => "Триллиакс"],["killCount" => 0,"name" => "Заклинательница клинков Алуриэль"],["killCount" => 0,"name" => "Тихондрий"],["killCount" => 0,"name" => "Крос"],["killCount" => 0,"name" => "Верховный ботаник Тел'арн"],["killCount" => 0,"name" => "Звездный авгур Этрей"],["killCount" => 0,"name" => "Великий магистр Элисанда"],["killCount" => 0,"name" => "Гул'дан"]],"count" => 0,"difficulty" => ["enum" => "LFR","id" => 0,"name" => "СПР","slug" => "спр"],"id" => "LFR","name" => "СПР","progress" => ["enum" => "NONE","id" => 0,"name" => "Not Started","slug" => "not-started"],"total" => 10],["bosses" => [["killCount" => 1,"lastTimestamp" => 1485096553000,"name" => "Скорпирон"],["killCount" => 1,"lastTimestamp" => 1485096996000,"name" => "Хрономатическая аномалия"],["killCount" => 1,"lastTimestamp" => 1485097639000,"name" => "Триллиакс"],["killCount" => 1,"lastTimestamp" => 1485098164000,"name" => "Заклинательница клинков Алуриэль"],["killCount" => 1,"lastTimestamp" => 1485098684000,"name" => "Тихондрий"],["killCount" => 1,"lastTimestamp" => 1485099239000,"name" => "Крос"],["killCount" => 1,"lastTimestamp" => 1485100626000,"name" => "Верховный ботаник Тел'арн"],["killCount" => 1,"lastTimestamp" => 1485099929000,"name" => "Звездный авгур Этрей"],["killCount" => 1,"lastTimestamp" => 1485101383000,"name" => "Великий магистр Элисанда"],["killCount" => 1,"lastTimestamp" => 1485102047000,"name" => "Гул'дан"]],"count" => 10,"difficulty" => ["enum" => "NORMAL","id" => 1,"name" => "Обычный","slug" => "обычный"],"id" => "NORMAL","name" => "Обычный","progress" => ["enum" => "COMPLETE","id" => 2,"name" => "Completed","slug" => "completed"],"total" => 10],["bosses" => [["killCount" => 4,"lastTimestamp" => 1494605782000,"name" => "Скорпирон"],["killCount" => 5,"lastTimestamp" => 1494606133000,"name" => "Хрономатическая аномалия"],["killCount" => 5,"lastTimestamp" => 1494606432000,"name" => "Триллиакс"],["killCount" => 5,"lastTimestamp" => 1494606857000,"name" => "Заклинательница клинков Алуриэль"],["killCount" => 5,"lastTimestamp" => 1494607241000,"name" => "Тихондрий"],["killCount" => 5,"lastTimestamp" => 1494607680000,"name" => "Крос"],["killCount" => 5,"lastTimestamp" => 1494608393000,"name" => "Верховный ботаник Тел'арн"],["killCount" => 5,"lastTimestamp" => 1494608893000,"name" => "Звездный авгур Этрей"],["killCount" => 5,"lastTimestamp" => 1494609571000,"name" => "Великий магистр Элисанда"],["killCount" => 4,"lastTimestamp" => 1494610517000,"name" => "Гул'дан"]],"count" => 10,"difficulty" => ["enum" => "HEROIC","id" => 2,"name" => "Героический","slug" => "героический"],"id" => "HEROIC","name" => "Героический","progress" => ["enum" => "COMPLETE","id" => 2,"name" => "Completed","slug" => "completed"],"total" => 10],["bosses" => [["killCount" => 6,"lastTimestamp" => 1498399171000,"name" => "Скорпирон"],["killCount" => 6,"lastTimestamp" => 1498399556000,"name" => "Хрономатическая аномалия"],["killCount" => 6,"lastTimestamp" => 1498399866000,"name" => "Триллиакс"],["killCount" => 4,"lastTimestamp" => 1498400787000,"name" => "Заклинательница клинков Алуриэль"],["killCount" => 4,"lastTimestamp" => 1498401972000,"name" => "Тихондрий"],["killCount" => 4,"lastTimestamp" => 1498401411000,"name" => "Крос"],["killCount" => 4,"lastTimestamp" => 1498402663000,"name" => "Верховный ботаник Тел'арн"],["killCount" => 4,"lastTimestamp" => 1498403244000,"name" => "Звездный авгур Этрей"],["killCount" => 4,"lastTimestamp" => 1498397431000,"name" => "Великий магистр Элисанда"],["killCount" => 3,"lastTimestamp" => 1498398707000,"name" => "Гул'дан"]],"count" => 10,"difficulty" => ["enum" => "MYTHIC","id" => 3,"name" => "Эпохальный","slug" => "эпохальный"],"id" => "MYTHIC","name" => "Эпохальный","progress" => ["enum" => "COMPLETE","id" => 2,"name" => "Completed","slug" => "completed"],"total" => 10]],"icon" => ["url" => "https://render-eu.worldofwarcraft.com/zones/the-nighthold-small.jpg"],"id" => "цитадель-ночи","level" => 45,"location" => "Сурамар","name" => "Цитадель Ночи","players" => "10-30 Гибкий (20 Эпохальный)","url" => "/character/eu/howling-fjord/иллиняша/pve/raids/legion/цитадель-ночи/details.frag","bg" => ""],
                            [
                                "description" => "",
                                "difficulties" => [
                                    [
                                        "bosses" => [
                                            ["killCount" => 0,"name" => "Горот"],["killCount" => 0,"name" => "Демоническая инквизиция"],["killCount" => 0,"name" => "Харджатан"],["killCount" => 0,"name" => "Сестры Луны"],["killCount" => 0,"name" => "Госпожа Сашж'ин"],["killCount" => 0,"name" => "Сонм страданий"],["killCount" => 0,"name" => "Бдительная дева"],["killCount" => 0,"name" => "Аватара Падшего"],["killCount" => 0,"name" => "Кил'джеден"]],
                                        "count" => 0,"difficulty" => ["enum" => "LFR","id" => 0,"name" => "СПР","slug" => "спр"],"id" => "LFR","name" => "СПР","progress" => ["enum" => "NONE","id" => 0,"name" => "Not Started","slug" => "not-started"],"total" => 9],["bosses" => [["killCount" => 1,"lastTimestamp" => 1498319751000,"name" => "Горот"],["killCount" => 1,"lastTimestamp" => 1498320195000,"name" => "Демоническая инквизиция"],["killCount" => 1,"lastTimestamp" => 1498320539000,"name" => "Харджатан"],["killCount" => 1,"lastTimestamp" => 1498321409000,"name" => "Сестры Луны"],["killCount" => 1,"lastTimestamp" => 1498320970000,"name" => "Госпожа Сашж'ин"],["killCount" => 1,"lastTimestamp" => 1498321872000,"name" => "Сонм страданий"],["killCount" => 2,"lastTimestamp" => 1504044077000,"name" => "Бдительная дева"],["killCount" => 1,"lastTimestamp" => 1498322902000,"name" => "Аватара Падшего"],["killCount" => 1,"lastTimestamp" => 1498323565000,"name" => "Кил'джеден"]],"count" => 9,"difficulty" => ["enum" => "NORMAL","id" => 1,"name" => "Обычный","slug" => "обычный"],"id" => "NORMAL","name" => "Обычный","progress" => ["enum" => "COMPLETE","id" => 2,"name" => "Completed","slug" => "completed"],"total" => 9],["bosses" => [["killCount" => 6,"lastTimestamp" => 1505844147000,"name" => "Горот"],["killCount" => 7,"lastTimestamp" => 1508257672000,"name" => "Демоническая инквизиция"],["killCount" => 7,"lastTimestamp" => 1508258037000,"name" => "Харджатан"],["killCount" => 7,"lastTimestamp" => 1508258950000,"name" => "Сестры Луны"],["killCount" => 7,"lastTimestamp" => 1508258493000,"name" => "Госпожа Сашж'ин"],["killCount" => 8,"lastTimestamp" => 1508259411000,"name" => "Сонм страданий"],["killCount" => 8,"lastTimestamp" => 1508259924000,"name" => "Бдительная дева"],["killCount" => 7,"lastTimestamp" => 1508260553000,"name" => "Аватара Падшего"],["killCount" => 6,"lastTimestamp" => 1505848744000,"name" => "Кил'джеден"]],"count" => 9,"difficulty" => ["enum" => "HEROIC","id" => 2,"name" => "Героический","slug" => "героический"],"id" => "HEROIC","name" => "Героический","progress" => ["enum" => "COMPLETE","id" => 2,"name" => "Completed","slug" => "completed"],"total" => 9],["bosses" => [["killCount" => 13,"lastTimestamp" => 1512317198000,"name" => "Горот"],["killCount" => 12,"lastTimestamp" => 1512317491000,"name" => "Демоническая инквизиция"],["killCount" => 13,"lastTimestamp" => 1512317842000,"name" => "Харджатан"],["killCount" => 11,"lastTimestamp" => 1512319401000,"name" => "Сестры Луны"],["killCount" => 5,"lastTimestamp" => 1512318890000,"name" => "Госпожа Сашж'ин"],["killCount" => 11,"lastTimestamp" => 1512319933000,"name" => "Сонм страданий"],["killCount" => 4,"lastTimestamp" => 1512320581000,"name" => "Бдительная дева"],["killCount" => 4,"lastTimestamp" => 1512321295000,"name" => "Аватара Падшего"],["killCount" => 4,"lastTimestamp" => 1512322397000,"name" => "Кил'джеден"]],"count" => 9,"difficulty" => ["enum" => "MYTHIC","id" => 3,"name" => "Эпохальный","slug" => "эпохальный"],"id" => "MYTHIC","name" => "Эпохальный","progress" => ["enum" => "COMPLETE","id" => 2,"name" => "Completed","slug" => "completed"],"total" => 9]],
                                "icon" => ["url" => "https://render-eu.worldofwarcraft.com/zones/tomb-of-sargeras-small.jpg"],"id" => "гробница-саргераса","level" => 45,"location" => "Расколотый берег","name" => "Гробница Саргераса","players" => "10-30 Гибкий (20 Эпохальный)","url" => "/character/eu/howling-fjord/иллиняша/pve/raids/legion/гробница-саргераса/details.frag","bg" => ""],
                            [
                                "description" => "В сердце Аргуса находится Анторус, Пылающий Трон. Отсюда Саргерас начал кампанию Легиона по опустошению космоса.\r\n\r\nТам, в труднодоступных глубинах планеты, идет работа по превращению первозданных сил в оружие тотального истребления. Если Легиону удастся пробудить их и заставить служить своему повелителю, всему сущему придет конец.",
                                "difficulties" => [
                                    [
                                        "bosses" => [
                                            ["killCount" => 0,"name" => "Разрушитель миров Кин'гарота"],
                                            ["killCount" => 0,"name" => "Гончие Саргераса"],
                                            ["killCount" => 0,"name" => "Военный совет Анторуса"],
                                            ["killCount" => 0,"name" => "Хранительница порталов Азабель"],
                                            ["killCount" => 0,"name" => "Эонар, Хранительница жизни"],
                                            ["killCount" => 0,"name" => "Ловец душ Имонар"],
                                            ["killCount" => 0,"name" => "Кин'гарот"],
                                            ["killCount" => 0,"name" => "Ковен шиварр"],
                                            ["killCount" => 0,"name" => "Вариматрас"],
                                            ["killCount" => 0,"name" => "Агграмар"],
                                            ["killCount" => 0,"name" => "Аргус Порабощенный"]
                                        ],
                                        "count" => 0,
                                        "difficulty" => ["enum" => "LFR","id" => 0,"name" => "СПР","slug" => "спр"],
                                        "id" => "LFR",
                                        "name" => "СПР",
                                        "progress" => ["enum" => "NONE","id" => 0,"name" => "Not Started","slug" => "not-started"],"total" => 11],
                                    [
                                        "bosses" => [["killCount" => 1,"lastTimestamp" => 1512147236000,"name" => "Разрушитель миров Кин'гарота"],["killCount" => 1,"lastTimestamp" => 1512147656000,"name" => "Гончие Саргераса"],["killCount" => 1,"lastTimestamp" => 1512148336000,"name" => "Военный совет Анторуса"],["killCount" => 1,"lastTimestamp" => 1512148922000,"name" => "Хранительница порталов Азабель"],["killCount" => 1,"lastTimestamp" => 1512149427000,"name" => "Эонар, Хранительница жизни"],["killCount" => 1,"lastTimestamp" => 1512149861000,"name" => "Ловец душ Имонар"],["killCount" => 1,"lastTimestamp" => 1512150413000,"name" => "Кин'гарот"],["killCount" => 1,"lastTimestamp" => 1512151380000,"name" => "Ковен шиварр"],["killCount" => 1,"lastTimestamp" => 1512150877000,"name" => "Вариматрас"],["killCount" => 1,"lastTimestamp" => 1512152001000,"name" => "Агграмар"],["killCount" => 1,"lastTimestamp" => 1512152649000,"name" => "Аргус Порабощенный"]],"count" => 11,"difficulty" => ["enum" => "NORMAL","id" => 1,"name" => "Обычный","slug" => "обычный"],"id" => "NORMAL","name" => "Обычный","progress" => ["enum" => "COMPLETE","id" => 2,"name" => "Completed","slug" => "completed"],"total" => 11],
                                    [
                                        "bosses" => [["killCount" => 2,"lastTimestamp" => 1518546883000,"name" => "Разрушитель миров Кин'гарота"],["killCount" => 2,"lastTimestamp" => 1518547384000,"name" => "Гончие Саргераса"],["killCount" => 2,"lastTimestamp" => 1518548238000,"name" => "Военный совет Анторуса"],["killCount" => 2,"lastTimestamp" => 1518549028000,"name" => "Хранительница порталов Азабель"],["killCount" => 2,"lastTimestamp" => 1518549600000,"name" => "Эонар, Хранительница жизни"],["killCount" => 2,"lastTimestamp" => 1518550196000,"name" => "Ловец душ Имонар"],["killCount" => 2,"lastTimestamp" => 1518550989000,"name" => "Кин'гарот"],["killCount" => 2,"lastTimestamp" => 1518552162000,"name" => "Ковен шиварр"],["killCount" => 2,"lastTimestamp" => 1518551593000,"name" => "Вариматрас"],["killCount" => 2,"lastTimestamp" => 1518552844000,"name" => "Агграмар"],["killCount" => 3,"lastTimestamp" => 1518554656000,"name" => "Аргус Порабощенный"]],"count" => 11,"difficulty" => ["enum" => "HEROIC","id" => 2,"name" => "Героический","slug" => "героический"],"id" => "HEROIC","name" => "Героический","progress" => ["enum" => "COMPLETE","id" => 2,"name" => "Completed","slug" => "completed"],"total" => 11],
                                    [
                                        "bosses" => [
                                            ["killCount" => 0,"name" => "Разрушитель миров Кин'гарота"],
                                            ["killCount" => 0,"name" => "Гончие Саргераса"],
                                            ["killCount" => 0,"name" => "Военный совет Анторуса"],
                                            ["killCount" => 0,"name" => "Хранительница порталов Азабель"],
                                            ["killCount" => 0,"name" => "Эонар, Хранительница жизни"],
                                            ["killCount" => 0,"name" => "Ловец душ Имонар"],
                                            ["killCount" => 0,"name" => "Кин'гарот"],
                                            ["killCount" => 0,"name" => "Ковен шиварр"],
                                            ["killCount" => 0,"name" => "Вариматрас"],
                                            ["killCount" => 0,"name" => "Агграмар"],
                                            ["killCount" => 0,"name" => "Аргус Порабощенный"]
                                        ],
                                        "count" => 11,
                                        "difficulty" => ["enum" => "MYTHIC","id" => 3,"name" => "Эпохальный","slug" => "эпохальный"],
                                        "id" => "MYTHIC",
                                        "name" => "Эпохальный",
                                        "progress" => ["enum" => "NONE","id" => 0,"name" => "Not Started","slug" => "not-started"],
                                        "total" => 11
                                    ]
                                ],
                                "icon" => [
                                    "url" => "https://render-eu.worldofwarcraft.com/zones/antorus-the-burning-throne-small.jpg"
                                ],
                                "id" => "анторус-пылающий-трон",
                                "level" => 110,
                                "location" => "Пустоши Анторуса",
                                "name" => "Анторус, Пылающий Трон",
                                "players" => "10-30 Гибкий (20 Эпохальный)",
                                "url" => "/character/eu/howling-fjord/иллиняша/pve/raids/legion/анторус-пылающий-трон/details.frag",
                                "bg" => ""
                            ]
                        ]
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
                    "realm" => ["name" => self::$realmName,"slug" => self::$realmSlug],
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
                    "stats" => Utils::statsChar(self::$health, self::$class),
                    "title" => "[name], " . self::GetTitleInfo('title'),
                    "url" => route('characters.show', [self::$realmSlug, mb_strtolower(self::$name)]),
                    "achievementUrl" => route('achievements', [self::$realmSlug, mb_strtolower(self::$name)]),
                    "isOutdated" => $isOutdated,
                    "suffix" => self::GetTitleInfo('title')
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

        if(!isset($guild))
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

        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    public static function raids($name, $guid): array
    {
        $raid = Raid::where('key', 'legion')->get();
        $raids = [];
        foreach ($raid as $item) {
            $raids[] = [
                "description" => $item->description,
                "difficulties" => [
                    [
                        "bosses" => self::boss($item->bosses, $guid),
                        "count" => self::bossKillCount($item->bosses, $guid),
                        "difficulty" => ["enum" => "MYTHIC","id" => 3,"name" => "Эпохальный","slug" => "эпохальный"],
                        "id" => "MYTHIC",
                        "name" => "Эпохальный",
                        "progress" => ["enum" => "IN_PROGRESS","id" => 1,"name" => "In Progress","slug" => "in-progress"],
                        "total" => 11
                    ]
                ],
                "icon" => ["url" => asset('storage/'. Utils::ImagesLogo($item->icon))],
                "id" => $item->ids,
                "level" => $item->level,
                "location" => $item->location,
                "name" => $item->name,
                "players" => $item->players,
                "url" => route('raid.details', [$name, $item->key, $item->ids]),
                "bg" => ""
            ];
        }
        return $raids;
    }

    public static function boss($boss, $guid): array
    {
        $bosses = [];
        foreach ($boss as $item) {
            $info = DB::connection('characters')
                ->table('character_stat_kill_creature')
                ->where('guid', $guid)
                ->where('entry', $item->id_boss)
                ->first();
            $bosses[] = ["killCount" => $info->count ?? 0,"name" => $item->name];
        }
        return $bosses;
    }

    public static function bossKillCount($boss, $guid): int
    {
        $count = 0;
        $i = 0;
        foreach ($boss as $item) {
            $count = DB::connection('characters')
                ->table('character_stat_kill_creature')
                ->where('guid', $guid)
                ->where('entry', $item->id_boss)
                ->where('count', '>', 0)
                ->first();
            if ($count) {
                $i++;
            }
        }
        return $i;
    }
}
