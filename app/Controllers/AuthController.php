<?php
// app/controllers/AuthController.php
class AuthController extends Controller
{
    private $userModel;

    public function __construct($db)
    {
        parent::__construct($db);
        $this->userModel = $this->model('userModel');
    }

    public function login()
    {
        $this->view('auth/login');
    }

    public function authenticate()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($username) || empty($password)) {
            $_SESSION['error'] = 'Silahkan masukan username dan password';
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }

        $dataUser = $this->userModel->getUserByUsername($username);

        if (!$dataUser || $dataUser['password'] !== md5($password)) {
            $_SESSION['error'] = 'Username atau password salah';
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }

        // Cek status akun
        if ($dataUser['status'] == 0) {
            $_SESSION['error'] = 'Akun anda non aktif coba hubungi admin';
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }

        // Jika status 1, maka lanjutkan
        $_SESSION['id_security'] = $dataUser['id_security'];
        $_SESSION['nama_security'] = $dataUser['nama_security'];
        $_SESSION['noHp_security'] = $dataUser['noHp_security'];
        $_SESSION['username'] = $dataUser['username'];
        $_SESSION['status'] = $dataUser['status'];
        $_SESSION['user_role'] = $dataUser['role'];
        $this->userModel->logActivity($dataUser['id_security'], "User logged in");

        header('Location: ' . BASE_URL . 'dashboard/dashboard');
        exit;
    }

    public function logout()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->userModel->logActivity($_SESSION['id_security'], "User logged out");
        session_destroy();
        header('Location: ' . BASE_URL . '/auth/login');
    }
}
