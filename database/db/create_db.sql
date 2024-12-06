CREATE DATABASE tienda;
USE tienda;

CREATE TABLE marcas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
);

CREATE TABLE prendas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    marca_id INT,
    precio DECIMAL(10, 2),
    stock INT,
    FOREIGN KEY (marca_id) REFERENCES marcas(id)
);

CREATE TABLE ventas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prenda_id INT,
    cantidad INT,
    fecha DATE,
    FOREIGN KEY (prenda_id) REFERENCES prendas(id)
);