<?php
class ModelUser {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getUserByUsername($username) {
        $this->db->query('SELECT * FROM security WHERE username = :username');
        $this->db->bind(':username', $username);
        return $this->db->single();
    }
}

?>
