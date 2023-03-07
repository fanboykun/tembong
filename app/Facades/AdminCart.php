<?php

namespace App\Facades;

use App\Services\AdminCartService;
use Illuminate\Support\Facades\Facade;

class   AdminCart extends Facade {
    protected static function getFacadeAccessor()
    {
        return AdminCartService::class;
    }
}
