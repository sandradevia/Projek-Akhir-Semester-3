<?php

class Database {
    private $config;

    public function __construct() {
        date_default_timezone_set("Asia/Jakarta");
        error_reporting(0);

        // sesuaikan dengan server anda
        $host   = 'localhost'; // host server
        $user   = 'root';      // username server
        $pass   = '';          // password server, kalau pakai xampp kosongin saja
        $dbname = 'kantin4';    // nama database anda

        try {
            $this->config = new PDO("mysql:host=$host;dbname=$dbname;", $user, $pass);
        } catch (PDOException $e) {
            echo 'KONEKSI GAGAL' . $e->getMessage();
        }
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
?>
