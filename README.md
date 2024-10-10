# scripts
-- Tabla de Marcas
CREATE TABLE tienda_ropa_mujer_marca (
    id_marca INT AUTO_INCREMENT PRIMARY KEY,  -- id autoincrementable para las marcas
    nombre VARCHAR(50) NOT NULL UNIQUE        -- Nombre único de la marca
);
 
-- Tabla de Prendas
CREATE TABLE tienda_ropa_mujer_prenda (
    id_prenda INT AUTO_INCREMENT PRIMARY KEY,       -- id autoincrementable para las prendas
    nombre VARCHAR(50) NOT NULL,                    -- Nombre de la prenda
    id_marca INT,                                   -- Clave foránea que refiere a la tabla de marcas
    precio DECIMAL(10, 2) NOT NULL CHECK (precio >= 0), -- Precio de la prenda, con 2 decimales
    FOREIGN KEY (id_marca) REFERENCES tienda_ropa_mujer_marca(id_marca) -- Relación con la tabla de marcas
);
 
-- Tabla de Ventas
CREATE TABLE tienda_ropa_mujer_ventas (
    id_venta INT AUTO_INCREMENT PRIMARY KEY,        -- id autoincrementable para las ventas
    id_prenda INT,                                  -- Clave foránea que refiere a la tabla de prendas
    cantidad INT NOT NULL CHECK (cantidad > 0),     -- Cantidad vendida, debe ser mayor a 0
    fecha_venta DATE NOT NULL,                      -- Fecha de la venta
    precio DECIMAL(10, 2) NOT NULL CHECK (precio >= 0), -- Precio al que se vendió la prenda
    FOREIGN KEY (id_prenda) REFERENCES tienda_ropa_mujer_prenda(id_prenda) -- Relación con la tabla de prendas
);
INSERT INTO tienda_ropa_mujer_marca (nombre)
VALUES ('Marca A'), ('Marca B'), ('Marca C');
