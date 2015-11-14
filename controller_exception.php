<?php namespace Framework\Controller;

use Framework\Controller;

abstract class ControllerException extends Controller{

    protected $_template;

    public function dispatch($e) {
        $this->assign('exception', $e);
        return $this->fetch('error.tpl');
    }

    public function getTemplate() {
        return $this->_template;
    }
}