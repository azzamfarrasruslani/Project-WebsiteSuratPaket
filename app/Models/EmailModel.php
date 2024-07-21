<?php


// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailModel {
    private $mailer;

    public function __construct() {
        $this->mailer = new PHPMailer(true);
    }

    public function sendNotification($to, $subject, $body) {
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
}