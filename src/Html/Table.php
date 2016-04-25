<?php
namespace Larakit\Html;

class Table extends LHtml {
    protected $_type       = 'table';
    protected $_has_closed = true;
    protected $_caption    = null;

    protected $rows = [];

    /**
     * Add named row in table
     *
     * @param string $name
     *
     * @return TableRow
     */
    function &addRow($name = null) {
        $row = $this->_addRow('tbody', $name);
        return $row;
    }

    protected function _addRow($type, $name = null) {
        if (!$name) {
            $name = uniqid(microtime(true), true);
        }
        $this->rows[$type][$name] = new TableRow();
        return $this->rows[$type][$name];
    }

    function insertRow(TableRow $row) {
        $this->rows[uniqid(microtime(true), true)] = $row;
    }

    /**
     * @param $caption
     *
     * @return $this
     */
    function setCaption($caption) {
        $this->_caption = $caption;
        return $this;
    }

    /**
     * Get named row from table
     *
     * @param string $name
     *
     * @return TableRow
     */
    function &getRow($name) {
        return $this->rows[$name];
    }

    function getContent() {
        try {
            $ret = '';
            if ($this->_caption) {
                $ret .= PHP_EOL . "\t<caption>" . $this->_caption . "</caption>";
            }
            $ret .= PHP_EOL . "\t<tbody>" . PHP_EOL . "\t\t" . implode(PHP_EOL . "\t\t", $this->rows['tbody']) . PHP_EOL . "\t</tbody>" . PHP_EOL;
            return $ret;
        } catch (\Exception $e) {
            dd($e);
            return $e->getTraceAsString();
        }
    }

}
