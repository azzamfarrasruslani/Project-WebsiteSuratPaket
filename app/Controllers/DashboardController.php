<?php
class DashboardController extends Controller
{
    private $dashboardModel;

    public function __construct($db)
    {
        parent::__construct($db); // Memanggil konstruktor parent
        $this->dashboardModel = $this->model('DashboardModel');
    }
    public function index()
    {
        if (!isset($_SESSION['username'])) {
            header('Location: ' . BASE_URL . 'auth/login');
            exit;
        }

        $jmlBarangMasuk = $this->dashboardModel->countDataByWaktuTerima();
        $jmlBarangKeluar = $this->dashboardModel->countDataByWaktuSerah();
        $jmlBarangBelumDiambil = $this->dashboardModel->countDataByStatus('Belum Diambil');
        $jmlBarangSudahDiambil = $this->dashboardModel->countDataByStatus('Sudah Diambil');
        $dataRiwayat = $this->dashboardModel->getActivityLog($_SESSION['id_security']);
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
