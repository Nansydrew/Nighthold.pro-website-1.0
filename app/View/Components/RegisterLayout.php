<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RegisterLayout extends Component
{

    /**
     * @inheritDoc
     */
    public function render()
    {
        return view('layouts.register');
    }
}
