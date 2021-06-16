<?php

    namespace App\Services\Parser;

    class Wowhead {

        public static function load() {
            $url = "https://ru.wowhead.com/item=169223&xml&bonus=6586";
            $xml = simplexml_load_file($url);
            echo $xml->item->name . '<br>';
            echo $xml->item->level . '<br>';
            echo $xml->item->quality . '<br>';
            echo $xml->item->class . '<br>';
            echo $xml->item->subclass . '<br>';
            echo $xml->item->icon . '<br>';
            echo $xml->item->inventorySlot . '<br>';
            echo $xml->item->htmlTooltip . '<br>';
        }
    }
