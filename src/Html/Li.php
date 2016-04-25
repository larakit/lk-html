<?php

namespace Larakit\Html;

class Li extends LHtml {
    protected $_type = 'li';
    protected $_has_closed = true;

    function __construct($val = null) {
        $this->setContent($val);
    }

}