<?php

namespace Larakit\Html;

class TableRow extends LHtml {

    protected $cells = [];

    /**
     * Добавление именованной ячейки в строку
     *
     * @param string $name
     *
     * @return TableRowCell
     */
    function &addCell($name = null) {
        if (!$name) {
            $name = uniqid(microtime(true), true);
        }
        $this->cells[$name] = new TableRowCell();
        return $this->cells[$name];
    }

    /**
     * Получение именованной ячейки
     *
     * @param string $name
     *
     * @return TableRowCell
     */
    function &getCell($name) {
        return $this->cells[$name];
    }

    function __toString() {
        return sprintf("<tr%s>%s%s%s</tr>", $this->getAttributes(true), PHP_EOL."\t\t\t",implode(PHP_EOL."\t\t\t", $this->cells), PHP_EOL."\t\t");
    }


}