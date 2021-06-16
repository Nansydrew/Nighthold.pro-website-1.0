<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function __invoke(Request $request)
    {
        return view('account.index');
    }
}
