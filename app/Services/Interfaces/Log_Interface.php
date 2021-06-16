<?php

namespace App\Services\Interfaces;

interface Log_Interface
{
    public static function Initialize($is_enabled, $log_level);
    public static function WriteLog($text);
    public static function WriteError($text);
    public static function WriteSql($text);
}
