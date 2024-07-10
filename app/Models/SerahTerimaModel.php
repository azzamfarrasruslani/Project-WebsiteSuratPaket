<?php

class SerahTerimaModel extends Model
{
    public function getPenyerahanTerimaan($search, $order, $orderType, $limit, $offset)
    {
        $query = "SELECT st.id_serah_terima, b.no_resi, b.jenis_barang, p.nama_pemilik, p.noHp_pemilik, st.posisi, 
                  st.status_barang, st.waktu_penerimaan, st.waktu_penyerahan, s.nama_security
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

    public function getFotoBarang($id_barang)
{
    $query = "SELECT foto_barang FROM barang WHERE id_barang = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("i", $id_barang);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['foto_barang'];
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

    private function getSecurityIdByName($nama_security)
    {
        $query = "SELECT id_security FROM security WHERE nama_security =?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $nama_security);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['id_security'];
    }

    public function insertSerahTerima($posisi, $status_barang, $waktu_penerimaan, $waktu_penyerahan, $id_barang, $id_kurir, $id_pemilik, $nama_security)
{
    $security_id = $this->getSecurityIdByName($nama_security);
    if (!$security_id) {
        throw new Exception("Security with name $nama_security does not exist");
    }
    
    $sql = "INSERT INTO serah_terima (posisi, status_barang, waktu_penerimaan, waktu_penyerahan, id_barang, id_kurir, id_pemilik, id_security) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ssssiiii", $posisi, $status_barang, $waktu_penerimaan, $waktu_penyerahan, $id_barang, $id_kurir, $id_pemilik, $security_id);
    $stmt->execute();
    return $stmt->affected_rows;
}
    
   
}
?>
