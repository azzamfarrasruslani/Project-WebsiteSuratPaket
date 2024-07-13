<?php
class DashboardController extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['username'])) {
            header('Location: ' . BASE_URL . 'auth/login');
            exit;
        }

        // Panggil fungsi countDataSerahTerima untuk mendapatkan jumlah barang
        $jumlahBarang = $this->model('DashboardModel')->countData();

        // Muat tampilan dan kirim data
        $this->loadView('dashboard/dashboard', ['jumlahBarang' => $jumlahBarang]);
    }

    private function loadView($view, $data)
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
?>