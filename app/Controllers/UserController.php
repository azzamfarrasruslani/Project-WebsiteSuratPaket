<?php

class UserController extends Controller {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function dataUser() {
        $title = "Data User";
        $this->loadHeader('header', $title, ['isActive' => [$this, 'isActive']]);
        $this->loadNavbar('navbar');
        $this->view('dashboard/dataUser');
        $this->loadFooter('footer');
    }
}
?>

