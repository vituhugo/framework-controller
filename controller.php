<?php namespace Framework;

use Respect\Config;

class ExceptionHttpResponse extends \Exception {}

abstract class Controller {

    static private $_view;
    protected $_template;

    protected function display($template = false)
    {
        $template = $template ? $template : $this->getTemplate();
        $this->smarty()->display($template);
    }

    protected function fetch($template, $assign, ...$params)
    {
        return $this->smarty()->fetch($template, $assign, ...$params);
    }

    protected function assign($var_name, $value)
    {
        return $this->smarty()->assign($var_name, $value);
    }

    protected function getTemplate()
    {
        if (empty($this->_template))
        {
            $template_path = array_filter([Controller\Router::getModule('underscore')]);
            $template_path[] = Controller\Router::getController('underscore');
            $template_path[] = Controller\Router::getAction('underscore');
            $this->setTemplate(implode(DIRECTORY_SEPARATOR, $template_path).".tpl");
        }
        return $this->_template;
    }

    protected function setTemplate($template)
    {
        return $this->_template = $template;
    }

    private function smarty()
    {
        if (self::$_view === null) {
            $smarty = new \Smarty();
            $smarty->setTemplateDir(ROOT_PATH."application".DIRECTORY_SEPARATOR."mvc".DIRECTORY_SEPARATOR."view");
            self::$_view = $smarty;
        }
        return self::$_view;
    }
}