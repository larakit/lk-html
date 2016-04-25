<?php

namespace Larakit\Html\Facades;

use Illuminate\Support\Facades\Facade;

/**
 *
 * @author aberdnikov
 */
class Table extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     */
    protected static function getFacadeAccessor() {
        return new \Larakit\Html\Table;
    }

}