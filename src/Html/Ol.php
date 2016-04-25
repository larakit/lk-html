<?php

namespace Larakit\Html;

class Ol extends LHtml {
    protected $_type       = 'ol';
    protected $items = [];

    /**
     * Добавление элемента списка
     *
     * @param string $name
     *
     * @return Li
     */
    function &addItem($content, $name = null) {
        if (!$name) {
            $name = uniqid(microtime(true), true);
        }
        $this->items[$name] = new Li($content);
        return $this->items[$name];
    }

    /**
     * Получение именованной ячейки
     *
     * @param string $name
     *
     * @return Li
     */
    function &getItem($name) {
        return $this->items[$name];
    }

    function __toString() {
        return sprintf("<%s%s>%s%s%s</%s>", $this->_type, $this->getAttributes(true), PHP_EOL."\t\t\t",implode(PHP_EOL."\t\t\t", $this->items), PHP_EOL."\t\t", $this->_type);
    }


}