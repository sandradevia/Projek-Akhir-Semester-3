<?php
class BarangModel{
    private $table = 'barang';
	private $db;
	public function __construct()
	{
		$this->db = new Database;
	}
    public function getAllBarang()
	{
		$this->db->query("SELECT barang.*, kategori.id_kategori, kategori.nama_kategori
		from barang inner join kategori on barang.id_kategori = kategori.id_kategori 
		ORDER BY id DESC");
		return $this->db->resultSet();
	}
	public function getBarangById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . 'WHERE id=:id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}
	public function tambahBarang($id, $kategori, $nama, $merk, $beli, $jual, $satuan, $stok, $tgl)
    {
        $data = [$id, $kategori, $nama, $merk, $beli, $jual, $satuan, $stok, $tgl];
		$query = 'INSERT INTO barang (id_barang, id_kategori, nama_barang, merk, harga_beli, harga_jual, satuan_barang, stok, tgl_input) 
                VALUES (:id_barang, :id_kategori, :nama_barang, :merk, :harga_beli, :harga_jual, :satuan_barang, :stok, :tgl_input)';
        $this->db->query($query);
		foreach ($data as $key => $value) {
            $this->db->bind($key, $value);
        }
		return $this->db->rowCount();
    } 
	public function editBarang($id, $kategori, $nama, $merk, $beli, $jual, $satuan, $stok, $tgl) {
        $data = [$kategori, $nama, $merk, $beli, $jual, $satuan, $stok, $tgl, $id];        
        $query = 'UPDATE barang SET id_kategori=:id_kategori, nama_barang=:nama_barang, merk=:merk, 
                harga_beli=:harga_beli, harga_jual=:harga_jual, satuan_barang=:satuan_barang, stok=:stok, tgl_update=:tgl_update  WHERE id_barang=:id_barang';
        $this->db->query($query);
		foreach ($data as $key => $value) {
            $this->db->bind($key, $value);
        }
        $this->db->execute();
        return $this->db->rowCount();
    } 
	public function deleteBarang($id)
    {
        $this->db->query('DELETE FROM barang WHERE id_barang=:id_barang');
		$this->db->bind('id',$id);
		$this->db->execute();
		return $this->db->rowCount();
    }
	public function cariBarang()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE judul LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}