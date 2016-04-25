<?php

    namespace Larakit\Html;

    use Larakit\Html\LHtml;
    use Larakit\Html\Table_Row_Cell;

    class Map extends LHtml {

        protected $areas = array();

        /**
         * Добавление именованной ячейки в строку
         *
         * @param string $name
         * @return Area
         */
        function &addArea($name = null) {
            if (!$name) {
                $name = uniqid(microtime(true), true);
            }
            $this->areas[$name] = new Area();
            return $this->areas[$name];
        }

        /**
         * Получение именованной ячейки
         *
         * @param string $name
         * @return Area
         */
        function &getArea($name) {
            return $this->areas[$name];
        }

        /**
         * @param $value
         * @return Map
         */
        function setName($value) {
            $this->setAttribute('name', $value);
            return $this;
        }

        /**
         * @param $value
         * @return map
         */
        function setId($value) {
            return parent::setId($value);
        }

        function __toString() {
            return sprintf('<map%s>%s</map>', $this->getAttributes(true), implode('', $this->areas));
        }

    }