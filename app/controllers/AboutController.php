<?php

namespace App\Controller;

use App\Core\BaseController;

class AboutController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo 'This is about Controller index method.';
    }

    public function about()
    {
        // $data = ['title' => 'hello this about view solved'];
        // $this->view->LoadView('aboutView', $data);
    }
}
