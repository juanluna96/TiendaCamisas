CREATE DATABASE master-php_proyectopoo;
USE master-php_proyectopoo;

CREATE TABLE `usuarios` (
  `id` int(11) auto_increment not null,
  `nombre` varchar(255) not null,
  `apellidos` varchar(255),
  `email` varchar(255) not null,
  `password` varchar(255) not null,
  `rol_id` int(11) not null,
  `image` varchar(255) not null,
  PRIMARY KEY (`id`),
  CONSTRAINT fk_usuarios_roles FOREIGN KEY (rol_id) REFERENCES roles(id),
  CONSTRAINT uq_email UNIQUE(email)
);

CREATE TABLE `roles` (
  `id` int(11) auto_increment not null,
  `usuario_id` int(11) not null,
  `nombre_rol` varchar(100) not null,
  PRIMARY KEY (`id`)
);

CREATE TABLE `productos` (
  `id` int(11) auto_increment not null,
  `categoria_id` int(11) not null,
  `nombre` varchar(100) not null,
  `descripcion` MEDIUMTEXT,
  `precio` float(100,2) not null,
  `stock` int(11) not null,
  `oferta` varchar(2) not null,
  `fecha` date not null,
  `imagen` varchar(255) not null,
  PRIMARY KEY (`id`),
  CONSTRAINT fk_productos_categorias FOREIGN KEY (categoria_id) REFERENCES categoria(id)
);

CREATE TABLE `categoria` (
  `id` int(11) auto_increment not null,
  `nombre` varchar(100) not null,
  PRIMARY KEY (`id`)
);

CREATE TABLE `pedidos` (
  `id` int(11) auto_increment not null,
  `usuario_id` int(11) not null,
  `departamento` varchar(100) not null,
  `ciudad` varchar(100) not null,
  `codigo_postal` int(100),
  `direccion` varchar(255) not null,
  `piso` varchar(255),
  `coste_total` int(255) not null,
  `fecha` date,
  `hora` time,
  PRIMARY KEY (`id`),
  CONSTRAINT fk_pedidos_usuarios FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE `lineas_pedidos` (
  `id` int(11) auto_increment not null,
  `pedido_id` int(11) not null,
  `producto_id` int(11) not null,
  `unidades` int(11) not null,
  PRIMARY KEY (`id`),
  CONSTRAINT fk_linea_pedidos_pedidos FOREIGN KEY (pedido_id) REFERENCES pedidos(id),
  CONSTRAINT fk_linea_pedidos_productos FOREIGN KEY (producto_id) REFERENCES productos(id)
);

