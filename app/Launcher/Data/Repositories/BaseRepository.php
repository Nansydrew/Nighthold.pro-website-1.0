<?php

namespace App\Launcher\Data;

abstract class BaseRepository
{
    abstract public function build($data);
    abstract public function toJson();
}