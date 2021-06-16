<?php

    namespace App\Services;

    use App\Models\Characters\Arena;
    use App\Models\CharactersTalent;
    use App\Models\Characters\Characters;
    use App\Models\Classes;
    use App\Models\Talent;
    use App\Models\Talents;
    use App\Services\Parser\Images;
    use Illuminate\Support\Facades\DB;

    class Utils {

        public static function statsForClassSpec($class, $activeTalentGroup) {
            switch($class) {
                default:
                    return [
                        [
                            "enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => $health]
                        ],
                        [
                            "enum" => "MANA","slug" => "mana","value" => ["type" => "WHOLE","value" => 100000]
                        ],
                        [
                            "details" => [
                                "base" => [
                                    "type" => "WHOLE","value" => 452
                                ],
                                "bonus" => [
                                    "type" => "WHOLE","value" => 858
                                ],
                                "effective" => [
                                    "type" => "WHOLE","value" => 1310
                                ],
                                "rating" => [
                                    "type" => "WHOLE","value" => 1310
                                ],
                                "type" => "ENHANCED"
                            ],
                            "enum" => "INTELLECT",
                            "slug" => "intellect",
                            "value" => [
                                "type" => "WHOLE",
                                "value" => 1310
                            ]
                        ],
                        [
                            "details" => ["base" => ["type" => "WHOLE","value" => 414],"bonus" => ["type" => "WHOLE","value" => 1192],"effective" => ["type" => "WHOLE","value" => 1606],"rating" => ["type" => "WHOLE","value" => 1606],"type" => "ENHANCED"],"enum" => "STAMINA","slug" => "stamina","value" => ["type" => "WHOLE","value" => 1606]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 9.457143],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 331],"type" => "RATED"],"enum" => "CRITICALSTRIKE","slug" => "critical-strike","value" => ["type" => "PERCENTAGE","value" => 15.457143]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 21.60606],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 713],"type" => "RATED"],"enum" => "HASTE","slug" => "haste","value" => ["type" => "PERCENTAGE","value" => 21.606064]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 4.042857],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 283],"type" => "RATED"],"enum" => "MASTERY","slug" => "mastery","value" => ["type" => "PERCENTAGE","value" => 8.042857]],
                        [
                            "details" => ["bonus" => ["type" => "PERCENTAGE","value" => 1.275],"effective" => ["type" => "PERCENTAGE","value" => 2.55],"rating" => ["type" => "WHOLE","value" => 102],"type" => "VERSATILITY"],"enum" => "VERSATILITY","slug" => "versatility","value" => ["type" => "PERCENTAGE","value" => 2.55]]
                    ];
                    break;

                case "1":
                    return [
                        [
                            "enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => $health]
                        ],
                        [
                            "enum" => "RAGE","slug" => "rage","value" => ["type" => "WHOLE","value" => 100]
                        ],
                        [
                            "details" => [
                                "base" => [
                                    "type" => "WHOLE","value" => 452
                                ],
                                "bonus" => [
                                    "type" => "WHOLE","value" => 858
                                ],
                                "effective" => [
                                    "type" => "WHOLE","value" => 1310
                                ],
                                "rating" => [
                                    "type" => "WHOLE","value" => 1310
                                ],
                                "type" => "ENHANCED"
                            ],
                            "enum" => "STRENGTH",
                            "slug" => "strength",
                            "value" => [
                                "type" => "WHOLE","value" => 1305
                            ]
                        ],
                        [
                            "details" => ["base" => ["type" => "WHOLE","value" => 414],"bonus" => ["type" => "WHOLE","value" => 1192],"effective" => ["type" => "WHOLE","value" => 1606],"rating" => ["type" => "WHOLE","value" => 1606],"type" => "ENHANCED"],"enum" => "STAMINA","slug" => "stamina","value" => ["type" => "WHOLE","value" => 1606]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 9.457143],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 331],"type" => "RATED"],"enum" => "CRITICALSTRIKE","slug" => "critical-strike","value" => ["type" => "PERCENTAGE","value" => 15.457143]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 21.60606],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 713],"type" => "RATED"],"enum" => "HASTE","slug" => "haste","value" => ["type" => "PERCENTAGE","value" => 21.606064]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 4.042857],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 283],"type" => "RATED"],"enum" => "MASTERY","slug" => "mastery","value" => ["type" => "PERCENTAGE","value" => 8.042857]],
                        [
                            "details" => ["bonus" => ["type" => "PERCENTAGE","value" => 1.275],"effective" => ["type" => "PERCENTAGE","value" => 2.55],"rating" => ["type" => "WHOLE","value" => 102],"type" => "VERSATILITY"],"enum" => "VERSATILITY","slug" => "versatility","value" => ["type" => "PERCENTAGE","value" => 2.55]]
                    ];
                    break;

                case "3":
                    return [
                        [
                            "enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => $health]
                        ],
                        [
                            "enum" => "ENERGY","slug" => "energy","value" => ["type" => "WHOLE","value" => 100]
                        ],
                        [
                            "details" => [
                                "base" => [
                                    "type" => "WHOLE","value" => 452
                                ],
                                "bonus" => [
                                    "type" => "WHOLE","value" => 858
                                ],
                                "effective" => [
                                    "type" => "WHOLE","value" => 1310
                                ],
                                "rating" => [
                                    "type" => "WHOLE","value" => 1310
                                ],
                                "type" => "ENHANCED"
                            ],
                            "enum" => "AGILITY",
                            "slug" => "agility",
                            "value" => [
                                "type" => "WHOLE","value" => 1305
                            ]
                        ],
                        [
                            "details" => ["base" => ["type" => "WHOLE","value" => 414],"bonus" => ["type" => "WHOLE","value" => 1192],"effective" => ["type" => "WHOLE","value" => 1606],"rating" => ["type" => "WHOLE","value" => 1606],"type" => "ENHANCED"],"enum" => "STAMINA","slug" => "stamina","value" => ["type" => "WHOLE","value" => 1606]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 9.457143],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 331],"type" => "RATED"],"enum" => "CRITICALSTRIKE","slug" => "critical-strike","value" => ["type" => "PERCENTAGE","value" => 15.457143]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 21.60606],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 713],"type" => "RATED"],"enum" => "HASTE","slug" => "haste","value" => ["type" => "PERCENTAGE","value" => 21.606064]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 4.042857],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 283],"type" => "RATED"],"enum" => "MASTERY","slug" => "mastery","value" => ["type" => "PERCENTAGE","value" => 8.042857]],
                        [
                            "details" => ["bonus" => ["type" => "PERCENTAGE","value" => 1.275],"effective" => ["type" => "PERCENTAGE","value" => 2.55],"rating" => ["type" => "WHOLE","value" => 102],"type" => "VERSATILITY"],"enum" => "VERSATILITY","slug" => "versatility","value" => ["type" => "PERCENTAGE","value" => 2.55]]
                    ];
                    break;

                case "4":
                    return [
                        [
                            "enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => $health]
                        ],
                        [
                            "enum" => "ENERGY","slug" => "energy","value" => ["type" => "WHOLE","value" => 100]
                        ],
                        [
                            "details" => [
                                "base" => [
                                    "type" => "WHOLE","value" => 452
                                ],
                                "bonus" => [
                                    "type" => "WHOLE","value" => 858
                                ],
                                "effective" => [
                                    "type" => "WHOLE","value" => 1310
                                ],
                                "rating" => [
                                    "type" => "WHOLE","value" => 1310
                                ],
                                "type" => "ENHANCED"
                            ],
                            "enum" => "AGILITY",
                            "slug" => "agility",
                            "value" => [
                                "type" => "WHOLE","value" => 1305
                            ]
                        ],
                        [
                            "details" => ["base" => ["type" => "WHOLE","value" => 414],"bonus" => ["type" => "WHOLE","value" => 1192],"effective" => ["type" => "WHOLE","value" => 1606],"rating" => ["type" => "WHOLE","value" => 1606],"type" => "ENHANCED"],"enum" => "STAMINA","slug" => "stamina","value" => ["type" => "WHOLE","value" => 1606]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 9.457143],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 331],"type" => "RATED"],"enum" => "CRITICALSTRIKE","slug" => "critical-strike","value" => ["type" => "PERCENTAGE","value" => 15.457143]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 21.60606],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 713],"type" => "RATED"],"enum" => "HASTE","slug" => "haste","value" => ["type" => "PERCENTAGE","value" => 21.606064]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 4.042857],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 283],"type" => "RATED"],"enum" => "MASTERY","slug" => "mastery","value" => ["type" => "PERCENTAGE","value" => 8.042857]],
                        [
                            "details" => ["bonus" => ["type" => "PERCENTAGE","value" => 1.275],"effective" => ["type" => "PERCENTAGE","value" => 2.55],"rating" => ["type" => "WHOLE","value" => 102],"type" => "VERSATILITY"],"enum" => "VERSATILITY","slug" => "versatility","value" => ["type" => "PERCENTAGE","value" => 2.55]]
                    ];
                    break;

                case "5":
                    return [
                        [
                            "enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => $health]
                        ],
                        [
                            "enum" => "MANA","slug" => "mana","value" => ["type" => "WHOLE","value" => 100000]
                        ],
                        [
                            "details" => [
                                "base" => [
                                    "type" => "WHOLE","value" => 452
                                ],
                                "bonus" => [
                                    "type" => "WHOLE","value" => 858
                                ],
                                "effective" => [
                                    "type" => "WHOLE","value" => 1310
                                ],
                                "rating" => [
                                    "type" => "WHOLE","value" => 1310
                                ],
                                "type" => "ENHANCED"
                            ],
                            "enum" => "INTELLECT",
                            "slug" => "intellect",
                            "value" => [
                                "type" => "WHOLE",
                                "value" => 1310
                            ]
                        ],
                        [
                            "details" => ["base" => ["type" => "WHOLE","value" => 414],"bonus" => ["type" => "WHOLE","value" => 1192],"effective" => ["type" => "WHOLE","value" => 1606],"rating" => ["type" => "WHOLE","value" => 1606],"type" => "ENHANCED"],"enum" => "STAMINA","slug" => "stamina","value" => ["type" => "WHOLE","value" => 1606]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 9.457143],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 331],"type" => "RATED"],"enum" => "CRITICALSTRIKE","slug" => "critical-strike","value" => ["type" => "PERCENTAGE","value" => 15.457143]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 21.60606],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 713],"type" => "RATED"],"enum" => "HASTE","slug" => "haste","value" => ["type" => "PERCENTAGE","value" => 21.606064]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 4.042857],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 283],"type" => "RATED"],"enum" => "MASTERY","slug" => "mastery","value" => ["type" => "PERCENTAGE","value" => 8.042857]],
                        [
                            "details" => ["bonus" => ["type" => "PERCENTAGE","value" => 1.275],"effective" => ["type" => "PERCENTAGE","value" => 2.55],"rating" => ["type" => "WHOLE","value" => 102],"type" => "VERSATILITY"],"enum" => "VERSATILITY","slug" => "versatility","value" => ["type" => "PERCENTAGE","value" => 2.55]]
                    ];
                    break;

                case "6":
                    return [
                        [
                            "enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => $health]
                        ],
                        [
                            "enum" => "ENERGY","slug" => "energy","value" => ["type" => "WHOLE","value" => 100]
                        ],
                        [
                            "details" => [
                                "base" => [
                                    "type" => "WHOLE","value" => 452
                                ],
                                "bonus" => [
                                    "type" => "WHOLE","value" => 858
                                ],
                                "effective" => [
                                    "type" => "WHOLE","value" => 1310
                                ],
                                "rating" => [
                                    "type" => "WHOLE","value" => 1310
                                ],
                                "type" => "ENHANCED"
                            ],
                            "enum" => "AGILITY",
                            "slug" => "agility",
                            "value" => [
                                "type" => "WHOLE","value" => 1305
                            ]
                        ],
                        [
                            "details" => ["base" => ["type" => "WHOLE","value" => 414],"bonus" => ["type" => "WHOLE","value" => 1192],"effective" => ["type" => "WHOLE","value" => 1606],"rating" => ["type" => "WHOLE","value" => 1606],"type" => "ENHANCED"],"enum" => "STAMINA","slug" => "stamina","value" => ["type" => "WHOLE","value" => 1606]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 9.457143],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 331],"type" => "RATED"],"enum" => "CRITICALSTRIKE","slug" => "critical-strike","value" => ["type" => "PERCENTAGE","value" => 15.457143]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 21.60606],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 713],"type" => "RATED"],"enum" => "HASTE","slug" => "haste","value" => ["type" => "PERCENTAGE","value" => 21.606064]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 4.042857],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 283],"type" => "RATED"],"enum" => "MASTERY","slug" => "mastery","value" => ["type" => "PERCENTAGE","value" => 8.042857]],
                        [
                            "details" => ["bonus" => ["type" => "PERCENTAGE","value" => 1.275],"effective" => ["type" => "PERCENTAGE","value" => 2.55],"rating" => ["type" => "WHOLE","value" => 102],"type" => "VERSATILITY"],"enum" => "VERSATILITY","slug" => "versatility","value" => ["type" => "PERCENTAGE","value" => 2.55]]
                    ];
                    break;

                case "12":
                    return [
                        [
                            "enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => $health]
                        ],
                        [
                            "enum" => "ENERGY","slug" => "energy","value" => ["type" => "WHOLE","value" => 100]
                        ],
                        [
                            "details" => [
                                "base" => [
                                    "type" => "WHOLE","value" => 452
                                ],
                                "bonus" => [
                                    "type" => "WHOLE","value" => 858
                                ],
                                "effective" => [
                                    "type" => "WHOLE","value" => 1310
                                ],
                                "rating" => [
                                    "type" => "WHOLE","value" => 1310
                                ],
                                "type" => "ENHANCED"
                            ],
                            "enum" => "AGILITY",
                            "slug" => "agility",
                            "value" => [
                                "type" => "WHOLE","value" => 1305
                            ]
                        ],
                        [
                            "details" => ["base" => ["type" => "WHOLE","value" => 414],"bonus" => ["type" => "WHOLE","value" => 1192],"effective" => ["type" => "WHOLE","value" => 1606],"rating" => ["type" => "WHOLE","value" => 1606],"type" => "ENHANCED"],"enum" => "STAMINA","slug" => "stamina","value" => ["type" => "WHOLE","value" => 1606]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 9.457143],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 331],"type" => "RATED"],"enum" => "CRITICALSTRIKE","slug" => "critical-strike","value" => ["type" => "PERCENTAGE","value" => 15.457143]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 21.60606],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 713],"type" => "RATED"],"enum" => "HASTE","slug" => "haste","value" => ["type" => "PERCENTAGE","value" => 21.606064]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 4.042857],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 283],"type" => "RATED"],"enum" => "MASTERY","slug" => "mastery","value" => ["type" => "PERCENTAGE","value" => 8.042857]],
                        [
                            "details" => ["bonus" => ["type" => "PERCENTAGE","value" => 1.275],"effective" => ["type" => "PERCENTAGE","value" => 2.55],"rating" => ["type" => "WHOLE","value" => 102],"type" => "VERSATILITY"],"enum" => "VERSATILITY","slug" => "versatility","value" => ["type" => "PERCENTAGE","value" => 2.55]]
                    ];
                    break;

                case "11":
                    return [
                        [
                            "enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => $health]
                        ],
                        [
                            "enum" => "INSANITY","slug" => "insanity","value" => ["type" => "WHOLE","value" => 10000000]
                        ],
                        [
                            "details" => [
                                "base" => [
                                    "type" => "WHOLE","value" => 452
                                ],
                                "bonus" => [
                                    "type" => "WHOLE","value" => 858
                                ],
                                "effective" => [
                                    "type" => "WHOLE","value" => 1310
                                ],
                                "rating" => [
                                    "type" => "WHOLE","value" => 1310
                                ],
                                "type" => "ENHANCED"
                            ],
                            "enum" => "INTELLECT",
                            "slug" => "intellect",
                            "value" => [
                                "type" => "WHOLE",
                                "value" => 1310
                            ]
                        ],
                        [
                            "details" => ["base" => ["type" => "WHOLE","value" => 414],"bonus" => ["type" => "WHOLE","value" => 1192],"effective" => ["type" => "WHOLE","value" => 1606],"rating" => ["type" => "WHOLE","value" => 1606],"type" => "ENHANCED"],"enum" => "STAMINA","slug" => "stamina","value" => ["type" => "WHOLE","value" => 1606]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 9.457143],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 331],"type" => "RATED"],"enum" => "CRITICALSTRIKE","slug" => "critical-strike","value" => ["type" => "PERCENTAGE","value" => 15.457143]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 21.60606],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 713],"type" => "RATED"],"enum" => "HASTE","slug" => "haste","value" => ["type" => "PERCENTAGE","value" => 21.606064]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 4.042857],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 283],"type" => "RATED"],"enum" => "MASTERY","slug" => "mastery","value" => ["type" => "PERCENTAGE","value" => 8.042857]],
                        [
                            "details" => ["bonus" => ["type" => "PERCENTAGE","value" => 1.275],"effective" => ["type" => "PERCENTAGE","value" => 2.55],"rating" => ["type" => "WHOLE","value" => 102],"type" => "VERSATILITY"],"enum" => "VERSATILITY","slug" => "versatility","value" => ["type" => "PERCENTAGE","value" => 2.55]]
                    ];
                    break;
            }
        }

        public static function statsForClass($health, $class, $activeTalentGroup): array
        {
            switch($class) {
                default:
                   return [
                       [
                           "enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => $health]
                       ],
                       [
                           "enum" => "MANA","slug" => "mana","value" => ["type" => "WHOLE","value" => 100000]
                       ],
                       [
                           "details" => [
                               "base" => [
                                   "type" => "WHOLE","value" => 452
                               ],
                               "bonus" => [
                                   "type" => "WHOLE","value" => 858
                               ],
                               "effective" => [
                                   "type" => "WHOLE","value" => 1310
                               ],
                               "rating" => [
                                   "type" => "WHOLE","value" => 1310
                               ],
                               "type" => "ENHANCED"
                           ],
                           "enum" => "INTELLECT",
                           "slug" => "intellect",
                           "value" => [
                               "type" => "WHOLE",
                               "value" => 1310
                           ]
                       ],
                       [
                           "details" => ["base" => ["type" => "WHOLE","value" => 414],"bonus" => ["type" => "WHOLE","value" => 1192],"effective" => ["type" => "WHOLE","value" => 1606],"rating" => ["type" => "WHOLE","value" => 1606],"type" => "ENHANCED"],"enum" => "STAMINA","slug" => "stamina","value" => ["type" => "WHOLE","value" => 1606]],
                       [
                           "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 9.457143],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 331],"type" => "RATED"],"enum" => "CRITICALSTRIKE","slug" => "critical-strike","value" => ["type" => "PERCENTAGE","value" => 15.457143]],
                       [
                           "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 21.60606],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 713],"type" => "RATED"],"enum" => "HASTE","slug" => "haste","value" => ["type" => "PERCENTAGE","value" => 21.606064]],
                       [
                           "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 4.042857],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 283],"type" => "RATED"],"enum" => "MASTERY","slug" => "mastery","value" => ["type" => "PERCENTAGE","value" => 8.042857]],
                       [
                           "details" => ["bonus" => ["type" => "PERCENTAGE","value" => 1.275],"effective" => ["type" => "PERCENTAGE","value" => 2.55],"rating" => ["type" => "WHOLE","value" => 102],"type" => "VERSATILITY"],"enum" => "VERSATILITY","slug" => "versatility","value" => ["type" => "PERCENTAGE","value" => 2.55]]
                   ];
                break;

                case "1":
                    return [
                        [
                            "enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => $health]
                        ],
                        [
                            "enum" => "RAGE","slug" => "rage","value" => ["type" => "WHOLE","value" => 100]
                        ],
                        [
                            "details" => [
                                "base" => [
                                    "type" => "WHOLE","value" => 452
                                ],
                                "bonus" => [
                                    "type" => "WHOLE","value" => 858
                                ],
                                "effective" => [
                                    "type" => "WHOLE","value" => 1310
                                ],
                                "rating" => [
                                    "type" => "WHOLE","value" => 1310
                                ],
                                "type" => "ENHANCED"
                            ],
                            "enum" => "STRENGTH",
                            "slug" => "strength",
                            "value" => [
                                "type" => "WHOLE","value" => 1305
                            ]
                        ],
                        [
                            "details" => ["base" => ["type" => "WHOLE","value" => 414],"bonus" => ["type" => "WHOLE","value" => 1192],"effective" => ["type" => "WHOLE","value" => 1606],"rating" => ["type" => "WHOLE","value" => 1606],"type" => "ENHANCED"],"enum" => "STAMINA","slug" => "stamina","value" => ["type" => "WHOLE","value" => 1606]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 9.457143],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 331],"type" => "RATED"],"enum" => "CRITICALSTRIKE","slug" => "critical-strike","value" => ["type" => "PERCENTAGE","value" => 15.457143]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 21.60606],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 713],"type" => "RATED"],"enum" => "HASTE","slug" => "haste","value" => ["type" => "PERCENTAGE","value" => 21.606064]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 4.042857],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 283],"type" => "RATED"],"enum" => "MASTERY","slug" => "mastery","value" => ["type" => "PERCENTAGE","value" => 8.042857]],
                        [
                            "details" => ["bonus" => ["type" => "PERCENTAGE","value" => 1.275],"effective" => ["type" => "PERCENTAGE","value" => 2.55],"rating" => ["type" => "WHOLE","value" => 102],"type" => "VERSATILITY"],"enum" => "VERSATILITY","slug" => "versatility","value" => ["type" => "PERCENTAGE","value" => 2.55]]
                    ];
                    break;

                case "3":
                    return [
                        [
                            "enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => $health]
                        ],
                        [
                            "enum" => "ENERGY","slug" => "energy","value" => ["type" => "WHOLE","value" => 100]
                        ],
                        [
                            "details" => [
                                "base" => [
                                    "type" => "WHOLE","value" => 452
                                ],
                                "bonus" => [
                                    "type" => "WHOLE","value" => 858
                                ],
                                "effective" => [
                                    "type" => "WHOLE","value" => 1310
                                ],
                                "rating" => [
                                    "type" => "WHOLE","value" => 1310
                                ],
                                "type" => "ENHANCED"
                            ],
                            "enum" => "AGILITY",
                            "slug" => "agility",
                            "value" => [
                                "type" => "WHOLE","value" => 1305
                            ]
                        ],
                        [
                            "details" => ["base" => ["type" => "WHOLE","value" => 414],"bonus" => ["type" => "WHOLE","value" => 1192],"effective" => ["type" => "WHOLE","value" => 1606],"rating" => ["type" => "WHOLE","value" => 1606],"type" => "ENHANCED"],"enum" => "STAMINA","slug" => "stamina","value" => ["type" => "WHOLE","value" => 1606]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 9.457143],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 331],"type" => "RATED"],"enum" => "CRITICALSTRIKE","slug" => "critical-strike","value" => ["type" => "PERCENTAGE","value" => 15.457143]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 21.60606],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 713],"type" => "RATED"],"enum" => "HASTE","slug" => "haste","value" => ["type" => "PERCENTAGE","value" => 21.606064]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 4.042857],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 283],"type" => "RATED"],"enum" => "MASTERY","slug" => "mastery","value" => ["type" => "PERCENTAGE","value" => 8.042857]],
                        [
                            "details" => ["bonus" => ["type" => "PERCENTAGE","value" => 1.275],"effective" => ["type" => "PERCENTAGE","value" => 2.55],"rating" => ["type" => "WHOLE","value" => 102],"type" => "VERSATILITY"],"enum" => "VERSATILITY","slug" => "versatility","value" => ["type" => "PERCENTAGE","value" => 2.55]]
                    ];
                break;

                case "4":
                    return [
                        [
                            "enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => $health]
                        ],
                        [
                            "enum" => "ENERGY","slug" => "energy","value" => ["type" => "WHOLE","value" => 100]
                        ],
                        [
                            "details" => [
                                "base" => [
                                    "type" => "WHOLE","value" => 452
                                ],
                                "bonus" => [
                                    "type" => "WHOLE","value" => 858
                                ],
                                "effective" => [
                                    "type" => "WHOLE","value" => 1310
                                ],
                                "rating" => [
                                    "type" => "WHOLE","value" => 1310
                                ],
                                "type" => "ENHANCED"
                            ],
                            "enum" => "AGILITY",
                            "slug" => "agility",
                            "value" => [
                                "type" => "WHOLE","value" => 1305
                            ]
                        ],
                        [
                            "details" => ["base" => ["type" => "WHOLE","value" => 414],"bonus" => ["type" => "WHOLE","value" => 1192],"effective" => ["type" => "WHOLE","value" => 1606],"rating" => ["type" => "WHOLE","value" => 1606],"type" => "ENHANCED"],"enum" => "STAMINA","slug" => "stamina","value" => ["type" => "WHOLE","value" => 1606]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 9.457143],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 331],"type" => "RATED"],"enum" => "CRITICALSTRIKE","slug" => "critical-strike","value" => ["type" => "PERCENTAGE","value" => 15.457143]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 21.60606],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 713],"type" => "RATED"],"enum" => "HASTE","slug" => "haste","value" => ["type" => "PERCENTAGE","value" => 21.606064]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 4.042857],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 283],"type" => "RATED"],"enum" => "MASTERY","slug" => "mastery","value" => ["type" => "PERCENTAGE","value" => 8.042857]],
                        [
                            "details" => ["bonus" => ["type" => "PERCENTAGE","value" => 1.275],"effective" => ["type" => "PERCENTAGE","value" => 2.55],"rating" => ["type" => "WHOLE","value" => 102],"type" => "VERSATILITY"],"enum" => "VERSATILITY","slug" => "versatility","value" => ["type" => "PERCENTAGE","value" => 2.55]]
                    ];
                break;

                case "6":
                    return [
                        [
                            "enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => $health]
                        ],
                        [
                            "enum" => "ENERGY","slug" => "energy","value" => ["type" => "WHOLE","value" => 100]
                        ],
                        [
                            "details" => [
                                "base" => [
                                    "type" => "WHOLE","value" => 452
                                ],
                                "bonus" => [
                                    "type" => "WHOLE","value" => 858
                                ],
                                "effective" => [
                                    "type" => "WHOLE","value" => 1310
                                ],
                                "rating" => [
                                    "type" => "WHOLE","value" => 1310
                                ],
                                "type" => "ENHANCED"
                            ],
                            "enum" => "AGILITY",
                            "slug" => "agility",
                            "value" => [
                                "type" => "WHOLE","value" => 1305
                            ]
                        ],
                        [
                            "details" => ["base" => ["type" => "WHOLE","value" => 414],"bonus" => ["type" => "WHOLE","value" => 1192],"effective" => ["type" => "WHOLE","value" => 1606],"rating" => ["type" => "WHOLE","value" => 1606],"type" => "ENHANCED"],"enum" => "STAMINA","slug" => "stamina","value" => ["type" => "WHOLE","value" => 1606]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 9.457143],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 331],"type" => "RATED"],"enum" => "CRITICALSTRIKE","slug" => "critical-strike","value" => ["type" => "PERCENTAGE","value" => 15.457143]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 21.60606],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 713],"type" => "RATED"],"enum" => "HASTE","slug" => "haste","value" => ["type" => "PERCENTAGE","value" => 21.606064]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 4.042857],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 283],"type" => "RATED"],"enum" => "MASTERY","slug" => "mastery","value" => ["type" => "PERCENTAGE","value" => 8.042857]],
                        [
                            "details" => ["bonus" => ["type" => "PERCENTAGE","value" => 1.275],"effective" => ["type" => "PERCENTAGE","value" => 2.55],"rating" => ["type" => "WHOLE","value" => 102],"type" => "VERSATILITY"],"enum" => "VERSATILITY","slug" => "versatility","value" => ["type" => "PERCENTAGE","value" => 2.55]]
                    ];
                break;

                case "7":
                    if($activeTalentGroup === 1 || $activeTalentGroup === 2) {
                        return [
                            [
                                "enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => $health]
                            ],
                            [
                                "enum" => "MAELSTROM","slug" => "maelstrom","value" => ["type" => "WHOLE","value" => 10000]
                            ],
                            [
                                "details" => [
                                    "base" => [
                                        "type" => "WHOLE","value" => 452
                                    ],
                                    "bonus" => [
                                        "type" => "WHOLE","value" => 858
                                    ],
                                    "effective" => [
                                        "type" => "WHOLE","value" => 1310
                                    ],
                                    "rating" => [
                                        "type" => "WHOLE","value" => 1310
                                    ],
                                    "type" => "ENHANCED"
                                ],
                                "enum" => "AGILITY",
                                "slug" => "agility",
                                "value" => [
                                    "type" => "WHOLE",
                                    "value" => 1310
                                ]
                            ],
                            [
                                "details" => ["base" => ["type" => "WHOLE","value" => 414],"bonus" => ["type" => "WHOLE","value" => 1192],"effective" => ["type" => "WHOLE","value" => 1606],"rating" => ["type" => "WHOLE","value" => 1606],"type" => "ENHANCED"],"enum" => "STAMINA","slug" => "stamina","value" => ["type" => "WHOLE","value" => 1606]],
                            [
                                "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 9.457143],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 331],"type" => "RATED"],"enum" => "CRITICALSTRIKE","slug" => "critical-strike","value" => ["type" => "PERCENTAGE","value" => 15.457143]],
                            [
                                "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 21.60606],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 713],"type" => "RATED"],"enum" => "HASTE","slug" => "haste","value" => ["type" => "PERCENTAGE","value" => 21.606064]],
                            [
                                "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 4.042857],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 283],"type" => "RATED"],"enum" => "MASTERY","slug" => "mastery","value" => ["type" => "PERCENTAGE","value" => 8.042857]],
                            [
                                "details" => ["bonus" => ["type" => "PERCENTAGE","value" => 1.275],"effective" => ["type" => "PERCENTAGE","value" => 2.55],"rating" => ["type" => "WHOLE","value" => 102],"type" => "VERSATILITY"],"enum" => "VERSATILITY","slug" => "versatility","value" => ["type" => "PERCENTAGE","value" => 2.55]]
                        ];
                    } else {
                        return [
                            [
                                "enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => $health]
                            ],
                            [
                                "enum" => "INSANITY","slug" => "insanity","value" => ["type" => "WHOLE","value" => 10000000]
                            ],
                            [
                                "details" => [
                                    "base" => [
                                        "type" => "WHOLE","value" => 452
                                    ],
                                    "bonus" => [
                                        "type" => "WHOLE","value" => 858
                                    ],
                                    "effective" => [
                                        "type" => "WHOLE","value" => 1310
                                    ],
                                    "rating" => [
                                        "type" => "WHOLE","value" => 1310
                                    ],
                                    "type" => "ENHANCED"
                                ],
                                "enum" => "INTELLECT",
                                "slug" => "intellect",
                                "value" => [
                                    "type" => "WHOLE",
                                    "value" => 1310
                                ]
                            ],
                            [
                                "details" => ["base" => ["type" => "WHOLE","value" => 414],"bonus" => ["type" => "WHOLE","value" => 1192],"effective" => ["type" => "WHOLE","value" => 1606],"rating" => ["type" => "WHOLE","value" => 1606],"type" => "ENHANCED"],"enum" => "STAMINA","slug" => "stamina","value" => ["type" => "WHOLE","value" => 1606]],
                            [
                                "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 9.457143],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 331],"type" => "RATED"],"enum" => "CRITICALSTRIKE","slug" => "critical-strike","value" => ["type" => "PERCENTAGE","value" => 15.457143]],
                            [
                                "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 21.60606],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 713],"type" => "RATED"],"enum" => "HASTE","slug" => "haste","value" => ["type" => "PERCENTAGE","value" => 21.606064]],
                            [
                                "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 4.042857],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 283],"type" => "RATED"],"enum" => "MASTERY","slug" => "mastery","value" => ["type" => "PERCENTAGE","value" => 8.042857]],
                            [
                                "details" => ["bonus" => ["type" => "PERCENTAGE","value" => 1.275],"effective" => ["type" => "PERCENTAGE","value" => 2.55],"rating" => ["type" => "WHOLE","value" => 102],"type" => "VERSATILITY"],"enum" => "VERSATILITY","slug" => "versatility","value" => ["type" => "PERCENTAGE","value" => 2.55]]
                        ];
                    }
                    break;

                case "12":
                    return [
                        [
                            "enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => $health]
                        ],
                        [
                            "enum" => "FURY","slug" => "fury","value" => ["type" => "WHOLE","value" => 120]
                        ],
                        [
                            "details" => [
                                "base" => [
                                    "type" => "WHOLE","value" => 452
                                ],
                                "bonus" => [
                                    "type" => "WHOLE","value" => 858
                                ],
                                "effective" => [
                                    "type" => "WHOLE","value" => 1310
                                ],
                                "rating" => [
                                    "type" => "WHOLE","value" => 1310
                                ],
                                "type" => "ENHANCED"
                            ],
                            "enum" => "AGILITY",
                            "slug" => "agility",
                            "value" => [
                                "type" => "WHOLE","value" => 1305
                            ]
                        ],
                        [
                            "details" => ["base" => ["type" => "WHOLE","value" => 414],"bonus" => ["type" => "WHOLE","value" => 1192],"effective" => ["type" => "WHOLE","value" => 1606],"rating" => ["type" => "WHOLE","value" => 1606],"type" => "ENHANCED"],"enum" => "STAMINA","slug" => "stamina","value" => ["type" => "WHOLE","value" => 1606]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 9.457143],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 331],"type" => "RATED"],"enum" => "CRITICALSTRIKE","slug" => "critical-strike","value" => ["type" => "PERCENTAGE","value" => 15.457143]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 21.60606],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 713],"type" => "RATED"],"enum" => "HASTE","slug" => "haste","value" => ["type" => "PERCENTAGE","value" => 21.606064]],
                        [
                            "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 4.042857],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 283],"type" => "RATED"],"enum" => "MASTERY","slug" => "mastery","value" => ["type" => "PERCENTAGE","value" => 8.042857]],
                        [
                            "details" => ["bonus" => ["type" => "PERCENTAGE","value" => 1.275],"effective" => ["type" => "PERCENTAGE","value" => 2.55],"rating" => ["type" => "WHOLE","value" => 102],"type" => "VERSATILITY"],"enum" => "VERSATILITY","slug" => "versatility","value" => ["type" => "PERCENTAGE","value" => 2.55]]
                    ];
                break;

                case "11":
                    if($activeTalentGroup === 1 || $activeTalentGroup === 2) {
                        return [
                            [
                                "enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => $health]
                            ],
                            [
                                "enum" => "MANA","slug" => "mana","value" => ["type" => "WHOLE","value" => 10000]
                            ],
                            [
                                "details" => [
                                    "base" => [
                                        "type" => "WHOLE","value" => 452
                                    ],
                                    "bonus" => [
                                        "type" => "WHOLE","value" => 858
                                    ],
                                    "effective" => [
                                        "type" => "WHOLE","value" => 1310
                                    ],
                                    "rating" => [
                                        "type" => "WHOLE","value" => 1310
                                    ],
                                    "type" => "ENHANCED"
                                ],
                                "enum" => "AGILITY",
                                "slug" => "agility",
                                "value" => [
                                    "type" => "WHOLE",
                                    "value" => 1310
                                ]
                            ],
                            [
                                "details" => ["base" => ["type" => "WHOLE","value" => 414],"bonus" => ["type" => "WHOLE","value" => 1192],"effective" => ["type" => "WHOLE","value" => 1606],"rating" => ["type" => "WHOLE","value" => 1606],"type" => "ENHANCED"],"enum" => "STAMINA","slug" => "stamina","value" => ["type" => "WHOLE","value" => 1606]],
                            [
                                "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 9.457143],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 331],"type" => "RATED"],"enum" => "CRITICALSTRIKE","slug" => "critical-strike","value" => ["type" => "PERCENTAGE","value" => 15.457143]],
                            [
                                "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 21.60606],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 713],"type" => "RATED"],"enum" => "HASTE","slug" => "haste","value" => ["type" => "PERCENTAGE","value" => 21.606064]],
                            [
                                "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 4.042857],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 283],"type" => "RATED"],"enum" => "MASTERY","slug" => "mastery","value" => ["type" => "PERCENTAGE","value" => 8.042857]],
                            [
                                "details" => ["bonus" => ["type" => "PERCENTAGE","value" => 1.275],"effective" => ["type" => "PERCENTAGE","value" => 2.55],"rating" => ["type" => "WHOLE","value" => 102],"type" => "VERSATILITY"],"enum" => "VERSATILITY","slug" => "versatility","value" => ["type" => "PERCENTAGE","value" => 2.55]]
                        ];
                    } else {
                        return [
                            [
                                "enum" => "HEALTH","slug" => "health","value" => ["type" => "WHOLE","value" => $health]
                            ],
                            [
                                "enum" => "INSANITY","slug" => "insanity","value" => ["type" => "WHOLE","value" => 10000000]
                            ],
                            [
                                "details" => [
                                    "base" => [
                                        "type" => "WHOLE","value" => 452
                                    ],
                                    "bonus" => [
                                        "type" => "WHOLE","value" => 858
                                    ],
                                    "effective" => [
                                        "type" => "WHOLE","value" => 1310
                                    ],
                                    "rating" => [
                                        "type" => "WHOLE","value" => 1310
                                    ],
                                    "type" => "ENHANCED"
                                ],
                                "enum" => "INTELLECT",
                                "slug" => "intellect",
                                "value" => [
                                    "type" => "WHOLE",
                                    "value" => 1310
                                ]
                            ],
                            [
                                "details" => ["base" => ["type" => "WHOLE","value" => 414],"bonus" => ["type" => "WHOLE","value" => 1192],"effective" => ["type" => "WHOLE","value" => 1606],"rating" => ["type" => "WHOLE","value" => 1606],"type" => "ENHANCED"],"enum" => "STAMINA","slug" => "stamina","value" => ["type" => "WHOLE","value" => 1606]],
                            [
                                "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 9.457143],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 331],"type" => "RATED"],"enum" => "CRITICALSTRIKE","slug" => "critical-strike","value" => ["type" => "PERCENTAGE","value" => 15.457143]],
                            [
                                "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 21.60606],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 713],"type" => "RATED"],"enum" => "HASTE","slug" => "haste","value" => ["type" => "PERCENTAGE","value" => 21.606064]],
                            [
                                "details" => ["base" => ["type" => "PERCENTAGE","value" => 0],"bonus" => ["type" => "PERCENTAGE","value" => 4.042857],"effective" => ["type" => "PERCENTAGE","value" => 0],"rating" => ["type" => "DECIMAL","value" => 283],"type" => "RATED"],"enum" => "MASTERY","slug" => "mastery","value" => ["type" => "PERCENTAGE","value" => 8.042857]],
                            [
                                "details" => ["bonus" => ["type" => "PERCENTAGE","value" => 1.275],"effective" => ["type" => "PERCENTAGE","value" => 2.55],"rating" => ["type" => "WHOLE","value" => 102],"type" => "VERSATILITY"],"enum" => "VERSATILITY","slug" => "versatility","value" => ["type" => "PERCENTAGE","value" => 2.55]]
                        ];
                    }
                break;
            }
        }

        public static function statsChar($health, $class, $activeTalentGroup): array
        {
            return [
                "overview" => self::statsForClass($health, $class, $activeTalentGroup)
            ];
        }

        public static function characterSpec($class, $activeTalentGroup): array
        {
            $spec = Talents::where('classes', $class)->where('spec', $activeTalentGroup)->first();
            return [
                'enum' => 'SHADOW',
                'id' => $spec->id,
                'name' => $spec->name,
                'role' => [
                    'enum' => 'DAMAGE',
                    'id' => $spec->id,
                    'name' => 'Боец',
                    'slug' => 'damage'
                ],
                'slug' => 'shadow'
            ];
        }

        public static function specCharacters($class, $activeTalentGroup, $guid): array
        {
            $spec = Talents::where('classes', $class)->get();
            $collect = [];
            foreach ($spec as $value) {
                $collect[] = [
                    "active" => self::activeTalent($activeTalentGroup, $value->spec),
                    "description" => $value->description,
                    "glyphs" => [],
                    "icon" => ["url" => asset('storage/'. Utils::ImagesLogo($value->icon))],
                    "id" => "discipline",
                    "name" => $value->name,
                    "pvpTalents" => [
                        "flattened" => self::pvpTalent($guid, $value->spec),
                        "grouped" => self::pvpTalentGrouped($guid, $value->spec)
                    ],
                    "talents" => [
                        "flattened" => [
                            self::talentInfo($guid, $value->spec)
                        ],
                        "grouped" => self::talentGrouped($guid, $value->spec)
                    ],
                    "url" => ""
                ];
            }
            return $collect;
        }

        public static function renderRaw($race, $gender): string
        {
            if(!Images::Exists(public_path('uploads/shadow/profile-raw/'. strtolower(__('characters.key_race_'.$race)) . "-" . strtolower(__('characters.gender_'.$gender)) . ".png") ) ) {
                Images::Download(
                    'https://render.worldofwarcraft.com/eu/shadow/profile-raw/' .
                    strtolower(__('characters.key_race_'.$race)) . '-' .
                    strtolower(__('characters.gender_'.$gender)) . '.png',
                    public_path('uploads/shadow/profile-raw/'. strtolower(__('characters.key_race_'.$race)) . "-" . strtolower(__('characters.gender_'.$gender)) . ".png")
                );
            }
            return asset('uploads/shadow/profile-raw/'.
                strtolower(__('characters.key_race_'.$race)) . "-" .
                strtolower(__('characters.gender_'.$gender)) . ".png");
        }

        public static function renderBackground($class, $race, $gender): string
        {
            if(!Images::Exists(public_path('uploads/shadow/profile-background/'. strtolower(__('characters.class_key_'.$class)) . "-" . strtolower(__('characters.key_race_'.$race)) . "-" . strtolower(__('characters.gender_'.$gender)) . ".jpg") ) ) {
                Images::Download(
                    'https://render.worldofwarcraft.com/eu/shadow/profile-background/' .
                    strtolower(__('characters.class_key_'.$class)) . '-' .
                    strtolower(__('characters.key_race_'.$race)) . '-' .
                    strtolower(__('characters.gender_'.$gender)) . '.jpg',
                    public_path('uploads/shadow/profile-background/'. strtolower(__('characters.class_key_'.$class)) . "-" . strtolower(__('characters.key_race_'.$race)) . "-" . strtolower(__('characters.gender_'.$gender)) . ".jpg")
                );
            }
            return asset('uploads/shadow/profile-background/'.strtolower(__('characters.class_key_'.$class)) . "-" .
                strtolower(__('characters.key_race_'.$race)) . "-" .
                strtolower(__('characters.gender_'.$gender)) . ".jpg");
        }

        public static function pvp($arena2, $arena3, $battlegrounds): array
        {
            return [
                "2v2" => self::rating2v2($arena2),
                "3v3" => self::rating3v3($arena3),
                "battlegrounds" => self::ratingBg($battlegrounds)
            ];
        }

        private static function rating2v2($arena2): array
        {
            $data = [];
            if ($arena2) {
                $data = [
                    "lossCount" => $arena2->seasonGames - $arena2->seasonWins,
                    "rating" => $arena2->rating,
                    "tier" => [
                        "id" => 1,
                        "name" => self::imageRating($arena2->rating)['name'],
                        "icon" => [
                            "url" => self::imageRating($arena2->rating)['images']
                        ]
                    ],
                    "winCount" => $arena2->seasonWins,
                    "total" => $arena2->seasonGames,
                    "winLoss" => self::percentageOf($arena2->seasonGames, $arena2->seasonWins)
                ];
            } else {
                $data = [
                    "lossCount" => 0,
                    "rating" => 0,
                    "tier" => [
                        "id" => 1,
                        "name" => self::imageRating(0)['name'],
                        "icon" => [
                            "url" => self::imageRating(0)['images']
                        ]
                    ],
                    "winCount" => 0,
                    "total" => 0,
                    "winLoss" => self::percentageOf(0, 0)
                ];
            }
            return $data;
        }

        private static function rating3v3($arena3): array
        {
            $data = [];
            if ($arena3) {
                $data = [
                    "lossCount" => $arena3->seasonGames - $arena3->seasonWins,
                    "rating" => $arena3->rating,
                    "tier" => [
                        "id" => 1,
                        "name" => self::imageRating($arena3->rating)['name'],
                        "icon" => [
                            "url" => self::imageRating($arena3->rating)['images']
                        ]
                    ],
                    "winCount" => $arena3->seasonWins,
                    "total" => $arena3->seasonGames,
                    "winLoss" => self::percentageOf($arena3->seasonGames, $arena3->seasonWins)
                ];
            } else {
                $data = [
                    "lossCount" => 0,
                    "rating" => 0,
                    "tier" => [
                        "id" => 1,
                        "name" => self::imageRating(0)['name'],
                        "icon" => [
                            "url" => self::imageRating(0)['images']
                        ]
                    ],
                    "winCount" => 0,
                    "total" => 0,
                    "winLoss" => self::percentageOf(0, 0)
                ];
            }
            return $data;
        }

        private static function ratingBg($battlegrounds): array
        {
            $data = [];
            if ($battlegrounds) {
                $data = [
                    "lossCount" => $battlegrounds->seasonGames - $battlegrounds->seasonWins,
                    "rating" => $battlegrounds->rating,
                    "tier" => [
                        "id" => 1,
                        "name" => self::imageRating($battlegrounds->rating)['name'],
                        "icon" => [
                            "url" => self::imageRating($battlegrounds->rating)['images']
                        ]
                    ],
                    "winCount" => $battlegrounds->seasonWins,
                    "total" => $battlegrounds->seasonGames,
                    "winLoss" => self::percentageOf($battlegrounds->seasonGames, $battlegrounds->seasonWins)
                ];
            } else {
                $data = [
                    "lossCount" => 0,
                    "rating" => 0,
                    "tier" => [
                        "id" => 1,
                        "name" => self::imageRating(0)['name'],
                        "icon" => [
                            "url" => self::imageRating(0)['images']
                        ]
                    ],
                    "winCount" => 0,
                    "total" => 0,
                    "winLoss" => self::percentageOf(0, 0)
                ];
            }
            return $data;
        }

        public static function percentageOf( $max, $min){
            $percent = $max / 100;
            if($percent == 0) {
                return 0;
            }
            $progressPercent = $min / $percent;
            if($progressPercent > 100) {
                $progressPercent = 100;
            }
            return $progressPercent / 100;
        }

        public static function imageRating($rating): array
        {
            if ($rating > 1370  && $rating <= 1570) {
                return [
                    'tier' => '9',
                    'name' => 'Боец',
                    'images' => asset('cms/template_resource/FQHOIXM3MSHQ1528483047541.png')
                ];
            }
            elseif ($rating > 1570  && $rating <= 1770) {
                return [
                    'tier' => '11',
                    'name' => 'Претендент',
                    'images' => asset('cms/template_resource/Q4TDZMWJS1DC1528483047584.png')
                ];
            }
            elseif ($rating > 1770  && $rating <= 2070) {
                return [
                    'tier' => '12',
                    'name' => 'Фаворит',
                    'images' => asset('cms/template_resource/RI4P9I2JXXXL1528483047769.png')
                ];
            }
            elseif ($rating > 2070  && $rating <= 2370) {
                return [
                    'tier' => '13',
                    'name' => 'Дуэлянт',
                    'images' => asset('cms/template_resource/9WPOSOBTK7GY1528483047820.png')
                ];
            }
            elseif ($rating > 2370) {
                return [
                    'tier' => '14',
                    'name' => 'Ветеран',
                    'images' => asset('cms/template_resource/O3AI2CT4Q06V1528483048012.png')
                ];
            }
            return [
                'tier' => '8',
                'name' => 'Без ранга',
                'images' => asset('cms/template_resource/RJ6XE5WS8D6G1528483047503.png')
            ];
        }

        public static function classes($id) {
            return Classes::where('guid', $id)->select(['name', 'slug'])->firstOrFail();
        }

        public static function Images($patch) {
            return str_replace('\\', '\\\\', $patch);
        }

        public static function ImagesLogo($patch) {
            return str_replace('\\', '/', $patch);
        }

        public static function faction($race) {
            $horde_races    = [10, 35, 6, 31, 2, 9, 27, 5, 8, 28, 36, 26];
            $alliance_races = [1, 32, 4, 3, 22, 29, 7, 37, 11, 34, 30, 25];
            $neutral_races = [24];
            if(in_array($race, $horde_races)) {
                return [
                    'enum' => 'HORDE',
                    'id' => 1,
                    'name' => 'Орда',
                    'slug' => 'horde',
                    'images' => '/static/components/Icon/svg/horde.0a721bba8f062cd956f3e0c723d2b34b.svg#horde'
                ];
            }
            elseif(in_array($race, $neutral_races)) {
                return '';
            }
            elseif(in_array($race, $alliance_races)) {
                return [
                    'enum' => 'ALLIANCE',
                    'id' => 0,
                    'name' => 'Альянс',
                    'slug' => 'alliance',
                    'images' => '/static/components/Icon/svg/alliance.f42675c36dac66ceab3ac9a774c188bd.svg#alliance'
                ];
            } else {
                return false;
            }
        }

        public static function raceCharacters($race) {
            $horde_races    = [10, 35, 6, 31, 2, 9, 27, 5, 8, 28, 36, 26];
            $alliance_races = [1, 32, 4, 3, 22, 29, 7, 37, 11, 34, 30, 25];
            $neutral_races = [24];
            if(in_array($race, $horde_races)) {
                return 'Logo--horde';
            }
            elseif(in_array($race, $neutral_races)) {
                return '';
            }
            elseif(in_array($race, $alliance_races)) {
                return 'Logo--alliance';
            } else {
                return false;
            }
        }

        public static function imageClass($race, $gender): string
        {
            $name = __('forum.icon_race_'. $race);
            $gend = __('forum.icon_gender_'.$gender);
            return asset('/static/components/GameIcon/'. $name . '_' . $gend . '.jpg');
        }

        public static function imageRace($race) {
            $horde_races    = [10, 35, 6, 31, 2, 9, 27, 5, 8, 28, 36, 26];
            $alliance_races = [1, 32, 4, 3, 22, 29, 7, 37, 11, 34, 30, 25];
            $neutral_races = [24];
            if(in_array($race, $horde_races)) {
                return asset('/static/components/Logo/Logo-hordeEmblem.e6d11863f6c65b2a875091c1ac01cb3f.png');
            }
            elseif(in_array($race, $neutral_races)) {
                return asset('/static/components/Logo/Logo-hordeEmblem.e6d11863f6c65b2a875091c1ac01cb3f.png');
            }
            elseif(in_array($race, $alliance_races)) {
                return asset('/static/components/Logo/Logo-allianceEmblem.cd827b18a7766edbf05f09d66bc10e22.png');
            } else {
                return false;
            }
        }

        private static function pvpTalent($guid, $spec): array
        {
            $pvp = DB::connection('characters')->table('character_pvp_talent')->where('guid', $guid)->where('talentGroup', $spec)->orderBy('talentId0', 'asc')->get();
            $flattened = [];
            foreach ($pvp as $value) {
                $info = Talent::where('talent', $value->talentId0)->first();

                if ($info) {
                    $flattened[] = [
                        "cast" => $info->type,
                        "cooldown" => "Восстановление: {$info->time}",
                        "description" => $info->description,
                        "icon" => [
                            "url" => asset('storage/'. Utils::ImagesLogo($info->icon))
                        ],
                        "level" => null,
                        "name" => $info->name,
                        "slot" => $info->index,
                        "slug" => $info->slug
                    ];
                } else {
                    $flattened[] = [];
                }

            }
            return $flattened;
        }

        private static function pvpTalentGrouped($guid, $spec): array
        {
            $talentInfo = DB::connection('characters')->table('character_pvp_talent')->where('guid', $guid)->where('talentGroup', $spec)->get();
            $flattened = [];
            foreach ($talentInfo as $item) {
                $info = Talent::where('talent', $item->talentId0)
                    ->where('spec', $spec)
                    ->first();
                if ($info) {
                    $flattened[] = [
                        "cast" => $info->type,
                        "cooldown" => "Восстановление: {$info->time}",
                        "description" => $info->description,
                        "icon" => [
                            "url" => asset('storage/'. Utils::ImagesLogo($info->icon))
                        ],
                        "level" => null,
                        "name" => $info->name,
                        "slot" => $info->index,
                        "slug" => $info->slug
                    ];
                } else {
                    $flattened[] = [];
                }
            }
            $chunk =  collect($flattened)->sortBy('level')->values()->toArray();
            return array_chunk($chunk, 4);
        }

        private static function talentGrouped($guid, $spec): array
        {
            $talentInfo = CharactersTalent::where('guid', $guid)->get();
            $talents = [];
            foreach ($talentInfo as $item) {
                $collection = Talent::where('talent', $item->talent)
                    ->where('spec', $spec)
                    ->first();
                if($collection) {
                    $talents[] = [
                        "cast" => $collection->type,
                        "cooldown" => "Восстановление: {$collection->time}",
                        "cost" => "2 000 ед. маны",
                        "description" => $collection->description,
                        "icon" => ["url" => asset('storage/'. Utils::ImagesLogo($collection->icon))],
                        "index" => 2,
                        "level" => $collection->level,
                        "name" => $collection->name,
                        "range" => "Дальность действия: 40 м",
                        "slug" => "strela-smerti"
                    ];
                }
            }

            $chunk =  collect($talents)->sortBy('level')->values()->toArray();
            return array_chunk($chunk, 4);
        }

        private static function talentInfo($guid, $spec): array
        {
            $talentInfo = CharactersTalent::where('guid', $guid)->get();
            $talent = [];
            foreach ($talentInfo as $item) {
                $collection = Talent::where('talent', $item->talent)
                    ->where('spec', $spec)
                    ->first();
                if($collection) {
                    $talent[] = [
                        "cast" => $collection->type,
                        "cooldown" => "Восстановление: {$collection->time}",
                        "cost" => "2 000 ед. маны",
                        "description" => $collection->description,
                        "icon" => ["url" => asset('storage/'. Utils::ImagesLogo($collection->icon))],
                        "index" => 2,
                        "level" => $collection->level,
                        "name" => $collection->name,
                        "range" => "Дальность действия: 40 м",
                        "slug" => "strela-smerti"
                    ];
                } else {
                    $talent[] = ["level" => 15,"icon" => ["url" => "inv_misc_questionmark"],"name" => "Ничего не выбрано"];
                }
            }

            return collect($talent)->sortBy('level')->values()->toArray();
        }

        private static function activeTalent($activeTalentGroup, $spec): bool
        {
            if ($spec == $activeTalentGroup) {
                return true;
            }
            return false;
        }

        public static function teleport($name) {
            return Characters::where('name', $name)->update([
                'position_x' => '-14406.599609',
                'position_y' => '419.352997',
                'position_z' => '22.390306',
                'orientation' => '0.000000',
                'zone' => '33',
                'map' => '0',
            ]);
        }

        public static function GetPercent($min, $max)
        {
            $percent = $max / 100;
            if($percent == 0) {
                return 0;
            }
            $progressPercent = $min / $percent;
            if($progressPercent > 100) {
                $progressPercent = 100;
            }
            return $progressPercent;
        }
    }
