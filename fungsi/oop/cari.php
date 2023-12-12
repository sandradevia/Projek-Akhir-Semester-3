<?php
class Cari{
    private $config;
    public function __construct($config){
        $this->config = $config;
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
}
require '../../config.php';
$Cari = new Cari($config);
?>