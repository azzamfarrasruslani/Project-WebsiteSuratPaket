<?php
class Controller
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function model($model)
    {
        require_once "../app/models/" . $model . ".php";
        return new $model($this->db);
    }

 public function checkRole($role) {
        if (!isset($_SESSION)) {
            session_start();
        }
        if ($_SESSION['user_role'] !== $role) {
            die("Akses ditolak: Anda tidak memiliki izin untuk mengakses halaman ini.");
        }
    }




    public function view($view, $data = [])
    {
        extract($data);
        require_once '../app/views/' . $view . '.php';
    }

    public function loadHeader($layout, $title, $data = [])
    {
        extract($data);
        require_once "../app/views/dashboard/layout/$layout.php";
    }

    public function loadNavbar($layout,$title) {
        require_once "../app/views/dashboard/layout/$layout.php";
    }

    public function loadFooter($layout)
    {
        require_once "../app/views/dashboard/layout/$layout.php";
    }

    protected function isActive($path)
    {
        return strpos($_SERVER['REQUEST_URI'], $path) !== false ? 'font-semibold text-slate-700 bg-blue-500/13 rounded-lg' : '';
    }
}
