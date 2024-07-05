<?php
class HomeController extends Controller {
    public function index() {
        $model = $this->model('HomeModel');
        $data = $model->getData();
        $this->view('home/home', ['data' => $data]);
    }
}
?>
