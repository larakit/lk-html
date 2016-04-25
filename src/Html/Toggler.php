<?php
namespace Larakit\Html;

class Toggler extends \Larakit\Html\Div {
    protected $state     = false;
    protected $on        = 'ДА';
    protected $on_class  = 'btn-success';
    protected $off_class = 'btn-danger';
    protected $off       = 'НЕТ';
    protected $label     = '';
    protected $size      = 'xs';

    function setState($state) {
        $this->addClass('js-btn pointer lara_toggler');
        $this->state = (bool)$state;
        return $this;
    }

    function setOn($on) {
        $this->on = $on;
        return $this;
    }

    function setOnClass($class) {
        $this->on_class = $class;
        return $this;
    }

    function setOffClass($class) {
        $this->off_class = $class;
        return $this;
    }

    function setLabel($label) {
        $this->label = $label;
        return $this;
    }

    function setOff($off) {
        $this->off = $off;
        return $this;
    }

    function setSizeLg() {
        $this->size = 'lg';
        return $this;
    }

    function setSizeXs() {
        $this->size = 'xs';
        return $this;
    }

    function setSizeMd() {
        $this->size = 'md';
        return $this;
    }

    function button() {
        return \HtmlButton::addClass('btn btn-default btn-' . $this->size);
    }

    function getContent() {
        //        dump($this);
        $btn_off = $this->button()
                        ->addClass(!$this->state ? $this->off_class : '')
                        ->removeClass(!$this->state && ('btn-default' != $this->off_class) ? 'btn-default' : '')
                        ->setContent(!$this->state ? $this->off : '&nbsp;&nbsp;&nbsp;');
        $btn_on  = $this->button()
                        ->addClass($this->state ? $this->on_class : '')
                        ->removeClass($this->state ? 'btn-default' : '')
                        ->removeClass($this->state && ('btn-default' != $this->off_class) ? 'btn-default' : '')
                        ->setContent($this->state ? $this->on : '&nbsp;&nbsp;&nbsp;');
        $this->_content .= \HtmlDiv::addClass('btn-group btn-toggle')->setContent($btn_off . $btn_on);
        $this->_content .= \HtmlDiv::addClass('toggler-label')->setContent($this->label);
        return $this->_content;
    }
}