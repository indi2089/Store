<?php
// API/routes/prendas.php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['stock'])) {
    $query = "SELECT p.nombre, SUM(v.cantidad) AS vendidas, p.stock
              FROM prendas p
              INNER JOIN ventas v ON p.id = v.prenda_id
              GROUP BY p.id";
    $result = $conn->query($query);
    $data = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($data);
}
require_once '../controllers/PrendasController.php';
require_once '../config/db.php';

header('Content-Type: application/json');

// Inicializamos la conexión
$conn = (new Database())->connect();

$controller = new PrendasController();

// Manejo de solicitudes GET
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['stock'])) {
    $query = "SELECT p.nombre, SUM(v.cantidad) AS vendidas, p.stock
              FROM prendas p
              INNER JOIN ventas v ON p.id = v.prenda_id
              GROUP BY p.id";
    $result = $conn->query($query);
    $data = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($data);
    exit;
}

// Manejo de solicitudes POST para crear una nueva prenda
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar los datos del cuerpo de la solicitud
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['nombre']) && isset($data['precio']) && isset($data['stock'])) {
        // Llamar al método create del controlador
        $controller->create($data);
    } else {
        echo json_encode(['success' => false, 'message' => 'Faltan datos requeridos']);
    }
    exit;
}
?>
