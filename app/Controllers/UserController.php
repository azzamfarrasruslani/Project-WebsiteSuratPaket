<?php
class UserController extends Controller
{
    private $userModel;

    public function __construct($db)
    {
        parent::__construct($db); // Memanggil konstruktor parent
        $this->userModel = $this->model('UserModel');
    }

    public function index()
    {
        $this->viewProfile();
    }

    public function dataUser()
    {
        $this->checkRole('admin'); // Memeriksa peran admin
        $title = "Data User";

        $data['security'] = $this->userModel->getDataUser();


        $this->loadHeader('header', $title, ['isActive' => [$this, 'isActive']]);
        $this->loadNavbar('navbar', $title, $data);
        $this->view('dashboard/dataUser', $data);
        $this->loadFooter('footer');
    }

    public function viewProfile()
    {
        $title = "Profile";
        $this->loadHeader('header', $title, ['isActive' => [$this, 'isActive']]);
        $this->loadNavbar('navbar', $title);
        $this->view('dashboard/profile');
        $this->loadFooter('footer');
    }

    public function aktifkanAkun()
    {
        $id_security = isset($_GET['id']) ? $_GET['id'] : '';
        $setStatus = '1';
        if ($id_security) {
            $result = $this->userModel->UpdateStatusAkun( $setStatus, $id_security);
            if ($result) {
                header('Location:' . BASE_URL . 'user/dataUser');
                exit;
            } else {
                echo "<script>alert('Status gagal di update');</script>";
                header('Location:' . BASE_URL . 'user/dataUser');
            }
        } else {
            echo "<script>alert('id security tidak ditemukan');</script>";
        }

    }
    public function nonAktifkanAkun()
    {
        $id_security = isset($_GET['id']) ? $_GET['id'] : '';
        $setStatus = '0';
        if ($id_security) {
            $result = $this->userModel->UpdateStatusAkun( $setStatus, $id_security);
            if ($result) {
                header('Location:' . BASE_URL . 'User/dataUser');
                exit;
            } else {
                echo "<script>alert('Status gagal di update');</script>";
                header('Location:' . BASE_URL . 'User/dataUser');
            }
        } else {
            echo "<script>alert('id security tidak ditemukan');</script>";
        }

    }


    public function getFotoProfile()
    {
        $id_security = isset($_GET['id']) ? $_GET['id'] : '';
        var_dump($id_security); // Debugging output

        if ($id_security) {
            $foto = $this->userModel->getImageById($id_security);
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

    public function viewInsertData()
    {
        $title = 'Insert User';
        $this->loadHeader('header', $title, ['isActive' => [$this, 'isActive']]);
        $this->loadNavbar('navbar', $title);
        $this->view('dashboard/CrudUser/inputDataUser');
        $this->loadFooter('footer');
    }

   


}


