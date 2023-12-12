<?php
class SupplierTetap extends Supplier {
    private $jenisBarang;
    public function __construct($nama, $alamat, $jenisBarang) {
        parent::__construct($nama, $alamat);
        $this->jenisBarang = $jenisBarang;
    }
    public function displayInfo() {
        echo "Nama Supplier: " . $this->nama . "<br>";
        echo "Alamat Supplier: " . $this->alamat . "<br>";
        echo "Jenis Barang: " . $this->jenisBarang . "<br>";
    }
}