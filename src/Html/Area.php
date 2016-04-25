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
class Area extends LHtml {

    protected $_type       = 'area';
    protected $_has_closed = false;

    function setCoords($value) {
        $this->setAttribute('coords', $value);
        return $this;
    }

    function setShape($type = 'poly') {
        $this->setAttribute('shape', $type);
        return $this;
    }

    function setHref($value) {
        $this->setAttribute('href', $value);
        return $this;
    }

}