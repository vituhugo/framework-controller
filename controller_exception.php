<?php namespace Framework\Controller;

use Framework\Controller;

abstract class ControllerException extends Controller{

    /**
     * @param $exception
     *
     * @return String A ser printada na tela.
     */
    public function dispatch($exception)
    {
        return $exception->getMessage();
    }

    public function getTemplate()
    {
        return $this->_template;
    }
}