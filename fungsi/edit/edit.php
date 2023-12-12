<?php 
session_start();

class Edit{
	private $config;

    public function __construct($config) {
        $this->config = $config;
    }

    public function editKategori($nama, $id){
		$data = [$nama, $id];
        $sql = 'UPDATE kategori SET nama_kategori=? WHERE id_kategori=?';
        $row = $this->config->prepare($sql);
        $row->execute($data);
        echo '<script>window.location="../../index.php?page=kategori&uid='.$id.'&success-edit=edit-data"</script>';
    }
	public function editBarang($id, $kategori, $nama, $merk, $beli, $jual, $satuan, $stok, $tgl) {
        $data = [$kategori, $nama, $merk, $beli, $jual, $satuan, $stok, $tgl, $id];
        $sql = 'UPDATE barang SET id_kategori=?, nama_barang=?, merk=?, 
                harga_beli=?, harga_jual=?, satuan_barang=?, stok=?, tgl_update=?  WHERE id_barang=?';
        $row = $this->config->prepare($sql);
        $row->execute($data);
        echo '<script>window.location="../../index.php?page=barang/edit&barang='.$id.'&success=edit-data"</script>';
    }
	public function editJual($id, $id_barang, $jumlah) {
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
	public function editCariBarang($cari) {
    	if ($cari != '') {
        // Prepare and execute the SQL query to search for matching items
        $sql = "SELECT barang.*, kategori.id_kategori, kategori.nama_kategori
                FROM barang
                INNER JOIN kategori ON barang.id_kategori = kategori.id_kategori
                WHERE barang.id_barang LIKE '%$cari%' OR barang.nama_barang LIKE '%$cari%' OR barang.merk LIKE '%$cari'";
        $row = $this->config->prepare($sql);
        $row->execute();
        
        $hasil1 = $row->fetchAll();

        if ($hasil1) {
            ?>
		<table class="table table-stripped" width="100%" id="example2">
			<tr>
				<th>ID Barang</th>
				<th>Nama Barang</th>
				<th>Merk</th>
				<th>Harga Jual</th>
				<th>Aksi</th>
			</tr>
			<?php foreach ($hasil1 as $hasil) { ?>
			<tr>
				<td><?php echo $hasil['id_barang']; ?></td>
				<td><?php echo $hasil['nama_barang']; ?></td>
				<td><?php echo $hasil['merk']; ?></td>
				<td><?php echo $hasil['harga_jual']; ?></td>
				<td>
					<a href="fungsi/tambah/tambah.php?jual=jual&id=<?php echo $hasil['id_barang']; ?>&id_kasir=<?php echo $_SESSION['admin']['id_member']; ?>"
						class="btn btn-success">
						<i class="fa fa-shopping-cart"></i>
					</a>
				</td>
			</tr>
			<?php } ?>
		</table>
		<?php } else {
					echo '<p>No matching items found.</p>';
				}
			} else {
				echo '<p>Please enter a keyword to search.</p>';
			}
	}
	public function editData()
    {
        if (!empty($_GET['kategori'])) {
            $nama = htmlentities($_POST['kategori']);
            $id = htmlentities($_POST['id']);
            $this->editKategori($nama, $id); 
        } elseif (!empty($_GET['barang'])) {
            $id = htmlentities($_POST['id']);
			$kategori = htmlentities($_POST['kategori']);
			$nama = htmlentities($_POST['nama']);
			$merk = htmlentities($_POST['merk']);
			$beli = htmlentities($_POST['beli']);
			$jual = htmlentities($_POST['jual']);
			$satuan = htmlentities($_POST['satuan']);
			$stok = htmlentities($_POST['stok']);
			$tgl = htmlentities($_POST['tgl']);
			$this->editBarang($id, $kategori, $nama, $merk, $beli, $jual, $satuan, $stok, $tgl);
        } elseif (!empty($_GET['jual'])) {
            $id = htmlentities($_POST['id']);
            $id_barang = htmlentities($_POST['id_barang']);
            $jumlah = htmlentities($_POST['jumlah']);
            $this->editJual($id, $id_barang, $jumlah);
        } elseif (!empty($_GET['cari_barang'])) {
            $cari = trim(strip_tags($_POST['keyword']));
            $this->editCariBarang($cari);
        }
    }
}
require '../../config.php';

$edit = new Edit($config);

if (!empty($_SESSION['admin'])) {
    $edit->editData();
}
?>
