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
