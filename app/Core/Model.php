<?php

class Model
{
    protected $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function notifikasi() {
     $notif = new Notifikasi();
    }
}
