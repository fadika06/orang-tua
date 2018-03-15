<?php

namespace Bantenprov\OrangTua\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The OrangTua facade.
 *
 * @package Bantenprov\OrangTua
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class OrangTuaFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'orang-tua';
    }
}
