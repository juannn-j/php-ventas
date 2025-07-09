-- Tabla Familia
CREATE TABLE IF NOT EXISTS familia (
    idfamilia SERIAL PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    descripcion VARCHAR(50)
);

INSERT INTO familia (nombre, descripcion) VALUES ('Bebidas', 'Todo bebidas');
INSERT INTO familia (nombre, descripcion) VALUES ('Lácteos', 'Todo lácteos');

-- Tabla Cliente
CREATE TABLE IF NOT EXISTS cliente (
    idcliente SERIAL PRIMARY KEY,
    nombres VARCHAR(50) NOT NULL,
    apellidos VARCHAR(50) NOT NULL,
    dni VARCHAR(8) UNIQUE NOT NULL
);

INSERT INTO cliente (nombres, apellidos, dni) VALUES ('Sussie', 'Rendon Rendon', '71717171');
INSERT INTO cliente (nombres, apellidos, dni) VALUES ('Pepe', 'Medina Medina', '72727272');

create table if not exists categoria
(
	idcategoria serial primary key,
	nombre varchar(30),
	idfamilia int
);
insert into categoria (nombre, idfamilia) values ('Agua Mineral',1);
insert into categoria (nombre, idfamilia) values ('Gaseosas',1);
select * from categoria;

-- Tabla Proveedor
CREATE TABLE IF NOT EXISTS proveedor (
    idproveedor SERIAL PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    ruc VARCHAR(11) UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS producto (
    idproducto serial primary key,
    nombre varchar(30),
    stock int,
    monto NUMERIC(10, 2),
    idcategoria int,
    idfamilia int
);
