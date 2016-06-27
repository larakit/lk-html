<?php

namespace Larakit\Html;

/**
 *
 * @author aberdnikov
 */
class Base extends LHtml {

    protected $_type       = 'base';
    protected $_has_closed = false;

    function setHref($value) {
        $this->setAttribute('href', $value);

        return $this;
    }

    function setTarget($value) {
        $this->setAttribute('target', $value);

        return $this;
    }

    function __toString() {
        if(!$this->getAttribute('href')) {
            $this->setHref('/');
        }

        return parent::__toString();
    }

}