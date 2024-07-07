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
}
?>