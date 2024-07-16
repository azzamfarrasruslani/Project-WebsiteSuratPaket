<?php
 public function store()
 {
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $errors = [];

         // Menggunakan null coalescing operator untuk menghindari peringatan undefined array key
         $jenis_barang = $_POST['jenis_barang'] ?? null;
         $no_resi = $_POST['no_resi'] ?? null;
         $nama_kurir = $_POST['nama_kurir'] ?? null;
         $ekspedisi = $_POST['ekspedisi'] ?? null;
         $nama_pemilik = $_POST['nama_pemilik'] ?? null;
         $noHp_pemilik = $_POST['no_hp'] ?? null;
         $email_pemilik = $_POST['email'] ?? null;
         $posisi = $_POST['posisi_barang'] ?? null;
         $waktu_penerimaan = $_POST['tgl_terima'] ?? null;
         // $waktu_penyerahan = $_POST['tgl_serah'] ?? null;
         $waktu_penyerahan = NULL;
         $id_security = $_POST['security'] ?? null;
         $status_barang = 'Belum Diambil';

         // Menambahkan validasi untuk memeriksa apakah setiap variabel memiliki nilai
         if (empty($jenis_barang)) {
             $errors[] = 'Jenis barang is required.';
             header('Location:' . BASE_URL . 'serahTerima/dataBarang');
         } else if (empty($no_resi)) {
             $errors[] = 'Nomor resi is required.';
         } else if (empty($nama_kurir)) {
             $errors[] = 'Nama kurir is required.';
         } else if (empty($nama_pemilik)) {
             $errors[] = 'Nama pemilik is required.';
         } else if (empty($noHp_pemilik)) {
             $errors[] = 'Nomor HP is required.';
         } else if (empty($waktu_penerimaan)) {
             $errors[] = 'Waktu penerimaan is required.';
         } else if (empty($id_security)) {
             $errors[] = 'Security is required.';
         } else if (empty($_FILES['foto_barang']['tmp_name'])) {
             $errors[] = 'Foto barang is required.';
             header('Location:' . BASE_URL . 'serahTerima/dataBarang');
         } else {
             // Validasi tipe dan ukuran file
             $allowedTypes = ['image/jpeg', 'image/png'];
             $fileType = $_FILES['foto_barang']['type'];
             $fileSize = $_FILES['foto_barang']['size'];
             $maxFileSize = 2 * 1024 * 1024; // 2 MB

             if (!in_array($fileType, $allowedTypes)) {
                 $errors[] = 'Foto barang must be a JPEG or PNG image.';
             }

             if ($fileSize > $maxFileSize) {
                 $errors[] = 'Foto barang must be less than 2 MB.';
             }

             if ($_FILES['foto_barang']['error'] != 0) {
                 $errors[] = 'Error uploading foto barang: ' . $_FILES['foto_barang']['error'];
             }
         }

         if (empty($errors)) {

             $foto_barang = file_get_contents($_FILES['foto_barang']['tmp_name']);
             // Insert data into tables
             $id_barang = $this->serahTerimaModel->insertBarang($jenis_barang, $no_resi, $foto_barang);
             $id_kurir = $this->serahTerimaModel->insertKurir($nama_kurir, $ekspedisi);
             $id_pemilik = $this->serahTerimaModel->insertPemilik($nama_pemilik, $noHp_pemilik, $email_pemilik);
             $result = $this->serahTerimaModel->insertSerahTerima($posisi, $status_barang, $waktu_penerimaan, $waktu_penyerahan, $id_barang, $id_kurir, $id_pemilik, $id_security);

             if ($result) {

                 header('Location:' . BASE_URL . 'serahTerima/dataBarang');
                 exit;
             } else {
                 header('Location:' . BASE_URL . 'serahTerima/dataBarang');
                 // echo "Error: " . $this->serahTerimaModel->conn->error;
             }
         } else {
             foreach ($errors as $error) {
                 echo $error . '<br>';
             }
         }
     }
 }


 