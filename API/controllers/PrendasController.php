<?php
require_once '../models/Prenda.php';

class PrendasController {
    public function getAll() {
        $prenda = new Prenda();
        $prendas = $prenda->getAll();
        echo json_encode($prendas);
    }

    public function getById($id) {
        $prenda = new Prenda();
        $prendaData = $prenda->getById($id);
        echo json_encode($prendaData);
    }

    public function create($data) {
        $prenda = new Prenda();
        $result = $prenda->create($data);
        echo json_encode(['success' => $result]);
    }

    public function update($id, $data) {
        $prenda = new Prenda();
        $result = $prenda->update($id, $data);
        echo json_encode(['success' => $result]);
    }

    public function delete($id) {
        $prenda = new Prenda();
        $result = $prenda->delete($id);
        echo json_encode(['success' => $result]);
    }
}
?>
