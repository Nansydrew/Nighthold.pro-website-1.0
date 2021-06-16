<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\Server;
use Illuminate\Http\Request;

class NavbarController extends Controller
{
    public function nav(Request $request) {
        if ($request->get('titleId') && $request->get('countryCode') && $request->get('locale')) {
            return json_encode(
                ["success" => true,"ratings" => ["items" => [["ratingId" => "57080ad6-2b05-4065-a4e3-6617c458176c","ratingGroupId" => "2dd42a16-222e-49db-8ebd-3c40c14ea484","ratingBoardId" => "78968a9e-f2a3-494b-8c9c-813c3696a5fd","ratingBoardName" => "MKRF","localizedName" => "12+","localizedDescription" => null,"locale" => "en-US","customImageUrl" => null,"ratingImageUrl" => asset('v3/assets/12.3d5bY.png'),"referenceUrl" => "https://mkrf.ru/","ratingContentGroups" => [["ratingContentGroupId" => "9bd14ce7-9018-4e1d-a5ef-65382fbec91b","position" => 1,"ratingContents" => []]],"blockContent" => false,"age" => 12,"blockGameplay" => false,"provisional" => false,"contentAgeGate" => false,"purchaseAgeGate" => false]]],"additional" => []]
            );
        } else {
            return json_encode(
                ["success" => false,"message" => "Missing required field(s): titleId, countryCode, locale"]
            );
        }
    }

    public function online() {
        return json_encode(
            ["online" => Server::playersOnline()]
        );
    }
}
