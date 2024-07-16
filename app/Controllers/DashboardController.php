<?php
class DashboardController extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['username'])) {
            header('Location: ' . BASE_URL . 'auth/login');
            exit;
        }

        $jmlBarangMasuk = $this->model('DashboardModel')->countDataByWaktuTerima();
        $jmlBarangKeluar = $this->model('DashboardModel')->countDataByWaktuSerah();
        $title = "Dashboard";

        $this->loadHeader('header', $title, ['isActive' => [$this, 'isActive']]);
        $this->loadNavbar('navbar',$title);
        $this->view('dashboard/dashboard', [
            'jmlBarangMasuk' => $jmlBarangMasuk, 
            'jmlBarangKeluar' => $jmlBarangKeluar
        ]);
        $this->loadFooter('footer');
    }
}
?>