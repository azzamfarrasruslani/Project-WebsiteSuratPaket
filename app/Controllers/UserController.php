<?php

class UserController extends Controller {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function dataUser() {
        $this->view('dashboard/dataUser');
    }
}
?>

