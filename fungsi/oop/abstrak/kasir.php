<?php
class Kasir extends User {
    private $gaji;
    public function __construct($nama, $alamat, $gaji) {
        parent::__construct($nama, $alamat);
        $this->gaji = $gaji;
    }
    public function displayInfo() {
        echo "Nama: " . $this->nama . "<br>";
        echo "Alamat: " . $this->alamat . "<br>";
        echo "Gaji: " . $this->gaji . "<br>";
    }
}