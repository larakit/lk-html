<?php

namespace Larakit\Html;

class Video extends LHtml {
    protected $_type = 'video';
    protected $_ogv;
    protected $_ogg;
    protected $_mp4;
    protected $_webm;
    protected $_poster;

    function setControls($val = true) {
        if ($val) {
            return $this->setAttribute('controls', 'controls');
        } else {
            return $this->removeAttribute('controls');
        }
    }

    function setAutoplay($val = true) {
        if ($val) {
            return $this->setAttribute('autoplay', 'autoplay');
        } else {
            return $this->removeAttribute('autoplay');
        }
    }

    function setLoop($val = true) {
        if ($val) {
            return $this->setAttribute('loop', 'loop');
        } else {
            return $this->removeAttribute('loop');
        }
    }

    function setPoster($val) {
        return $this->setAttribute('poster', $val);
    }

    function setHeight($val) {
        return $this->setAttribute('height', $val);
    }

    function setWidth($val) {
        return $this->setAttribute('width', $val);
    }

    function setSrc($val, $ext = 'mp4') {
        $param          = '_' . $ext;
        $this->{$param} = $val;
        return $this;
    }

    function setWebm($val) {
        return $this->setSrc($val, 'webm');
    }

    function setOgv($val) {
        return $this->setSrc($val, 'ogv');
    }

    function getContent() {
        $ret = '';
        $ret .= '<source src="' . $this->_mp4 . '" type="video/mp4">';
        if ($this->_ogv) {
            $ret .= '<source src="' . $this->_ogv . '" type="video/ogg">';
        }
        if ($this->_ogg) {
            $ret .= '<source src="' . $this->_ogv . '" type="video/ogg">';
        }
        if ($this->_webm) {
            $ret .= '<source src="' . $this->_webm . '" type="video/webm">';
        }
        $ret .= 'Тег video не поддерживается вашим браузером. ';
        $ret .= '<a href = "' . $this->_mp4 . '" > Скачайте видео </a >';
        return $ret;
    }


}

