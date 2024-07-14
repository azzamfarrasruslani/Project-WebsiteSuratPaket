<?php

class SerahTerimaController extends Controller
{
    private $serahTerimaModel;

    public function __construct($db)
    {
        parent::__construct($db);
        $this->serahTerimaModel = $this->model('SerahTerimaModel');
    }

    public function index()
    {
        $this->dataPaket();
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

        // // Retrieve serah terima data if ID is provided
        // if (isset($_GET['id'])) {
        //     $id_serah_terima = $_GET['id'];
        //     $data['edit_data'] = $this->serahTerimaModel->getSerahTerimaById($id_serah_terima);
        // }else{
        //      echo "
        //     <script>alert('ID Gagal Ditemukan!');</script>"; 
        // }

        $this->loadView('dashboard/dataBarang', $data, $this);
    }



    // public function getFotoBarang()
    // {
    //     if (isset($_GET['id_serah_terima'])) {
    //         $id_barang = $_GET['id_serah_terima'];
    //         $foto_barang = $this->serahTerimaModel->getFotoBarang($id_barang);

    //         // Tampilkan gambar
    //         if ($foto_barang) {
    //             header("Content-type: image/jpeg");
    //             echo $foto_barang;
    //         } else {
    //             http_response_code(404);
    //             echo "Image not found.";
    //         }
    //     } else {
    //         http_response_code(400);
    //         echo "Invalid request.";
    //     }
    // }






    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = [];

            // Menggunakan null coalescing operator untuk menghindari peringatan undefined array key
            $jenis_barang = $_POST['jenis_barang'] ?? null;
            $no_resi = $_POST['no_resi'] ?? null;
            $nama_kurir = $_POST['nama_kurir'] ?? null;
            $ekspedisi = $_POST['ekspedisi'] ?? null;
            $nama_pemilik = $_POST['nama_pemilik'] ?? null;
            $noHp_pemilik = $_POST['no_hp'] ?? null;
            $email_pemilik = $_POST['email'] ?? null;
            $posisi = $_POST['posisi_barang'] ?? null;
            $waktu_penerimaan = $_POST['tgl_terima'] ?? null;
            // $waktu_penyerahan = $_POST['tgl_serah'] ?? null;
            $waktu_penyerahan = NULL;
            $id_security = $_POST['security'] ?? null;
            $status_barang = 'Belum Diambil';

            // Menambahkan validasi untuk memeriksa apakah setiap variabel memiliki nilai
            if (empty($jenis_barang)) {
                $errors[] = 'Jenis barang is required.';
                header('Location:' . BASE_URL . 'serahTerima/dataBarang');
            } else if (empty($no_resi)) {
                $errors[] = 'Nomor resi is required.';
            } else if (empty($nama_kurir)) {
                $errors[] = 'Nama kurir is required.';
            } else if (empty($nama_pemilik)) {
                $errors[] = 'Nama pemilik is required.';
            } else if (empty($noHp_pemilik)) {
                $errors[] = 'Nomor HP is required.';
            } else if (empty($waktu_penerimaan)) {
                $errors[] = 'Waktu penerimaan is required.';
            } else if (empty($id_security)) {
                $errors[] = 'Security is required.';
            } else if (empty($_FILES['foto_barang']['tmp_name'])) {
                $errors[] = 'Foto barang is required.';
                header('Location:' . BASE_URL . 'serahTerima/dataBarang');
            } else {
                // Validasi tipe dan ukuran file
                $allowedTypes = ['image/jpeg', 'image/png'];
                $fileType = $_FILES['foto_barang']['type'];
                $fileSize = $_FILES['foto_barang']['size'];
                $maxFileSize = 2 * 1024 * 1024; // 2 MB

                if (!in_array($fileType, $allowedTypes)) {
                    $errors[] = 'Foto barang must be a JPEG or PNG image.';
                }

                if ($fileSize > $maxFileSize) {
                    $errors[] = 'Foto barang must be less than 2 MB.';
                }

                if ($_FILES['foto_barang']['error'] != 0) {
                    $errors[] = 'Error uploading foto barang: ' . $_FILES['foto_barang']['error'];
                }
            }

            if (empty($errors)) {
                $foto_barang = file_get_contents($_FILES['foto_barang']['tmp_name']);

                // Insert data into tables
                $id_barang = $this->serahTerimaModel->insertBarang($jenis_barang, $no_resi, $foto_barang);
                $id_kurir = $this->serahTerimaModel->insertKurir($nama_kurir, $ekspedisi);
                $id_pemilik = $this->serahTerimaModel->insertPemilik($nama_pemilik, $noHp_pemilik, $email_pemilik);

                $result = $this->serahTerimaModel->insertSerahTerima($posisi, $status_barang, $waktu_penerimaan, $waktu_penyerahan, $id_barang, $id_kurir, $id_pemilik, $id_security);

                if ($result) {
                    header('Location:' . BASE_URL . 'serahTerima/dataBarang');
                    exit;
                } else {
                    header('Location:' . BASE_URL . 'serahTerima/dataBarang');
                    // echo "Error: " . $this->serahTerimaModel->conn->error;
                }
            } else {
                foreach ($errors as $error) {
                    echo $error . '<br>';
                }
            }
        }
    }

    public function hapusData()
    {
        $id = $_GET['id'];
        $result = $this->serahTerimaModel->hapusDataSerahTerima($id);
        if ($result) {
            header('Location:' . BASE_URL . 'serahTerima/dataBarang');
        } else {
            header('Location:' . BASE_URL . 'serahTerima/dataBarang');
        }
    }

    // public function editBarang($id_serah_terima)
    // {
    //     $data['serah_terima'] = $this->serahTerimaModel->getSerahTerimaById($id_serah_terima);
    //     $data['security_names'] = $this->serahTerimaModel->getNamaSecurity();
    //     $this->view('dashboard/editDataBarang', $data);
    // }




    public function detailData()
    {
        $id_serah_terima = $_GET['id'];
        if ($id_serah_terima) {
            // echo "<script>alert('ID Ditemukan!');</script>";  
            $data['serah_terima'] = $this->serahTerimaModel->getSerahTerimaById($id_serah_terima);
            $data['security_names'] = $this->serahTerimaModel->getNamaSecurity($id_serah_terima);
            // Memuat view dengan data
            $this->loadLayout('header');
            $this->loadView('dashboard/CrudBarang/detailDataBarang', $data, $this);
            $this->loadLayout('footer');

        } else {
            // Menampilkan alert jika ID gagal ditemukan
            echo "<script>alert('ID Gagal Ditemukan!');</script>";
        }
    }


    // public function viewUpdateStatus()
    // {
    //     $id_serah_terima = $_GET['id'];
    //     $this->loadLayout('header');
    //     $this->loadViewCrud('dashboard/CrudBarang/updateStatusBarang', $this);
    //     $this->loadLayout('footer');
    // }

    public function viewUpdateStatus()
    {
        $id_serah_terima = isset($_GET['id']) ? $_GET['id'] : '';
        $this->loadLayout('header');
        $this->loadViewCrud('dashboard/CrudBarang/updateStatusBarang', ['id_serah_terima' => $id_serah_terima]);
        $this->loadLayout('footer');
    }



    public function updateStatus()
    {
        $id_serah_terima = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $errors = [];
            $status_barang = 'Sudah Diambil';
            $waktu_penyerahan = $_POST['tgl_serah'] ?? null;

            if (empty($waktu_penyerahan)) {
                $errors[] = 'waktu_penyerahan tidak ada.';
            }
            $result = $this->serahTerimaModel->updateStatusSerahTerima($id_serah_terima, $status_barang, $waktu_penyerahan);

            if ($result) {
                header('Location:' . BASE_URL . 'serahTerima/dataBarang');
                exit;
            } else {
                header('Location:' . BASE_URL . 'serahTerima/dataBarang');
            }
        }

    }




    public function editBarang()
    {
        // Mengambil ID dari query string
        $id_serah_terima = $_GET['id'];
        if ($id_serah_terima) {
            echo "<script>alert('ID Ditemukan!');</script>";
            $data['serah_terima'] = $this->serahTerimaModel->getSerahTerimaById($id_serah_terima);
            $data['security_names'] = $this->serahTerimaModel->getNamaSecurity($id_serah_terima);
            // Memuat view dengan data
            $this->loadLayout('header');
            $this->loadView('dashboard/CrudBarang/editDataBarang', $data, $this);
            $this->loadLayout('footer');

        } else {
            // Menampilkan alert jika ID gagal ditemukan
            echo "<script>alert('ID Gagal Ditemukan!');</script>";
        }
    }


    public function updateBarang()
    {
        echo 'test';

        var_dump($_POST);
        // $id = $_GET['id'];
        // $result = $this->serahTerimaModel->getSerahTerimaById($id);

        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //     $id_serah_terima = $_POST['id_serah_terima'];
        //     $jenis_barang = $_POST['jenis_barang'];
        //     $no_resi = $_POST['no_resi'];
        //     $nama_kurir = $_POST['nama_kurir'];
        //     $ekspedisi = $_POST['ekspedisi'];
        //     $nama_pemilik = $_POST['nama_pemilik'];
        //     $noHp_pemilik = $_POST['no_hp'];
        //     $email_pemilik = $_POST['email'];
        //     $posisi = $_POST['posisi_barang'];
        //     $waktu_penerimaan = $_POST['tgl_terima'];
        //     $waktu_penyerahan = $_POST['tgl_serah'];
        //     $id_security = $_POST['security'];
        //     $status_barang = 'Belum Diambil';

        //     // Dapatkan ID barang, kurir, dan pemilik dari serah terima
        //     $serahTerima = $this->serahTerimaModel->getSerahTerimaById($id_serah_terima);
        //     $id_barang = $serahTerima['id_barang'];
        //     $id_kurir = $serahTerima['id_kurir'];
        //     $id_pemilik = $serahTerima['id_pemilik'];

        //     // Pembaruan tabel terkait
        //     $foto_barang = file_get_contents($_FILES['foto_barang']['tmp_name']);
        //     $this->serahTerimaModel->updateBarang($id_barang, $jenis_barang, $no_resi, $foto_barang);
        //     $this->serahTerimaModel->updateKurir($id_kurir, $nama_kurir, $ekspedisi);
        //     $this->serahTerimaModel->updatePemilik($id_pemilik, $nama_pemilik, $noHp_pemilik, $email_pemilik);

        //     // Pembaruan tabel serah_terima
        //     $result = $this->serahTerimaModel->updateSerahTerima($id_serah_terima, $posisi, $status_barang, $waktu_penerimaan, $waktu_penyerahan, $id_barang, $id_kurir, $id_pemilik, $id_security);

        //     if ($result) {
        //         header('Location: ' . BASE_URL . 'serahTerima/dataBarang');
        //     } else {
        //         echo "Error updating data.";
        //     }
        // }
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
    private function loadViewCrud($view, $data = [])
    {
        $viewPath = "../app/views/$view.php";
        if (file_exists($viewPath)) {
            extract($data); // Menjadikan data sebagai variabel individual
            include $viewPath;
        } else {
            echo "View file not found: $viewPath";
        }
    }

    private function loadLayout($layout)
    {
        require_once "../app/views/dashboard/layout/$layout.php";

    }
}
?>