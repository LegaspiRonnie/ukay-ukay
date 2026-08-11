<?php

class Register {
    
    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }


    public function registerUser(string $username, string $email, string $password) : int|false {
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

    public function log_user_in(int $user_id) {
        if (session_status() === PHP_SESSION_NONE) {
            throw new \Exception("Session has not been started!");
        }

        session_regenerate_id( true );

        $_SESSION['logged_in_user'] = $user_id;
    }
}