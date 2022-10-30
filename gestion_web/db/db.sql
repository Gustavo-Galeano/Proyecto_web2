-- Active: 1658682724165@@127.0.0.1@3306

CREATE DATABASE proyecto_web2 DEFAULT CHARACTER SET = 'utf8mb4';

use proyecto_web2;

create table
    usuarios(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        nombre VARCHAR(20),
        apellido VARCHAR(20),
        usuario VARCHAR(20),
        password VARCHAR(20)
    );

insert into
    usuarios (
        nombre,
        apellido,
        usuario,
        password
    )
values (
        'gustavo',
        'galeano',
        'admin',
        '1'
    );

select * from usuarios;

create table
    categorias(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        descripcion VARCHAR(40)
    );

insert into categorias (descripcion) values('Mouse');

create table
    datos (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        nombre varchar(10),
        apellido varchar(10),
        usuario varchar(10),
        pass varchar(20)
    );

insert into
    datos (
        nombre,
        apellido,
        usuario,
        pass
    )
values (
        'gustavo',
        'galeano',
        'w',
        '1'
    );

select * from datos;

create table carrito(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    idcliente INT,
    idproducto INT,
    cantidad INT, 
    precio INT, 
    fecha DATE, 
    estado TEXT,
    idusuario INT
);

create table productos(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    idcat INT,
    descripcion VARCHAR(50),
    precio INT,
    img VARCHAR(50),
    resena VARCHAR(30)
);

select * from carrito;



