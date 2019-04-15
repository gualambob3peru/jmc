-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-04-2019 a las 20:46:55
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jmc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(90) NOT NULL,
  `apellidoPaterno` varchar(90) NOT NULL,
  `apellidoMaterno` varchar(90) NOT NULL,
  `nombresCompletos` varchar(120) NOT NULL,
  `idTipoDocumentos` int(11) NOT NULL,
  `documento` varchar(30) NOT NULL,
  `direccion` text NOT NULL,
  `correo` varchar(90) NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `idEstados` int(11) NOT NULL,
  `fechaRegistro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombres`, `apellidoPaterno`, `apellidoMaterno`, `nombresCompletos`, `idTipoDocumentos`, `documento`, `direccion`, `correo`, `saldo`, `idEstados`, `fechaRegistro`) VALUES
(1, 'Franz', 'Gualambo', 'Giraldo', 'Gualambo Giraldo Franz', 1, '44556677', 'Pro', 'gualambo@gmail.com', '12150.00', 1, '2019-04-12 17:22:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `ruc` varchar(90) NOT NULL,
  `razonSocial` varchar(150) NOT NULL,
  `idEstados` int(11) NOT NULL,
  `fechaRegistro` datetime NOT NULL,
  `fechaCompras` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `ruc`, `razonSocial`, `idEstados`, `fechaRegistro`, `fechaCompras`) VALUES
(1, '123123', 'sgsfg', 1, '2019-04-15 12:27:33', '2019-04-15 12:27:00'),
(2, '123123', 'sgsfg', 1, '2019-04-15 12:28:25', '2019-04-15 12:27:00'),
(3, '123123', 'sgsfg', 1, '2019-04-15 13:28:33', '2019-04-15 13:28:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprasrepuestos`
--

CREATE TABLE `comprasrepuestos` (
  `id` int(11) NOT NULL,
  `idCompras` int(11) NOT NULL,
  `idRepuestos` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costo` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comprasrepuestos`
--

INSERT INTO `comprasrepuestos` (`id`, `idCompras`, `idRepuestos`, `cantidad`, `costo`) VALUES
(1, 1, 0, 0, '0.00'),
(2, 2, 1, 10, '100.00'),
(3, 3, 1, 10, '11.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosgenerales`
--

CREATE TABLE `datosgenerales` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(90) NOT NULL,
  `valor` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datosgenerales`
--

INSERT INTO `datosgenerales` (`id`, `descripcion`, `valor`) VALUES
(1, 'tipoCambio', '3.21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregas`
--

CREATE TABLE `entregas` (
  `id` int(11) NOT NULL,
  `idVehiculos` int(11) NOT NULL,
  `fechaRegistro` datetime NOT NULL,
  `fechaServicio` datetime NOT NULL,
  `idEstados` int(11) NOT NULL,
  `observaciones` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `entregas`
--

INSERT INTO `entregas` (`id`, `idVehiculos`, `fechaRegistro`, `fechaServicio`, `idEstados`, `observaciones`) VALUES
(1, 1, '2019-04-12 17:23:32', '2019-04-12 00:00:00', 0, 'mi Observacion'),
(2, 1, '2019-04-15 10:47:46', '2019-04-15 00:00:00', 0, ''),
(3, 1, '2019-04-15 10:51:32', '2019-04-15 00:00:00', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregaservicios`
--

CREATE TABLE `entregaservicios` (
  `id` int(11) NOT NULL,
  `idPersonas` int(11) NOT NULL,
  `idServicios` int(11) NOT NULL,
  `idEntregas` int(11) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `observacionesServicio` text NOT NULL,
  `idEstados` int(11) NOT NULL DEFAULT '1',
  `fechaRegistro` datetime NOT NULL,
  `fechaServicio` datetime NOT NULL,
  `montoTotal` decimal(10,2) NOT NULL,
  `montoRepuestos` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `entregaservicios`
--

INSERT INTO `entregaservicios` (`id`, `idPersonas`, `idServicios`, `idEntregas`, `monto`, `observacionesServicio`, `idEstados`, `fechaRegistro`, `fechaServicio`, `montoTotal`, `montoRepuestos`) VALUES
(1, 1, 1, 1, '500.00', 'wdwd', 1, '2019-04-12 17:25:13', '2019-04-12 00:00:00', '500.00', '0.00'),
(2, 1, 1, 2, '299.00', 'sdSD', 0, '2019-04-15 10:47:59', '2019-04-15 00:00:00', '299.00', '0.00'),
(3, 1, 1, 3, '150.00', '', 1, '2019-04-15 10:51:40', '2019-04-15 00:00:00', '7150.00', '7000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(90) NOT NULL,
  `idEstados` int(11) NOT NULL,
  `fechaRegistro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `descripcion`, `idEstados`, `fechaRegistro`) VALUES
(1, 'Toyota', 1, '0000-00-00 00:00:00'),
(2, 'Audi', 1, '0000-00-00 00:00:00'),
(3, 'Kia', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

CREATE TABLE `modelos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(90) NOT NULL,
  `idMarcas` int(11) NOT NULL,
  `idEstados` int(11) NOT NULL,
  `fechaRegistro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modelos`
--

INSERT INTO `modelos` (`id`, `descripcion`, `idMarcas`, `idEstados`, `fechaRegistro`) VALUES
(1, 'Yaris', 1, 1, '0000-00-00 00:00:00'),
(2, 'Tucson', 1, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagoclientes`
--

CREATE TABLE `pagoclientes` (
  `id` int(11) NOT NULL,
  `idClientes` int(11) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `tipoCambio` varchar(11) NOT NULL,
  `idTipoPago` int(11) NOT NULL,
  `documento` int(11) NOT NULL,
  `fechaRegistro` datetime NOT NULL,
  `fechaPago` datetime NOT NULL,
  `idTipoMoneda` int(11) NOT NULL,
  `idEstados` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `nombres` varchar(90) NOT NULL,
  `apellidoPaterno` varchar(90) NOT NULL,
  `apellidoMaterno` varchar(90) NOT NULL,
  `nombresCompletos` varchar(270) NOT NULL,
  `idTipoPersonas` int(11) NOT NULL,
  `idEstados` int(11) NOT NULL,
  `idTipoDocumentos` int(11) NOT NULL,
  `documento` varchar(30) NOT NULL,
  `correo` varchar(90) NOT NULL,
  `direccion` varchar(90) NOT NULL,
  `fechaRegistro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombres`, `apellidoPaterno`, `apellidoMaterno`, `nombresCompletos`, `idTipoPersonas`, `idEstados`, `idTipoDocumentos`, `documento`, `correo`, `direccion`, `fechaRegistro`) VALUES
(1, 'Mecanico 1', 'Mecanico', 'Mecanico', 'Mecanico Mecanico Mecanico', 1, 1, 1, '22334455', 'mecanico@gmail.com', 'San diego', '2019-04-12 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piezas`
--

CREATE TABLE `piezas` (
  `id` int(11) NOT NULL,
  `codigo` varchar(30) NOT NULL,
  `descripcion` varchar(90) NOT NULL,
  `costo` decimal(10,2) NOT NULL,
  `idEstados` int(11) NOT NULL,
  `fechaRegistro` datetime NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `piezas`
--

INSERT INTO `piezas` (`id`, `codigo`, `descripcion`, `costo`, `idEstados`, `fechaRegistro`, `stock`) VALUES
(1, 'P001', 'Llantas', '300.00', 1, '2019-04-12 00:00:00', 44),
(2, 'P002', 'Motor 001', '1500.00', 1, '2019-04-12 00:00:00', 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serviciorepuestos`
--

CREATE TABLE `serviciorepuestos` (
  `id` int(11) NOT NULL,
  `idEntregaServicios` int(11) NOT NULL,
  `idPiezas` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `idEstados` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `serviciorepuestos`
--

INSERT INTO `serviciorepuestos` (`id`, `idEntregaServicios`, `idPiezas`, `cantidad`, `monto`, `idEstados`) VALUES
(1, 1, 1, 4, '1200.00', 0),
(2, 1, 1, 2, '600.00', 0),
(3, 1, 1, 10, '3000.00', 0),
(4, 1, 1, 50, '15000.00', 0),
(5, 1, 1, 10, '3000.00', 0),
(6, 1, 1, 10, '3000.00', 0),
(7, 1, 0, 10, '3000.00', 1),
(8, 1, 0, 10, '3000.00', 1),
(9, 1, 0, 10, '3000.00', 1),
(10, 1, 0, 10, '3000.00', 1),
(11, 2, 1, 10, '3000.00', 0),
(12, 3, 1, 5, '1500.00', 0),
(13, 3, 1, 20, '6000.00', 0),
(14, 3, 2, 5, '7500.00', 0),
(15, 3, 1, 10, '3000.00', 0),
(16, 3, 1, 10, '3000.00', 0),
(17, 3, 1, 10, '3000.00', 0),
(18, 3, 1, 5, '1500.00', 0),
(19, 3, 2, 10, '15000.00', 0),
(20, 3, 1, 10, '3000.00', 0),
(21, 3, 1, 10, '3000.00', 0),
(22, 3, 2, 10, '15000.00', 0),
(23, 3, 2, 5, '5000.00', 1),
(24, 3, 1, 10, '2000.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(90) DEFAULT NULL,
  `detalle` text,
  `idEstados` int(11) NOT NULL,
  `fechaRegistro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `descripcion`, `detalle`, `idEstados`, `fechaRegistro`) VALUES
(1, 'servicio 112', 'descripcion...1212', 1, '0000-00-00 00:00:00'),
(2, 'qer', 'qereqr', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumentos`
--

CREATE TABLE `tipodocumentos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(90) NOT NULL,
  `idEstados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipodocumentos`
--

INSERT INTO `tipodocumentos` (`id`, `descripcion`, `idEstados`) VALUES
(1, 'dni', 1),
(2, 'ruc', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomonedas`
--

CREATE TABLE `tipomonedas` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(90) NOT NULL,
  `simbolo` varchar(90) NOT NULL,
  `idEstados` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipomonedas`
--

INSERT INTO `tipomonedas` (`id`, `descripcion`, `simbolo`, `idEstados`) VALUES
(1, 'Soles', 'S./', 1),
(2, 'Dolares', '$.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopagos`
--

CREATE TABLE `tipopagos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(90) NOT NULL,
  `idEstados` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipopagos`
--

INSERT INTO `tipopagos` (`id`, `descripcion`, `idEstados`) VALUES
(1, 'efectivo', 1),
(2, 'desposito', 1),
(3, 'cheque', 1),
(4, 'transferencia', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopersonas`
--

CREATE TABLE `tipopersonas` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(90) NOT NULL,
  `idEstados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipopersonas`
--

INSERT INTO `tipopersonas` (`id`, `descripcion`, `idEstados`) VALUES
(1, 'mecanico', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(60) NOT NULL,
  `contrasena` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `contrasena`) VALUES
(1, 'admin', 'ca0c54a49b943283fbce6571219b0d5f');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `placa` varchar(15) NOT NULL,
  `idMarcas` int(11) NOT NULL,
  `idModelos` int(11) NOT NULL,
  `motor` varchar(60) NOT NULL,
  `anio` int(11) NOT NULL,
  `serie` varchar(60) NOT NULL,
  `imagen` varchar(90) NOT NULL,
  `idClientes` int(11) NOT NULL,
  `idEstados` int(11) NOT NULL,
  `fechaRegistro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `placa`, `idMarcas`, `idModelos`, `motor`, `anio`, `serie`, `imagen`, `idClientes`, `idEstados`, `fechaRegistro`) VALUES
(1, 'AUU112', 1, 1, '12312', 2022, 'daf', '1.png', 1, 1, '2019-04-12 17:23:11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comprasrepuestos`
--
ALTER TABLE `comprasrepuestos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datosgenerales`
--
ALTER TABLE `datosgenerales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entregas`
--
ALTER TABLE `entregas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entregaservicios`
--
ALTER TABLE `entregaservicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagoclientes`
--
ALTER TABLE `pagoclientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `piezas`
--
ALTER TABLE `piezas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `serviciorepuestos`
--
ALTER TABLE `serviciorepuestos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipodocumentos`
--
ALTER TABLE `tipodocumentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipomonedas`
--
ALTER TABLE `tipomonedas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipopagos`
--
ALTER TABLE `tipopagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipopersonas`
--
ALTER TABLE `tipopersonas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `comprasrepuestos`
--
ALTER TABLE `comprasrepuestos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `datosgenerales`
--
ALTER TABLE `datosgenerales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `entregas`
--
ALTER TABLE `entregas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `entregaservicios`
--
ALTER TABLE `entregaservicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `modelos`
--
ALTER TABLE `modelos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pagoclientes`
--
ALTER TABLE `pagoclientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `piezas`
--
ALTER TABLE `piezas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `serviciorepuestos`
--
ALTER TABLE `serviciorepuestos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipodocumentos`
--
ALTER TABLE `tipodocumentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipomonedas`
--
ALTER TABLE `tipomonedas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipopagos`
--
ALTER TABLE `tipopagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipopersonas`
--
ALTER TABLE `tipopersonas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
