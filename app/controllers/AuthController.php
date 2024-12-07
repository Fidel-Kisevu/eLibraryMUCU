<?php
// app/controllers/AuthController.php

class AuthController extends Controller {

    // Register new user
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fullName = $_POST['full_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $phoneNumber = $_POST['phone_number'];

            // Validation
            if (empty($fullName) || empty($email) || empty($password)) {
                $this->view('auth/register', ['error' => 'All fields are required.']);
                return;
            }

            // Hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert user into database
            $user = new User();
            if ($user->register($fullName, $email, $hashedPassword, $phoneNumber)) {
                header('Location: /login');
            } else {
                $this->view('auth/register', ['error' => 'Registration failed.']);
            }
        } else {
            $this->view('auth/register');
        }
    }

    // Login user
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Validation
            if (empty($email) || empty($password)) {
                $this->view('auth/login', ['error' => 'Please fill out both fields.']);
                return;
            }

            // Check credentials
            $user = new User();
            $userData = $user->login($email);

            if ($userData && password_verify($password, $userData['password'])) {
                $_SESSION['user_id'] = $userData['id'];
                $_SESSION['role'] = $userData['role'];
                header('Location: /dashboard');
            } else {
                $this->view('auth/login', ['error' => 'Invalid email or password.']);
            }
        } else {
            $this->view('auth/login');
        }
    }

    // Logout user
    public function logout() {
        session_destroy();
        header('Location: /login');
    }
}
?>
