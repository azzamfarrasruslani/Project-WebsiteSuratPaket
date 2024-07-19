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

    public function UpdateStatusAkun($status, $id_security)
    {
        $query = "UPDATE security SET status = ? WHERE id_security = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $status, $id_security);
        return $stmt->execute();
    }


    public function getImageById($id_security)
    {
        $query = "SELECT foto_profile 
              FROM security 
              WHERE id_security = ?";

        $stmt = $this->conn->prepare($query);
        if ($stmt) {
            $stmt->bind_param('i', $id_security);
            $stmt->execute();
            $foto_profile = null;
            $stmt->bind_result($foto_profile);
            $stmt->fetch();
            $stmt->close();
            return $foto_profile ? $foto_profile : null;
        } else {
            return null;
        }
    }

    public function insertSecurity($nama_security, $noHp_security, $username, $password, $role)
    {
        $query = "INSERT INTO security (nama_security, noHp_security, username, password, role) VALUES (?, ?, ?, MD5(?), ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssss", $nama_security, $noHp_security, $username, $password, $role);
        $stmt->execute();
        return $stmt->affected_rows;
    }
}
?>