<?php
class Penjualan{
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }
    public function tambah($id, $id_kasir)
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
    public function edit($id, $id_barang, $jumlah) {
		$sql_tampil = "SELECT * FROM barang WHERE id_barang=?";
		$row_tampil = $this->config->prepare($sql_tampil);
		$row_tampil->execute([$id_barang]);
		$hasil = $row_tampil->fetch();
	
		if ($hasil['stok'] > $jumlah) {
			$jual = $hasil['harga_jual'];
			$total = $jual * $jumlah;
			$data1 = [$jumlah, $total, $id];
			$sql1 = 'UPDATE penjualan SET jumlah=?, total=? WHERE id_penjualan=?';
			$row1 = $this->config->prepare($sql1);
			$row1->execute($data1);
			echo '<script>window.location="../../index.php?page=jual#keranjang"</script>';
		} else {
			echo '<script>alert("Keranjang Melebihi Stok Barang Anda !");
					window.location="../../index.php?page=jual#keranjang"</script>';
		}
	}
    public function hapus($id)
    {
        $data = [$id];
        $sql = 'DELETE FROM penjualan WHERE id_penjualan=?';
        $row = $this->config->prepare($sql);
        $row->execute($data);
        echo '<script>window.location="../../index.php?page=jual"</script>';
    }
}
require '../../config.php';
?>