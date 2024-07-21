<?php
class DashboardModel extends Model
{

    public function dataByWaktu ($tipe_waktu) {
        $query = "SELECT st.*, b.*, k.*, p.*, s.nama_security
                  FROM serah_terima st
                  JOIN kurir k ON st.id_kurir = k.id_kurir 
                  JOIN barang b ON st.id_barang = b.id_barang 
                  JOIN pemilik p ON st.id_pemilik = p.id_pemilik
                  JOIN security s ON st.id_security = s.id_security
                  WHERE DATE(?) = CURDATE()";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $tipe_waktu);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); // Mengambil semua hasil sebagai array asosiatif
        return $result;
    }





    public function countDataByWaktuTerima()
    {
        $query = "SELECT COUNT(*) AS jumlahBarang FROM serah_terima
        WHERE DATE(waktu_penerimaan) = CURDATE()";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result['jumlahBarang'];
    }

    public function countDataByWaktuSerah()
    {
        $query = "SELECT COUNT(*) AS jumlahBarang FROM serah_terima
        WHERE DATE(waktu_penyerahan) = CURDATE()";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result['jumlahBarang'];
    }
    public function countDataByStatus($status)
    {
        $query = "SELECT COUNT(*) AS jumlahBarang FROM serah_terima
           WHERE status_barang = ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $status);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result['jumlahBarang'];
    }
    function getActivityLog($id_security)
    {
        $sql = "SELECT activity, activity_time FROM activity_log WHERE id_security = ? ORDER BY activity_time DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_security);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

}
