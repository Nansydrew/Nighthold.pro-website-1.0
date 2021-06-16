<?php


namespace App\Services\Localization;


class Localization
{
    public function locale() {
        $locale = request()->segment(1, '');

        if($locale && in_array($locale, config("app.locales"))) {
            return $locale;
        }

        return "";
    }
}
