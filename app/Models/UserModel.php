<?php
class UserModel extends Model
{
    protected $conn;

    public function __construct($conn)
    {
        parent::__construct($conn);
    }

    public function getUserByUsername($username)
    {
        $query = "SELECT * FROM security WHERE username = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function getDataUser()
    {
        $query = "SELECT * FROM security
        WHERE 1";

        $result = $this->conn->query($query);
        $data = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    public function UpdateStatusAkun ($status, $id_security) {
        $query = "UPDATE security SET status = ? WHERE id_security = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si",$status, $id_security);
        return $stmt->execute();
    }
}
?>