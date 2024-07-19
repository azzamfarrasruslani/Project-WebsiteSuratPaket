<?php

class SerahTerimaModel extends Model
{
    public function getPenyerahanTerimaan($search, $order, $orderType, $limit, $offset)
    {
        $query = "SELECT st.*, b.*, k.*, p.*, s.nama_security
                  FROM serah_terima st
                  JOIN kurir k ON st.id_kurir = k.id_kurir 
                  JOIN barang b ON st.id_barang = b.id_barang 
                  JOIN pemilik p ON st.id_pemilik = p.id_pemilik
                  JOIN security s ON st.id_security = s.id_security
                  WHERE 1";

        if ($search) {
            $query .= " AND (st.posisi LIKE '%$search%' OR st.status_barang LIKE '%$search%' OR k.nama_kurir LIKE '%$search%')";
        }

        $query .= " ORDER BY $order $orderType LIMIT $limit OFFSET $offset";

        $result = $this->conn->query($query);
        $data = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    public function getNamaSecurity()
    {
        $query = "SELECT id_security, nama_security FROM security";

        $result = $this->conn->query($query);
        $data = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }


    public function insertBarang($jenis_barang, $no_resi, $foto_barang)
    {
        $sql = "INSERT INTO barang (jenis_barang, no_resi, foto_barang) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $jenis_barang, $no_resi, $foto_barang);
        $stmt->execute();
        return $this->conn->insert_id;
    }

    public function insertKurir($nama_kurir, $ekspedisi)
    {
        $sql = "INSERT INTO kurir (nama_kurir, ekspedisi) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $nama_kurir, $ekspedisi);
        if ($stmt->execute()) {
            return $this->conn->insert_id;
        } else {
            return false;
        }
    }

    public function insertPemilik($nama_pemilik, $noHp_pemilik, $email_pemilik)
    {
        $sql = "INSERT INTO pemilik (nama_pemilik, noHp_pemilik, email_pemilik) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $nama_pemilik, $noHp_pemilik, $email_pemilik);
        $stmt->execute();
        return $this->conn->insert_id;
    }

    // private function getSecurityIdByName($nama_security)
    // {
    //     $query = "SELECT id_security FROM security WHERE nama_security =?";
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->bind_param("s", $nama_security);
    //     $stmt->execute();
    //     $result = $stmt->get_result();
    //     $row = $result->fetch_assoc();
    //     return $row['id_security'];
    // }

    public function insertSerahTerima($posisi, $status_barang, $waktu_penerimaan, $waktu_penyerahan, $id_barang, $id_kurir, $id_pemilik,$id_security)
    {
        $sql = "INSERT INTO serah_terima (posisi, status_barang, waktu_penerimaan, waktu_penyerahan, id_barang, id_kurir, id_pemilik, id_security) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssiiii", $posisi, $status_barang, $waktu_penerimaan, $waktu_penyerahan, $id_barang, $id_kurir, $id_pemilik, $id_security);
        $stmt->execute();
        return $stmt->affected_rows;
    }

    public function hapusdataKurir($id_kurir) {
        $sql = "DELETE FROM kurir WHERE id_kurir = ?"; // Query untuk menghapus data kurir
        $stmt = $this->conn->prepare($sql); // Persiapkan statement
        $stmt->bind_param("i", $id_kurir); // Bind parameter
        $stmt->execute(); // Eksekusi query
        return $stmt->affected_rows; // Kembalikan jumlah baris yang terpengaruh
    }
    
    public function hapusdataBarang($id_barang) {
        $sql = "DELETE FROM barang WHERE id_barang = ?"; 
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_barang);
        $stmt->execute(); 
        return $stmt->affected_rows; 
    }
    
    public function hapusdataPemilik($id_pemilik) {
        $sql = "DELETE FROM pemilik WHERE id_pemilik = ?"; 
        $stmt = $this->conn->prepare($sql); 
        $stmt->bind_param("i", $id_pemilik); 
        $stmt->execute(); 
        return $stmt->affected_rows; 
    }
    
    public function hapusDataSerahTerima($id_serah_terima)
    {
        $sql = "DELETE FROM serah_terima WHERE id_serah_terima = ?"; 
        $stmt = $this->conn->prepare($sql); 
        $stmt->bind_param("i", $id_serah_terima); 
        $stmt->execute(); 
        return $stmt->affected_rows; 
    }

    public function updateStatusSerahTerima($id_serah_terima, $status_barang, $waktu_penyerahan)
    {
        $sql = "UPDATE serah_terima SET status_barang = ?, waktu_penyerahan = ? WHERE id_serah_terima = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $status_barang, $waktu_penyerahan, $id_serah_terima);
        return $stmt->execute();
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

    // public function getImage($id_serah_terima) {
    //     $query = "SELECT b.foto_barang FROM serah_terima st 
    //     JOIN barang b ON st.id_barang = b.id_barang 
    //     WHERE id_serah_terima = ?";
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->bind_param("i", $id_serah_terima);
    //     $stmt->execute();
    //     $result = $stmt->get_result();
    //     if ($result->num_rows > 0) {
    //         $row = $result->fetch_assoc();
    //         return $row['foto_barang'];
    //     } else {
    //         return false; // jika data tidak ditemukan
    //     }
    // }

    public function getImageById($id_serah_terima)
    {
        $query = "SELECT b.foto_barang 
              FROM serah_terima st 
              JOIN barang b ON st.id_barang = b.id_barang 
              WHERE st.id_serah_terima = ?";

        $stmt = $this->conn->prepare($query);
        if ($stmt) {
            $stmt->bind_param('i', $id_serah_terima);
            $stmt->execute();
            $foto_barang = null;
            $stmt->bind_result($foto_barang);
            $stmt->fetch();
            $stmt->close();
            return $foto_barang ? $foto_barang : null;
        } else {
            return null;
        }
    }


    

    public function updateBarang($id_barang, $jenis_barang, $no_resi, $foto_barang)
    {
        $sql = "UPDATE barang SET jenis_barang = ?, no_resi = ?, foto_barang = ? WHERE id_barang = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssi", $jenis_barang, $no_resi, $foto_barang, $id_barang);
        return $stmt->execute();
    }

    public function updateKurir($id_kurir, $nama_kurir, $ekspedisi)
    {
        $sql = "UPDATE kurir SET nama_kurir = ?, ekspedisi = ? WHERE id_kurir = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $nama_kurir, $ekspedisi, $id_kurir);
        return $stmt->execute();
    }

    public function updatePemilik($id_pemilik, $nama_pemilik, $noHp_pemilik, $email_pemilik)
    {
        $sql = "UPDATE pemilik SET nama_pemilik = ?, noHp_pemilik = ?, email_pemilik = ? WHERE id_pemilik = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssi", $nama_pemilik, $noHp_pemilik, $email_pemilik, $id_pemilik);
        return $stmt->execute();
    }

    public function updateSerahTerima($id_serah_terima, $posisi, $status_barang, $waktu_penerimaan, $waktu_penyerahan, $id_barang, $id_kurir, $id_pemilik, $id_security)
    {
        // $security_id = $this->getSecurityIdByName($nama_security);
        // if (!$security_id) {
        //     throw new Exception("Security with name $nama_security does not exist");
        // }
        $query = "UPDATE serah_terima 
                  SET posisi = ?, status_barang = ?, waktu_penerimaan = ?, waktu_penyerahan = ?, id_barang = ?, id_kurir = ?, id_pemilik = ?, id_security = ?
                  WHERE id_serah_terima = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssiiiii", $posisi, $status_barang, $waktu_penerimaan, $waktu_penyerahan, $id_barang, $id_kurir, $id_pemilik, $id_security, $id_serah_terima);
        return $stmt->execute();
    }


  

}

