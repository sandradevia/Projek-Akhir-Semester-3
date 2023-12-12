// Database.php
<?php

class Database {
    private $config;

    public function __construct() {
        date_default_timezone_set("Asia/Jakarta");
        error_reporting(0);

        // Sesuaikan dengan server Anda
        $host   = 'localhost'; // host server
        $user   = 'root';      // username server
        $pass   = '';          // password server, kalau pakai xampp kosongin saja
        $dbname = 'kantin4';   // nama database Anda

        try {
            $this->config = new PDO("mysql:host=$host;dbname=$dbname;", $user, $pass);
        } catch (PDOException $e) {
            echo 'KONEKSI GAGAL' . $e->getMessage();
        }

        // Memuat base URL dari config.php
        include_once '../config/config.php';
        $this->config->base_url = $base_url;
    }

    public function getConfig() {
        return $this->config;
    }

    public function getModelPath() {
        return 'fungsi/model/model.php';
    }
}

$database = new Database();
$config = $database->getConfig();
$model = $database->getModelPath();
