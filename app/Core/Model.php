<?php

class Model
{
    protected $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }
}
