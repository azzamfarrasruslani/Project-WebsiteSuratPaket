<?php

class SerahTerimaController extends Controller
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function dataPaket()
    {
        $search = $_GET['search'] ?? '';
        $order = $_GET['order'] ?? 'id_serah_terima';
        $orderType = $_GET['orderType'] ?? 'ASC';
        $limit = $_GET['limit'] ?? 30;
        $page = $_GET['page'] ?? 1;
        $offset = ($page - 1) * $limit;

        $data['serah_terima'] = $this->getPenyerahanterimaan($search, $order, $orderType, $limit, $offset);
        $data['total'] = $this->countAllPenyerahanterimaan($search);
        $data['page'] = $page;
        $data['limit'] = $limit;
        $data['search'] = $search;
        $data['order'] = $order;
        $data['orderType'] = $orderType;

        $this->loadView('dashboard/dataPaket', $data, $this);
    }

    private function getPenyerahanterimaan($search, $order, $orderType, $limit, $offset)
    {
        $query = "SELECT st.id_serah_terima, st.posisi, st.status_barang, st.waktu_penerimaan, k.nama_kurir 
                  FROM serah_terima st
                  JOIN kurir k ON st.id_kurir = k.id_kurir 
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

    private function countAllPenyerahanterimaan($search)
    {
        $query = "SELECT COUNT(*) as total 
                  FROM serah_terima st
                  JOIN kurir k ON st.id_kurir = k.id_kurir 
                  WHERE 1";

        if ($search) {
            $query .= " AND (st.posisi LIKE '%$search%' OR st.status_barang LIKE '%$search%' OR k.nama_kurir LIKE '%$search%')";
        }

        $result = $this->conn->query($query);
        $row = $result->fetch_assoc();

        return $row['total'];
    }

    private function countAllResults()
    {
        $query = "SELECT COUNT(*) as total FROM serah_terima";
        $result = $this->conn->query($query);
        $row = $result->fetch_assoc();

        return $row['total'];
    }

    public function hitData()
    {
        return $this->countAllResults();
    }

    private function loadView($view, $data, $controller)
    {
        $viewPath = "../app/views/$view.php";
        if (file_exists($viewPath)) {
            extract($data);
            include $viewPath;
        } else {
            echo "View file not found: $viewPath";
        }
    }
}
?>
