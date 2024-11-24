<?php
require_once '../config/database.php';

class Marca {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getAll() {
        $query = $this->db->query("SELECT * FROM marcas");
        return $query->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $query = $this->db->prepare("SELECT * FROM marcas WHERE id = ?");
        $query->bind_param("i", $id);
        $query->execute();
        return $query->get_result()->fetch_assoc();
    }

    public function create($data) {
        $query = $this->db->prepare("INSERT INTO marcas (nombre) VALUES (?)");
        $query->bind_param("s", $data['nombre']);
        return $query->execute();
    }

    public function update($id, $data) {
        $query = $this->db->prepare("UPDATE marcas SET nombre = ? WHERE id = ?");
        $query->bind_param("si", $data['nombre'], $id);
        return $query->execute();
    }

    public function delete($id = null) {
        // Leer el cuerpo de la solicitud
        $rawData = file_get_contents("php://input");
        $data = json_decode($rawData, true); // Decodificar el JSON enviado en el cuerpo
    
        // Asegúrate de que se envió el ID, ya sea por URL o por cuerpo
        $id = $id ?? $data['id'] ?? null; // Priorizar $id en la URL, luego en el JSON
    
        if ($id === null) {
            echo json_encode(['success' => false, 'message' => 'ID no especificado.']);
            return;
        }
    
        // Eliminar la marca
        $marca = new Marca();
        $result = $marca->delete($id);
        echo json_encode(['success' => $result]);
    }
    
}
?>
