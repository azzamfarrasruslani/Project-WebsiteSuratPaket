<?php
class HomeController extends Controller
{
    private $homeModel;
    public function __construct($db)
    {
        parent::__construct($db); // Memanggil konstruktor parent
        $this->homeModel = $this->model('HomeModel');
    }

    public function index()
    {
        $data = $this->homeModel->getData();
        $this->view('home/home', ['data' => $data]);
    }

    public function viewPencarianBarang()
    {
        $this->view('home/CrudHome/pencarianBarang');
    }

    public function cariBarang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = [];
            $no_resi = $_POST['no_resi'] ?? null;

            if (empty($no_resi)) {
                $errors[] = 'Nomor resi is required.';
            }


            if (empty($errors)) {


                $tampilDataBarang = $this->homeModel->viewBarangPemilik($no_resi);
              
                $this->view('home/CrudHome/tampilDataBarang', [
                    'tampilDataBarang' => $tampilDataBarang,
                ]);
              
                exit;

            } else {
                foreach ($errors as $error) {
                    echo $error . '<br>';
                }
            }
        }
    }
}
