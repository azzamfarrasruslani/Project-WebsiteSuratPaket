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
        $jmlBarangMasuk = $this->model('DashboardModel')->countDataByWaktuTerima();
        $jmlBarangKeluar = $this->model('DashboardModel')->countDataByWaktuSerah();

        // Muat tampilan dan kirim data
        $this->loadView('dashboard/dashboard', ['jmlBarangMasuk' => $jmlBarangMasuk, 'jmlBarangKeluar' => $jmlBarangKeluar]);
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