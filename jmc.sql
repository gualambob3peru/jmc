-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 19-03-2019 a las 18:18:01
-- Versión del servidor: 5.7.25-0ubuntu0.18.04.2
-- Versión de PHP: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `dni` varchar(20) NOT NULL,
  `ruc` varchar(20) NOT NULL,
  `direccion` text NOT NULL,
  `correo` varchar(90) NOT NULL,
  `saldo` float NOT NULL,
  `idEstados` int(11) NOT NULL,
  `fechaRegistro` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombres`, `apellidoPaterno`, `apellidoMaterno`, `nombresCompletos`, `dni`, `ruc`, `direccion`, `correo`, `saldo`, `idEstados`, `fechaRegistro`) VALUES
(1, 'Franz Wilder', 'Gualambo', 'Giraldo', 'Gualambo Giraldo Franz Wilder', '3234234', '10446832544', 'Urb Prolima Los Olivos', 'sdfsdf@gmail.com', 0, 1, ''),
(2, 'afaefaef', 'efafe', 'aefaef', 'efafe aefaef afaefaef', '3424', '234234', 'fsdssdf', 'afadf@fgasfadf.com', 0, 1, ''),
(3, 'adf', 'adfad', 'adfa', 'adfad adfa adf', '987654321', '23423', '4dfsd', 'aasdsad@dffsdf.com', 0, 1, ''),
(4, 'aaa', 'bb', 'cc', 'bb cc aaa', '2222', '3333', 'dd', 'eee@gmai.com', 0, 1, ''),
(5, 'aaaa', 'saaaaa', 'aaaa', 'saaaaa aaaa aaaa', '121212', '121212', 'bbbb', 'ccc@cccc.com', 0, 1, ''),
(6, 'bbb', 'bbb', 'bbb', 'bbb bbb bbb', '222', '222', 'fff', 'fff@gmail.com', 0, 1, '2019-03-18'),
(7, 'ererer', 'erer', 'erere', 'erer erere ererer', '987654321', 'e3434', 'erer', 'erererer@gmail.com', 0, 1, '2019-03-19'),
(8, 'Renzo', 'Gualambo', 'Giraldo', 'Gualambo Giraldo Renzo', '484848748', '2382382837', 'dksoginsn', 'dsgs@gamdigad.com', 0, 1, '2019-03-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(90) NOT NULL,
  `idEstados` int(11) NOT NULL,
  `fechaRegistro` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `descripcion`, `idEstados`, `fechaRegistro`) VALUES
(1, 'Toyota', 1, ''),
(2, 'Audi', 1, ''),
(3, 'Kia', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

CREATE TABLE `modelos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(90) NOT NULL,
  `idMarcas` int(11) NOT NULL,
  `idEstados` int(11) NOT NULL,
  `fechaRegistro` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modelos`
--

INSERT INTO `modelos` (`id`, `descripcion`, `idMarcas`, `idEstados`, `fechaRegistro`) VALUES
(1, 'Yaris', 1, 1, ''),
(2, 'Tucson', 1, 1, '');

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
  `fechaRegistro` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `placa`, `idMarcas`, `idModelos`, `motor`, `anio`, `serie`, `imagen`, `idClientes`, `idEstados`, `fechaRegistro`) VALUES
(1, 'AAU112', 1, 1, 'adfadf', 113, 'dfadf', '', 4, 0, 2019),
(2, 'AAB123', 1, 2, 'sfgs', 23423423, 'wewewer', '', 8, 0, 2019),
(3, 'AAA111', 1, 1, 'motor1', 1990, 'serirserse', '', 1, 0, 2019),
(4, 'adfadf', 2, 1, '', 0, '', '', 1, 0, 2019),
(5, 'adfadf', 2, 1, '', 0, '', '', 1, 0, 2019),
(6, 'adfadf', 2, 1, '', 0, '', '', 1, 0, 2019),
(7, 'RRRR', 3, 2, 'MMMM', 1234, 'QWERTY', '1.jpg', 1, 1, 2019),
(8, '1a1a1a1', 1, 1, 'efaf', 2019, 'efaef', '1.jpeg', 1, 1, 2019),
(9, 'gdgh', 1, 1, 'dghd', 24141, 'fgdgdfg', '1.jpg', 5, 1, 2019);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
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
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
