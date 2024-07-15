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

    public function loadNavbar($layout) {
        require_once "../app/views/dashboard/layout/$layout.php";
    }

    public function loadFooter($layout)
    {
        require_once "../app/views/dashboard/layout/$layout.php";
    }

    protected function isActive($path)
    {
        return strpos($_SERVER['REQUEST_URI'], $path) !== false ? 'bg-blue-500/13 rounded-lg' : '';
    }
}
