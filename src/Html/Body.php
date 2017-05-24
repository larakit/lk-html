<?php

namespace Larakit\Html;
    
    /*
     * To change this template, choose Tools | Templates
     * and open the template in the editor.
     */

/**
 *
 * @author aberdnikov
 */
class Body extends LHtml {
    
    protected $_type       = 'body';
    protected $_has_closed = true;
    protected $_author     = '';
    
    public function getAttributes($asString = false)
    {
        if ($asString) {
            $str     = '';
            foreach($this->attributes as $key => $value) {
                $str .= ' ' . $key . '="' . $value . '"';
            }
    
            return $str;
        } else {
            return $this->attributes;
        }
    }
    
}