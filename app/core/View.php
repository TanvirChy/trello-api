<?php

namespace App\Core;

use App\Core\Session;


class View
{
    public $view, $_head, $_body, $_script, $_outBuffer, $_siteTitle, $_layout = DEFAULT_LAYOUT;
    public function LoadView($view, $data = [])
    {
        extract($data);
        if (file_exists('..' . DS . 'app' . DS . 'views' . DS  . $view . '.php')) {
            require_once '..' . DS . 'app' . DS . 'views' . DS  . $view . '.php';

            include('..' . DS . 'app' . DS . 'views' . DS . 'DefaultLayouts' . DS . $this->_layout . '.php');
        } else {
            die('View does not exits.');
        }
    }
    public function content($type)
    {
        if ($type == 'head') {
            return $this->_head;
        } elseif ($type == 'body') {
            return $this->_body;
        } elseif ($type == 'script') {
            return $this->_script;
        }
        return false;
    }

    public function start($type)
    {
        $this->_outBuffer = $type;
        ob_start();
    }

    public function end()
    {
        if ($this->_outBuffer == 'head') {
            $this->_head = ob_get_clean();
        } elseif ($this->_outBuffer == 'body') {
            $this->_body = ob_get_clean();
        } elseif ($this->_outBuffer == 'script') {
            $this->_script = ob_get_clean();
        } else {
            die('Please! run first start() method.');
        }
    }

    public function siteTitle()
    {
        return $this->_siteTitle;
    }

    public function setSiteTile($title)
    {
        $this->_siteTitle = $title;
    }

    public function setLayout($path)
    {
        $this->_layout = $path;
    }
}
