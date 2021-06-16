<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Characters\Characters;
use App\Models\Mail;
use App\Models\Shop\CategotyShop;
use App\Models\Shop\Shop;
use App\Services\Soap\Soap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index() {
        $data = CategotyShop::all();
        return response()->json($data);
    }

    public function category($category) {
        $data = Shop::where('category_id', $category)->get();
        return response()->json($data);
    }

    public function bay(Request $request) {
        if($request->get('id')) {
            if($request->session()->has('characters')) {
                $info= Shop::where('id', $request->get('id'))->first();
                if($info) {
                    $data = ['error' => 'Ошибка', 'data' => 'Не известная ошибка, обратитесь к администратору сайта.'];
                }
                if (Account::balance()->balans >= $info->price) {
                    switch ($info['service']) {
                        case 'PIT':
                            /*******
                             *
                             *
                            $char = \DB::connection('characters')
                                ->table('characters')
                                ->where('name', $request->session()->get('characters'))
                                ->first();
                            $countMail = Mail::count();
                            $mainSend = Mail::create([
                                'id' => $countMail,
                                'messageType' => 5,
                                'stationery' => 61,
                                'sender' => 32216,
                                'receiver' => $char->guid,
                                'subject' => 'Покупка в магазине',
                                'body' => 'Покупка в магазине',
                                'has_items' => 1,
                            ]);
                            $mailItem = \DB::connection('characters')->table('mail_items')->insert([
                                'mail_id' => $mainSend->id,
                                'item_guid' => $info->item_id,
                                'receiver' => $char->guid
                            ]);
                            $data = ['successful' => 'Успешно', 'data' => 'Успешно, товар оправлен вам на внутреигровую почту!'];
                            */
                            $soap = new Soap();
                            if($soap->cmd('.send items '. $request->session()->get('characters') .' "'.$info->title.'" "Thank you for purchasing" '. $info->item_id .'[:1]') === NULL) {
                            $data = ['success' => 'Ошибка', 'data' => 'Успешно, товар оправлен вам на внутреигровую почту!'];
                            } else {
                            $data = ['error' => 'Ошибка', 'data' => 'Не известная ошибка, обратитесь к администратору сайта.'];
                            }

                            break;
                        case 'PCC':
                            $soap = new Soap();
                            if($soap->cmd('character customize '. $request->get('character')) === NULL) {
                                Code::where('purchase_code',$request->get('key'))->update(['code_activated' =>'1']);
                                return redirect(route('key.claim'))->with("success","The code was successfully used");
                            } else {
                                $data = ['error' => 'Ошибка', 'data' => 'Не известная ошибка, обратитесь к администратору сайта.'];
                            }
                            break;
                        case 'PNC':
                            if(Characters::where('name', $request->get('character'))->update(['at_login' => '1'])) {
                                Code::where('purchase_code', $request->get('key'))->update(['code_activated' => '1']);
                                return redirect(route('key.claim'))->with("success","The code was successfully used.");
                            } else {
                                $data = ['error' => 'Ошибка', 'data' => 'Не известная ошибка, обратитесь к администратору сайта.'];
                            }
                            break;
                        case 'PLC':
                            Characters::where('name', $request->get('character'))->update(['level' => '120']);
                            Code::where('purchase_code', $request->get('key'))->update(['code_activated' => '1']);
                            return redirect(route('key.claim'))->with("success","Your character has successfully reached Level 120!");
                            break;
                        case 'PRC':
                            $soap = new Soap();
                            if($soap->cmd('character changerace '. $request->get('character')) === NULL) {
                                CodesShop::where('purchase_code',$request->get('key'))->update(['code_activated' =>'1']);
                                return redirect(route('key.claim'))->with("success","The code was successfully used");
                            } else {
                                $data = ['error' => 'Ошибка', 'data' => 'Не известная ошибка, обратитесь к администратору сайта.'];
                            }
                            break;
                        case 'PFC':
                            $soap = new Soap();
                            if($soap->cmd('character changefaction '. $request->get('character')) === NULL) {
                                Code::where('purchase_code',$request->get('key'))->update(['code_activated' =>'1']);
                                return redirect(route('key.claim'))->with("success","The code was successfully used");
                            } else {
                                $data = ['error' => 'Ошибка', 'data' => 'Не известная ошибка, обратитесь к администратору сайта.'];
                            }
                            break;
                        case 'PMC':
                            $soap = new Soap();
                            if($soap->cmd('send money '.$request->get('character').' "Game Gold" "Thank you for purchasing, game gold." 100000000') === NULL) {
                                Code::where('purchase_code',$request->get('key'))->update(['code_activated' => '1']);
                                return redirect(route('key.claim'))->with("success","The code was successfully used, the product was sent to you in-game mail.");
                            } else {
                                $data = ['error' => 'Ошибка', 'data' => 'Не известная ошибка, обратитесь к администратору сайта.'];
                            }
                            break;
                        default:
                            $data = ['error' => 'Ошибка', 'data' => 'Не известная ошибка, обратитесь к администратору сайта.'];
                            break;
                    }
                } else {
                    $data = ['error' => 'Ошибка', 'data' => 'У вас не достаточно средств!'];
                }
            } else {
                $data = ['error' => 'Ошибка', 'data' => 'Не выбран персонаж!'];
            }
        } else {
            $data = ['error' => 'Ошибка', 'data' => 'Не известная ошибка, обратитесь к администратору сайта.'];
        }
        return response()->json($data);
    }
}
