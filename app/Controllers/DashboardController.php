<?php
class DashboardController extends Controller
{public function index()
    {
        if (!isset($_SESSION['username'])) {
            header('Location: ' . BASE_URL . 'auth/login');
            exit;
        }
    
        $jmlBarangMasuk = $this->model('DashboardModel')->countDataByWaktuTerima();
        $jmlBarangKeluar = $this->model('DashboardModel')->countDataByWaktuSerah();
        $jmlBarangBelumDiambil = $this->model('DashboardModel')->countDataByStatus('Belum Diambil');
        $jmlBarangSudahDiambil = $this->model('DashboardModel')->countDataByStatus('Sudah Diambil');
        $dataRiwayat = $this->model('DashboardModel')->getActivityLog($_SESSION['id_security']);
        $title = "Dashboard";
    
        $this->loadHeader('header', $title, ['isActive' => [$this, 'isActive']]);
        $this->loadNavbar('navbar', $title);
        $this->view('dashboard/dashboard', [
            'jmlBarangMasuk' => $jmlBarangMasuk, 
            'jmlBarangKeluar' => $jmlBarangKeluar,
            'jmlBarangBelumDiambil' => $jmlBarangBelumDiambil,
            'jmlBarangSudahDiambil' => $jmlBarangSudahDiambil,
            'dataRiwayat' => $dataRiwayat
        ]);
        $this->loadFooter('footer');
    }
    


}
?>