<?php
/**
 * Created by PhpStorm.
 * User: Rndwiga
 * Date: 3/6/2017
 * Time: 2:22 PM
 */

namespace Tyondo\Helpers;
use Illuminate\Support\Facades\Facade;

class TyondoHelpers extends Facade
{
    protected static function getFacadeAccessor() {
        return 'tyondoHelpers';
    }
}