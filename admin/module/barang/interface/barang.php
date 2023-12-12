<?php
session_start();
interface BarangInterface {
    public function tambah($id, $kategori, $nama, $merk, $beli, $jual, $satuan, $stok, $tgl);
    public function edit($id, $kategori, $nama, $merk, $beli, $jual, $satuan, $stok, $tgl);
    public function hapus($id);
}