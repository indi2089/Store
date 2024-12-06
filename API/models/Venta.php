<?php
require_once '../config/database.php';

class Venta {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getAll() {
        $query = $this->db->query("SELECT * FROM ventas");
        return $query->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $query = $this->db->prepare("SELECT * FROM ventas WHERE id = ?");
        $query->bind_param("i", $id);
        $query->execute();
        return $query->get_result()->fetch_assoc();
    }

    public function create($data) {
        $query = $this->db->prepare("INSERT INTO ventas (prenda_id, cantidad, fecha) VALUES (?, ?, ?)");
        $query->bind_param("iis", $data['prenda_id'], $data['cantidad'], $data['fecha']);
        return $query->execute();
    }

    public function update($id, $data) {
        $query = $this->db->prepare("UPDATE ventas SET prenda_id = ?, cantidad = ?, fecha = ? WHERE id = ?");
        $query->bind_param("iisi", $data['prenda_id'], $data['cantidad'], $data['fecha'], $id);
        return $query->execute();
    }

    public function delete($id) {
        $query = $this->db->prepare("DELETE FROM ventas WHERE id = ?");
        $query->bind_param("i", $id);
        return $query->execute();
    }
}
?>