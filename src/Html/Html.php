<?php

namespace Larakit\Html;

/**
 *
 * @author aberdnikov
 */
class Html extends LHtml {
    
    protected $_type       = 'html';
    protected $_has_closed = true;
    
    function ngApp($value = 'ng-larakit') {
        $this->setAttribute('ng-app', $value);
        
        return $this;
    }
    
}