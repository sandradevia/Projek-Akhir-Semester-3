<?php
session_start();

class Delete
{
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function deleteKategori($id)
    {
        $data = [$id];
        $sql = 'DELETE FROM kategori WHERE id_kategori=?';
        $row = $this->config->prepare($sql);
        $row->execute($data);
        echo '<script>window.location="../../index.php?page=kategori&&remove=hapus-data"</script>';
    }

    public function deleteBarang($id)
    {
        $data = [$id];
        $sql = 'DELETE FROM barang WHERE id_barang=?';
        $row = $this->config->prepare($sql);
        $row->execute($data);
        echo '<script>window.location="../../index.php?page=barang&&remove=hapus-data"</script>';
    }

    public function deleteJual($id)
    {
        $data = [$id];
        $sql = 'DELETE FROM penjualan WHERE id_penjualan=?';
        $row = $this->config->prepare($sql);
        $row->execute($data);
        echo '<script>window.location="../../index.php?page=jual"</script>';
    }

    public function deletePenjualan()
    {
        $sql = 'DELETE FROM penjualan';
        $row = $this->config->prepare($sql);
        $row->execute();
        echo '<script>window.location="../../index.php?page=jual"</script>';
    }

    public function deleteLaporan()
    {
        $sql = 'DELETE FROM nota';
        $row = $this->config->prepare($sql);
        $row->execute();
        echo '<script>window.location="../../index.php?page=laporan&remove=hapus"</script>';
    }
}

require '../../config.php';

$delete = new Delete($config);

if (!empty($_SESSION['admin'])) {
    if (!empty($_GET['kategori'])) {
        $id = $_GET['id'];
        $delete->deleteKategori($id);
    }
    if (!empty($_GET['barang'])) {
        $id = $_GET['id'];
        $delete->deleteBarang($id);
    }
    if (!empty($_GET['jual'])) {
        $id = $_GET['id'];
        $delete->deleteJual($id);
    }
    if (!empty($_GET['penjualan'])) {
        $delete->deletePenjualan();
    }
    if (!empty($_GET['laporan'])) {
        $delete->deleteLaporan();
    }
}
?>
