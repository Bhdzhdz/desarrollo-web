<?php
require_once '../utils/Database.php';

class UserModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getUserByUsernameOrEmail($username_or_email) {
        $query = "SELECT * FROM users WHERE username = :username OR email = :email LIMIT 1";
        $params = [
            ':username' => $username_or_email,
            ':email' => $username_or_email
        ];

        $this->db->query($query);
        $this->db->bindValues($params);
        $user = $this->db->single();

        return $user;
    }

    // You might have other methods related to user management here, such as:
    // - createUser
    // - updateUser
    // - deleteUser
    // - getUserById
    // - etc.
}
?>
