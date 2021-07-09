-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2021 a las 15:01:59
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inv_abalco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `doc_id_cliente` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_cliente` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir_cliente` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_cliente` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_cliente` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`doc_id_cliente`, `nombre_cliente`, `dir_cliente`, `tel_cliente`, `email_cliente`) VALUES
('43568527', 'Camila', 'DurÃ¡n', '322 356 3656', 'camilita123@gmail.com'),
('68965986', 'Marcos', 'Polo', '321 365 3748', 'marcopolo343@hotmail.com'),
('70369852', 'Jairo', 'RamÃ­rez', '311 356 3458', 'cajairo3@gmail.com'),
('70578695', 'Pedro', 'Posada', '312 456 9857', 'pedropos@gmail.com'),
('71356465', 'Carlos', 'VÃ¡squez', '310 326 3698', 'carlitos@gmail.com'),
('96365452', 'CÃ¡rmen', 'Villa', '311 356 3585', 'carmvilla@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(10) UNSIGNED NOT NULL,
  `doc_usuario` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_proveedor` int(10) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id_compra` int(10) UNSIGNED DEFAULT NULL,
  `id_prod` int(10) UNSIGNED NOT NULL,
  `cantidad_comprada` int(10) UNSIGNED DEFAULT NULL,
  `valor_unitario` float UNSIGNED NOT NULL,
  `valor_total` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--


--
-- Disparadores `detalle_compra`
--
DELIMITER $$
CREATE TRIGGER `registro_compra_ai` AFTER INSERT ON `detalle_compra` FOR EACH ROW INSERT INTO inventario (id_prod, id_compra, id_venta, cantidad_comprada, cantidad_vendida, fecha_movimiento, responsable) VALUES (NEW.id_prod, NEW.id_compra, NULL, NEW.cantidad, NULL, NOW(), CURRENT_USER())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_venta` int(10) UNSIGNED DEFAULT NULL,
  `id_prod` int(10) UNSIGNED NOT NULL,
  `valor_unitario` float UNSIGNED NOT NULL,
  `cantidad_vendida` int(10) UNSIGNED DEFAULT NULL,
  `valor_total` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_venta`, `id_prod`, `valor_unitario`, `cantidad_vendida`, `valor_total`) VALUES
(6, 3, 2, 1800, 5, 9000);

--
-- Disparadores `detalle_venta`
--
DELIMITER $$
CREATE TRIGGER `registro_venta_ai` AFTER INSERT ON `detalle_venta` FOR EACH ROW INSERT INTO inventario (id_prod, id_compra, id_venta,cantidad_comprada, cantidad_vendida, fecha_movimiento, responsable) VALUES (NEW.id_prod, NULL, NEW.id_venta, NULL, NEW.cantidad, NOW(), CURRENT_USER())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_movimiento` int(10) UNSIGNED NOT NULL,
  `id_prod` int(10) UNSIGNED NOT NULL,
  `id_det_compra` int(10) UNSIGNED DEFAULT NULL,
  `id_det_venta` int(10) UNSIGNED DEFAULT NULL,
  `cantidad_comprada` int(10) UNSIGNED NOT NULL,
  `cantidad_vendida` int(11) DEFAULT NULL,
  `fecha_movimiento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `responsable` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_inventario`, `id_prod`, `id_compra`, `id_venta`, `cantidad_comprada`, `cantidad_vendida`, `fecha_movimiento`, `responsable`) VALUES
(8, 2, 15, NULL, 50, NULL, '2021-05-25 09:41:55', 'root@localhost'),
(9, 3, 16, NULL, 500, NULL, '2021-05-25 09:43:41', 'root@localhost'),
(10, 2, 17, NULL, 100, NULL, '2021-05-25 10:11:44', 'root@localhost'),
(11, 2, 18, NULL, 10, NULL, '2021-05-25 10:25:18', 'root@localhost'),
(12, 2, NULL, 6, 5, NULL, '2021-05-25 12:02:34', 'root@localhost');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_prod` varchar(10) UNSIGNED NOT NULL,
  `nombre_prod` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca_prod` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unidad_medida` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` int(10) UNSIGNED NOT NULL,
  `precio` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_prod`, `nombre_prod`, `marca_prod`, `unidad_medida`, `cantidad`, `precio`) VALUES
('1', 'Pasta', 'Doria', 'Paquete x 250 gr.', 100, 1650),
('2', 'Arroz', 'Roa', 'Libra', 200, 2400),
('3', 'Gaseosa Uva', 'Postobón', 'Botella x 350 mm.', 250, 1700),
('4', 'Gaseosa Limonada', 'Postobón', 'Botella x 350 mm.', 600, 1700),
('5', 'Gaseosa Naranja', 'Postobón', 'Botella x 350 mm.', 470, 1700),
('6', 'Gaseosa Manzana', 'Postobón', 'Botella x 350 mm.', 50, 1700),
('7', 'Avena', 'Quaker', 'Libra', 460, 5300),
('8', 'Malta', 'Pony Malta', 'Botella x 350 mm.', 100, 1800),
('9', 'Leche Entera', 'Colanta', 'Litro', 100, 2200),
('10', 'Papa Criolla', 'La Negra', 'Kilogramo', 100, 2700),
('11', 'Maíz Trillado', 'Mr. Pop', 'Kilogramo', 100, 2800),
('12', 'Maíz Pira', 'Mr. Pop', 'Kilogramo', 100, 3200),
('13', 'Papa Capira', 'La Negra', 'Kilogramo', 100, 2100),
('14', 'Salsa de Tomate', 'Fruco', 'Pack x 350 gr.', 100, 4500);



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_prov` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_prov` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir_prov` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_prov` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_prov` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_prov`, `nombre_prov`, `dir_prov`, `tel_prov`, `email_prov`) VALUES
('1021545698', 'Distribuidora \"L&P\"', 'Cl. 34 No 98-07', '322 365 3575', 'lope&paz@hotmail.com'),
('1024256369', 'PanelerÃ­a Malacia', 'Cra. 77 No 89-13', '320 369 7474', 'panemalac@gmail.com'),
('1057895642', 'Distribuidora La MarÃ­a', 'Cll. 33 No 78 - 65', '312 357 5968', 'lamaria134@hotmail.com'),
('1151156301', 'CÃ¡rnicos ', 'Cll 12. No 76 - 92', '311 369 8542', 'elpasterito@gmail.com'),
('1212566516', 'Colanta', 'Cra. 89 No 98-06', '311 357 8556', 'colantasdh@gmail.com'),
('1563698575', 'Alpina', 'Cra. 56 No 98-78', '311 255 2587', 'alpinadr@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` tinyint(1) NOT NULL,
  `nombre_rol` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Vendedor'),

(19, 'Almacenista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `doc_identidad` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_rol` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`doc_identidad`, `nombre`, `apellido`, `tipo_rol`) VALUES
('71123456', 'Pablo', 'Posada', 2),
('71318371', 'Jaime', 'Sierra', 1),
('71356985', 'Manuel', 'Bedoya', 2),
('98356996', 'Zamara', 'Meza', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(10) UNSIGNED NOT NULL,
  `doc_usuario` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_cliente` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--


--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`doc_id_cliente`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `fk_usuario_1` (`doc_usuario`),
  ADD KEY `fk_proveedor_1` (`id_proveedor`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id_compra`, `id_prod`),
  ADD KEY `fk_compra_1` (`id_compra`),
  ADD KEY `fk_producto_1` (`id_prod`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id_venta`, `id_prod`),
  ADD KEY `fk_venta_1` (`id_venta`),
  ADD KEY `fk_producto_2` (`id_prod`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_inventario`),
  ADD KEY `fk_compra_2` (`id_compra`),
  ADD KEY `fk_venta_2` (`id_venta`),
  ADD KEY `fk_producto_3` (`id_prod`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_prod`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`doc_identidad`),
  ADD KEY `fk_id_rol` (`tipo_rol`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `fk_usuario_2` (`doc_usuario`),
  ADD KEY `fk_cliente_1` (`doc_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_movimiento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;



--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fk_proveedor_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_prov`),
  ADD CONSTRAINT `fk_usuario_1` FOREIGN KEY (`doc_usuario`) REFERENCES `usuario` (`doc_identidad`);

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `fk_compra_1` FOREIGN KEY (`id_compra`) REFERENCES `compra` (`id_compra`),
  ADD CONSTRAINT `fk_producto_1` FOREIGN KEY (`id_prod`) REFERENCES `producto` (`id_prod`);

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `fk_venta_1` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`);
  ADD CONSTRAINT `fk_producto_2` FOREIGN KEY (`id_prod`) REFERENCES `producto` (`id_prod`),

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `fk_compra_2` FOREIGN KEY (`id_compra`) REFERENCES `detalle_compra` (`id_compra`),
  ADD CONSTRAINT `fk_venta_2` FOREIGN KEY (`id_venta`) REFERENCES `detalle_venta` (`id_venta`),
  ADD CONSTRAINT `fk_producto_3` FOREIGN KEY (`id_prod`) REFERENCES `producto` (`id_prod`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_id_rol` FOREIGN KEY (`tipo_rol`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_cliente_1` FOREIGN KEY (`doc_cliente`) REFERENCES `cliente` (`doc_id_cliente`),
  ADD CONSTRAINT `fk_usuario_2` FOREIGN KEY (`doc_usuario`) REFERENCES `usuario` (`doc_identidad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

SHOW DATABASES;























 update proveedor set 
 nombre_prov = 'Granos & Legumbres S.A.',
 dir_prov = 'Cra. 65 No 67-81', 
 tel_prov = '312 365 6598', 
 email_prov = 'gragumbres@hotmail.com' 
 where id_prov = 'prov_74658';

























