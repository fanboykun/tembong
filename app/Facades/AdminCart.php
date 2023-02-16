<?php

namespace App\Facades;

use App\Services\AdminCartService;
use Illuminate\Support\Facades\Facade;

class Cart extends Facade {
    protected static function getFacadeAccessor()
    {
        return AdminCartService::class;
    }
}
