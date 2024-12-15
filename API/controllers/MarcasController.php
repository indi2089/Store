<?php
require_once '../models/Marca.php';

class MarcasController {
    // Obtener todas las marcas
    public function getAll() {
        $marca = new Marca();
        $marcas = $marca->getAll();
        echo json_encode($marcas);
    }

    // Obtener una marca por ID
    public function getById($id) {
        $marca = new Marca();
        $marcaData = $marca->getById($id);
        echo json_encode($marcaData);
    }

    // Crear una nueva marca
    public function create($data) {
        $marca = new Marca();
        $result = $marca->create($data);
        echo json_encode(['success' => $result]);
    }

    // Actualizar una marca
    public function update($id, $data) {
        $marca = new Marca();
        $result = $marca->update($id, $data);
        echo json_encode(['success' => $result]);
    }

    // Eliminar una marca
    public function delete($id) {
        $marca = new Marca();
        $result = $marca->delete($id);
        echo json_encode(['success' => $result]);
    }
}
?>
