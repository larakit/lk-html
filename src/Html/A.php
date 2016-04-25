<?php

namespace Larakit\Html;

use Larakit\Html\Button;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author aberdnikov
 */
class A extends Button {

    protected $_type = 'a';
    protected $_has_closed = true;

    function setHref($value) {
        $this->setAttribute('href', $value);
        return $this;
    }

}