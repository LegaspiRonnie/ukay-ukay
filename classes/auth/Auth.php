<?php

class Auth {
    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function registerUser(string $username, string $email, string $password) {
        $username = trim($username);
        $email = trim($email);
        $role_id = 1;
        $password = trim($password);
        $hash = password_hash($password, PASSWORD_DEFAULT);
        if ($hash === false) {
            return false;
        }
        if ($hash===null) {
            throw new \Exception("Invalid hashing algorithm");
        }
        try {
            $stmt = $this->db->prepare("INSERT INTO users (username, email, password, role_id)
            VALUES (:username, :email, :password, :role_id)
            ");
            $stmt->execute([
                ":username" => $username,
                ":email" => $email,
                ":password" => $hash,
                ":role_id" => $role_id
            ]);
        } catch (\PDOException $e) {
            error_log($e->getMessage());
            return false;
        }

        $id = $this->db->lastInsertId();
        if($id == false) {
            return false;
        } 
        return intval($id);

        
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

    public function log_user_out() {
        if (session_status() === PHP_SESSION_NONE) {
            throw new \Exception("Session has not been started!");
        }
        session_regenerate_id( true );
        unset($_SESSION['logged_in_user']);
    }

    public function logged_in_user(): int|false {
        if (session_status() === PHP_SESSION_NONE) {
            throw new \Exception("Session has not been started!");
        }

        if (empty($_SESSION['logged_in_user'])) {
            return false;
        }

        return intval($_SESSION['logged_in_user']);
    }

    public function get_user_role(int $user_id): int|bool {
        try {
            $query = "SELECT role_id FROM users WHERE id = :user_id";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                ':user_id' => $user_id
            ]);
        } catch ( \PDOException $e) {
            error_log( $e->getMessage());
        }

        $role = $stmt->fetchColumn();
        

        if($role === false) {
            return false;
             
        } 

        return intval($role);
        
    }

}