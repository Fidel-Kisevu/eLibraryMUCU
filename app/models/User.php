<?php
// app/models/User.php

class User {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    // Register a new user
    public function register($fullName, $email, $password, $phoneNumber) {
        $query = "INSERT INTO users (full_name, email, password, phone_number) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$fullName, $email, $password, $phoneNumber]);
    }

    // Login a user
    public function login($email) {
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
