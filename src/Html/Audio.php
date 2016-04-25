<?php

namespace Larakit\Html;

use Larakit\Html\LHtml;

/**
 *
 * @author aberdnikov
 */
class Audio extends LHtml {

    protected $_type       = 'audio';
    protected $_has_closed = true;

    function setSrc($src) {
        $this->setAttribute('src', $src);
        return $this;
    }

    function setPreload($preload) {
        $this->setAttribute('preload', $preload);
        return $this;
    }

    function setControls($controls) {
        $this->setAttribute('controls', $controls);
        return $this;
    }

    function setLoop($src) {
        $this->setAttribute('loop', $src);
        return $this;
    }

    function setAutoplay($autoplay = true) {
        if ($autoplay) {
            $this->setAttribute('autoplay', 'autoplay');
        } else {
            $this->removeAttribute('autoplay');
        }
        return $this;
    }

}