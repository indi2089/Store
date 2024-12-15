SELECT prenda_id, SUM(cantidad) AS total_vendido
FROM ventas
WHERE fecha = '2024-11-01'
GROUP BY prenda_id;