<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailModel extends Model
{
    private $mailer;
    protected $conn; // Menambahkan properti conn

    public function __construct($db)
    {
        $this->conn = $db; // Menginisialisasi properti conn dengan koneksi database
        $this->mailer = new PHPMailer(true);
    }

    public function sendNotification($to, $subject, $body)
    {
        try {
            $this->mailer->isSMTP();
            $this->mailer->Host = 'smtp.gmail.com';
            $this->mailer->SMTPAuth = true;
            $this->mailer->Username = 'azkaarifan13@gmail.com'; // Ganti dengan email Anda
            $this->mailer->Password = 'nvrvecfiohjaaxcd'; // Ganti dengan password aplikasi yang benar
            $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mailer->Port = 587;

            $this->mailer->setFrom('azkaarifan13@gmail.com', 'Surat Paket');
            $this->mailer->addAddress($to);

            $this->mailer->isHTML(true);
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $body;

            return $this->mailer->send();
        } catch (Exception $e) {
            echo 'Mailer Error: ' . $this->mailer->ErrorInfo; // Menampilkan pesan kesalahan
            return false;
        }
    }

    public function getSerahTerimaById($id_serah_terima)
    {
        $query = "SELECT st.*, b.*, k.*, p.*, s.nama_security 
              FROM serah_terima st
              JOIN kurir k ON st.id_kurir = k.id_kurir 
              JOIN barang b ON st.id_barang = b.id_barang 
              JOIN pemilik p ON st.id_pemilik = p.id_pemilik
              JOIN security s ON st.id_security = s.id_security
              WHERE st.id_serah_terima = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id_serah_terima);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateStatusNotif($status, $id_serah_terima)
    {
        $query = "UPDATE serah_terima 
                  SET status_notifikasi = ?
                  WHERE id_serah_terima = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $status, $id_serah_terima);
        $stmt->execute();
        $stmt->close();
    }
}
