<?php
// API/routes/marcas.php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ventas'])) {
    $query = "SELECT DISTINCT m.nombre FROM marcas m
              INNER JOIN prendas p ON m.id = p.marca_id
              INNER JOIN ventas v ON p.id = v.prenda_id";
    $result = $conn->query($query);
    $data = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($data);
}
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['top'])) {
    $query = "SELECT m.nombre, SUM(v.cantidad) AS ventas_totales
              FROM marcas m
              INNER JOIN prendas p ON m.id = p.marca_id
              INNER JOIN ventas v ON p.id = v.prenda_id
              GROUP BY m.id
              ORDER BY ventas_totales DESC
              LIMIT 5";
    $result = $conn->query($query);
    $data = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($data);
}
?>