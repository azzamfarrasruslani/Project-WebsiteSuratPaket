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
        $id_security = isset($_SESSION['id_security']) ? $_SESSION['id_security'] : '';
        if ($id_security) {
            $data_security['data_security'] = $this->userModel->getDataUserById($id_security);
            $title = "Profile";
            $this->loadHeader('header', $title, ['isActive' => [$this, 'isActive']]);
            $this->loadNavbar('navbar', $title, $data_security);
            $this->view('dashboard/profile', $data_security);
            $this->loadFooter('footer');
        }

    }

    public function aktifkanAkun()
    {
        $this->checkRole('admin'); // Memeriksa peran admin
        $id_security = isset($_GET['id']) ? $_GET['id'] : '';
        $setStatus = '1';
        if ($id_security) {
            $result = $this->userModel->UpdateStatusAkun($setStatus, $id_security);
            if ($result) {
                Notifikasi::setPesan('You have successfully implemented SweetAlert2 in your PHP MVC project!');
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
        $this->checkRole('admin'); // Memeriksa peran admin
        $id_security = isset($_GET['id']) ? $_GET['id'] : '';
        $setStatus = '0';
        if ($id_security) {
            $result = $this->userModel->UpdateStatusAkun($setStatus, $id_security);
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

    public function viewInsertDataUser()
    {
        $title = 'Insert User';
        $this->loadHeader('header', $title, ['isActive' => [$this, 'isActive']]);
        $this->loadNavbar('navbar', $title);
        $this->view('dashboard/CrudUser/inputDataUser');
        $this->loadFooter('footer');
    }

    public function insertDataUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = [];
            $nama_security = $_POST['nama_security'] ?? null;
            $noHp_security = $_POST['noHp_security'] ?? null;
            $username = $_POST['username'] ?? null;
            $password = $_POST['password'] ?? null;
            $role = $_POST['role'] ?? null;

            if (empty($nama_security)) {
                $errors[] = 'Nama Security is required.';
            }
            if (empty($noHp_security)) {
                $errors[] = 'Nomor HP is required.';
            }
            if (empty($username)) {
                $errors[] = 'Username is required.';
            }
            if (empty($password)) {
                $errors[] = 'Password is required.';
            }
            if (empty($role)) {
                $errors[] = 'Role is required.';
            }


            if (empty($errors)) {
                $result = $this->userModel->insertSecurity($nama_security, $noHp_security, $username, $password, $role);

                if ($result) {
                    header('Location:' . BASE_URL . 'User/dataUser');
                    exit;
                } else {
                    header('Location:' . BASE_URL . 'User/dataUser');
                }
            }
        }
    }


    public function updateFotoProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['foto_profile'])) {
            $errors = [];
            $id_security = $_SESSION['id_security'];

            if (!empty($_FILES['foto_profile']['tmp_name'])) {
                $allowedTypes = ['image/jpeg', 'image/png'];
                $fileType = $_FILES['foto_profile']['type'];
                $fileSize = $_FILES['foto_profile']['size'];
                $maxFileSize = 2 * 1024 * 1024; // 2 MB

                if (!in_array($fileType, $allowedTypes)) {
                    $errors[] = 'Foto profile must be a JPEG or PNG image.';
                }

                if ($fileSize > $maxFileSize) {
                    $errors[] = 'Foto profile must be less than 2 MB.';
                }

                if ($_FILES['foto_profile']['error'] != 0) {
                    $errors[] = 'Error uploading foto profile: ' . $_FILES['foto_profile']['error'];
                }

                if (empty($errors)) {
                    $foto_profile = file_get_contents($_FILES['foto_profile']['tmp_name']);
                }
            }

            if (empty($errors)) {
                $updateFotoProfile = $this->userModel->updateFotoProfile($foto_profile, $id_security);

                if ($updateFotoProfile) {
                    header('Location:' . BASE_URL . 'User/profile');
                    exit;
                } else {
                    echo "<script>alert('foto gagal diupdate!');</script>";
                }
            } else {
                foreach ($errors as $error) {
                    echo "<script>alert('$error');</script>";
                }
            }
        } else {
            echo "<script>alert('No file uploaded.');</script>";
        }
    }

    public function viewGantiPassword()
    {
        $id_security = isset($_GET['id']) ? $_GET['id'] : '';
        $title = 'Ganti Password';
        $this->loadHeader('header', $title, ['isActive' => [$this, 'isActive']]);
        $this->loadNavbar('navbar', $title);
        $this->view('dashboard/CrudUser/gantiPasswordUser', ['id_security' => $id_security]);
        $this->loadFooter('footer');
    }

    // Ganti password method
    public function gantiPassword()
    {
        $id_security = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = [];
            $password_sekarang = $_POST['password_sekarang'] ?? null;
            $password_baru = $_POST['password_baru'] ?? null;
            $password_konfirmasi = $_POST['password_konfirmasi'] ?? null;

            // Mendapatkan data user berdasarkan username dari session
            $dataUser = $this->userModel->getUserByUsername($_SESSION['username']);

            // Verifikasi password sekarang dan kesesuaian password baru
            if ($dataUser['password'] === md5($password_sekarang) && $password_baru === $password_konfirmasi) {
                // Hash password baru sebelum menyimpannya ke database
                $hashedPassword = md5($password_baru);
                $result = $this->userModel->updatePassword($hashedPassword, $id_security);

                if ($result) {
                    Notifikasi::setPesan('Password berhasil diubah!');
                    header('Location:' . BASE_URL . 'User/profile');
                    exit;
                } else {
                    $_SESSION['error'] = 'Terjadi kesalahan saat mengubah password.';
                    header('Location:' . BASE_URL . 'User/profile');
                    exit;
                }
            } else {
                $_SESSION['error'] = 'Password sekarang salah atau konfirmasi password tidak cocok.';
                $title = 'Ganti Password';
                $this->loadHeader('header', $title, ['isActive' => [$this, 'isActive']]);
                $this->loadNavbar('navbar', $title);
                $this->view('dashboard/CrudUser/gantiPasswordUser', ['id_security' => $id_security]);
                $this->loadFooter('footer');
            }
        }
    }




}





