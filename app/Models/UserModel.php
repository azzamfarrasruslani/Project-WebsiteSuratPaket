<?php
class UserModel extends Model {
    protected $conn;

    public function __construct($conn) {
        parent::__construct($conn);
    }

    public function getUserByUsername($username) {
        $query = "SELECT * FROM security WHERE username = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
