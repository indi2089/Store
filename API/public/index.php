<?php
require_once '../controllers/MarcasController.php';

$controller = new MarcasController();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $controller->getById($_GET['id']);
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller->getAll();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $controller->create($data);
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $data);
    $controller->update($_GET['id'], $data);
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $controller->delete($_GET['id']);
}
?>