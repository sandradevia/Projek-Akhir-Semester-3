<?php
class Supplier_model {
    private $table = "supplier";
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllSuppliers(){
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getSupplierById($id){
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function tambahSupplier($id_supplier, $nama_supplier, $jenis_supplier, $no_hp){
        $this->db->query("INSERT INTO " . $this->table . " (id, nama, alamat, telepon) VALUES (:id, :nama, :alamat, :telepon)");
        $this->db->bind(':id', $id_supplier);
        $this->db->bind(':nama', $nama_supplier);
        $this->db->bind(':alamat', $jenis_supplier);
        $this->db->bind(':telepon', $no_hp);
        return $this->db->execute();
    }

    public function updateSupplier($id_supplier, $nama_supplier, $jenis_supplier, $no_hp){
        $this->db->query("UPDATE " . $this->table . " SET nama = :nama, alamat = :alamat, telepon = :telepon WHERE id = :id");
        $this->db->bind(':id', $id_supplier);
        $this->db->bind(':nama', $nama_supplier);
        $this->db->bind(':alamat', $jenis_supplier);
        $this->db->bind(':telepon', $no_hp);
        return $this->db->execute();
    }

    public function deleteSupplier($id_supplier){
        $this->db->query("DELETE FROM " . $this->table . " WHERE id = :id");
        $this->db->bind(':id', $id_supplier);
        return $this->db->execute();
    }
}

?>
