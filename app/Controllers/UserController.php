<?php

class UserController extends Controller {
    private $userModel;
    public function __construct($db)
    {
        parent::__construct($db);
        $this->userModel = $this->model('UserModel');
    }


    public function dataUser() {
        $title = "Data User";
        $this->loadHeader('header', $title, ['isActive' => [$this, 'isActive']]);
        $this->loadNavbar('navbar');
        $this->view('dashboard/dataUser');
        $this->loadFooter('footer');
    }


    public function viewProfile() {
        $title = "View Profile";
        $this->loadHeader('header', $title, ['isActive' => [$this, 'isActive']]);
        $this->loadNavbar('navbar');
        $this->view('dashboard/profile');
        $this->loadFooter('footer');
    }
}
?>

