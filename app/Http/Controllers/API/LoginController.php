<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function token()
    {
        return csrf_token();
    }

    public function report(Request $request)
    {
        return response()->json([
            'authentication_state' => "LOGIN",
            'error_status'=> "WARNING",
        ]);
    }

    public function spr(Request $request) {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $token =  $user->createToken('WoWLegions')->accessToken;
            return response()->json([
                'Code' => '1',
                'Message' => 'api_auth_login_ok',
                'Token' => $token
            ]);
        } else {
            return response()->json([
                'authentication_state' => "LOGIN",
                'error_code' => "USERNAME_REQUIRED",
                'error_message' => "Не удалось найти учетную запись Blizzard с такими данными.",
                'error_message_helper' => "Введите имя учетной записи.",
                'error_status'=> "WARNING",
                'input_id' => "account_name"
            ]);
        }
    }
}
