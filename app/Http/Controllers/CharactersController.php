<?php

namespace App\Http\Controllers;

use App\Services\Characters;
use App\Services\Json\achievementsJson;
use App\Services\Json\petsJson;
use App\Services\Json\reputationJson;
use App\Services\Json\charactrsJson;
use App\Services\Json\pveJson;
use App\Services\Json\pvpJson;
use App\Services\Server;
use Butschster\Head\Facades\Meta;

class CharactersController extends Controller
{
    public function index() {
        Meta::prependTitle('Персонажи WoW')
            ->setDescription('Примкните к тысячам могучих героев Азерота в мире магии и бесконечных приключений!');
        return view('characters.index');
    }

    public function model($server, $characters) {
        return charactrsJson::models($server, $characters);
    }

    public function show($server, $characters) {
        $load_result = Characters::LoadCharacter($characters, Server::GetRealmIDByName($server), true, true);
        return view('characters.show', ['data' => Characters::data()]);
    }

    public function raids($server, $characters) {
        return view('characters.show', ['data' => pveJson::raids($server, $characters)]);
    }

    public function raidsModel($server, $characters) {
        return json_encode(pveJson::raidsModel($server, $characters), JSON_UNESCAPED_UNICODE);
    }

    public function reputation($server, $characters) {
        return view('characters.show', [
            'data' => json_encode(reputationJson::reputation($server, $characters))
        ]);
    }

    public function reputationModel($server, $characters) {
        return json_encode(reputationJson::reputationModel($server, $characters), JSON_UNESCAPED_UNICODE);
    }

    public function achievements($server, $characters) {
        return view('characters.show', [
            'data' => json_encode(achievementsJson::achievements($server, $characters), JSON_UNESCAPED_UNICODE)
        ]);
    }

    public function achievementsModel($server, $characters) {
        return json_encode(achievementsJson::achievementsModel($server, $characters), JSON_UNESCAPED_UNICODE);
    }

    public function pvp($server, $characters) {
        return view('characters.show', [
            'data' => json_encode(pvpJson::pvp($server, $characters), JSON_UNESCAPED_UNICODE)
        ]);
    }

    public function pvpModel($server, $characters) {
        return json_encode(pvpJson::pvpModel($server, $characters), JSON_UNESCAPED_UNICODE);
    }

    public function petsModel($server, $characters) {
        return json_encode(petsJson::petsModel($server, $characters), JSON_UNESCAPED_UNICODE);
    }
}
