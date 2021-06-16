<?php

namespace App\Launcher\Data;

class ShopItem extends BaseRepository
{
    public $Title;
    public $Price;
    public $Image;
    public $ShortCode;
    public $ItemId;
    public $ItemType;

    public function setImage($siteUri, $image)
    {
        $this->Image = $siteUri . '/uploads/images/' . $image;

        return $this;
    }

    public function build($data)
    {
        $this->Title = $data['title'];
        $this->Price = $data['price'];
        $this->ShortCode = $data['short_code'];
        $this->ItemId = $data['item_id'];
        $this->ItemType = $data['item_type'];

        return $this;
    }

    public function toJson()
    {
        return response()->json($this);
    }
}
