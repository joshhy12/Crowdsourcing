<?php
class AuthController {
    private $db;

    public function __construct() {
        global $pdo;
        $this->db = $pdo;
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['first_name'] = $user['first_name'];
                header('Location: /dashboard');
                exit;
            }
            
            $error = "Invalid credentials";
            include APP_PATH . '/views/auth/login.php';
        } else {
            include APP_PATH . '/views/auth/login.php';
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstName = $_POST['first_name'] ?? '';
            $lastName = $_POST['last_name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $skills = $_POST['skills'] ?? '';
            $interests = $_POST['interests'] ?? '';

            $stmt = $this->db->prepare("INSERT INTO users (first_name, last_name, email, password, skills, interests, role, created_at) VALUES (?, ?, ?, ?, ?, ?, 'user', NOW())");
            
            if ($stmt->execute([$firstName, $lastName, $email, $password, $skills, $interests])) {
                header('Location: /auth/login');
                exit;
            }
            
            $error = "Registration failed";
            include APP_PATH . '/views/auth/register.php';
        } else {
            include APP_PATH . '/views/auth/register.php';
        }
    }

    public function logout() {
        session_destroy();
        header('Location: /auth/login');
        exit;
    }

    public function profile() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /auth/login');
            exit;
        }

        $stmt = $this->db->prepare("SELECT * FROM users WHERE user_id = ?");
        $stmt->execute([$_SESSION['user_id']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        include APP_PATH . '/views/auth/profile.php';
    }

    public function updateProfile() {
        if (!isset($_SESSION['user_id']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /auth/login');
            exit;
        }

        $firstName = $_POST['first_name'] ?? '';
        $lastName = $_POST['last_name'] ?? '';
        $skills = $_POST['skills'] ?? '';
        $interests = $_POST['interests'] ?? '';

        $stmt = $this->db->prepare("UPDATE users SET first_name = ?, last_name = ?, skills = ?, interests = ? WHERE user_id = ?");
        $stmt->execute([$firstName, $lastName, $skills, $interests, $_SESSION['user_id']]);

        header('Location: /auth/profile');
        exit;
    }
}
