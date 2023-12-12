<?php
class Kategori {
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function tambah($nama)
    {
        $tgl = date("j F Y, G:i");
        $data = [$nama, $tgl];
        $sql = 'INSERT INTO kategori (nama_kategori, tgl_input) VALUES (?, ?)';
        $row = $this->config->prepare($sql);
        $row->execute($data);
        echo '<script>window.location="../../index.php?page=kategori&&success=tambah-data"</script>';
    }
    

    public function edit($nama, $id){
		$data = [$nama, $id];
        $sql = 'UPDATE kategori SET nama_kategori=? WHERE id_kategori=?';
        $row = $this->config->prepare($sql);
        $row->execute($data);
        echo '<script>window.location="../../index.php?page=kategori&uid='.$id.'&success-edit=edit-data"</script>';
    }
    public function hapus($id)
    {
        $data = [$id];
        $sql = 'DELETE FROM kategori WHERE id_kategori=?';
        $row = $this->config->prepare($sql);
        $row->execute($data);
        echo '<script>window.location="../../index.php?page=kategori&&remove=hapus-data"</script>';
    }
    function lihat(){
        $sql = "select*from kategori";
        $row = $this-> config -> prepare($sql);
        $row -> execute();
        $hasil = $row -> fetchAll();
        return $hasil;
    }
}
require '../../../config.php';

$Kategori = new Kategori($config);

if (isset($_POST['tambah'])) {
    $kategori = $_POST['kategori'];
    $Kategori->tambah($kategori);
}

if (isset($_POST['edit'])) {
    $kategori = $_POST['kategori'];
    $id = $_POST['id'];
    $Kategori->edit($kategori, $id);
}

if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $Kategori->hapus($id);
}


?>