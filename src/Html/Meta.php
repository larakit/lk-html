<?php

namespace Larakit\Html;

class Meta extends LHtml {

    protected $_type       = 'meta';
    protected $_has_closed = false;

    function setName($name) {
        return $this->setAttribute('name', $name);
    }

    function setProperty($property) {
        return $this->setAttribute('property', $property);
    }
}