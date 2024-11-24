CREATE VIEW marcas_con_ventas AS
SELECT DISTINCT marcas.nombre
FROM marcas
JOIN prendas ON marcas.id = prendas.marca_id
JOIN ventas ON prendas.id = ventas.prenda_id;

CREATE VIEW prendas_stock AS
SELECT prendas.nombre, prendas.stock
FROM prendas;

CREATE VIEW top_5_marcas AS
SELECT marcas.nombre, COUNT(ventas.id) AS ventas_totales
FROM marcas
JOIN prendas ON marcas.id = prendas.marca_id
JOIN ventas ON prendas.id = ventas.prenda_id
GROUP BY marcas.id
ORDER BY ventas_totales DESC
LIMIT 5;
