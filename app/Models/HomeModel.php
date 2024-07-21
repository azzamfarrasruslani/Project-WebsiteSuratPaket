<?php
class HomeModel extends Model
{
    public function getData()
    {
        // Contoh data sederhana
        return ['Hello', 'World'];
    }

    public function viewBarangPemilik($no_resi)
    {
        $query = "SELECT st.*, b.*, k.*, p.*, s.nama_security
                  FROM serah_terima st
                  JOIN kurir k ON st.id_kurir = k.id_kurir 
                  JOIN barang b ON st.id_barang = b.id_barang 
                  JOIN pemilik p ON st.id_pemilik = p.id_pemilik
                  JOIN security s ON st.id_security = s.id_security
                  WHERE b.no_resi = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $no_resi);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); // Mengambil semua hasil sebagai array asosiatif
        return $result;
    }

}




