<?php

namespace app\core;

class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
    }
}
