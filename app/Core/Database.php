<?php
class Database {
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $db_name = 'suratpaket';
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db_name);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function query($query)
    {
        return $this->conn->query($query);
    }

    public function prepare($query)
    {
        return $this->conn->prepare($query);
    }

    public function bindAndExecute($stmt, $params)
    {
        $types = '';
        foreach ($params as $param) {
            if (is_int($param)) {
                $types .= 'i';
            } elseif (is_double($param)) {
                $types .= 'd';
            } elseif (is_string($param)) {
                $types .= 's';
            } else {
                $types .= 'b';
            }
        }

        $stmt->bind_param($types, ...$params);
        $stmt->execute();
    }

    public function resultSet($stmt)
    {
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function single($stmt)
    {
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function rowCount($stmt)
    {
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows;
    }
}
?>
