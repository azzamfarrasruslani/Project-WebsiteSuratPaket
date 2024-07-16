<?php
class DashboardModel extends Model
{
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

    public function countDataByStatus()
    {
        $query = "SELECT COUNT(*) AS jumlahBarang FROM serah_terima
           WHERE status_barang = 'Belum Diambil' ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result['jumlahBarang'];
    }
}
?>