<?php
class AuthController extends Controller
{
    private $modelUser;

    public function __construct()
    {
        $this->modelUser = $this->model('ModelUser');
    }

    public function login()
    {
        $this->view('auth/login');
    }

    public function authenticate()
    {
        session_start();

        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        if (empty($username) || empty($password)) {
            $_SESSION['error'] = 'Silahkan masukan username dan password';
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }

        $dataUser = $this->modelUser->getUserByUsername($username);

        if (!$dataUser || $dataUser['password'] !== md5($password)) {
            $_SESSION['error'] = 'Username atau password salah';
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }

        $_SESSION['id_security'] = $dataUser['id_security'];
        $_SESSION['nama_security'] = $dataUser['nama_security'];
        $_SESSION['noHp_security'] = $dataUser['noHp_security'];
        $_SESSION['username'] = $dataUser['username'];

        header('Location: ' . BASE_URL . 'dashboard/dashboard');
        exit;
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL . '/auth/login');
    }
}


