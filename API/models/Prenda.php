<?php
require_once '../config/database.php';

class Prenda {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getAll() {
        $query = $this->db->query("SELECT * FROM prendas");
        return $query->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $query = $this->db->prepare("SELECT * FROM prendas WHERE id = ?");
        $query->bind_param("i", $id);
        $query->execute();
        return $query->get_result()->fetch_assoc();
    }

    public function create($data) {
        $query = $this->db->prepare("INSERT INTO prendas (nombre, marca_id, stock) VALUES (?, ?, ?)");
        $query->bind_param("sii", $data['nombre'], $data['marca_id'], $data['stock']);
        return $query->execute();
    }

    public function update($id, $data) {
        $query = $this->db->prepare("UPDATE prendas SET nombre = ?, marca_id = ?, stock = ? WHERE id = ?");
        $query->bind_param("siii", $data['nombre'], $data['marca_id'], $data['stock'], $id);
        return $query->execute();
    }

    public function delete($id) {
        $query = $this->db->prepare("DELETE FROM prendas WHERE id = ?");
        $query->bind_param("i", $id);
        return $query->execute();
    }
}
?>