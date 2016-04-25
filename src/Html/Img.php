<?php

namespace Larakit\Html;

use Larakit\Html\LHtml;
/**
 *
 * @author aberdnikov
 */
class Img extends LHtml {

    protected $_type = 'img';
    protected $_has_closed = false;

    function setSrc($src) {
        $this->setAttribute('src', $src);
        return $this;
    }

}