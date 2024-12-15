<?php
require_once '../models/Venta.php';

class VentasController {
    public function getAll() {
        $venta = new Venta();
        $ventas = $venta->getAll();
        echo json_encode($ventas);
    }

    public function getById($id) {
        $venta = new Venta();
        $ventaData = $venta->getById($id);
        echo json_encode($ventaData);
    }

    public function create($data) {
        $venta = new Venta();
        $result = $venta->create($data);
        echo json_encode(['success' => $result]);
    }

    public function update($id, $data) {
        $venta = new Venta();
        $result = $venta->update($id, $data);
        echo json_encode(['success' => $result]);
    }

    public function delete($id) {
        $venta = new Venta();
        $result = $venta->delete($id);
        echo json_encode(['success' => $result]);
    }
}
?>
