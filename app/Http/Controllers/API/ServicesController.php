<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Services;
use App\Services\Utils;
use Hamcrest\Util;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index() {
        return json_encode(Services::all(), JSON_UNESCAPED_UNICODE);
    }

    public function store(Request $request) {
        switch ($request->get('type')) {
            case 'sm':
                $data = ['error' => 'Ошибка', 'data' => 'Не известная ошибка, обратитесь к администратору сайта.'];
                break;

            case 'sf':
                $data = ['error' => 'Ошибка', 'data' => 'Не известная ошибка, обратитесь к администратору сайта.'];
                break;

            case 'si':
                $data = ['error' => 'Ошибка', 'data' => 'Не известная ошибка, обратитесь к администратору сайта.'];
            break;

            case 'summon':
                if($request->session()->has('characters')) {
                    Utils::teleport($request->session()->get('characters'));
                    $data = ['success' => 'Успешно', 'data' => 'Ваш персонаж был отправлен в Даларан!'];
                } else {
                    $data = ['error' => 'Ошибка', 'data' => 'Персонаж не выбран!'];
                }
                break;

            case 'unmute':
                $data = ['error' => 'Ошибка', 'data' => 'Не известная ошибка, обратитесь к администратору сайта.'];
                break;

            case 'unban':
            $data = ['error' => 'Ошибка', 'data' => 'Не известная ошибка, обратитесь к администратору сайта.'];
            break;

            default;
                $data = ['error' => 'Ошибка', 'data' => 'Не известная ошибка, обратитесь к администратору сайта.'];
            break;
        }

        return response()->json($data);
    }
}
