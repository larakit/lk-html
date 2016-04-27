<?php

namespace Larakit\Html;

class Link extends LHtml {

    protected $_type       = 'link';
    protected $_has_closed = false;

    function setRel($v) {
        return $this->setAttribute('rel', $v);
    }

    function setHref($v) {
        return $this->setAttribute('href', $v);
    }
}