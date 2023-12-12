<?php
class Snack implements BarangInterface {
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function tambah($id, $kategori, $nama, $merk, $beli, $jual, $satuan, $stok, $tgl)
    {        
        $satuan = 'PCS';
        $data = [$id, $kategori, $nama, $merk, $beli, $jual, $satuan, $stok, $tgl];
        $sql = 'INSERT INTO barang (id_barang, id_kategori, nama_barang, merk, harga_beli, harga_jual, satuan_barang, stok, tgl_input) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $row = $this->config->prepare($sql);
        $row->execute($data);
        echo '<script>window.location="../../index.php?page=barang&success=tambah-data"</script>';
    }

    public function edit($id, $kategori, $nama, $merk, $beli, $jual, $satuan, $stok, $tgl)
    {
        $data = [$kategori, $nama, $merk, $beli, $jual, $stok, $tgl, $id];
        $sql = 'UPDATE barang SET id_kategori=?, nama_barang=?, merk=?, 
                harga_beli=?, harga_jual=?, stok=?, tgl_update=?  WHERE id_barang=?';
        $row = $this->config->prepare($sql);
        $row->execute($data);
        echo '<script>window.location="../../index.php?page=barang/edit&barang='.$id.'&success=edit-data"</script>';
    }

    public function hapus($id)
    {
        $data = [$id];
        $sql = 'DELETE FROM barang WHERE id_barang=?';
        $row = $this->config->prepare($sql);
        $row->execute($data);
        echo '<script>window.location="../../index.php?page=barang&&remove=hapus-data"</script>';       
    }
}