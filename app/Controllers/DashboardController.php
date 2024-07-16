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
        $jmlBarangBelumDiambil = $this->model('DashboardModel')->countDataByStatus();
        $title = "Dashboard";

        $this->loadHeader('header', $title, ['isActive' => [$this, 'isActive']]);
        $this->loadNavbar('navbar',$title);
        $this->view('dashboard/dashboard', [
            'jmlBarangMasuk' => $jmlBarangMasuk, 
            'jmlBarangKeluar' => $jmlBarangKeluar,
            'jmlBarangBelumDiambil' => $jmlBarangBelumDiambil
        ]);
        $this->loadFooter('footer');
    }
}
?>