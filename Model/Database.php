<?php

class Database {
    private $host = 'localhost';
    private $db = 'elearning';
    private $user = 'root'; // Update with your DB user
    private $pass = '';     // Update with your DB password
    public $connection;

    public function __construct() {
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
?>
