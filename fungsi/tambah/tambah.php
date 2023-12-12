<?php
session_start();

class TambahData
{
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function tambahKategori($nama)
    {
        $tgl = date("j F Y, G:i");
        $data = [$nama, $tgl];
        $sql = 'INSERT INTO kategori (nama_kategori, tgl_input) VALUES (?, ?)';
        $row = $this->config->prepare($sql);
        $row->execute($data);
        echo '<script>window.location="../../index.php?page=kategori&&success=tambah-data"</script>';
    }

    public function tambahBarang($id, $kategori, $nama, $merk, $beli, $jual, $satuan, $stok, $tgl)
    {
        $data = [$id, $kategori, $nama, $merk, $beli, $jual, $satuan, $stok, $tgl];
        $sql = 'INSERT INTO barang (id_barang, id_kategori, nama_barang, merk, harga_beli, harga_jual, satuan_barang, stok, tgl_input) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $row = $this->config->prepare($sql);
        $row->execute($data);
        echo '<script>window.location="../../index.php?page=barang&success=tambah-data"</script>';
    }

    public function tambahPenjualan($id, $id_kasir)
    {
        $sql_barang = 'SELECT * FROM barang WHERE id_barang = ?';
        $row_barang = $this->config->prepare($sql_barang);
        $row_barang->execute([$id]);
        $hasil = $row_barang->fetch();

        if ($hasil['stok'] > 0) {
            $jumlah = 1;
            $total = $hasil['harga_jual'];
            $tgl = date("j F Y, G:i");

            $data1 = [$id, $id_kasir, $jumlah, $total, $tgl];

            $sql1 = 'INSERT INTO penjualan (id_barang, id_member, jumlah, total, tanggal_input) VALUES (?, ?, ?, ?, ?)';
            $row1 = $this->config->prepare($sql1);
            $row1->execute($data1);

            echo '<script>window.location="../../index.php?page=jual&success=tambah-data"</script>';
        } else {
            echo '<script>alert("Stok Barang Anda Telah Habis !");
                  window.location="../../index.php?page=jual#keranjang"</script>';
        }
    }
}

require '../../config.php';

$tambahData = new TambahData($config);

if (!empty($_SESSION['admin'])) {
    if (!empty($_GET['kategori'])) {
        $nama = $_POST['kategori'];
        $tambahData->tambahKategori($nama);
    } elseif (!empty($_GET['barang'])) {
        $id = $_POST['id'];
        $kategori = $_POST['kategori'];
        $nama = $_POST['nama'];
        $merk = $_POST['merk'];
        $beli = $_POST['beli'];
        $jual = $_POST['jual'];
        $satuan = $_POST['satuan'];
        $stok = $_POST['stok'];
        $tgl = $_POST['tgl'];
        $tambahData->tambahBarang($id, $kategori, $nama, $merk, $beli, $jual, $satuan, $stok, $tgl);
    } elseif (!empty($_GET['jual'])) {
        $id = $_GET['id'];
        $id_kasir = $_GET['id_kasir'];
        $tambahData->tambahPenjualan($id, $id_kasir);
    }
}
?>
