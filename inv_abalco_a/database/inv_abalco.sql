CREATE TABLE `rol` (
    `id_rol` TINYINT(1) NOT NULL,
    `nombre_rol` VARCHAR(15) COLLATE UTF8MB4_UNICODE_CI NOT NULL,
    PRIMARY KEY (`id_rol`)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE = UTF8MB4_UNICODE_CI;


CREATE TABLE `usuario` (
    `id_usuario` VARCHAR(10) COLLATE UTF8MB4_UNICODE_CI NOT NULL,
    `nombre_usuario` VARCHAR(30) COLLATE UTF8MB4_UNICODE_CI NOT NULL,
    `apellido_usuario` VARCHAR(30) COLLATE UTF8MB4_UNICODE_CI NOT NULL,
    `email_usuario` VARCHAR(50) COLLATE UTF8MB4_UNICODE_CI DEFAULT NULL,
    `contra_usuario` VARCHAR(50) COLLATE UTF8MB4_UNICODE_CI NOT NULL,
    `fk_id_rol` TINYINT(1) NOT NULL,
    PRIMARY KEY (`id_usuario`),
    CONSTRAINT `alias_fk_id_rol_1` FOREIGN KEY (`fk_id_rol`)
        REFERENCES `rol` (`id_rol`)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE = UTF8MB4_UNICODE_CI;

CREATE TABLE `cliente` (
    `id_cliente` VARCHAR(10) COLLATE UTF8MB4_UNICODE_CI NOT NULL,
    `nombre_cliente` VARCHAR(30) COLLATE UTF8MB4_UNICODE_CI NOT NULL,
    `dir_cliente` VARCHAR(30) COLLATE UTF8MB4_UNICODE_CI NOT NULL,
    `tel_cliente` VARCHAR(15) COLLATE UTF8MB4_UNICODE_CI NOT NULL,
    `email_cliente` VARCHAR(30) COLLATE UTF8MB4_UNICODE_CI DEFAULT NULL,
    PRIMARY KEY (`id_cliente`)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE = UTF8MB4_UNICODE_CI;


CREATE TABLE `producto` (
    `id_prod` VARCHAR(10) COLLATE UTF8MB4_UNICODE_CI,
    `nombre_prod` VARCHAR(30) COLLATE UTF8MB4_UNICODE_CI NOT NULL,
    `marca_prod` VARCHAR(30) COLLATE UTF8MB4_UNICODE_CI DEFAULT NULL,
    `unidad_medida` VARCHAR(30) COLLATE UTF8MB4_UNICODE_CI NOT NULL,
    `cantidad` INT(10) NOT NULL,
    `precio` FLOAT NOT NULL,
    PRIMARY KEY (`id_prod`)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE = UTF8MB4_UNICODE_CI;


CREATE TABLE `proveedor` (
    `id_prov` VARCHAR(10) COLLATE UTF8MB4_UNICODE_CI NOT NULL,
    `nombre_prov` VARCHAR(30) COLLATE UTF8MB4_UNICODE_CI NOT NULL,
    `dir_prov` VARCHAR(30) COLLATE UTF8MB4_UNICODE_CI NOT NULL,
    `tel_prov` VARCHAR(15) COLLATE UTF8MB4_UNICODE_CI NOT NULL,
    `email_prov` VARCHAR(30) COLLATE UTF8MB4_UNICODE_CI DEFAULT NULL,
    PRIMARY KEY (`id_prov`)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE = UTF8MB4_UNICODE_CI;


CREATE TABLE `compra` (
    `id_compra` VARCHAR(10) COLLATE UTF8MB4_UNICODE_CI,
    `fk_id_admin` VARCHAR(10) COLLATE UTF8MB4_UNICODE_CI NOT NULL,
    `fk_id_proveedor` VARCHAR(10) COLLATE UTF8MB4_UNICODE_CI NOT NULL,
    `fecha` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id_compra`),
    CONSTRAINT `alias_fk_id_usuario_1` FOREIGN KEY (`fk_id_admin`)
        REFERENCES `usuario` (`id_usuario`),
    CONSTRAINT `alias_fk_id_proveedor_1` FOREIGN KEY (`fk_id_proveedor`)
        REFERENCES `proveedor` (`id_prov`)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE = UTF8MB4_UNICODE_CI;


CREATE TABLE `venta` (
    `id_venta` VARCHAR(10) COLLATE UTF8MB4_UNICODE_CI,
    `fk_id_vendedor` VARCHAR(10) COLLATE UTF8MB4_UNICODE_CI NOT NULL,
    `fk_id_cliente` VARCHAR(10) COLLATE UTF8MB4_UNICODE_CI NOT NULL,
    `fecha` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id_venta`),
    CONSTRAINT `alias_fk_id_usuario_2` FOREIGN KEY (`fk_id_vendedor`)
        REFERENCES `usuario` (`id_usuario`),
    CONSTRAINT `alias_fk_id_cliente_1` FOREIGN KEY (`fk_id_cliente`)
        REFERENCES `cliente` (`id_cliente`)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE = UTF8MB4_UNICODE_CI;


CREATE TABLE `detalle_compra` (
    `id_det_compra` INT(10) NOT NULL AUTO_INCREMENT,
    `fk_id_compra` VARCHAR(10) COLLATE UTF8MB4_UNICODE_CI,
    `fk_id_prod_compra` VARCHAR(10) COLLATE UTF8MB4_UNICODE_CI,
    `cantidad_comprada` INT(10) DEFAULT NULL,
    `valor_unitario` FLOAT NOT NULL,
    `valor_total` FLOAT NOT NULL,
    PRIMARY KEY (`id_det_compra`),
    CONSTRAINT `alias_fk_id_compra_1` FOREIGN KEY (`fk_id_compra`)
        REFERENCES `compra` (`id_compra`),
    CONSTRAINT `alias_fk_id_prod_1` FOREIGN KEY (`fk_id_prod_compra`)
        REFERENCES `producto` (`id_prod`)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE = UTF8MB4_UNICODE_CI;


CREATE TABLE `detalle_venta` (
    `id_det_venta` INT(10) NOT NULL AUTO_INCREMENT,
    `fk_id_venta` VARCHAR(10) COLLATE UTF8MB4_UNICODE_CI,
    `fk_id_prod_venta` VARCHAR(10) COLLATE UTF8MB4_UNICODE_CI,
    `cantidad_vendida` INT(10) DEFAULT NULL,
    `valor_unitario` FLOAT NOT NULL,
    `valor_total` FLOAT NOT NULL,
    PRIMARY KEY (`id_det_venta`),
    CONSTRAINT `alias_fk_id_venta_1` FOREIGN KEY (`fk_id_venta`)
        REFERENCES `venta` (`id_venta`),
    CONSTRAINT `alias_fk_id_prod_2` FOREIGN KEY (`fk_id_prod_venta`)
        REFERENCES `producto` (`id_prod`)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE = UTF8MB4_UNICODE_CI;

CREATE TABLE `movimiento` (
    `id_movimiento` INT(10) NOT NULL AUTO_INCREMENT,
    `fk_id_prod` VARCHAR(10) COLLATE UTF8MB4_UNICODE_CI NOT NULL,
    `fk_id_compra` VARCHAR(10) COLLATE UTF8MB4_UNICODE_CI NOT NULL,
    `fk_id_venta` VARCHAR(10) COLLATE UTF8MB4_UNICODE_CI NOT NULL,
    `cantidad_comprada` INT(10) NOT NULL,
    `cantidad_vendida` INT(10) DEFAULT NULL,
    `fecha_movimiento` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `responsable` VARCHAR(30) COLLATE UTF8MB4_UNICODE_CI NOT NULL,
    PRIMARY KEY (`id_movimiento`),
    CONSTRAINT `alias_fk_id_prod_3` FOREIGN KEY (`fk_id_prod`)
        REFERENCES `producto` (`id_prod`),
    CONSTRAINT `alias_fk_id_compra_2` FOREIGN KEY (`fk_id_compra`)
        REFERENCES `compra` (`id_compra`),
    CONSTRAINT `alias_fk_id_venta_2` FOREIGN KEY (`fk_id_venta`)
        REFERENCES `venta` (`id_venta`)
)  ENGINE=INNODB DEFAULT CHARSET=UTF8MB4 COLLATE = UTF8MB4_UNICODE_CI;

DELIMITER $$
CREATE TRIGGER `registro_compra_ai` AFTER INSERT ON `detalle_compra`
FOR EACH ROW INSERT INTO movimiento (
  fk_id_prod, 
  fk_id_compra, 
  fk_id_venta, 
  cantidad_comprada, 
  cantidad_vendida, 
  fecha_movimiento, 
  responsable
  ) 
  VALUES (
    NEW.fk_id_prod_compra, 
    NEW.fk_id_compra, 
    NULL, 
    NEW.cantidad_comprada, 
    NULL, 
    NOW(), 
    CURRENT_USER()
    )
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `registro_venta_ai` AFTER INSERT ON `detalle_venta`
FOR EACH ROW INSERT INTO movimiento (
  fk_id_prod, 
  fk_id_compra, 
  fk_id_venta, 
  cantidad_comprada, 
  cantidad_vendida, 
  fecha_movimiento, 
  responsable
  ) 
  VALUES (
    NEW.fk_id_prod_venta, 
    NULL, 
    NEW.fk_id_venta, 
    NULL, 
    NEW.cantidad_vendida, 
    NOW(), 
    CURRENT_USER()
    )
$$
DELIMITER ;

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Vendedor');

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `email_usuario`, `contra_usuario`, `fk_id_rol`) VALUES
('71318371', 'Jaime', 'Sierra', 'jaalsima1980@gmail.com', sha1('admin'), 1);

INSERT INTO `producto` (`id_prod`, `nombre_prod`, `marca_prod`, `unidad_medida`, `cantidad`, `precio`) VALUES
('prod_01', 'Pasta', 'Doria', 'Paquete x 250 gr.', 100, 1650),
('prod_02', 'Arroz', 'Roa', 'Libra', 200, 2400),
('prod_03', 'Gaseosa Uva', 'Postobón', 'Botella x 350 mm.', 250, 1700),
('prod_04', 'Gaseosa Limonada', 'Postobón', 'Botella x 350 mm.', 600, 1700),
('prod_05', 'Gaseosa Naranja', 'Postobón', 'Botella x 350 mm.', 470, 1700),
('prod_06', 'Gaseosa Manzana', 'Postobón', 'Botella x 350 mm.', 50, 1700),
('prod_07', 'Avena', 'Quaker', 'Libra', 460, 5300),
('prod_08', 'Malta', 'Pony Malta', 'Botella x 350 mm.', 100, 1800),
('prod_09', 'Leche Entera', 'Colanta', 'Litro', 100, 2200),
('prod_10', 'Papa Criolla', 'La Negra', 'Kilogramo', 100, 2700),
('prod_11', 'Maíz Trillado', 'Mr. Pop', 'Kilogramo', 100, 2800),
('prod_12', 'Maíz Pira', 'Mr. Pop', 'Kilogramo', 100, 3200),
('prod_13', 'Papa Capira', 'La Negra', 'Kilogramo', 100, 2100),
('prod_14', 'Salsa de Tomate', 'Fruco', 'Pack x 350 gr.', 100, 4500);

INSERT INTO `proveedor` (`id_prov`, `nombre_prov`, `dir_prov`, `tel_prov`, `email_prov`) VALUES
('prov_10215', 'Distribuidora \"L&P\"', 'Cl. 34 No 98-07', '322 365 3575', 'lope&paz@hotmail.com'),
('prov_10242', 'Panelería Malacia', 'Cra. 77 No 89-13', '320 369 7474', 'panemalac@gmail.com'),
('prov_10578', 'Distribuidora La MarÃ­a', 'Cll. 33 No 78 - 65', '312 357 5968', 'lamaria134@hotmail.com'),
('prov_11511', 'Cárnicos ', 'Cll 12. No 76 - 92', '311 369 8542', 'elpasterito@gmail.com'),
('prov_12125', 'Colanta', 'Cra. 89 No 98-06', '311 357 8556', 'colantasdh@gmail.com'),
('prov_15636', 'Alpina', 'Cra. 56 No 98-78', '311 255 2587', 'alpinadr@gmail.com');

INSERT INTO `cliente` (`id_cliente`, `nombre_cliente`, `dir_cliente`, `tel_cliente`, `email_cliente`) VALUES
('43568527', 'Camila', 'Durán', '322 356 3656', 'camilita123@gmail.com'),
('68965986', 'Marcos', 'Polo', '321 365 3748', 'marcopolo343@hotmail.com'),
('70369852', 'Jairo', 'Ramírez', '311 356 3458', 'cajairo3@gmail.com'),
('70578695', 'Pedro', 'Posada', '312 456 9857', 'pedropos@gmail.com'),
('71356465', 'Carlos', 'Vásquez', '310 326 3698', 'carlitos@gmail.com'),
('96365452', 'Cármen', 'Villa', '311 356 3585', 'carmvilla@gmail.com');