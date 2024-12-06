INSERT INTO marcas (nombre) VALUES ('Marca A'), ('Marca B');
INSERT INTO prendas (nombre, marca_id, precio, stock) VALUES
    ('Camisa', 1, 19.99, 50),
    ('Pantalón', 2, 39.99, 30);
INSERT INTO ventas (prenda_id, cantidad, fecha) VALUES (1, 2, '2024-11-01');