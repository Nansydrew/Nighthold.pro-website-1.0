<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnlineController extends Controller
{
    public function index() {
        return view('game.online');
    }
}
