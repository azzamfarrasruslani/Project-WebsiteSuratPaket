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
        $id_security = isset($_GET['id']) ? $_GET['id'] : '';
        $setStatus = '1';
        if ($id_security) {
            $result = $this->userModel->UpdateStatusAkun($setStatus, $id_security);
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profileImage'])) {
            $id_security = $_SESSION['id_security'];

            $file = $_FILES['profileImage'];
            $fileName = $file['name'];
            $fileTmpName = $file['tmp_name'];
            $fileSize = $file['size'];
            $fileError = $file['error'];
            $fileType = $file['type'];

            $fileExt = strtolower(end(explode('.', $fileName)));
            $allowed = array('jpg', 'jpeg', 'png');

            if (in_array($fileExt, $allowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 1000000) { // Batas ukuran file 1MB
                        $fileNameNew = "profile" . $id_security . "." . $fileExt;
                        $fileDestination = 'uploads/' . $fileNameNew;

                        if (move_uploaded_file($fileTmpName, $fileDestination)) {
                            $result = $this->userModel->updateFotoProfile($id_security, $fileNameNew);
                            if ($result) {
                                $_SESSION['success'] = "Foto profil berhasil diperbarui.";
                            } else {
                                $_SESSION['error'] = "Terjadi kesalahan saat memperbarui data di database.";
                            }
                        } else {
                            $_SESSION['error'] = "Terjadi kesalahan saat mengunggah file.";
                        }
                    } else {
                        $_SESSION['error'] = "Ukuran file terlalu besar.";
                    }
                } else {
                    $_SESSION['error'] = "Terjadi kesalahan saat mengunggah file.";
                }
            } else {
                $_SESSION['error'] = "Jenis file tidak diperbolehkan.";
            }
        } else {
            $_SESSION['error'] = "Tidak ada file yang diunggah.";
        }

        header("Location: " . BASE_URL . "user/viewProfile");
        exit;
    }



}


