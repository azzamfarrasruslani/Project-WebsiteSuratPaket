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
        $query = "SELECT nama_security FROM security";

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
        $query = "SELECT b.foto_barang
                  FROM serah_terima st
                  JOIN barang b ON st.id_barang = b.id_barang 
                  WHERE st.id_serah_terima = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id_barang);
        $stmt->execute();
        $stmt->store_result();
        $foto_barang = null;
        $stmt->bind_result($foto_barang);
        $stmt->fetch();
        $stmt->close();

        return $foto_barang;
    }
}
