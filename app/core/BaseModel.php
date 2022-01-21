<?php

namespace App\Core;

use App\Database\DB;

class BaseModel extends DB
{
    protected $_tableName;
    public function __construct($tableName)
    {
        parent::__construct();
        $this->_tableName = $tableName;
    }

    public function all()
    {
        return $this->fetchAllData($this->_tableName);
    }

    public function insertRegForm($tableName, $data)
    {
        return $this->insert($tableName, $data);
    }

    public function loginData($data)
    {
        return $this->getUserSingleData($data);
    }
    public function insertUpdatedData($tableName,$data)
    {
        return $this->update($tableName,$data);
    }

    public function deleteUser($tableName,$id)
    {
        return $this->delete($tableName,$id);
    }
}
