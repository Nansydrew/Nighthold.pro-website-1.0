<?php

    namespace App\Services;

    use Illuminate\Support\Facades\{Cache, DB};
    use App\Services\Text;
    use Illuminate\Support\Str;

    class Server {

        private static $realmsStatusCache = array();


        public static function playersOnline()
        {
            return static::getOnlinePlayers();
        }

        public static function status()
        {
            return static::getServerStatus();
        }

        public static function getServerStatus($realmID = false) {
            $server = "";
            if($realmID === false) {
                $realmList = DB::connection('auth')->table('realmlist')->get();
            }
            else {
                if(isset(self::$realmsStatusCache[$realmID])) {
                    return self::$realmsStatusCache[$realmID];
                }
                $realmList[] = DB::connection('auth')->table('realmlist')->where('id', $realmID)->first();
            }
            if(!$realmList) {
                return false;
            }
            $size = count($realmList);
            for($i = 0; $i < $size; $i++) {
                $errNo = 0;
                $errStr = 0;
                $realmList[$i]->status = @fsockopen($realmList[$i]->address, $realmList[$i]->port, $errNo, $errStr,
                        1) ? 'true' : 'false';
                switch($realmList[$i]->icon ) {
                    default:
                    case 0:
                        $realmList[$i]->type = 'Обычный';
                        break;
                    case 4:
                        $realmList[$i]->type = 'PvE';
                        break;
                    case 1:
                        $realmList[$i]->type = 'PvP';
                        break;
                    case 6:
                        $realmList[$i]->type = 'Ролевой';
                        break;
                    case 8:
                        $realmList[$i]->type = 'RP PvP';
                        break;
                }

               $server = [
                   "data" => [
                       "GameVersions" => [
                           [
                               "name" => "World of Warcraft",
                               "slug" => "world-of-warcraft",
                               "key" => "mainline",
                               "__typename" => "GameVersion"
                           ],
                       ],
                       "Regions" => [
                           [
                               "name" => "С. и Ю. Америка, Австралия и Океания","slug" => "americas-oceania","key" => "us","__typename" => "Region"],
                           [
                               "name" => "Европа","slug" => "europe","key" => "eu","__typename" => "Region"],
                           [
                               "name" => "Корея","slug" => "korea","key" => "kr","__typename" => "Region"],
                           [
                               "name" => "Тайвань","slug" => "taiwan","key" => "tw","__typename" => "Region"]
                       ],
                       "Realms" => [
                           [
                               "name" => $realmList[$i]->name,
                               "slug" => Str::slug($realmList[$i]->name),
                               "locale" => "ru-RU",
                               "timezone" => self::getOnline($realmList[$i]->id),
                               "online" => $realmList[$i]->status,
                               "category" => "Русский",
                               "type" => [
                                   "id" => "1",
                                   "name" => $realmList[$i]->type,
                                   "slug" => "обычный",
                                   "enum" => "NORMAL",
                                   "__typename" => "RealmTypeEnum"
                               ],
                               "population" => [
                                   "id" => "2",
                                   "name" => "Средняя",
                                   "slug" => "средняя",
                                   "enum" => "MEDIUM",
                                   "__typename" => "RealmPopulationEnum"
                               ],
                               "__typename" => "Realm"
                           ],
                       ]
                   ]
               ];
            }
            return $server;
        }

        private static function getOnline($id) {
            $Statement = DB::connection('characters')
                    ->table('characters')
                    ->select(DB::raw('count(guid) as now_online'))
                    ->where('online', 1)
                    ->first();
            return ceil($Statement->now_online * setting('onlain.online'));
        }

        public static function getServerName() {
            $realmList = DB::connection('auth')->table('realmlist')->select('name')->first();
            return $realmList->name;
        }

        public static function GetRealmIDByName($realmName)
        {
            return self::FindRealm(urldecode($realmName));
        }

        public static function FindRealm($rName) {
            foreach(config('servers.realm') as $realm) {
                if(strtolower($realm['slug']) == strtolower($rName)) {
                    return $realm['id'];
                }
            }
            return 0;
        }

        public static function IsRealm($realmName): bool
        {
            foreach(config('servers.realm') as $realm) {
                if($realm['name'] == $realmName) {
                    return true;
                }
            }
            return false;
        }

        private static function getOnlinePlayers()
        {

            $playersOnline = DB::connection('characters')->table('characters')->where('online', 1)->count();

            return ceil($playersOnline * setting('onlain.online')) ;
        }

        private static function extractFaction($race): string
        {
            $horde = array(2, 5, 6, 8, 10);

            return in_array($race, $horde) ? 'horde' : 'alliance';
        }
    }
