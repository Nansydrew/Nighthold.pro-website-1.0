<?php

    namespace App\Services;

    use App\Services\Parser\Images;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Query\Builder;
    use Illuminate\Support\Facades\DB;

    class ItemPrototype {

        public $item_data;

        public $slot = 0;

        public $icon = null;

        public $item_class;

        public $item_subclass;

        public $ItemStat;

        public $itemLevel;

        public $item;

        public function LoadFromDB($data, $guid) {
            $inv = DB::connection('characters')->select(/** @lang text */
                '
                SELECT
                ii.guid,
                ii.itemEntry,
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
                im.artifactKnowledgeLevel
                FROM item_instance ii LEFT JOIN item_instance_gems ig ON ii.guid = ig.itemGuid LEFT JOIN item_instance_transmog iit ON ii.guid = iit.itemGuid  LEFT JOIN item_instance_modifiers im ON ii.guid = im.itemGuid WHERE ii.guid = ? AND ii.owner_guid = ? ', [$data->guid, $guid]);

            $item_data = DB::connection('mysql')
                ->table('item_prototypes')
                ->where('entry', $data->itemEntry)
                ->first();

            foreach($item_data as $field => $value) {
                $this->{$field} = $value;
            }

            for($i = 0; $i < 10+1; $i++) {
                $key = $i+1;
                if(isset($this->{'Field_29_' . $key})) {
                    $this->ItemStat[$i] = array(
                        'type'  => 'Field_type_'.$key,
                        'value' => $this->{'Field_29_' . $key});
                }
            }

            $this->item = $data;
            $this->icon = self::iconName($data->itemEntry);
            $this->slot = $data->slot;
            return true;
        }

        /**
         * @return ItemPrototype
         */
        public function setItemData() {
            return $this;
        }

        private function iconName($entry) {
            $iconName = DB::connection('mysql')->table('icons')->where('id', $entry)->get(['iconname']);
            if(!Images::Exists(public_path('uploads/item/'.$iconName[0]->iconname.'.jpg') ) ) {
                Images::Download(
                        'https://render.worldofwarcraft.com/eu/icons/56/'.$iconName[0]->iconname.'.jpg',
                        public_path('uploads/item/'.$iconName[0]->iconname.'.jpg')
                );
            }
            return $iconName[0]->iconname ?? 'no_item';
        }

    }
