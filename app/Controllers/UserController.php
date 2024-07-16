<?php

// app/controllers/UserController.php
class UserController extends Controller {
    private $userModel;

    public function __construct($db) {
        parent::__construct($db); // Memanggil konstruktor parent
        $this->userModel = $this->model('UserModel');
    }

    public function index() {
        $this->viewProfile();
    }

    public function dataUser() {
        $this->checkRole('admin'); // Memeriksa peran admin
        $title = "Data User";
        $this->loadHeader('header', $title, ['isActive' => [$this, 'isActive']]);
        $this->loadNavbar('navbar',$title);
        $this->view('dashboard/dataUser');
        $this->loadFooter('footer');
    }

    public function viewProfile() {
        $title = "Profile";
        $this->loadHeader('header', $title, ['isActive' => [$this, 'isActive']]);
        $this->loadNavbar('navbar',$title);
        $this->view('dashboard/profile');
        $this->loadFooter('footer');
    }

    public function managePackages() {
        $this->checkRole('user'); // Memeriksa peran user biasa
        $title = "Manage Packages";
        $this->loadHeader('header', $title, ['isActive' => [$this, 'isActive']]);
        $this->loadNavbar('navbar',$title);
        $this->view('dashboard/managePackages');
        $this->loadFooter('footer');
    }
}


