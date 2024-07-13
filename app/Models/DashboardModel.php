<?php
class DashboardModel extends Model
{
    public function countData()
    {
        $query = "SELECT COUNT(*) AS jumlahBarang FROM serah_terima";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result['jumlahBarang'];
    }
}
?>
