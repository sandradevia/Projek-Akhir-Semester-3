<?php
class SupplierHarian extends Supplier {
    private $tanggalPengiriman;
    public function __construct($nama, $alamat, $tanggalPengiriman) {
        parent::__construct($nama, $alamat);
        $this->tanggalPengiriman = $tanggalPengiriman;
    }
    public function displayInfo() {
        echo "Nama Supplier: " . $this->nama . "<br>";
        echo "Alamat Supplier: " . $this->alamat . "<br>";
        echo "Tanggal Pengiriman: " . $this->tanggalPengiriman . "<br>";
    }
}