<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Page;

class PagesController extends Controller
{
    public function view($id, $slug ) {
        $data = Page::where('id', $id)->where('slug', $slug)->firstOrFail();
        Meta::prependTitle($data->getTranslatedAttribute('title', App()->getLocale(), 'en-gb'))
            ->setDescription(__('races.races_12'));
        return view('pages.view', ['page' => $data]);
    }
}
