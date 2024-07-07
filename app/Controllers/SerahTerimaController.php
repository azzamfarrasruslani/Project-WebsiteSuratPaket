<?php

class SerahTerimaController extends Controller
{
    private $serahTerimaModel;

    public function __construct($db)
    {
        parent::__construct($db);
        $this->serahTerimaModel = $this->model('SerahTerimaModel');
    }

    public function dataPaket()
    {
        $search = $_GET['search'] ?? '';
        $order = $_GET['order'] ?? 'id_serah_terima';
        $orderType = $_GET['orderType'] ?? 'ASC';
        $limit = $_GET['limit'] ?? 40;
        $page = $_GET['page'] ?? 1;
        $offset = ($page - 1) * $limit;

        $data['serah_terima'] = $this->serahTerimaModel->getPenyerahanTerimaan($search, $order, $orderType, $limit, $offset);
        $data['page'] = $page;
        $data['limit'] = $limit;
        $data['search'] = $search;
        $data['order'] = $order;
        $data['orderType'] = $orderType;

        // Retrieve security names
        $data['security_names'] = $this->serahTerimaModel->getNamaSecurity();

        $this->loadView('dashboard/dataPaket', $data, $this);
    }

    public function getFotoBarang()
    {
        if (isset($_GET['id_serah_terima'])) {
            $id_barang = $_GET['id_serah_terima'];
            $foto_barang = $this->serahTerimaModel->getFotoBarang($id_barang);

            // Tampilkan gambar
            if ($foto_barang) {
                header("Content-type: image/jpeg");
                echo $foto_barang;
            } else {
                http_response_code(404);
                echo "Image not found.";
            }
        } else {
            http_response_code(400);
            echo "Invalid request.";
        }
    }

    private function loadView($view, $data, $controller)
    {
        $viewPath = "../app/views/$view.php";
        if (file_exists($viewPath)) {
            extract($data);
            include $viewPath;
        } else {
            echo "View file not found: $viewPath";
        }
    }
}
