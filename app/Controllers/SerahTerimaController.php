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
        $data['security_names'] = $this->serahTerimaModel->getNamaSecurity();
        $title = "Data Paket";
        $this->loadHeader('header', $title, ['isActive' => [$this, 'isActive']]);
        $this->loadNavbar('navbar', $title, $data);
        $this->view('dashboard/dataBarang', $data);
        $this->loadFooter('footer');
    }


    // View Controller Start =====================================================================================================
    public function viewUpdateStatus()
    {
        $id_serah_terima = isset($_GET['id']) ? $_GET['id'] : '';
        $title = 'Update Status';
        $this->loadHeader('header', $title, ['isActive' => [$this, 'isActive']]);
        $this->loadNavbar('navbar', $title);
        $this->view('dashboard/CrudBarang/updateStatusBarang', ['id_serah_terima' => $id_serah_terima]);
        $this->loadFooter('footer');
    }

    public function viewEditBarang()
    {
        // Mengambil ID dari query string
        $id_serah_terima = isset($_GET['id']) ? $_GET['id'] : '';

        if ($id_serah_terima) {

            // Ambil data serah terima dan nama security
            $serah_terima = $this->serahTerimaModel->getSerahTerimaById($id_serah_terima);
            $security_names = $this->serahTerimaModel->getNamaSecurity($id_serah_terima);

            // Encode gambar sebagai base64
            $base64Image = '';
            if (isset($serah_terima['foto_barang'])) {
                $base64Image = base64_encode($serah_terima['foto_barang']);
            }

            // Mengirim data ke view
            $data = [
                'id_serah_terima' => $id_serah_terima,
                'serah_terima' => $serah_terima,
                'security_names' => $security_names,
                'base64Image' => $base64Image
            ];

            // Muat header, navbar, dan view dengan data
            $title = 'Edit Barang';
            $this->loadHeader('header', $title, ['isActive' => [$this, 'isActive']]);
            $this->loadNavbar('navbar', $title);
            $this->view('dashboard/CrudBarang/editDataBarang', $data);
            $this->loadFooter('footer');
        } else {
            // Menampilkan alert jika ID gagal ditemukan
            echo "<script>alert('ID Gagal Ditemukan!');</script>";
        }
    }

    // View Controller End =====================================================================================================


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
            $waktu_penyerahan = NULL;
            $id_security = $_SESSION['id_security'] ?? null;
            $status_barang = 'Belum Diambil';

            // Menambahkan validasi untuk memeriksa apakah setiap variabel memiliki nilai
            if (empty($jenis_barang)) {
                $errors[] = 'Jenis barang is required.';
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
                    Notifikasi::setPesan("Data berhasil ditambahkan", 'success');
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


    public function detailData()
    {
        $id_serah_terima = $_GET['id'];
        if ($id_serah_terima) {
            $data['serah_terima'] = $this->serahTerimaModel->getSerahTerimaById($id_serah_terima);
            // $data['security_names'] = $this->serahTerimaModel->getNamaSecurity($id_serah_terima);
            // Memuat view dengan data
            $title = 'Detail Data';
            $this->loadHeader('header', $title, ['isActive' => [$this, 'isActive']]);
            $this->loadNavbar('navbar', $title);
            $this->view('dashboard/CrudBarang/detailDataBarang', $data);
            $this->loadFooter('footer');

        } else {
            // Menampilkan alert jika ID gagal ditemukan
            echo "<script>alert('ID Gagal Ditemukan!');</script>";
        }
    }


    public function getFotoBarang()
    {
        $id_serah_terima = isset($_GET['id']) ? $_GET['id'] : '';
        var_dump($id_serah_terima); // Debugging output

        if ($id_serah_terima) {
            $foto = $this->serahTerimaModel->getImageById($id_serah_terima);
            // var_dump($foto); // Debugging output

            if ($foto) {
                // Bersihkan output buffer sebelum mengirim header
                if (ob_get_length()) {
                    ob_clean();
                }

                header("Content-type: image/jpeg");
                echo $foto;
            } else {
                echo "<script>alert('Gambar tidak ditemukan!');</script>";
            }
        } else {
            echo "<script>alert('ID Gagal Ditemukan!');</script>";
        }
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






    public function updateBarang()
    {
        $id_serah_terima = $_GET['id'];
        $result = $this->serahTerimaModel->getSerahTerimaById($id_serah_terima);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = []; // Initialize error array
            $id_serah_terima = $_POST['id_serah_terima'] ?? null;
            $jenis_barang = $_POST['jenis_barang'] ?? null;
            $no_resi = $_POST['no_resi'] ?? null;
            $nama_kurir = $_POST['nama_kurir'] ?? null;
            $ekspedisi = $_POST['ekspedisi'] ?? null;
            $nama_pemilik = $_POST['nama_pemilik'] ?? null;
            $noHp_pemilik = $_POST['no_hp'] ?? null;
            $email_pemilik = $_POST['email'] ?? null;
            $posisi = $_POST['posisi_barang'] ?? null;
            $waktu_penerimaan = $_POST['tgl_terima'] ?? null;
            $waktu_penyerahan = $_POST['tgl_serah'] ?? null;
            $id_security = $_POST['id_security'] ?? null;
            $status_barang = $_POST['status_barang'] ?? null;

            // Validate each field
            if (empty($jenis_barang)) {
                $errors[] = 'Jenis barang is required.';
            }
            if (empty($no_resi)) {
                $errors[] = 'Nomor resi is required.';
            }
            if (empty($nama_kurir)) {
                $errors[] = 'Nama kurir is required.';
            }
            if (empty($nama_pemilik)) {
                $errors[] = 'Nama pemilik is required.';
            }
            if (empty($noHp_pemilik)) {
                $errors[] = 'Nomor HP is required.';
            }
            if (empty($waktu_penerimaan)) {
                $errors[] = 'Waktu penerimaan is required.';
            }
            if (empty($id_security)) {
                $errors[] = 'Security is required.';
            }

            // Get IDs from serah terima
            $serahTerima = $this->serahTerimaModel->getSerahTerimaById($id_serah_terima);
            $id_barang = $serahTerima['id_barang'];
            $id_kurir = $serahTerima['id_kurir'];
            $id_pemilik = $serahTerima['id_pemilik'];

            if (empty($errors)) {
                // Update related tables
                $foto_barang = null;
                if (!empty($_FILES['foto_barang']['tmp_name'])) {
                    // Validate file type and size
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

                    if (empty($errors)) {
                        $foto_barang = file_get_contents($_FILES['foto_barang']['tmp_name']);
                    }
                }

                $updateSerahTerimaResult = $this->serahTerimaModel->updateSerahTerima($id_serah_terima, $posisi, $status_barang, $waktu_penerimaan, $waktu_penyerahan, $id_barang, $id_kurir, $id_pemilik, $id_security);
                $updateBarangResult = $this->serahTerimaModel->updateBarang($id_barang, $jenis_barang, $no_resi, $foto_barang);
                $updateKurirResult = $this->serahTerimaModel->updateKurir($id_kurir, $nama_kurir, $ekspedisi);
                $updatePemilikResult = $this->serahTerimaModel->updatePemilik($id_pemilik, $nama_pemilik, $noHp_pemilik, $email_pemilik);

                // Check if all updates were successful
                if ($updateSerahTerimaResult && $updateBarangResult && $updateKurirResult && $updatePemilikResult) {
                    header('Location: ' . BASE_URL . 'serahTerima/dataBarang');
                    exit();
                } else {
                    echo "Error updating data.";
                    var_dump($updateSerahTerimaResult, $updateBarangResult, $updateKurirResult, $updatePemilikResult);
                }
            } else {
                foreach ($errors as $error) {
                    echo $error . "<br>";
                }
            }
        }
    }


    public function hapusData()
    {
        // Mendapatkan ID dari parameter URL
        $id = $_GET['id'];

        // Ambil data serah terima berdasarkan id
        $serahTerima = $this->serahTerimaModel->getSerahTerimaById($id);
        $id_barang = $serahTerima['id_barang'];
        $id_kurir = $serahTerima['id_kurir'];
        $id_pemilik = $serahTerima['id_pemilik'];

        // Hapus data terkait
        // Warning ! : untuk menghapus data perlu untuk menghapus Assosiative Entity nya terlebih dahulu
        $result = $this->serahTerimaModel->hapusDataSerahTerima($id);
        $this->serahTerimaModel->hapusdataBarang($id_barang);
        $this->serahTerimaModel->hapusdataKurir($id_kurir);
        $this->serahTerimaModel->hapusdataPemilik($id_pemilik);

        // Tampilkan pesan sukses atau arahkan ke halaman lain
        if ($result) {
            echo "<script>
                alert('Data Berhasil dihapus!');
                window.location.href='" . BASE_URL . "SerahTerima/dataBarang';
            </script>";
        } else {
            header('Location:' . BASE_URL . 'SerahTerima/dataBarang');
        }
    }

}
