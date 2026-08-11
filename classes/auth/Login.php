<?php

class Login {

    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function loginUser(string $email, string $password) {
        $email = trim($email);
        $password = trim($password);

        try {
            $query = "SELECT id, password FROM users WHERE email = :email";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                ":email" => $email,
            ]);
        } catch ( \PDOException $e ) {
            error_log( $e->getMessage());
            return false;
        }
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user === false) {
            return false;
        }

        if (!isset($user['password'])) {
            throw new \Exception("Password column not found in database!");
        }
        if (!isset($user['id'])) {
            throw new \Exception("id column not found in database!");
        }

        $verify = password_verify($password, $user['password']);
        if ($verify) {
            return intval($user['id']);
        }

        return false;
    }

    public function log_user_in(int $user_id) {
        if (session_status() === PHP_SESSION_NONE) {
            throw new \Exception("Session has not been started!");
        }

        session_regenerate_id( true );

        $_SESSION['logged_in_user'] = $user_id;
    }
}