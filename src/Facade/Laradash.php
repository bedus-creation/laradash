<?php
namespace Aammui\Laradash\Facade;

use Illuminate\Support\Facades\Facade;

class Laradash extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Laradash';
    }
}
