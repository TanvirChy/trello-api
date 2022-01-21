<?php

namespace App\Models;

use App\Core\BaseModel;

class Users extends BaseModel
{
    public function __construct()
    {
        parent::__construct('users');
    }
}
