<?php
abstract class Supplier {
    protected $nama;
    protected $alamat;
    public function __construct($nama, $alamat) {
        $this->nama = $nama;
        $this->alamat = $alamat;
    }
    abstract public function displayInfo();
}