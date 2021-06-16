<?php

namespace App\Http\Controllers\LauncherApi;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

use App\Models\{
    Account, User
};

class AuthLauncherController extends Controller {

    public $successStatus = 200;

    public function signup(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'Code' => '2',
                'Message' => $validator->errors()->first()
            ]);
        }

        Account::createBattleNet($request);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'question' => $request->question,
            'answer' => $request->answer,
            'receive' => $request->receive ?? 'no'
        ]);

        $user->createToken('MyApp')->accessToken;

        return response()->json([
            'Code' => '1',
            'Message' => ''
        ]);
    }

    public function login() {
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
                'Code' => '2',
                'Message'=>'api_auth_incorrect_password',
            ]);
        }

    }

    public function logout(Request $request) {
        $request->user()->token()->revoke();
        return response()->json([
            'Code' => '1',
            'Message' => ''
        ]);
    }

    public function user(Request $request) {
        $account = Account::userGameIDApi($request->user()->email);
        return response()->json([
            'id' => $request->user()->id,
            'UserCode' => $account->username,
            'UserName' => $request->user()->name,
            'Email' => $request->user()->email,
        ]);
    }

}
