<?php
namespace App\Core;

use App\Core\View;

class BaseController
{
    protected $view;
    public function __construct()
    {
        $this->view = new View();
    }

}
