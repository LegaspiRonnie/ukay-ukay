<?php


class Logout {
    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function log_user_out() {
        if (session_status() === PHP_SESSION_NONE) {
            throw new \Exception("Session has not been started!");
        }
        session_regenerate_id( true );
        unset($_SESSION['logged_in_user']);
        unset($_SESSION['user_id']);
    }
    
}

?>