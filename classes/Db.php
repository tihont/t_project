<?php


class Db
{
    protected $conn;

    public function __construct()
    {
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=t_project;port=3306', 'root', '', $options);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            die();
        }
    }

    public function __destruct()
    {
        $this->conn = null;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}