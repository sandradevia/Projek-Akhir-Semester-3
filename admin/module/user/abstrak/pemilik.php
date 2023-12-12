<?php
class Pemilik extends User {
    private $role;

    public function __construct($nama, $alamat, $role) {
        parent::__construct($nama, $alamat);
        $this->role = $role;
    }

    public function displayInfo() {
        echo "Nama: " . $this->nama . "<br>";
        echo "Alamat: " . $this->alamat . "<br>";
        echo "Role: " . $this->role . "<br>";
    }
}