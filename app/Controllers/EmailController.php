<?php


class EmailController extends Controller
{
    private $emailModel;

    public function __construct($db)
    {
        parent::__construct($db);
        $this->emailModel = $this->model('EmailModel');
    }

    public function sendNotification()
    {
        $id_serah_terima = $_GET['id'];
        $data = $this->emailModel->getSerahTerimaById($id_serah_terima);
        $to = 'azkaarifan13@gmail.com'; // Ganti dengan email tujuan yang benar
        $subject = 'Pemberitahuan Penerimaan Surat/Paket';
        $body = '
            <p>Yth. Bapak/Ibu,</p>
            <p>Dengan hormat,</p>
            <p>Ini untuk memberitahukan bahwa surat atau paket atas nama Anda telah tiba di Politeknik Caltex Riau.</p>
            <p>Detail penerimaan adalah sebagai berikut:</p>
            <ul>
                <li><strong>Nomor Resi:</strong> ' . $data['no_resi'] . '</li>
                <li><strong>Jenis Surat/Paket:</strong> ' . $data['jenis_barang'] . '</li>
                <li><strong>Tanggal Penerimaan:</strong> ' . $data['waktu_penerimaan'] . '</li>
            </ul>
            <p>Silakan datang ke lokasi penerimaan atau hubungi kami jika Anda memerlukan informasi lebih lanjut.</p>
            <p>Terima kasih atas perhatian Anda.</p>
            <p>Hormat kami,<br>Tim Administrasi Politeknik Caltex Riau</p>
        ';

        if ($this->emailModel->sendNotification($to, $subject, $body)) {
            $this->emailModel->updateStatusNotif(1, $id_serah_terima); // Mengubah status notifikasi menjadi 1
            Notifikasi::setPesan('Notifikasi Berhasil Dikirim!', 'success');
            header('Location:' . BASE_URL . 'SerahTerima/dataBarang');
            exit;
        } else {
            Notifikasi::setPesan("Data berhasil ditambahkan", 'error');
            header('Location:' . BASE_URL . 'SerahTerima/dataBarang');
        }

        header("Location: {$_SERVER["HTTP_REFERER"]}");
        exit(0);
    }

}