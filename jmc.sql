-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-04-2019 a las 16:12:49
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
(1, 'Franz Wilder', 'Gualambo', 'Giraldo', 'Gualambo Giraldo Franz Wilder', 2, '12345678', 'Urb Prolima Los Olivos', 'sdfsdf@gmail.com', '0.00', 1, '0000-00-00 00:00:00'),
(2, 'afaefaef', 'efafe', 'aefaef', 'efafe aefaef afaefaef', 1, '', 'fsdssdf', 'afadf@fgasfadf.com', '0.00', 0, '0000-00-00 00:00:00'),
(3, 'adf', 'adfad', 'adfa', 'adfad adfa adf', 1, '', '4dfsd', 'aasdsad@dffsdf.com', '844.23', 1, '0000-00-00 00:00:00'),
(4, 'aaa', 'bb', 'cc', 'bb cc aaa', 1, '', 'dd', 'eee@gmai.com', '1234.00', 1, '0000-00-00 00:00:00'),
(5, 'aaaa', 'saaaaa', 'aaaa', 'saaaaa aaaa aaaa', 1, '', 'bbbb', 'ccc@cccc.com', '0.00', 1, '0000-00-00 00:00:00'),
(6, 'bbb', 'bbb', 'bbb', 'bbb bbb bbb', 1, '', 'fff', 'fff@gmail.com', '0.00', 1, '2019-03-18 00:00:00'),
(7, 'ererer', 'erer', 'erere', 'erer erere ererer', 1, '', 'erer', 'erererer@gmail.com', '0.00', 1, '2019-03-19 00:00:00'),
(8, 'Renzo', 'Gualambo', 'Giraldo', 'Gualambo Giraldo Renzo', 1, '', 'dksoginsn', 'dsgs@gamdigad.com', '0.00', 1, '2019-03-19 00:00:00');

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
(1, '123123', 'proveedor 1', 1, '2019-04-06 14:35:37', '2019-04-06 14:35:00'),
(2, '123123', 'sfgsfg', 1, '2019-04-06 14:38:51', '2019-04-06 14:38:00'),
(3, '123123', 'sfgsfg', 1, '2019-04-06 16:47:53', '2019-04-06 16:47:00');

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
(1, 1, 1, 100, '500.00'),
(2, 1, 2, 150, '600.00'),
(3, 2, 1, 500, '123.00'),
(4, 2, 2, 600, '123.00'),
(5, 3, 2, 123, '123.00'),
(6, 3, 1, 456, '123.00');

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
(1, 10, '0000-00-00 00:00:00', '2019-03-15 00:00:00', 1, 'aaa'),
(2, 10, '2019-03-23 00:00:00', '2019-03-02 00:00:00', 0, ''),
(3, 7, '0000-00-00 00:00:00', '2019-03-24 00:00:00', 0, ''),
(4, 10, '2019-04-20 00:00:00', '0000-00-00 00:00:00', 0, 'daadf'),
(5, 10, '2019-04-02 00:00:00', '2019-04-20 00:00:00', 0, 'daadf'),
(6, 10, '2019-04-02 00:00:00', '2019-04-20 00:00:00', 1, 'daadf'),
(7, 10, '2019-04-02 00:00:00', '2019-04-20 00:00:00', 1, 'daadf'),
(8, 10, '2019-04-02 00:00:00', '2019-04-20 00:00:00', 1, 'daadf'),
(9, 10, '2019-04-02 00:00:00', '2019-04-20 00:00:00', 1, 'daadf'),
(10, 10, '2019-04-02 00:00:00', '2019-04-20 00:00:00', 1, 'daadf'),
(11, 10, '2019-04-02 00:00:00', '2019-04-20 00:00:00', 1, 'daadf'),
(12, 1, '2019-04-03 00:00:00', '2019-04-03 00:00:00', 1, 'ob'),
(13, 3, '2019-04-03 00:00:00', '2019-04-03 00:00:00', 0, 'GGG'),
(14, 5, '2019-04-04 00:00:00', '2019-04-04 00:00:00', 0, 'hhhh'),
(15, 1, '2019-04-04 00:00:00', '2019-04-04 00:00:00', 1, 'ii'),
(16, 1, '2019-04-04 00:00:00', '2019-04-04 00:00:00', 1, 'iuiu gttgtgtg'),
(17, 2, '2019-04-04 00:00:00', '2019-04-04 00:00:00', 1, 'kjnon'),
(18, 3, '2019-04-04 10:57:41', '2019-04-04 00:00:00', 0, 'adfadf'),
(19, 3, '2019-04-04 10:59:38', '0000-00-00 00:00:00', 1, 'hhhhhh'),
(20, 3, '2019-04-05 11:55:14', '2019-04-05 00:00:00', 1, 'hch'),
(21, 3, '2019-04-05 11:57:07', '2019-04-05 00:00:00', 1, 'wrvwrv'),
(22, 6, '2019-04-05 11:57:38', '2019-04-09 00:00:00', 1, 'scc');

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
  `fechaServicio` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `entregaservicios`
--

INSERT INTO `entregaservicios` (`id`, `idPersonas`, `idServicios`, `idEntregas`, `monto`, `observacionesServicio`, `idEstados`, `fechaRegistro`, `fechaServicio`) VALUES
(1, 1, 1, 19, '123.45', 'kkkkk', 0, '2019-04-04 12:19:56', '2019-04-09 00:00:00'),
(2, 3, 1, 19, '123.00', '234', 0, '2019-04-04 12:41:29', '2019-04-04 00:00:00'),
(3, 3, 1, 19, '123.00', '234', 0, '2019-04-04 12:41:50', '2019-04-04 00:00:00'),
(4, 1, 1, 19, '1234.00', 'sfgsfg', 0, '2019-04-04 12:42:29', '2019-04-04 00:00:00'),
(5, 1, 1, 19, '1234.00', 'sfgsfg', 0, '2019-04-04 12:43:08', '2019-04-04 00:00:00'),
(6, 1, 1, 19, '1234.00', 'sfgsfg', 0, '2019-04-04 12:43:20', '2019-04-04 00:00:00'),
(7, 3, 1, 19, '345.00', 'qer', 0, '2019-04-04 12:43:55', '2019-04-04 00:00:00'),
(8, 1, 1, 19, '345.00', 'sfgsfg', 0, '2019-04-04 12:45:06', '2019-04-04 00:00:00'),
(9, 1, 1, 19, '345.00', 'sfgsfg', 0, '2019-04-04 12:45:49', '2019-04-04 00:00:00'),
(10, 1, 1, 19, '345.00', 'sfgsfg', 0, '2019-04-04 12:46:00', '2019-04-04 00:00:00'),
(11, 1, 1, 19, '345.00', 'sfgsfg', 0, '2019-04-04 12:46:24', '2019-04-04 00:00:00'),
(12, 1, 1, 19, '456.00', 'asdasd', 0, '2019-04-04 12:49:01', '2019-04-04 00:00:00'),
(13, 1, 1, 19, '1234.00', 'sads', 0, '2019-04-04 12:52:41', '2019-04-04 00:00:00'),
(14, 3, 1, 19, '100.00', 'fgsfgsfg', 1, '2019-04-04 12:53:07', '2019-04-04 00:00:00'),
(15, 1, 1, 19, '200.00', 'fsdfsdf', 0, '2019-04-04 12:53:18', '2019-04-04 00:00:00'),
(16, 1, 1, 19, '300.00', 'etheth', 1, '2019-04-04 12:54:11', '2019-04-04 00:00:00'),
(17, 1, 1, 20, '321.23', 'jyfuy', 1, '2019-04-05 11:55:27', '2019-04-05 00:00:00'),
(18, 0, 0, 21, '0.00', '', 1, '2019-04-05 12:00:10', '2019-04-05 00:00:00'),
(19, 0, 0, 20, '0.00', '', 1, '2019-04-05 12:02:27', '2019-04-05 00:00:00'),
(20, 1, 1, 22, '123.00', 'wttwrtwrt', 0, '2019-04-05 12:21:22', '2019-04-05 00:00:00'),
(21, 1, 1, 22, '1234.00', 'sdfsf', 1, '2019-04-06 16:48:41', '2019-04-06 00:00:00'),
(22, 1, 1, 21, '123.00', 'sadasd', 1, '2019-04-06 18:39:42', '2019-04-06 00:00:00');

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
(1, 'Franz Wilder', 'Gualambo', 'Giraldo', 'Franz Gualambo', 1, 1, 1, '44683254', 'gualambo@gmail.com', 'Urb Prolima', '2019-03-22 00:00:00'),
(2, 'Renzo', 'Gualambo', 'Giraldo', 'Gualambo Giraldo Renzo', 1, 0, 2, '123456789', 'renzo@gmail.com', 'PRo', '2019-03-22 00:00:00'),
(3, 'Paul', 'Gualambo', 'Giraldo', 'Gualambo Giraldo Paul', 1, 1, 2, '1213131313', 'paul@gmail.com', 'PRo2', '2019-03-22 00:00:00');

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
(1, 'P-001', 'Llantas', '123.00', 1, '2019-04-06 14:34:36', 1056),
(2, 'P-002', 'Motor', '150.00', 1, '2019-04-06 14:34:56', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serviciorepuestos`
--

CREATE TABLE `serviciorepuestos` (
  `id` int(11) NOT NULL,
  `idEntregaServicios` int(11) NOT NULL,
  `idPiezas` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(3, 'aaaa', 1, 1, 'aefa', 1, 'aef', '1.jpg', 3, 1, '2019-04-04 10:50:00'),
(4, 'bbbb', 1, 1, 'aefa', 3456, 'sadfsdf', '1.JPG', 3, 1, '2019-04-04 17:53:36'),
(5, 'rrrrr', 1, 1, 'dfadf', 23234, 'sdfsg', '1.jpg', 1, 1, '2019-04-04 17:54:54'),
(6, 'uuuuuuuuu', 1, 1, 'aefa', 23423, 'edsfdf', '1.jpg', 4, 1, '2019-04-04 10:56:07'),
(7, 'aaaaa', 2, 1, 'aefa', 321, 'iugb', '1.JPG', 3, 1, '2019-04-05 11:53:31');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `comprasrepuestos`
--
ALTER TABLE `comprasrepuestos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `entregas`
--
ALTER TABLE `entregas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `entregaservicios`
--
ALTER TABLE `entregaservicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `piezas`
--
ALTER TABLE `piezas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `serviciorepuestos`
--
ALTER TABLE `serviciorepuestos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
