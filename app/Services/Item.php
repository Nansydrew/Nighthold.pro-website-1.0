<?php

    namespace App\Services;

    use Illuminate\Support\Facades\DB;

    class Item {
        private static $level          = 0;
        private static $item_level     = array();
        private static $m_items        = array();
        private static $itemLevel        = 0;

        public static function GetAverageItemLevel() {
            return array('avg' => self::GetAVGItemLevel(), 'avgEquipped' => self::GetAVGEquippedItemLevel());
        }

        public static function GetAVGItemLevel() {
            return self::$item_level['avg'];
        }

        public static function GetAVGEquippedItemLevel() {
            return self::$item_level['avgEquipped'];
        }

        public static function GetLevel() {
            return self::$level;
        }

        public static function GetItem($slot) {
            return self::$m_items[$slot] ?? null;
        }

        public static function CalculateAverageItemLevel() {
            if(!self::IsInventoryLoaded()) {
                if(!self::LoadInventory(true)) {
                    self::$item_level = array('avgEquipped' => 0, 'avg' => 0);
                    return true;
                }
            }
            $total_iLvl = 0;
            $maxLvl = 0;
            $minLvl = 500;
            $i = 0;
            self::$item_level = array('avgEquipped' => 0, 'avg' => 0);
            foreach(self::$m_items as $item) {
                if(!in_array($item->slot, array(3, 18))) {
                    if($item->ItemLevel > 0) {
                        $total_iLvl += $item->ItemLevel;
                        if($item->ItemLevel < $minLvl) {
                            $minLvl = $item->ItemLevel;
                        }
                        if($item->ItemLevel > $maxLvl) {
                            $maxLvl = $item->ItemLevel;
                        }
                        $i++;
                    }
                }
            }
            if($i == 0) {
                return true;
            }
            self::$item_level['avgEquipped'] = round(($maxLvl + $minLvl) / 2);
            self::$item_level['avg'] = round($total_iLvl / $i);
            return true;
        }

        public static function LoadInventory($guid) {
            $inv = DB::connection('characters')->select(/** @lang text */
                    '
                    SELECT
                    ii.guid,
                    ii.itemEntry,
                    ii.owner_guid,
                    ii.creatorGuid,
                    ii.giftCreatorGuid,
                    ii.count,
                    ii.duration,
                    ii.charges,
                    ii.flags,
                    ii.enchantments,
                    ii.durability,
                    ii.playedTime,
                    ii.text,
                    ii.battlePetSpeciesId,
                    ii.battlePetBreedData,
                    ii.battlePetLevel,
                    ii.battlePetDisplayId,
                    ii.bonusListIDs,
                    iit.itemModifiedAppearanceAllSpecs,
                    iit.itemModifiedAppearanceSpec1,
                    iit.itemModifiedAppearanceSpec2,
                    iit.itemModifiedAppearanceSpec3,
                    iit.itemModifiedAppearanceSpec4,
                    iit.spellItemEnchantmentAllSpecs,
                    iit.spellItemEnchantmentSpec1,
                    iit.spellItemEnchantmentSpec2,
                    iit.spellItemEnchantmentSpec3,
                    iit.spellItemEnchantmentSpec4,
                    ig.gemItemId1,
                    ig.gemBonuses1,
                    ig.gemContext1,
                    ig.gemScalingLevel1,
                    ig.gemItemId2,
                    ig.gemBonuses2,
                    ig.gemContext2,
                    ig.gemScalingLevel2,
                    ig.gemItemId3,
                    ig.gemBonuses3,
                    ig.gemContext3,
                    ig.gemScalingLevel3,
                    im.fixedScalingLevel,
                    im.artifactKnowledgeLevel,
                    bag,
                    slot
                    FROM character_inventory ci JOIN item_instance ii ON ci.item = ii.guid LEFT JOIN item_instance_gems ig ON ii.guid = ig.itemGuid LEFT JOIN item_instance_transmog iit ON ii.guid = iit.itemGuid LEFT JOIN item_instance_modifiers im ON ii.guid = im.itemGuid WHERE ci.bag = 0 AND ci.slot < 19 AND ci.guid = ? AND ii.owner_guid = ?', [$guid, $guid]);
            foreach($inv as $item) {
                self::$m_items[$item->slot] = new ItemPrototype();
                self::$m_items[$item->slot]->LoadFromDB($item, $guid);
            }
            return true;
        }

        private static function IsInventoryLoaded() {
            return is_array(self::$m_items);
        }

        public static function GetEquippedItemInfo($slot) {
            if(!isset(self::$m_items[$slot])) return false;
            $item = self::GetItem($slot);
            if(!$item) return false;
            return [
                'item'  => $item->setItemData(),
            ];
        }

        public static function itemInfo() {
            $item_slots = array(
                '0'      => array('modal' => 'head',  'name' => 'Голова', 'type' => 'HEAD'),
                '1'      => array('modal' => 'neck',  'name' => 'Шея', 'type' => 'NECK'),
                '2'      => array('modal' => 'shoulder',  'name' => 'Плечи', 'type' => 'SHOULDER'),
                '14'     => array('modal' => 'back',  'name' => 'Спина', 'type' => 'BACK'),
                '4'      => array('modal' => 'chest',  'name' => 'Грудь', 'type' => 'CHEST'),
                '3'      => array('modal' => 'shirt',  'name' => 'Рубашка', 'type' => 'SHIRT'),
                '18'     => array('modal' => 'tabard',  'name' => 'Гербовая накидка', 'type' => 'TABARD'),
                '8'      => array('modal' => 'wrist',  'name' => 'Запястья', 'type' => 'WRIST'),
                '9'      => array('modal' => 'hand',  'name' => 'Кисти рук', 'type' => 'HANDS'),
                '5'      => array('modal' => 'waist',  'name' => 'Пояс', 'type' => 'WAIST'),
                '6'      => array('modal' => 'leg',  'name' => 'Ноги', 'type' => 'LEGS'),
                '7'      => array('modal' => 'foot',  'name' => 'Ступни', 'type' => 'FEET'),
                '10'     => array('modal' => 'leftFinger',  'name' => 'Кольцо', 'type' => 'FINGER_1'),
                '11'     => array('modal' => 'rightFinger',  'name' => 'Кольцо', 'type' => 'FINGER_2'),
                '12'     => array('modal' => 'leftTrinket',  'name' => 'Аксессуар', 'type' => 'TRINKET_1'),
                '13'     => array('modal' => 'rightTrinket',  'name' => 'Аксессуар', 'type' => 'TRINKET_2'),
                '15'     => array('modal' => 'weapon',  'name' => 'Правая рука', 'type' => 'MAIN_HAND'),
                '16'     => array('modal' => 'offhand',  'name' => 'Левая рука', 'type' => 'OFF_HAND')
            );
            $collect = [];
            foreach($item_slots as $slot => $data) {
                $item = self::GetEquippedItemInfo($slot);
                if($item == false) {
                    continue;
                } else {
                    $collect[$data['modal']] = [
                        "weapon" => (new Item)->ItemWeapon($item['item']->InventoryType, $item['item']),
                        "armor" => [
                            "value" => 221
                        ],
                        "binding" => (new Item)->itemBinding($item['item']->Bonding),
                        "bonus_list" => [$item['item']->item->bonusListIDs],
                        "context" => 11,
                        "id" => $item['item']->entry,
                        "description" => $item['item']->Description_Lang,
                        "inventory_type" => [
                            "name" => $data['name'],
                            "type" => $data['type']
                        ],
                        "is_subclass_hidden" => false,
                        "item" => [
                            "id" => $item['item']->entry
                        ],
                        "item_class" => (new Item)->ItemClass($item['item']->OverallQualityID, $item['item']->InventoryType),
                        "item_subclass" => (new Item)->ItemSubClass($item['item']->Material),
                        "level" => [
                            "display_string" => __('characters.item_level', ['level' => $item['item']->ItemLevel]),
                            "value" => $item['item']->ItemLevel
                        ],
                        "limit_category" => (new Item)->itemLimitCategory($item['item']->item->bonusListIDs),
                        "media" => [
                            "content" => [
                                "assets" => [
                                    [
                                        "key" => "icon",
                                        "value" => asset('uploads/item/' . $item['item']->icon . '.jpg')
                                    ]
                                ],
                                "dataRegion" => [
                                    "value" => "eu"
                                ]
                            ],
                            "id" => $item['item']->entry,
                        ],
                        "modified_appearance_id" => 105940,
                        "name" => $item['item']->Display_Lang,
                        "name_description" => (new Item)->itemNameDescription($item['item']->item->bonusListIDs),
                        "quality" => (new Item)->itemQuality($item['item']->OverallQualityID),
                        "quantity" => 1,
                        "requirements" => (new Item)->itemLevel($item['item']->RequiredLevel),
                        "set" => (new Item)->itemSet($item['item']->ItemSet),
                        "slot" => [
                            "name" => $data['name'],
                            "type" => $data['type']
                        ],
                        "stats" => (new Item)->ItemStats($item['item']->ItemStat),
                        "unique_equipped" => (new Item)->itemUnique($item['item']->MaxCount)
                    ];
                    if(!(new Item)->itemLevel($item['item']->RequiredLevel))
                    {
                        unset($collect[$data['modal']]['requirements']);
                    }
                    if(!(new Item)->itemNameDescription($item['item']->item->bonusListIDs))
                    {
                        unset($collect[$data['modal']]['name_description']);
                    }
                    if(!(new Item)->itemUnique($item['item']->MaxCount))
                    {
                        unset($collect[$data['modal']]['unique_equipped']);
                    }
                    if(!$item['item']->item->bonusListIDs)
                    {
                        unset($collect[$data['modal']]['bonus_list']);
                    }
                }
            }

            return $collect;
            ///,"transmog" => [
            ///       "display_string" => "Трансмогрификация: \nСкрытый плащ",
            ///        "item" => [
            ///                "id" => 134111,
            ///                "key" => ["href" => "https://eu.api.blizzard.com/GameDataService/v1/wow/item/134111?namespace=static-eu"],
            ///                "name" => "Скрытый плащ"
            ///        ]
            ///]
            ///
            ///
            /// "spells" => [
            //                                [
            //                                        "description" => "Если на персонаже: Уменьшает потери здравомыслия в видениях Н'Зота на 80%.",
            //                                        "spell" => [
            //                                                "id" => 317419,
            //                                                "key" => [
            //                                                        "href" => "https://eu.api.blizzard.com/GameDataService/v1/wow/spell/317419?namespace=static-eu"
            //                                                ],
            //                                                "name" => "Покров Решимости"
            //                                        ]
            //                                ],
            //                                [
            //                                        "description" => "Если на персонаже: Ваши заклинания и способности могут повысить вашу характеристику (Интеллект) на 3 386 на 15 сек.",
            //                                        "spell" => [
            //                                                "id" => 317860,
            //                                                "key" => [
            //                                                        "href" => "https://eu.api.blizzard.com/GameDataService/v1/wow/spell/317860?namespace=static-eu"
            //                                                ],
            //                                                "name" => "Драконье усиление"
            //                                        ]
            //                                ],
            //                                [
            //                                        "description" => "Использование: Снимает эффекты порчи Н'Зота и на 6 сек. дает невосприимчивость к эффектам порчи. (Восстановление: 3 мин.)",
            //                                        "spell" => [
            //                                                "id" => 318378,
            //                                                "key" => [
            //                                                        "href" => "https://eu.api.blizzard.com/GameDataService/v1/wow/spell/318378?namespace=static-eu"
            //                                                ],
            //                                                "name" => "Непреклонная решимость"
            //                                        ]
            //                                ]
            //                        ],
        }

        public function ItemWeapon($inventory, $item) {
            if($inventory === 17 ) {
                //$average = $extraDPS * $item->ItemDelay / 1000;
                //$minDmg = 0.7 * $average;
                //$maxDmg = 1.3 * $average;
                //$dps = round(($maxDmg + $minDmg) / (2 * ($item->ItemDelay / 1000)));
                //$delay = $item->ItemDelay / 1000;
                //$dps += round(($d_max + $d_min) / (2 * $delay), 1);

                $weapon = '';

                $dps = DB::table('item_damage')
                    ->select('Quality_'.$item->OverallQualityID)
                    ->where('ItemLevel', $item->ItemLevel)
                    ->first();
                foreach ($dps as $key => $value) {
                    if ($key == 'Quality_'.$item->OverallQualityID) {
                        $weapon = $value;
           }
                }
                return [
                    "attack_speed" => [
                        "display_string" => "Скорость " . $item->ItemDelay / 1000,
                        "value" => $item->ItemDelay
                    ],
                    "damage" => [
                        "damage_class" => [
                            "name" => "физический",
                            "type" => "PHYSICAL"
                        ],
                        "display_string" => "Урон: 33 - 55",
                        "max_value" => 55,
                        "min_value" => 33],
                    "dps" => [
                        "display_string" => "({$weapon} ед. урона в секунду)",
                        "value" => $weapon
                    ]
                ];
            }
            return [];
        }

        public function ItemItems($item) {
            if($item) {
                $itemSet = DB::table('itemset')
                    ->where('ID', $item)
                    ->select('ItemID_1', 'ItemID_2','ItemID_3','ItemID_4','ItemID_5','ItemID_6','ItemID_7','ItemID_8','ItemID_9','ItemID_10','ItemID_11','ItemID_12','ItemID_13','ItemID_14','ItemID_15','ItemID_16','ItemID_17')
                    ->first();
                $data = [];
                $i = 0;
                foreach ($itemSet as &$value) {
                    if ($value > 0) {
                        $item_data = DB::connection('mysql')
                            ->table('item_prototypes')
                            ->where('entry', $value)
                            ->select('entry', 'Display_Lang')
                            ->first();
                        $data[] = [
                            "is_equipped" => true,
                            "item" => [
                                "id" => $item_data->entry,
                                "name" => $item_data->Display_Lang
                            ]
                        ];

                    }
                    $i++;
                }
                return $data;
            }
            return [];
        }

        public function ItemStats($item) {
            $data = [];
            $i = 0;
            foreach ($item as &$value) {
                if($value['value'] > 0) {
                    $data[] = [
                        "display" => [
                            "color" => [
                                "a" => 1,
                                "b" => __('characters.'.$value['type']. '_b'),
                                "g" => __('characters.'.$value['type']. '_g'),
                                "r" => __('characters.'.$value['type']. '_r')
                            ],
                            "display_string" => "+ " . $value['value'] . __('characters.'.$value['type'])
                        ]
                        ,"type" => [
                            "name" => __('characters.'.$value['type']),
                            "type" => __('characters.'.$value['type']. '_key')
                        ],
                        "value" => $value['value']
                    ];

                }
                $i++;
            }
            return $data;
        }

        public function ItemClass($quality, $inventory) {
            $data = DB::table('item_subclass_name')->where('classes', $quality)->where('subclass', $inventory)->first();
            if($data) {
                return [
                    "id" => $data->classes,
                    "name" => $data->class_name
                ];
            }
            return [];
        }

        public function ItemSubClass($material) {
            $data = DB::table('item_material_name')->where('material', $material)->first();
            if($data) {
                return [
                    "id" => $data->material,
                    "name" => $data->name
                ];
            }
            return [];
        }

        public function itemLevel($level) {
            if($level != 0) {
                return [
                    "level" => [
                        "display_string" => __('characters.requirements_level', ['level' => $level]),
                        "value" => $level
                    ]
                ];
            }
            return [];
        }

        public function itemLimitCategory($bonus = 0) {
            $data = [];
            if ($bonus) {
                $bonus = str_replace(' ', '', $bonus);
                $bonus = str_split($bonus, 4);
                foreach ($bonus as $item ) {
                    if ($item === '4213' || $item === '3630' || $item === '3570' || $item === '1707' || $item === '1676') {
                        $data = __('characters.display_string_'.$item);
                    }
                }
            }
            return $data;
        }

        public function itemNameDescription($bonus = 0) {
            $data = [];
            if ($bonus) {
                $bonus = str_replace(' ', '', $bonus);
                $bonus = str_split($bonus, 4);
                foreach ($bonus as $item ) {
                    if ($item === '3531' || $item === '1550' || $item === '738' || $item === '31' || $item === '737' || $item === '4213' || $item === '3630' || $item === '1704' || $item === '741' || $item === '1687' || $item === '3570' || $item === '3459' || $item === '1707' || $item === '1676' || $item === '731') {
                        continue;
                    }
                    $data = [
                        "color" => [
                            "a" => __('characters.display_color_a_'.$item),
                            "b" => __('characters.display_color_b_'.$item),
                            "g" => __('characters.display_color_g_'.$item),
                            "r" => __('characters.display_color_r_'.$item)
                        ],
                        "display_string" => __('characters.display_string_'.$item)
                    ];
                }
            }
            return $data;
        }

        public function itemUnique($data) {
            if($data != 0) {
                return __(__('characters.unique'));
            }
            return '';
        }

        public function itemQuality($data) {
            return [
                "name" => __('characters.quality_name_'.$data),
                "type" => __('characters.quality_type_'.$data)
            ];
        }

        public function itemBinding($data) {
            if($data != 0) {
                return [
                    "name" => __('characters.bonding_' . $data),
                    "type" => "ON_ACQUIRE"
                ];
            }
            return [];
        }

        public function itemSet($ItemSet){
            if($ItemSet) {
                $item = DB::table('itemset')
                    ->where('ID', $ItemSet)
                    ->first();
                return [
                    "display_string" => $item->Name_Lang . " (2/".$item->Count.")",
                    "effects" => [
                        [
                            "display_string" => "Комплект: Универсальность увеличивает наносимый урон и силу исцеления еще на 40% при нахождении на аренах, полях боя и в режиме войны.",
                            "is_active" => true,
                            "required_count" => 2
                        ]
                    ],
                    "item_set" => [
                        "id" => $item->ID,
                        "name" => $item->Name_Lang
                    ],
                    "items" =>  self::ItemItems($ItemSet)
                ];
            }
            return [];
        }
    }
