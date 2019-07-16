-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-07-2019 a las 15:15:35
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
(1, 'Franz', 'Gualambo', 'Giraldo', 'Gualambo Giraldo Franz', 1, '44556677', 'Pro', 'gualambo@gmail.com', '166040.00', 0, '2019-04-12 17:22:25'),
(2, 'Elvis', 'Urquisa', '.', 'Urquisa . Elvis', 1, '.', '.', 'dianaterrel@hotmail.com', '2840.00', 0, '2019-04-24 12:27:58'),
(3, 'renzo', 'adfadf', 'fgsgsg', 'adfadf fgsgsg renzo', 1, '345345', 'fwefwef', 'afadf@adfadf.com', '0.00', 0, '2019-04-26 18:41:10'),
(4, 'Renzo', 'Gualambo', 'Giraldo', 'Gualambo Giraldo Renzo', 1, '1213131313', 'PRo', 'sdsd@gadgad.com', '0.00', 0, '2019-04-29 11:26:43'),
(5, 'Renzo', 'Gualambo', 'Giraldo', 'Gualambo Giraldo Renzo', 1, '1213131313', 'PRo', 'sdsd@gadgad.com', '0.00', 0, '2019-04-29 11:33:18'),
(6, 'Juan', 'Perez', 'Perez', 'Perez Perez Juan', 1, '01234567', 'Calle Huaraz 999', 'sucorreo@gmail.com', '859.00', 0, '2019-05-01 10:46:23'),
(7, 'David', 'Arroyo', 'Vasquez', 'Arroyo Vasquez David', 2, '12345678', 'Ate', 'jmc@hotmail.com', '3162.00', 1, '2019-05-14 11:16:24'),
(8, 'Mauricio', 'Miñano', '.', 'Miñano . Mauricio', 1, '74129915', '.', 'mauriciominano@gmail.com', '0.00', 0, '2019-05-15 10:25:46'),
(9, 'Carlos', 'Navarro', '.', 'Navarro . Carlos', 1, '12345678', '.', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-05-15 14:48:13'),
(10, 'Pepe', 'lopez', '.', 'lopez . Pepe', 1, '123456789', '.', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-05-15 15:16:28'),
(11, 'Jimmy', 'Paso', '.', 'Paso . Jimmy', 1, '12345678', '.', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-05-15 15:39:03'),
(12, 'CLIENTE', 'DE', 'PRUEBA', 'DE PRUEBA CLIENTE', 1, '00000000', 'AV. MAQUINARIAS 777', 'correo@gmail.com', '2662.52', 0, '2019-05-15 18:16:17'),
(13, 'Lalo', 'Chian', '.', 'Chian . Lalo', 1, '12345678', '.', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-05-16 10:11:06'),
(14, 'Jose', 'luis', 'Rios', 'luis Rios Jose', 1, '12345678', '.', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-05-16 10:24:09'),
(15, 'Jose', 'Rojas', '.', 'Rojas . Jose', 1, '12345678', '.', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-05-16 12:04:04'),
(16, 'Alfredo', 'Talledo', '.', 'Talledo . Alfredo', 1, '12345678', '.', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-05-16 12:16:37'),
(17, 'Carlos', 'Armas', '.', 'Armas . Carlos', 1, '123456789', '.', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-05-16 12:24:35'),
(18, 'Julio', 'Cornejo', '.', 'Cornejo . Julio', 1, '123456789', '.', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-05-16 12:25:50'),
(19, 'Jeremmy', 'Venegas', '.', 'Venegas . Jeremmy', 1, '123456789', '.', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-05-16 12:28:01'),
(20, 'Ernesto', 'Peyon', '.', 'Peyon . Ernesto', 1, '12345678', '.', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-05-16 12:29:52'),
(21, 'Alfredo', 'Talledo', '.', 'Talledo . Alfredo', 1, '123456789', '.', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-05-17 10:26:52'),
(22, 'David', 'Sanchez', '.', 'Sanchez . David', 1, '12345678', '.', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-05-17 11:02:29'),
(23, 'Dai', '.', '.', '. . Dai', 1, '12345678', '.', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-05-17 11:25:02'),
(24, 'Piero', 'Alfaro', '.', 'Alfaro . Piero', 1, '123456789', '.', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-05-17 12:36:30'),
(25, 'Javier', 'Cardenas', '.', 'Cardenas . Javier', 1, '12345678', '.', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-05-17 12:44:49'),
(26, 'Oscar', 'Mamani', 'Coarte', 'Mamani Coarte Oscar', 1, '40685986', 'Jr. Luisa Beausejour 1950-Lima', 'oscartransportesmamani@gmail.com', '0.00', 0, '2019-05-18 12:25:49'),
(27, 'Rudy', 'Vazquez', '.', 'Vazquez . Rudy', 1, '12345678', '.', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-05-20 09:37:45'),
(28, 'Alex', 'Garayar', '.', 'Garayar . Alex', 1, '123456789', '.', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-05-21 09:50:34'),
(29, 'Willy', 'Chiy', 'Sanchez', 'Chiy Sanchez Willy', 1, '12345678', '.', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-05-21 12:47:17'),
(30, 'zunel', 'Morales', '.', 'Morales . zunel', 1, '12345678', '.', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-05-21 13:07:25'),
(31, 'Juan', 'Rojas', '.', 'Rojas . Juan', 1, '12345678', '.', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-05-21 13:15:29'),
(32, 'Carlos', 'Ceccovilli', 'Guzman', 'Ceccovilli Guzman Carlos', 1, '123456789', '.', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-05-24 09:54:06'),
(33, 'Ivan', 'Robles', 'Alva', 'Robles Alva Ivan', 1, '70896005', 'Mzf lote 7 asociación sta rosa-calla  ', 'yvan.roblesalva@gmail.com', '0.00', 0, '2019-05-24 10:13:45'),
(34, 'Jimenez', '.', '.', '. . Jimenez', 1, '12345678', '.', 'jmc.racing.sac@hotmail.com', '540.00', 1, '2019-05-27 11:26:12'),
(35, 'Carlos', 'Ceccovilli', 'Guzman', 'Ceccovilli Guzman Carlos', 1, '12345678', 'Miraflores', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-05-27 12:09:50'),
(36, 'CLIENTE', 'PRUEBA', 'PRUEBA', 'PRUEBA PRUEBA CLIENTE', 1, '99999999', 'AV. INSURGENTES 433', 'xxx@gmail.com', '2500.00', 0, '2019-05-27 18:47:56'),
(37, 'Carlos', 'Velazco', '.', 'Velazco . Carlos', 1, '12345678', 'San Miguel', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-05-28 09:29:31'),
(38, 'Coly', 'Velazco', '.', 'Velazco . Coly', 1, '12345678', 'San Miguel', 'jmc.racing.sac@hotmail.com', '320.00', 1, '2019-05-28 09:29:31'),
(39, 'Carlos', 'Navarro', '.', 'Navarro . Carlos', 1, '12345678', 'Av. arequipa 350-Lima', 'navarroteus@hotmail.com', '2340.00', 1, '2019-05-28 09:59:33'),
(40, 'Jose', 'Rojas', '.', 'Rojas . Jose', 1, '12345678', '.', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-05-28 11:50:40'),
(41, 'cliente', 'PRUEBA', 'PRUEBA', 'PRUEBA PRUEBA cliente', 1, '99999999', 'Lima', 'sss@gmail.com', '0.00', 0, '2019-05-28 13:17:26'),
(42, 'Richard', 'Marques', '.', 'Marques . Richard', 1, '70346723', 'Mzt lote 53 urb el pinar comas', 'richard_181914@hotmail.com', '1430.00', 1, '2019-05-29 09:50:43'),
(43, 'Richard', 'Marques', '.', 'Marques . Richard', 1, '70346723', 'Mzt lote 53 urb el pinar comas', 'richard_181914@hotmail.com', '0.00', 0, '2019-05-29 15:16:12'),
(44, 'Ruth', 'Loreda', '.', 'Loreda . Ruth', 1, '0908908', 'San Miguel', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-05-31 15:05:33'),
(45, 'Luis', 'Miguel', '.', 'Miguel . Luis', 1, '12345678', '.', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-06-15 09:59:33'),
(46, 'Cesar', 'Tirado', '.', 'Tirado . Cesar', 1, '76428879', 'Jr varela 1670', 'cesartirado.99@gmail.com', '0.00', 0, '2019-06-27 12:35:16'),
(47, 'Eduardo', 'Granado', '.', 'Granado . Eduardo', 1, '06783973', 'Martin oviedo 243 pueblo libre', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-06-28 11:08:06'),
(48, 'Aristedes', 'Cordova', '.', 'Cordova . Aristedes', 1, '12345678', 'ventanilla', 'jmc.racing.sac@hotmail.com', '0.00', 1, '2019-07-01 10:13:22'),
(49, 'Dai', '.', '.', '. . Dai', 1, '12345678', '.', 'jmc.racing.sac@hotmail.com', '3170.00', 0, '2019-07-01 11:07:36'),
(50, 'diana', 'torres', 'terrel', 'torres terrel diana', 1, '77777777', 'Breña', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-07-04 11:34:15'),
(51, 'Dai', '.', '.', '. . Dai', 1, '12345678', '.', 'jmc.racing.sac@hotmail.com', '0.00', 1, '2019-07-10 09:11:57'),
(52, 'Misael', '.', '.', '. . Misael', 1, '12345678', '.', 'jmc.racing.sac@hotmail.com', '0.00', 1, '2019-07-10 09:12:49'),
(53, 'Diego', 'Cardenas', '.', 'Cardenas . Diego', 1, '12345678', '.', 'jmc.racing.sac@hotmail.com', '1348.00', 1, '2019-07-10 09:13:37'),
(54, 'Jimmy', 'Gutierrez', '.', 'Gutierrez . Jimmy', 1, '12345678', '.', 'jmc.racing.sac@hotmail.com', '0.00', 0, '2019-07-12 09:35:04'),
(55, 'Jimmy', 'Gutierrez', '.', 'Gutierrez . Jimmy', 1, '12345678', '.', 'jmc.racing.sac@hotmail.com', '1000.00', 1, '2019-07-12 09:35:04'),
(56, 'Fidel', 'Garcia', 'Durant', 'Garcia Durant Fidel', 1, '12345678', 'Calle santa ana 363 Pueblo libre', 'jmc.racing.sac@hotmail.com', '750.00', 1, '2019-07-12 09:59:55'),
(57, 'Jimmy', 'Venegas', '.', 'Venegas . Jimmy', 1, '12345678', '.', 'jmc.racing.sac@hotmail.com', '560.00', 1, '2019-07-15 09:04:25'),
(58, 'Fernado', 'Barreto', '.', 'Barreto . Fernado', 1, '42218276', '.', 'jmc.racing.sac@hotmail.com', '820.00', 1, '2019-07-15 10:56:59');

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
  `fechaCompras` datetime NOT NULL,
  `montoTotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `ruc`, `razonSocial`, `idEstados`, `fechaRegistro`, `fechaCompras`, `montoTotal`) VALUES
(1, '123123', 'sfgsfg', 0, '2019-04-16 07:57:59', '2019-04-16 07:56:00', '1000.00'),
(2, '123123', 'sgsfg', 0, '2019-04-16 08:07:02', '2019-04-16 08:06:00', '450.00'),
(3, '123123', 'sgsfg', 0, '2019-04-16 08:07:29', '2019-04-16 08:06:00', '450.00'),
(4, '123123', 'sgsfg', 0, '2019-04-16 08:08:47', '2019-04-16 08:08:00', '1000.00'),
(5, '123123', 'sgsfg', 0, '2019-04-16 08:10:37', '2019-04-16 08:10:00', '0.00'),
(6, '123123', 'sgsfg', 0, '2019-04-16 08:11:06', '2019-04-16 08:10:00', '0.00'),
(7, '123123', 'sfgsfg', 0, '2019-04-16 08:19:12', '2019-04-16 08:19:00', '0.00'),
(8, '123123', 'sfgsfg', 0, '2019-04-16 08:19:49', '2019-04-16 08:19:00', '423.00'),
(9, '45881236', 'angel', 0, '2019-07-02 11:34:07', '2019-07-02 11:33:00', '2502.00'),
(10, '20348687191', 'Wurth Peru S.A.C', 0, '2019-07-03 10:45:47', '2019-07-03 10:43:00', '150.00'),
(11, '20348687191', 'Wurth Peru S.A.C', 1, '2019-07-03 12:00:05', '2019-01-29 11:56:00', '758.69'),
(12, '20101681395', 'Automotriz Bavarian S.C.R.L', 1, '2019-07-03 12:09:15', '2019-01-29 12:06:00', '50.04'),
(13, '20167921109', 'Fiamaster S.A', 0, '2019-07-03 12:25:26', '2019-01-29 12:24:00', '0.00'),
(14, '20167921109', 'Fiamaster S.A', 1, '2019-07-03 12:26:02', '2019-01-29 12:24:00', '10.84'),
(15, '20100032881', 'Aba Singer & Cia S.A.C', 1, '2019-07-03 12:34:14', '2019-01-14 12:32:00', '13.07'),
(16, '20517767396', 'Escoh S.A.C', 1, '2019-07-03 12:37:54', '2019-07-03 12:35:00', '1.00'),
(17, '20100032881', 'Aba Singer & Cia S.A.C', 1, '2019-07-03 14:39:18', '2019-07-03 14:38:00', '10.00'),
(18, '20503840121', 'Repsol Comercial S.A.C', 1, '2019-07-03 14:48:13', '2019-07-03 14:47:00', '159.49'),
(19, '20100085578', 'Renusa', 1, '2019-07-03 14:57:37', '2019-01-25 14:55:00', '161.31'),
(20, '20100085578', 'Renusa', 1, '2019-07-04 09:10:50', '2019-01-24 09:08:00', '45.55'),
(21, '20100032881', 'Aba Singer & Cia S.A.C', 1, '2019-07-04 09:18:32', '2019-12-31 09:16:00', '14.65'),
(22, '10430915911', 'Global Parts', 1, '2019-07-04 09:22:26', '2019-01-25 09:21:00', '21.18'),
(23, '20167921109', 'Fiamaster', 1, '2019-07-04 09:36:53', '2019-01-24 09:35:00', '28.85'),
(24, '20503840121', 'Repsol Comercial S.A.C', 1, '2019-07-04 09:48:37', '2019-01-23 09:47:00', '50.00'),
(25, '20101681395', 'Automotriz Bavarian S.C.R.L', 1, '2019-07-04 10:02:19', '2019-01-22 10:00:00', '71.45'),
(26, '20600626290', 'Repuestera y Distribuciones S.A.C', 1, '2019-07-04 10:05:55', '2019-07-04 10:04:00', '110.00'),
(27, '20101681395', 'Automotriz Bavarian S.C.R.L', 0, '2019-07-04 10:25:08', '2019-01-21 10:20:00', '574.82'),
(28, '20101681395', 'Automotriz Bavarian S.C.R.L', 1, '2019-07-04 10:31:43', '2019-01-21 10:28:00', '635.70'),
(29, '10108700896', 'Autopartes Ericka', 1, '2019-07-04 10:37:25', '2019-01-21 10:35:00', '2000.00'),
(30, '20167921109', 'Fiamaster', 1, '2019-07-04 12:06:29', '2019-01-18 12:04:00', '31.18'),
(31, '20101912974', 'Imgesa', 1, '2019-07-04 12:12:59', '2019-01-15 12:11:00', '20.00'),
(32, '10085559902', 'J&M', 1, '2019-07-04 12:50:17', '2019-01-15 12:38:00', '1970.00'),
(33, '20100032881', 'Aba Singer & Cia S.A.C', 1, '2019-07-04 12:54:59', '2019-01-12 12:53:00', '7.78'),
(34, '10108700896', 'Autopartes Ericka', 1, '2019-07-04 14:24:04', '2019-01-12 14:20:00', '2105.00'),
(35, '20524583314', 'Germsa', 1, '2019-07-04 14:32:31', '2019-07-04 14:29:00', '173.86'),
(36, '20520588486', 'Divemotor', 1, '2019-07-04 14:48:08', '2019-07-04 14:46:00', '67.35'),
(37, '10085559902', 'J&M', 1, '2019-07-04 14:59:11', '2019-01-08 14:56:00', '2225.00'),
(38, '20503840121', 'Repsol Comercial S.A.C', 1, '2019-07-04 15:49:46', '2019-01-01 15:48:00', '129.11'),
(39, '20101681395', 'Automotriz Bavarian S.C.R.L', 1, '2019-07-05 09:13:39', '2019-01-04 09:12:00', '56.92'),
(40, '10085559902', 'J&M', 1, '2019-07-05 09:16:46', '2019-01-04 09:14:00', '2750.00'),
(41, '20101681395', 'Automotriz Bavarian S.C.R.L', 1, '2019-07-05 09:19:47', '2019-01-03 09:18:00', '61.43'),
(42, '10430915911', 'Global Parts', 1, '2019-07-05 09:29:42', '2019-01-03 09:28:00', '59.32'),
(43, '20100144922', 'Grupo Pana S.A', 1, '2019-07-05 09:41:37', '2019-01-03 09:38:00', '104.43'),
(44, '10179139842', 'Auto Partes \"Fabiana\"', 1, '2019-07-05 09:49:15', '2019-01-02 09:46:00', '2020.00'),
(45, '20167921109', 'Fiamaster', 1, '2019-07-05 10:04:21', '2019-12-28 10:03:00', '36.88'),
(46, '20100032881', 'Aba Singer & Cia S.A.C', 1, '2019-07-05 10:08:52', '2019-12-25 10:06:00', '16.02'),
(47, '20127765279', 'Coesti S.A', 1, '2019-07-05 10:56:26', '2018-12-26 10:53:00', '16.65'),
(48, '10404554226', 'Nelly Motors', 1, '2019-07-05 11:59:45', '2018-05-28 11:53:00', '1600.00'),
(49, '10098567505', 'Car Repuestos', 1, '2019-07-05 12:22:04', '2019-01-31 12:15:00', '36.44'),
(50, '20600349067', 'Wolf', 1, '2019-07-05 12:59:05', '2019-01-31 12:57:00', '3540.00'),
(51, '20101681395', 'Automotriz Bavarian S.C.R.L', 1, '2019-07-08 09:15:54', '2019-02-01 09:14:00', '151.37'),
(52, '20601919002', 'Comercializadora e Importadora Melo S.A.C', 1, '2019-07-08 09:19:42', '2019-02-01 09:17:00', '70.00'),
(53, '10098567505', 'Car Repuestos', 1, '2019-07-08 09:25:20', '2019-02-06 09:24:00', '15.00'),
(54, '20101681395', 'Automotriz Bavarian S.C.R.L', 1, '2019-07-08 09:35:12', '2019-02-06 09:33:00', '50.38'),
(55, '10727887941', 'Repuestos R&M', 1, '2019-07-08 09:38:00', '2019-02-06 09:36:00', '30.00'),
(56, '10098567505', 'Car Repuestos', 1, '2019-07-08 09:41:33', '2019-02-07 09:40:00', '18.00'),
(57, '10403148658', 'Fundas plásticas automotriz', 1, '2019-07-08 09:46:19', '2019-02-08 09:45:00', '310.00'),
(58, '20517793478', 'Frenos & Importaciones Generales E.I.R.L', 1, '2019-07-08 09:51:29', '2019-02-08 09:50:00', '298.00'),
(59, '20511141754', 'Nippon auto parts S.C.R.L', 1, '2019-07-10 10:13:32', '2019-02-15 10:11:00', '300.00'),
(60, '20517793478', 'Frenos & Importaciones Generales E.I.R.L', 1, '2019-07-10 10:17:42', '2019-02-18 10:16:00', '180.00'),
(61, '10098567505', 'Car Repuestos', 1, '2019-07-10 10:23:05', '2019-02-19 10:21:00', '29.66'),
(62, '10282932275', 'Tigator', 1, '2019-07-10 12:35:23', '2019-02-06 12:34:00', '27.99'),
(63, '20167921109', 'Fiamaster', 1, '2019-07-10 12:44:14', '2019-02-06 12:43:00', '61.46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprasrepuestos`
--

CREATE TABLE `comprasrepuestos` (
  `id` int(11) NOT NULL,
  `idCompras` int(11) NOT NULL,
  `idPiezas` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costo` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comprasrepuestos`
--

INSERT INTO `comprasrepuestos` (`id`, `idCompras`, `idPiezas`, `cantidad`, `costo`) VALUES
(1, 1, 1, 100, '1000.00'),
(2, 3, 1, 100, '150.00'),
(3, 3, 2, 200, '300.00'),
(4, 4, 1, 1000, '1000.00'),
(5, 8, 1, 122, '123.00'),
(6, 8, 2, 100, '300.00'),
(7, 9, 111, 1, '2502.00'),
(8, 10, 87, 1, '150.00'),
(9, 11, 117, 12, '506.52'),
(10, 11, 118, 6, '49.43'),
(11, 11, 119, 1, '99.00'),
(12, 11, 120, 12, '103.74'),
(13, 12, 121, 12, '50.04'),
(14, 14, 122, 1, '10.84'),
(15, 15, 123, 1, '13.07'),
(16, 16, 124, 65, '1.00'),
(17, 17, 126, 1, '10.00'),
(18, 18, 127, 1, '159.49'),
(19, 19, 128, 1, '161.31'),
(20, 20, 129, 1, '45.55'),
(21, 21, 130, 1, '14.65'),
(22, 22, 132, 1, '8.47'),
(23, 22, 131, 1, '12.71'),
(24, 23, 122, 1, '28.85'),
(25, 24, 134, 1, '50.00'),
(26, 25, 137, 1, '38.15'),
(27, 25, 136, 1, '20.83'),
(28, 25, 135, 4, '12.47'),
(29, 26, 138, 1, '110.00'),
(30, 27, 139, 1, '157.17'),
(31, 27, 140, 1, '71.32'),
(32, 27, 141, 1, '138.61'),
(33, 27, 142, 1, '30.44'),
(34, 27, 143, 2, '6.10'),
(35, 27, 144, 1, '30.88'),
(36, 27, 145, 1, '140.30'),
(37, 28, 139, 1, '157.17'),
(38, 28, 140, 1, '71.32'),
(39, 28, 141, 1, '138.61'),
(40, 28, 142, 3, '91.32'),
(41, 28, 143, 2, '6.10'),
(42, 28, 144, 1, '30.88'),
(43, 28, 145, 1, '140.30'),
(44, 29, 146, 2, '190.00'),
(45, 29, 147, 2, '380.00'),
(46, 29, 148, 1, '1430.00'),
(47, 30, 133, 1, '31.18'),
(48, 31, 150, 1, '20.00'),
(49, 32, 147, 2, '950.00'),
(50, 32, 151, 1, '380.00'),
(51, 32, 152, 1, '350.00'),
(52, 32, 153, 2, '290.00'),
(53, 33, 154, 1, '7.78'),
(54, 34, 156, 1, '2105.00'),
(55, 35, 157, 2, '173.86'),
(56, 36, 158, 1, '67.35'),
(57, 37, 159, 2, '490.00'),
(58, 37, 160, 2, '390.00'),
(59, 37, 147, 1, '490.00'),
(60, 37, 161, 4, '450.00'),
(61, 37, 162, 4, '405.00'),
(62, 38, 163, 1, '129.11'),
(63, 39, 166, 1, '21.80'),
(64, 39, 167, 1, '35.12'),
(65, 40, 168, 1, '2750.00'),
(66, 41, 169, 1, '61.43'),
(67, 42, 170, 4, '50.85'),
(68, 42, 171, 1, '8.47'),
(69, 43, 172, 1, '44.97'),
(70, 43, 173, 2, '59.46'),
(71, 44, 174, 2, '980.00'),
(72, 44, 175, 1, '450.00'),
(73, 44, 176, 1, '590.00'),
(74, 45, 177, 1, '36.88'),
(75, 46, 178, 1, '16.02'),
(76, 47, 179, 1, '16.65'),
(77, 48, 180, 1, '1600.00'),
(78, 49, 171, 1, '23.73'),
(79, 49, 170, 1, '12.71'),
(80, 50, 183, 4, '1500.00'),
(81, 50, 182, 8, '2040.00'),
(82, 51, 184, 1, '151.37'),
(83, 52, 185, 1, '70.00'),
(84, 53, 170, 1, '15.00'),
(85, 54, 186, 1, '50.38'),
(86, 55, 187, 4, '30.00'),
(87, 56, 188, 1, '18.00'),
(88, 57, 189, 1, '310.00'),
(89, 58, 190, 1, '298.00'),
(90, 59, 192, 1, '100.00'),
(91, 59, 193, 2, '200.00'),
(92, 60, 194, 1, '180.00'),
(93, 61, 195, 1, '21.19'),
(94, 61, 196, 1, '8.47'),
(95, 62, 197, 1, '27.99'),
(96, 63, 198, 1, '61.46');

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
-- Estructura de tabla para la tabla `entregaimagen`
--

CREATE TABLE `entregaimagen` (
  `id` int(11) NOT NULL,
  `idEntregas` int(11) NOT NULL,
  `imagen` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `entregaimagen`
--

INSERT INTO `entregaimagen` (`id`, `idEntregas`, `imagen`) VALUES
(1, 3, '5cbe31bb4098c.jpg'),
(2, 4, '5cbf842bf2957.jpg'),
(3, 4, '5cbf842fd9eb7.jpg'),
(4, 4, '5cbf842fdbcee.jpg'),
(5, 5, '5cbf847ab15df.jpg'),
(6, 5, '5cbf847c2666c.jpg'),
(7, 5, '5cbf847c3836d.jpg'),
(8, 6, '5cbf8b9801c74.jpg'),
(9, 6, '5cbf8b9c23a2c.jpg'),
(10, 8, '5cc0a30b42348.jpg'),
(11, 8, '5cc7d28a15ef3.png'),
(12, 8, '5cc7d2d5e8804.png'),
(13, 9, '5cc9c01a518a6.jpg'),
(14, 10, '5cdaf02d2d7f3.jpeg'),
(15, 11, '5cdc33e6e3a68.jpeg'),
(16, 12, '5cdc9eae7312c.jpg'),
(17, 13, '5ce2ef15c1b5b.png');

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
  `observaciones` text NOT NULL,
  `kilometraje` int(11) NOT NULL,
  `factura` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `entregas`
--

INSERT INTO `entregas` (`id`, `idVehiculos`, `fechaRegistro`, `fechaServicio`, `idEstados`, `observaciones`, `kilometraje`, `factura`) VALUES
(1, 1, '2019-04-16 12:15:50', '2019-04-16 00:00:00', 0, '', 1234, 0),
(2, 1, '2019-04-16 12:16:48', '2019-04-16 00:00:00', 0, '', 1234, 0),
(3, 1, '2019-04-22 16:27:23', '2019-04-22 00:00:00', 0, 'fafadf', 1234, 0),
(4, 1, '2019-04-23 16:31:23', '2019-04-23 00:00:00', 0, 'nnf', 2000, 0),
(5, 1, '2019-04-23 16:32:42', '2019-04-23 00:00:00', 0, 'nnf', 2000, 0),
(6, 1, '2019-04-23 17:03:03', '2019-04-23 00:00:00', 0, 'dsdsd', 123, 0),
(7, 11, '2019-04-24 12:54:53', '2019-04-24 00:00:00', 0, '- Adaptar motor\r\n- Tarque de gasolina\r\n-01 Radiador de agua\r\n-01 Bomba de gasolina\r\n-Linea de escape\r\n-01 Kit de repuestos nuevos\r\n-02 puntas de palier\r\n-Mantenimiento de palier\r\n-01 Volante tapa negra\r\n-01 Kit de embriague \r\n-02 Mangueras de radiador\r\n-01 Bomba de embriague\r\n-01 tapa de distribuidor', 180000, 0),
(8, 11, '0000-00-00 00:00:00', '2019-04-24 00:00:00', 0, '- Adaptar motor\r\n- Tarque de gasolina\r\n-01 Radiador de agua\r\n-01 Bomba de gasolina\r\n-Linea de escape\r\n-01 Kit de repuestos nuevos\r\n-02 puntas de palier\r\n-Mantenimiento de palier\r\n-01 Volante tapa negra\r\n-01 Kit de embriague \r\n-02 Mangueras de radiador\r\n-01 Bomba de embriague\r\n-01 tapa de distribuidor', 180000, 0),
(9, 12, '2019-05-01 10:49:46', '2019-05-01 00:00:00', 0, 'NINGUNA', 87000, 0),
(10, 13, '0000-00-00 00:00:00', '2019-05-13 00:00:00', 1, '', 15, 0),
(11, 14, '0000-00-00 00:00:00', '2019-05-14 00:00:00', 0, '-01 Kit de empaque\r\n-01 Juego de anillos\r\n-01 Metal de biela\r\n-01 Kit de distribución\r\n-Mano de obra\r\n- 01 Galón de aceite\r\n-01 Filtro de aceite\r\n-01 Galón de refrigerante\r\n01 Juego de bujías\r\n-01 Filtro de aire', 12345678, 0),
(12, 15, '2019-05-15 18:20:14', '2019-05-15 00:00:00', 0, '', 777, 0),
(13, 15, '2019-05-20 13:16:53', '2019-05-20 00:00:00', 0, 'fff', 5000, 0),
(14, 16, '0000-00-00 00:00:00', '2019-05-13 00:00:00', 1, '', 111, 0),
(15, 18, '2019-05-27 18:50:08', '2019-05-27 00:00:00', 0, 'NINGUNA PRUEBAS', 5600, 0),
(16, 19, '0000-00-00 00:00:00', '2019-05-27 00:00:00', 1, '', 111, 0),
(17, 20, '2019-05-28 10:02:51', '2019-05-23 00:00:00', 1, '', 111, 0),
(18, 21, '2019-05-28 13:24:13', '2019-05-28 00:00:00', 0, 'adfadf', 234234, 0),
(19, 21, '2019-05-28 13:31:40', '2019-05-28 00:00:00', 0, 'nose', 3456, 0),
(20, 21, '2019-05-28 14:34:13', '2019-05-28 00:00:00', 0, 'adad', 4500, 0),
(21, 22, '0000-00-00 00:00:00', '2019-05-28 00:00:00', 1, '', 111, 0),
(22, 23, '0000-00-00 00:00:00', '2019-06-28 00:00:00', 0, '', 111, 0),
(23, 25, '0000-00-00 00:00:00', '2019-07-01 00:00:00', 1, '', 0, 0),
(24, 26, '2019-07-10 10:02:23', '2019-07-06 00:00:00', 1, '', 0, 0),
(25, 27, '0000-00-00 00:00:00', '2019-07-10 00:00:00', 1, '', 1111, 0),
(26, 28, '0000-00-00 00:00:00', '2019-07-10 00:00:00', 1, '', 1111, 0),
(27, 24, '2019-07-12 11:11:38', '2019-07-10 00:00:00', 1, '', 1111, 0),
(28, 29, '2019-07-15 09:16:44', '2019-07-13 00:00:00', 1, '', 11111, 0),
(29, 30, '2019-07-15 11:06:45', '2019-07-11 00:00:00', 1, '', 111111, 0),
(30, 31, '0000-00-00 00:00:00', '2019-07-15 00:00:00', 1, '', 1111, 0);

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
(1, 1, 1, 2, '1234.00', 'fefqe', 1, '2019-04-17 13:44:39', '2019-04-17 00:00:00', '154234.00', '153000.00'),
(2, 1, 1, 2, '345.00', '', 1, '2019-04-22 16:17:48', '2019-04-22 00:00:00', '345.00', '0.00'),
(3, 1, 1, 5, '1234.00', 'dasda', 0, '2019-04-23 16:33:24', '2019-04-23 00:00:00', '4834.00', '3600.00'),
(4, 1, 1, 5, '123.00', 'cdf', 0, '2019-04-23 16:46:41', '2019-04-23 00:00:00', '123.00', '0.00'),
(5, 1, 1, 5, '1234.00', 'dwd', 0, '2019-04-23 16:47:09', '2019-04-23 00:00:00', '4834.00', '3600.00'),
(6, 1, 1, 5, '345.00', 'fef', 1, '2019-04-23 16:47:34', '2019-04-23 00:00:00', '945.00', '600.00'),
(7, 1, 5, 8, '2000.00', '.', 1, '2019-04-24 13:03:52', '2019-04-24 00:00:00', '2700.00', '700.00'),
(8, 1, 6, 8, '140.00', '.', 1, '2019-04-24 13:14:20', '2019-04-24 00:00:00', '140.00', '0.00'),
(9, 1, 1, 9, '200.00', 'PASTILLAS DELANTERAS Y FLUIDOS', 1, '2019-05-01 10:52:14', '2019-05-01 00:00:00', '256.00', '56.00'),
(10, 1, 4, 9, '100.00', 'gegetg', 1, '2019-05-01 20:22:49', '2019-05-01 00:00:00', '125.00', '25.00'),
(11, 0, 0, 9, '0.00', '', 1, '2019-05-01 20:22:53', '2019-05-01 00:00:00', '0.00', '0.00'),
(12, 0, 0, 9, '0.00', '', 1, '2019-05-01 20:23:51', '2019-05-01 00:00:00', '0.00', '0.00'),
(13, 0, 5, 10, '200.00', '', 1, '2019-05-14 12:13:49', '2019-05-14 00:00:00', '200.00', '0.00'),
(14, 1, 5, 10, '200.00', '', 0, '2019-05-15 10:57:24', '2019-05-15 00:00:00', '200.00', '0.00'),
(15, 0, 5, 10, '2500.00', '', 1, '2019-05-15 10:58:45', '2019-05-15 00:00:00', '2500.00', '0.00'),
(16, 3, 5, 12, '2500.00', 'NINGUNA', 1, '2019-05-15 18:20:40', '2019-05-15 00:00:00', '2500.00', '0.00'),
(17, 0, 5, 10, '2500.00', '', 1, '2019-05-20 09:53:30', '2019-05-20 00:00:00', '2500.00', '0.00'),
(18, 3, 1, 13, '75.00', 'algo', 1, '2019-05-20 13:17:57', '2019-05-20 00:00:00', '106.26', '31.26'),
(19, 3, 5, 10, '2500.00', '', 1, '2019-05-27 10:24:30', '2019-05-13 00:00:00', '3162.00', '662.00'),
(20, 3, 10, 14, '100.00', '', 1, '2019-05-27 11:55:38', '2019-05-27 00:00:00', '540.00', '440.00'),
(21, 3, 5, 15, '2500.00', '', 0, '2019-05-27 18:50:45', '2019-05-27 00:00:00', '2500.00', '0.00'),
(22, 4, 5, 15, '2500.00', '', 1, '2019-05-27 18:52:00', '2019-05-27 00:00:00', '2500.00', '0.00'),
(23, 3, 11, 16, '180.00', '', 1, '2019-05-28 09:48:50', '2019-05-27 00:00:00', '320.00', '140.00'),
(24, 3, 1, 17, '75.00', '', 0, '2019-05-28 11:36:32', '2019-05-28 00:00:00', '75.00', '0.00'),
(25, 3, 5, 17, '2500.00', '', 0, '2019-05-28 11:36:57', '2019-05-28 00:00:00', '2500.00', '0.00'),
(26, 3, 12, 17, '500.00', '', 1, '2019-05-28 11:39:19', '2019-05-28 00:00:00', '500.00', '0.00'),
(27, 3, 5, 18, '2500.00', '22', 1, '2019-05-28 13:25:27', '2019-05-28 00:00:00', '2500.00', '0.00'),
(28, 3, 4, 19, '100.00', '', 0, '2019-05-28 13:35:55', '2019-05-28 00:00:00', '100.00', '0.00'),
(29, 4, 5, 19, '2500.00', '', 0, '2019-05-28 14:33:36', '2019-05-28 00:00:00', '2500.00', '0.00'),
(30, 3, 9, 20, '2200.00', 'edaed', 0, '2019-05-28 14:34:28', '2019-05-28 00:00:00', '2200.00', '0.00'),
(31, 5, 12, 20, '500.00', '', 0, '2019-05-28 14:34:48', '2019-05-28 00:00:00', '500.00', '0.00'),
(32, 3, 13, 17, '300.00', '', 1, '2019-05-28 15:13:27', '2019-05-28 00:00:00', '300.00', '0.00'),
(33, 3, 14, 17, '150.00', '', 1, '2019-05-28 15:13:49', '2019-05-28 00:00:00', '150.00', '0.00'),
(34, 3, 15, 17, '30.00', '', 1, '2019-05-28 15:14:00', '2019-05-28 00:00:00', '30.00', '0.00'),
(35, 3, 16, 17, '50.00', '', 1, '2019-05-28 15:14:11', '2019-05-28 00:00:00', '50.00', '0.00'),
(36, 3, 17, 17, '280.00', '', 1, '2019-05-28 15:14:23', '2019-05-28 00:00:00', '1130.00', '850.00'),
(37, 3, 18, 17, '180.00', '', 1, '2019-05-28 15:14:33', '2019-05-28 00:00:00', '180.00', '0.00'),
(38, 3, 19, 21, '400.00', '', 1, '2019-05-29 12:29:34', '2019-05-29 00:00:00', '1430.00', '1030.00'),
(39, 3, 21, 23, '700.00', '', 1, '2019-07-10 09:39:03', '2019-07-01 00:00:00', '700.00', '0.00'),
(40, 3, 22, 23, '220.00', '', 1, '2019-07-10 09:39:30', '2019-07-01 00:00:00', '220.00', '0.00'),
(41, 3, 23, 23, '650.00', '', 1, '2019-07-10 09:44:43', '2019-07-01 00:00:00', '650.00', '0.00'),
(42, 3, 24, 23, '250.00', '', 1, '2019-07-10 09:45:34', '2019-07-01 00:00:00', '250.00', '0.00'),
(43, 3, 25, 23, '200.00', '', 1, '2019-07-10 09:46:29', '2019-07-01 00:00:00', '200.00', '0.00'),
(44, 3, 26, 23, '280.00', '', 1, '2019-07-10 09:48:02', '2019-07-01 00:00:00', '280.00', '0.00'),
(45, 3, 27, 23, '0.00', '', 0, '2019-07-10 09:48:21', '2019-07-01 00:00:00', '0.00', '0.00'),
(46, 3, 28, 25, '0.00', '', 1, '2019-07-12 09:55:00', '2019-07-10 00:00:00', '0.00', '0.00'),
(47, 3, 29, 25, '1000.00', '', 1, '2019-07-12 09:55:24', '2019-07-10 00:00:00', '1000.00', '0.00'),
(48, 3, 30, 26, '750.00', '', 1, '2019-07-12 10:31:09', '2019-07-10 00:00:00', '750.00', '0.00'),
(49, 3, 27, 23, '480.00', '', 1, '2019-07-12 10:50:19', '2019-07-01 00:00:00', '480.00', '0.00'),
(50, 3, 31, 28, '120.00', '', 1, '2019-07-15 09:17:12', '2019-07-13 00:00:00', '560.00', '440.00'),
(51, 3, 32, 23, '130.00', '', 1, '2019-07-15 10:53:53', '2019-07-15 00:00:00', '390.00', '260.00'),
(52, 3, 33, 29, '280.00', '', 1, '2019-07-15 11:13:21', '2019-07-11 00:00:00', '820.00', '540.00'),
(53, 3, 34, 30, '320.00', '', 0, '2019-07-15 12:50:59', '2019-07-08 00:00:00', '320.00', '0.00'),
(54, 3, 35, 30, '210.00', '', 0, '2019-07-15 12:51:34', '2019-07-08 00:00:00', '210.00', '0.00'),
(55, 3, 34, 30, '320.00', '', 1, '2019-07-15 14:12:19', '2019-07-08 00:00:00', '886.00', '566.00'),
(56, 3, 35, 30, '210.00', '', 1, '2019-07-15 14:13:18', '2019-07-08 00:00:00', '210.00', '0.00'),
(57, 3, 36, 30, '32.00', '', 1, '2019-07-15 14:16:55', '2019-07-08 00:00:00', '252.00', '220.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenentregas`
--

CREATE TABLE `imagenentregas` (
  `id` int(11) NOT NULL,
  `imagen` varchar(20) NOT NULL,
  `idEntregas` int(11) NOT NULL,
  `idEntregaServicios` int(11) NOT NULL,
  `idEstados` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagenentregas`
--

INSERT INTO `imagenentregas` (`id`, `imagen`, `idEntregas`, `idEntregaServicios`, `idEstados`) VALUES
(1, '0.PNG', 2, 1, 0),
(2, '1.PNG', 2, 1, 0),
(3, '0.PNG', 2, 1, 0),
(4, '1.PNG', 2, 1, 0),
(5, '0.PNG', 2, 1, 0),
(6, '0.PNG', 2, 1, 0),
(7, '0.PNG', 2, 1, 0),
(8, '1.PNG', 2, 1, 0),
(9, '0.PNG', 2, 1, 0),
(10, '1.PNG', 2, 1, 0),
(11, '0.PNG', 2, 1, 0),
(12, '1.PNG', 2, 1, 0),
(13, '2.PNG', 2, 1, 0),
(14, '3.PNG', 2, 1, 0),
(15, '0.PNG', 2, 1, 0),
(16, '1.PNG', 2, 1, 0),
(17, '0.PNG', 2, 1, 0),
(18, '5cbe202814119.PNG', 2, 1, 0),
(19, '5cbe28431741a.PNG', 2, 1, 0),
(20, '5cbe2ed681444.PNG', 2, 1, 0),
(21, '5cbe2ed68c8bd.PNG', 2, 1, 0),
(22, '5cbe2ed6a4216.PNG', 2, 1, 0),
(23, '5cbe2ee2e7656.PNG', 2, 1, 0),
(24, '5cbe2ee30bea3.PNG', 2, 1, 0),
(25, '5cbe2ee3206c8.PNG', 2, 1, 0),
(26, '5cbe2ee33106c.PNG', 2, 1, 0),
(27, '5cbe2f1ab3694.PNG', 2, 1, 1),
(28, '5cbe2f1ad53fe.PNG', 2, 1, 1),
(29, '5cbe2f87dba38.jpg', 2, 2, 1),
(30, '5cbf84b3e8ffb.jpg', 5, 3, 0),
(31, '5cbf84b3eb7b5.jpg', 5, 3, 0),
(32, '5cbf84b677502.jpg', 5, 3, 0),
(33, '5cbf84b679d79.jpg', 5, 3, 0),
(34, '5cbf88508527b.jpg', 5, 6, 1),
(35, '5cbf88548cb7e.jpg', 5, 6, 1),
(36, '5cbf8a2aa1255.jpg', 5, 6, 1),
(37, '5cbf8a2e2f0ff.jpg', 5, 6, 1),
(38, '5cc9c1c5606d9.jpg', 9, 9, 1);

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
(3, 'Kia', 1, '0000-00-00 00:00:00'),
(4, 'Nuevo', 0, '2019-04-17 14:55:57'),
(5, 'Nuevo 2', 0, '2019-04-17 14:57:20'),
(6, 'Hyundai', 1, '2019-04-23 16:57:17'),
(7, 'Honda', 1, '2019-05-01 10:58:47'),
(8, 'Mitsubichi', 1, '2019-05-14 11:25:40'),
(9, 'MG', 1, '2019-05-15 10:26:50'),
(10, 'Toyota', 1, '2019-05-15 15:17:20'),
(11, 'VW', 1, '2019-05-20 10:09:35'),
(12, 'Toyota', 1, '2019-05-20 10:10:38'),
(13, 'Honda', 1, '2019-05-20 10:13:20'),
(14, 'Honda', 1, '2019-05-20 10:20:04'),
(15, 'Datsun', 1, '2019-05-20 10:21:12'),
(16, 'Subaru', 1, '2019-05-20 10:35:12'),
(17, 'Mercedez', 1, '2019-05-20 10:51:59'),
(18, 'BMW', 1, '2019-05-20 11:56:05'),
(19, 'nu', 1, '2019-05-28 09:38:34'),
(20, 'Nissan', 1, '2019-05-28 09:38:52'),
(21, 'Suzuki', 1, '2019-07-10 09:17:56');

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
(2, 'Tucson', 6, 1, '0000-00-00 00:00:00'),
(3, 'AudiModelo2', 2, 0, '2019-04-17 15:06:16'),
(4, 'Rio', 3, 1, '2019-04-22 16:14:17'),
(5, 'Santa Fe', 6, 1, '2019-04-23 16:57:41'),
(6, 'Corolla', 1, 1, '2019-04-24 12:29:40'),
(7, 'S3', 2, 1, '2019-05-01 10:58:16'),
(8, 'A3', 2, 1, '2019-05-01 10:58:31'),
(9, 'Civic', 7, 1, '2019-05-01 10:59:00'),
(10, 'Integra DC2 Type R', 7, 1, '2019-05-01 10:59:32'),
(11, 'Integra DC5 Type R', 7, 1, '2019-05-01 10:59:47'),
(12, 'Dion', 8, 1, '2019-05-14 11:27:17'),
(13, 'MG3', 9, 1, '2019-05-15 10:27:06'),
(14, 'Amarok', 11, 1, '2019-05-20 10:10:06'),
(15, 'levin', 1, 1, '2019-05-20 10:11:57'),
(16, 'Integra', 14, 1, '2019-05-20 10:20:22'),
(17, '510', 15, 1, '2019-05-20 10:21:37'),
(18, 'Transporter', 11, 1, '2019-05-20 10:24:08'),
(19, 'Starlet', 12, 1, '2019-05-20 10:32:39'),
(20, 'Impreza', 16, 1, '2019-05-20 10:38:16'),
(21, 'TT', 2, 1, '2019-05-20 10:39:06'),
(22, '280', 17, 1, '2019-05-20 10:52:28'),
(23, 'MR2', 1, 1, '2019-05-20 11:47:09'),
(24, '316', 18, 1, '2019-05-20 11:56:21'),
(25, 'Amarok', 11, 1, '2019-05-20 11:57:23'),
(26, 'Silvia', 20, 1, '2019-05-28 09:39:31'),
(27, 'sentra', 20, 1, '2019-07-01 10:16:45'),
(28, 'Elantra', 6, 1, '2019-07-01 11:08:55'),
(29, '5x4', 21, 1, '2019-07-10 09:18:54'),
(30, 'Frontier', 20, 1, '2019-07-12 10:14:28'),
(31, 'MRZ', 1, 1, '2019-07-15 09:06:28');

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

--
-- Volcado de datos para la tabla `pagoclientes`
--

INSERT INTO `pagoclientes` (`id`, `idClientes`, `monto`, `tipoCambio`, `idTipoPago`, `documento`, `fechaRegistro`, `fechaPago`, `idTipoMoneda`, `idEstados`) VALUES
(1, 1, '1000.00', '3.21', 1, 0, '2019-04-29 11:44:51', '2019-04-29 00:00:00', 1, 1);

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
(1, 'Joaquin', 'Moreto', 'Moreto', 'Moreto Moreto Joaquin', 1, 0, 1, '22334455', 'mecanico@gmail.com', 'San diego', '2019-04-12 00:00:00'),
(2, 'Juan', 'Perez', 'Perez', 'Perez Perez Juan', 1, 0, 1, '1213131313', 'sdsd@gadgad.com', 'San Borja', '2019-04-23 17:00:26'),
(3, 'Joaquin', 'Moreto', 'Cordova', 'Moreto Cordova Joaquin', 1, 1, 1, '10870326', 'jmc.racing.sac@hotmail.com', 'Liberación San Juan de Lurigancho ', '2019-05-15 11:02:18'),
(4, 'Rodolfo', 'Toro', 'Quiroz', 'Toro Quiroz Rodolfo', 1, 1, 1, '42824460', 'jmc.racing.sac@hotmail.com', 'Villa Salvador', '2019-05-15 11:05:29'),
(5, 'Armando', 'Bernedo', 'Machado', 'Bernedo Machado Armando', 1, 1, 1, '71418875', 'armandobernedo@gmail.com', 'Breña', '2019-05-17 15:24:00'),
(6, 'Yordano', 'Chuquisuta', 'Caceres', 'Chuquisuta Caceres Yordano', 1, 1, 1, '46921552', 'yordano90911@gmail.com', 'San Juan de Miraflores', '2019-05-17 15:24:32'),
(7, 'Marco', 'Sanchez', 'Ore', 'Sanchez Ore Marco', 1, 1, 1, '71016157', 'dominic_spilner@gmail.com', 'La victoria', '2019-05-17 15:26:48'),
(8, 'Daniel', 'Lara', 'Medina', 'Lara Medina Daniel', 1, 1, 1, '25080211', 'Laramedinadanielvzla@gmail.com', 'Breña', '2019-07-01 14:27:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piezas`
--

CREATE TABLE `piezas` (
  `id` int(11) NOT NULL,
  `codigo` varchar(30) NOT NULL,
  `descripcion` varchar(90) NOT NULL,
  `costo` decimal(10,2) NOT NULL COMMENT 'Este  es el precio de venta',
  `precioCosto` decimal(10,2) NOT NULL,
  `idEstados` int(11) NOT NULL,
  `fechaRegistro` datetime NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `piezas`
--

INSERT INTO `piezas` (`id`, `codigo`, `descripcion`, `costo`, `precioCosto`, `idEstados`, `fechaRegistro`, `stock`) VALUES
(1, 'P001', 'Llantas', '300.00', '0.00', 0, '2019-04-12 00:00:00', -279),
(2, 'P002', 'Motor 001', '1500.00', '0.00', 0, '2019-04-12 00:00:00', 43),
(3, 'BJ-1', 'Bujias', '5.50', '0.00', 0, '2019-04-26 15:02:49', 8),
(4, 'PF-1', 'Pastillas de freno', '550.00', '0.00', 0, '2019-04-26 15:04:54', 1),
(5, 'EP-C', 'Empaque de Culata', '75.00', '0.00', 0, '2019-04-26 15:06:58', 1),
(6, 'RT-V', 'Reten de valvula', '3.13', '0.00', 0, '2019-04-26 15:08:43', 16),
(7, 'RT-34-54-9/15', 'Reten radial', '12.00', '0.00', 0, '2019-04-26 15:11:27', 1),
(8, 'RT-34-63-9/15', 'Reten', '15.00', '0.00', 0, '2019-04-26 15:12:14', 1),
(9, 'RJ-38-72-33/36', 'Rodaje', '35.00', '0.00', 0, '2019-04-26 15:14:30', 2),
(10, 'RJ-AU0844', 'Rodaje', '37.50', '0.00', 0, '2019-04-26 15:17:10', 2),
(11, 'RT-52-66-7/12', 'Reten', '5.00', '0.00', 0, '2019-04-26 15:18:17', 2),
(12, 'RT-56-73-7/.5/1', 'Reten', '12.00', '0.00', 0, '2019-04-26 15:19:39', 4),
(13, 'RJ-01', 'Rodaje', '15.00', '0.00', 0, '2019-04-26 15:20:58', 1),
(14, 'RT-38-65-12/19', 'Reten', '15.00', '0.00', 0, '2019-04-26 15:56:26', 1),
(15, 'BR-T', 'Bronce 3ra y 4ta', '115.00', '0.00', 0, '2019-04-26 16:00:32', 2),
(16, 'ET-1', 'Empaque de termostato', '26.00', '0.00', 0, '2019-04-29 10:29:27', 1),
(17, 'T-1', 'Termosta (82-95 c) 3VZFE 3SGE 4AG', '117.20', '0.00', 0, '2019-04-29 10:38:47', 1),
(18, 'RJ-01', 'Rodaje', '55.00', '0.00', 0, '2019-04-29 12:04:28', 1),
(19, 'RJ-01', 'Rodaje tro80702/1D', '50.00', '0.00', 0, '2019-04-29 14:22:34', 1),
(20, 'O-1', 'Oxigeno', '11.00', '0.00', 0, '2019-04-29 14:51:19', 8),
(21, 'RJ-01', 'Rodaje', '110.00', '0.00', 0, '2019-04-29 14:53:00', 2),
(22, 'SL-1', 'Sensor de levas', '100.00', '0.00', 0, '2019-04-29 15:13:04', 1),
(23, 'CJA-1', 'Caja de cambio 4AG', '700.00', '0.00', 0, '2019-04-29 15:24:35', 1),
(24, 'Nuevo', 'dff', '300.00', '200.00', 0, '2019-04-29 23:39:29', 10),
(25, 'BJ-1', 'Bujias', '37.72', '0.00', 0, '2019-04-30 10:19:45', 4),
(26, 'EP-TC', 'Empaque de tapa de culata', '25.00', '0.00', 0, '2019-04-30 12:46:09', 1),
(27, 'RJ-01', 'Rodaje', '50.00', '0.00', 0, '2019-04-30 12:51:27', 1),
(28, 'RJ-38-72-33/36', 'Rodaje', '70.00', '0.00', 0, '2019-04-30 14:27:29', 2),
(29, 'RT-52-66-7/12', 'Reten', '10.00', '0.00', 0, '2019-04-30 14:31:14', 2),
(30, 'RT-26-48-10', 'Reten de tapa de balancin', '9.00', '0.00', 0, '2019-04-30 14:43:46', 0),
(31, 'PRUEBA', 'REPUESTO DE PRUEBA', '10.00', '5.00', 0, '2019-05-01 11:09:07', 7),
(32, 'RT-1', 'Reten', '2.50', '2.50', 0, '2019-05-02 09:54:03', 20),
(33, 'GR-P', 'Grasa palier', '33.15', '33.15', 0, '2019-05-02 09:57:11', 2),
(34, 'RJ-12-37-12', 'Rodaje', '15.00', '15.00', 0, '2019-05-02 09:59:05', 1),
(35, 'CP-01', 'Chapa perrilla', '13.00', '13.00', 0, '2019-05-02 10:03:28', 2),
(36, 'BJ-1', 'Bujias', '10.00', '10.00', 0, '2019-05-02 10:50:17', 1),
(37, 'ZF-01', 'zapato de freno', '152.00', '152.00', 0, '2019-05-02 11:52:29', 1),
(38, 'PF-1', 'Pastillas de freno posterior', '148.00', '148.00', 0, '2019-05-02 11:54:03', 1),
(39, 'RJ-01', 'Rodaje', '95.00', '95.00', 0, '2019-05-02 12:37:17', 2),
(40, 'EP-C', 'Empaque de Culata', '35.00', '35.00', 0, '2019-05-02 12:41:15', 1),
(41, 'RT-32-46-6', 'Reten', '10.00', '10.00', 0, '2019-05-02 15:16:35', 1),
(42, 'RT-35-49-6', 'Reten', '12.00', '12.00', 0, '2019-05-02 15:44:02', 1),
(43, 'RT-40-5*54.5*7', 'Reten', '15.00', '15.00', 0, '2019-05-02 15:45:50', 1),
(44, 'RS-S', 'Resortes Coilover', '93.22', '93.22', 0, '2019-05-03 09:59:24', 4),
(45, 'FA', 'Filtro de aceite', '73.43', '73.43', 0, '2019-05-03 10:01:47', 1),
(46, 'EP-C', 'Empaque de Culata TOYOTA', '1417.18', '1417.18', 0, '2019-05-03 10:22:06', 1),
(47, 'TF', 'Templador de faja', '565.00', '473.08', 0, '2019-05-03 11:39:53', 1),
(48, 'TF', 'Templador de faja 4AGE', '292.91', '292.91', 0, '2019-05-03 11:43:57', 1),
(49, 'ET', 'Empaque de termostato', '25.95', '25.95', 0, '2019-05-04 09:39:57', 1),
(50, 'MB-01', 'Metales de biela', '570.00', '350.54', 0, '2019-05-04 09:44:49', 1),
(51, 'CJA-1', 'Caja de cambio EJ20', '800.00', '800.00', 0, '2019-05-04 11:26:41', 1),
(52, 'GP', 'Guarda polvo de palier (EXT)', '12.00', '12.00', 0, '2019-05-04 12:42:06', 1),
(53, 'GP', 'Guarda polvo de palier (INT)', '12.00', '12.00', 0, '2019-05-04 14:56:57', 1),
(54, 'B-01', 'Bocina TZK TOYOTA INF', '40.00', '40.00', 0, '2019-05-06 09:33:18', 1),
(55, 'B-01', 'Bocina TZK TOYOTA INF', '40.00', '40.00', 0, '2019-05-06 09:33:36', 1),
(56, 'B-01', 'Bocina TZK TOYOTA INF', '40.00', '40.00', 0, '2019-05-06 09:33:37', 1),
(57, 'JC-01', 'Juego de cintillo de metal', '8.00', '2.00', 0, '2019-05-06 09:45:00', 8),
(58, 'GP-TC', 'Guarda polvo de palier TOYOTA COROLLA', '20.00', '10.00', 0, '2019-05-06 09:54:06', 3),
(59, 'GP-TC (EXT)', 'Guarda polvo de palier TOYOTA COROLLA (EXT)', '20.00', '10.00', 0, '2019-05-06 10:04:36', 4),
(60, 'GP', 'Guarda polvo de palier Racer (EXT)', '12.00', '12.00', 0, '2019-05-06 10:22:54', 2),
(61, 'EJ-P', 'Eje de palier', '45.00', '45.00', 0, '2019-05-06 10:33:05', 2),
(62, 'BJ-1', 'Bujias', '7.50', '7.50', 0, '2019-05-06 11:43:46', 2),
(63, 'FA', 'Filtro de aceite', '15.00', '15.00', 0, '2019-05-06 11:45:23', 1),
(64, 'AP', 'Anillos de piston', '95.00', '95.00', 0, '2019-05-06 14:56:21', 4),
(65, 'BE-01', 'Bobina de encendido', '430.00', '115.00', 0, '2019-05-07 09:41:17', 4),
(66, 'RT-35-65-9/15', 'Reten', '10.00', '10.00', 0, '2019-05-07 09:53:54', 1),
(67, 'RT-35-62-9/15', 'Reten', '12.00', '12.00', 0, '2019-05-07 09:55:41', 1),
(68, 'RT-12-25-7', 'Reten', '10.00', '10.00', 0, '2019-05-07 09:57:00', 4),
(69, 'RJ-50SC', 'Rodaje de rueda Nissan', '65.00', '65.00', 0, '2019-05-07 10:15:54', 1),
(70, 'EP-C', 'Empaque de culata', '25.00', '25.00', 0, '2019-05-07 10:32:54', 3),
(71, 'RT-V -FDM', 'Reten de válvula FDM', '3.13', '3.13', 0, '2019-05-08 09:45:32', 31),
(72, 'RT-V -AMC', 'Reten de válvula AMC', '3.13', '3.13', 0, '2019-05-08 09:47:29', 31),
(73, 'EP-C -AMC', 'Empaque de culata AMC', '25.00', '25.00', 0, '2019-05-08 10:07:05', 2),
(74, 'EP-C -KAN', 'Empaque de culata KAN', '70.00', '70.00', 0, '2019-05-08 10:09:48', 2),
(75, 'GP-N EXT', 'Guarda polvo de palier Nissan EXT', '12.00', '12.00', 0, '2019-05-08 12:43:53', 1),
(76, 'GP-C HYUNDAI', 'Guarda polvo de cremallera HYUNDAI', '10.00', '10.00', 0, '2019-05-08 12:51:48', 1),
(77, 'GP-CPA NISSAN', 'Guarda polvo de copa Nissan', '12.00', '12.00', 0, '2019-05-08 12:56:00', 1),
(78, 'Prueba99', 'descripcion de algo', '123.00', '12.00', 0, '2019-05-25 15:30:07', 12),
(79, 'Prueba999', 'descripcion de algo', '123.00', '12.00', 0, '2019-05-25 15:30:52', 12),
(80, 'APprueba', 'prueba', '123.00', '12.00', 0, '2019-05-25 15:31:41', 12),
(81, 'Prueba99', 'asd', '123.00', '12.00', 0, '2019-05-25 15:32:54', 12),
(82, 'PruebaNueva', 'adafd', '123.00', '1234.00', 0, '2019-05-25 15:33:12', 12),
(83, 'Pruebaaaa', 'algo', '123.00', '12.00', 0, '2019-05-25 15:52:21', 23),
(84, 'RA-1', 'Radiador de autos', '220.00', '220.00', 0, '2019-05-27 09:19:57', 20),
(85, 'TA-1', 'Tuerca para aros', '30.00', '30.00', 0, '2019-05-27 09:39:33', 80),
(86, 'CS-01', 'Cinturón de seguridad', '60.00', '60.00', 0, '2019-05-27 09:46:00', 40),
(87, 'IP-KIT', 'Intecooler pipa', '90.00', '90.00', 0, '2019-05-27 09:53:37', 9),
(88, 'T-01', 'Timon', '43.00', '43.00', 0, '2019-05-27 09:54:33', 30),
(89, 'RPA-01', 'Reloj presion aceite', '40.00', '40.00', 0, '2019-05-27 09:57:01', 50),
(90, 'RS-01', 'Resortes de suspensión', '90.00', '90.00', 0, '2019-05-27 09:59:11', 25),
(91, 'PAC-1', 'Pedal de acelerador y cable', '90.00', '90.00', 0, '2019-05-27 10:40:25', 0),
(92, 'P-1', 'Palieres ( eje y copa)', '290.00', '290.00', 0, '2019-05-27 10:51:07', 1),
(93, 'MR-1', 'Mangueras de radiador', '132.00', '132.00', 0, '2019-05-27 10:58:25', 1),
(94, 'LG-1', 'Limpieza de tanque de gasolina', '150.00', '150.00', 0, '2019-05-27 10:59:18', 0),
(95, 'SLS-1', 'Sensores de eje de elevas y sigueñal', '440.00', '440.00', 0, '2019-05-27 11:49:18', 1),
(96, 'AM-1', 'Adaptar caja de motor', '600.00', '600.00', 0, '2019-05-27 12:25:14', 1),
(97, 'CA-1', 'Cable acelerador', '80.00', '80.00', 0, '2019-05-27 12:56:26', 1),
(98, 'ET-2', 'Empaque de turbo', '180.00', '180.00', 0, '2019-05-28 09:41:18', 1),
(99, 'ER-1', 'Esparrago de rueda posterior', '100.00', '100.00', 0, '2019-05-28 09:42:33', 0),
(100, 'ET-2', 'Empaque de turbo', '20.00', '20.00', 0, '2019-05-28 09:45:12', 2),
(101, 'ET-01', 'Empaque de turbo', '20.00', '20.00', 0, '2019-05-28 09:45:26', 0),
(102, 'RM-1', 'Ramal de motor', '386.00', '386.00', 0, '2019-05-28 11:42:23', 1),
(103, 'PC-1', 'Palanca de csmbio', '150.00', '150.00', 0, '2019-05-28 11:43:43', 1),
(104, 'TB-01', 'Timen y bocamaza', '80.00', '80.00', 0, '2019-05-28 11:44:44', 1),
(105, 'A-1', 'Amortiguadores', '70.00', '70.00', 0, '2019-05-28 11:46:23', 4),
(106, 'ADLHONDA-94', 'Amortiguador delantero honda 94-00', '200.00', '210.00', 0, '2019-05-28 15:10:07', 0),
(107, 'APSHONDA-94', 'Amortiguador posterior honda-94-00', '210.00', '200.00', 0, '2019-05-28 15:11:27', 0),
(108, 'kE-1', 'Kit de embrague', '530.00', '530.00', 0, '2019-05-29 12:22:29', 0),
(109, 'VK20', 'Volante k20 tipo r', '500.00', '500.00', 0, '2019-05-29 15:18:01', 0),
(110, 'SA-01', 'Suspensión de auto', '430.00', '430.00', 0, '2019-06-04 11:47:42', 6),
(111, 'C-CHASIS', 'Control chasis', '140.00', '140.00', 0, '2019-06-04 11:54:07', 17),
(112, 'EA-01', 'Espaciadores de aros 25mm', '32.00', '32.00', 0, '2019-06-04 11:55:43', 60),
(113, 'AM-01', 'Aros de magnecio de 18\"', '160.00', '160.00', 0, '2019-06-04 11:57:26', 12),
(114, 'BBA-01', 'Bomba de aceite', '390.00', '390.00', 0, '2019-06-24 09:53:24', 1),
(115, 'BA-01', 'Bomba de agua', '177.69', '177.69', 0, '2019-06-28 09:58:12', 1),
(116, 'TD-01', 'Terminal de dirección', '180.00', '180.00', 0, '2019-06-28 12:22:55', 2),
(117, 'Aditivo Orgánico ', 'Aditivo orgánico 1l', '42.21', '42.21', 1, '2019-07-03 11:43:40', 24),
(118, 'Limpiador de frenos', 'limpiador de frenos 500 ml', '8.24', '8.24', 1, '2019-07-03 11:51:56', 12),
(119, 'Almohadilla p/trabajo de campo', 'Almohadilla p/trabajo de campo', '99.00', '99.00', 1, '2019-07-03 11:53:56', 2),
(120, 'Liquido de frenos DOT4 250ml', 'Liquido de frenos DOT4 250ml', '8.64', '8.64', 1, '2019-07-03 11:56:47', 24),
(121, 'OBS Reten Valvula', 'OBS Reten Valvula', '4.17', '4.17', 1, '2019-07-03 12:06:22', 24),
(122, 'Pastillas de freno-2', 'Pastillas de freno', '10.84', '10.84', 1, '2019-07-03 12:23:53', 3),
(123, 'Gasohol', 'Gasolina', '13.07', '13.07', 0, '2019-07-03 12:29:37', 2),
(124, 'Gasolina', '90 octavos', '65.02', '65.02', 0, '2019-07-03 12:35:32', 1),
(125, 'Gasolina Primax', 'Gasolina', '184.95', '156.74', 0, '2019-07-03 12:39:47', 1),
(126, 'Gasolina 50plus', 'Gasolina 50 plus', '10.00', '10.00', 0, '2019-07-03 14:38:08', 2),
(127, 'Gasolina Repsol', 'Gasolina 98', '159.49', '159.49', 0, '2019-07-03 14:46:50', 1),
(128, 'Refrigerante', 'Refrigerante', '161.31', '161.31', 1, '2019-07-03 14:55:07', 2),
(129, 'Gasolina renusa', 'Filtro de aceite', '45.55', '45.55', 0, '2019-07-04 09:06:41', 2),
(130, 'Gasohol 90 plus', 'Gasohol 90 plus', '14.65', '14.65', 0, '2019-07-04 09:15:36', 2),
(131, 'Filtro de aire', 'Filtro de aire', '12.71', '12.71', 1, '2019-07-04 09:20:32', 3),
(132, 'Filtro de aceite', 'Filtro de aceite', '8.47', '8.47', 1, '2019-07-04 09:21:14', 2),
(133, 'Pastillas de freno-1', 'Pastillas de freno', '28.85', '23.97', 1, '2019-07-04 09:33:02', 2),
(134, 'Gasolina Repsol-1', 'galefitec 98', '50.00', '50.00', 0, '2019-07-04 09:47:05', 2),
(135, 'Bujías Encendido', 'Bujías encendido', '12.47', '12.47', 1, '2019-07-04 09:56:35', 8),
(136, 'MMC Filtro de aceite', 'MMC Filtro de aceite', '20.83', '20.83', 1, '2019-07-04 09:58:12', 2),
(137, 'MMC Filtro de Gasolina', 'MMC Filtro de Gasolina', '38.15', '38.15', 1, '2019-07-04 09:59:28', 2),
(138, 'Soporte de caja', 'Soporte de caja', '110.00', '110.00', 1, '2019-07-04 10:03:17', 2),
(139, 'Filtro', 'Filtro', '157.17', '157.17', 1, '2019-07-04 10:12:41', 2),
(140, 'Manguera Inferior', 'Manguera Inferior', '71.32', '71.32', 1, '2019-07-04 10:13:33', 2),
(141, 'MMC aceite caja', '5 litros rojo (MB 236.10)', '138.61', '138.61', 1, '2019-07-04 10:15:07', 2),
(142, 'MMC aceite caja-1', '1 litro rojo (MB 236.10)', '91.32', '91.32', 1, '2019-07-04 10:16:59', 5),
(143, 'MMC Sensor freno', 'MMC Sensor freno', '3.05', '3.05', 1, '2019-07-04 10:17:55', 4),
(144, 'Aceite Hidráulico', 'Aceite hidráulico', '30.88', '30.88', 1, '2019-07-04 10:19:04', 2),
(145, 'Pastillas de freno-3', 'Juego de pastillas de freno delantero', '140.30', '140.30', 1, '2019-07-04 10:20:37', 2),
(146, 'Punta de Palier', 'Punta de Palier', '190.00', '190.00', 1, '2019-07-04 10:33:44', 4),
(147, 'Trapecios', 'Trapecios', '380.00', '380.00', 1, '2019-07-04 10:34:23', 10),
(148, 'Cremallera', 'Cremallera de direccion s/m', '1430.00', '1430.00', 1, '2019-07-04 10:35:02', 2),
(149, 'Pastillas de freno', 'Pastillas de freno', '25.91', '25.91', 1, '2019-07-04 12:03:56', 1),
(150, 'Reten', 'TB9 Reten', '20.00', '20.00', 1, '2019-07-04 12:10:38', 2),
(151, 'Rotulas', 'Un juego de rotulas', '380.00', '380.00', 1, '2019-07-04 12:26:52', 2),
(152, 'Terminales', 'Un juego de terminales', '350.00', '350.00', 1, '2019-07-04 12:27:33', 2),
(153, 'Pack', 'Pack', '290.00', '290.00', 1, '2019-07-04 12:29:01', 4),
(154, 'Gasohol-1', '95 plus', '7.78', '7.78', 0, '2019-07-04 12:53:32', 2),
(155, 'Gasolina-2', 'primax 95', '156.00', '156.00', 0, '2019-07-04 12:57:07', 1),
(156, 'computadora', 'Computadora de motor original', '2105.00', '2105.00', 1, '2019-07-04 12:59:14', 2),
(157, 'Rotulas trapecios delanteros', 'Rotulas trapecios delanteros', '173.86', '147.34', 1, '2019-07-04 14:29:38', 4),
(158, 'Varillaje', 'Varillaje', '67.35', '57.08', 1, '2019-07-04 14:37:06', 2),
(159, 'Amortiguadores delanteros', 'Amortiguadores delanteros', '490.00', '490.00', 1, '2019-07-04 14:53:47', 4),
(160, 'Amortiguadores posteriores', 'Amortiguadores posteriores', '390.00', '390.00', 1, '2019-07-04 14:54:41', 4),
(161, 'Resortes Reforzados', 'Resortes Reforzados', '450.00', '450.00', 1, '2019-07-04 14:55:47', 8),
(162, 'Palieres', 'Palieres', '405.00', '405.00', 1, '2019-07-04 14:56:20', 8),
(163, 'Gasolina 98', '98', '129.11', '129.11', 0, '2019-07-04 15:45:49', 2),
(164, 'Gasolina 90', '90 octavos', '50.00', '50.00', 0, '2019-07-04 15:51:04', 1),
(165, 'Bobina de encendido', 'Bobina de encendio', '270.00', '135.00', 1, '2019-07-04 15:52:18', 2),
(166, 'Empaque carter', 'empaque carter', '21.80', '21.80', 1, '2019-07-05 09:10:12', 2),
(167, 'Filtro caja aut sin empaque', 'Filtro caja aut sin empaque', '35.12', '35.12', 1, '2019-07-05 09:11:20', 2),
(168, 'Cremallera de dirección origin', 'Cremallera de dirección original', '2750.00', '2750.00', 1, '2019-07-05 09:14:36', 2),
(169, 'Juego de filtro A/C antipolen', 'Juego de filtro A/C antipolen', '61.43', '61.43', 1, '2019-07-05 09:18:45', 2),
(170, 'Filtro de aceite-2', 'Filtro de aceite', '12.71', '12.71', 1, '2019-07-05 09:27:25', 12),
(171, 'Filtro de aire-2', 'Filtro de aire', '8.47', '8.47', 1, '2019-07-05 09:28:21', 3),
(172, 'Empaque balancin 4AGE', 'Empaque balancin 4AGE', '44.97', '59.46', 1, '2019-07-05 09:34:30', 2),
(173, 'Filtro de aceite 1AZFE 2AZFE', 'Filtro de aceite 1AZFE 2AZFE', '59.46', '59.46', 1, '2019-07-05 09:36:17', 4),
(174, 'Palieres completos s/m', 'Palieres completos s/m', '980.00', '980.00', 1, '2019-07-05 09:45:29', 4),
(175, 'Juego de trapecios s/m', 'Juego de trapecios s/m', '450.00', '450.00', 1, '2019-07-05 09:46:16', 2),
(176, 'Cremallera de volante completa', 'Cremallera de volante completa', '590.00', '590.00', 1, '2019-07-05 09:46:55', 2),
(177, 'Pastillas de freno-4', 'Pastillas de freno', '36.88', '36.88', 1, '2019-07-05 09:55:57', 2),
(178, 'Gasolina 90 plus', 'Gasolina 90 plus', '16.02', '16.02', 0, '2019-07-05 10:06:42', 2),
(179, 'Gasolina-3', 'primax 90', '16.65', '16.65', 0, '2019-07-05 10:52:57', 2),
(180, 'Motor con caja marca toyota', 'Motor con caja marca toyota', '1600.00', '1600.00', 1, '2019-07-05 11:53:30', 2),
(181, 'Retenes cigueñal posterior', 'Retenes cigueñal posterior', '55.65', '47.16', 1, '2019-07-05 12:03:17', 2),
(182, 'caja de aceite Wolf guard tech', 'caja de aceite Wolf', '340.00', '340.00', 1, '2019-07-05 12:52:00', 16),
(183, 'caja de aceite WOLF VITALTECH', 'caja de aceite WOLF VITALTECH', '500.00', '500.00', 1, '2019-07-05 12:53:46', 8),
(184, 'Paleta Ventiladora', 'Paleta Ventiladora', '151.37', '151.37', 1, '2019-07-08 09:14:39', 2),
(185, 'Medidor de fluido', 'Medidor de fluido', '70.00', '70.00', 1, '2019-07-08 09:17:11', 2),
(186, 'Reten-1', 'reten', '50.38', '50.38', 1, '2019-07-08 09:33:48', 2),
(187, 'Reten de B', 'Reten de B', '30.00', '30.00', 1, '2019-07-08 09:36:45', 8),
(188, 'Filtro automotriz', 'Filtro automotriz', '18.00', '18.00', 1, '2019-07-08 09:40:36', 2),
(189, 'Kit de fundas asiento y timon', 'Kit de fundas asiento y timón', '310.00', '310.00', 1, '2019-07-08 09:44:56', 2),
(190, 'Pastilla de freno AGNA-5', 'Pastilla de freno AGNA-5', '298.00', '298.00', 1, '2019-07-08 09:49:55', 2),
(191, 'Filtro de aceite HONDA 15400 P', 'Filtro de aceite HONDA 15400 PL', '152.79', '152.79', 1, '2019-07-08 09:55:50', 1),
(192, 'Palier Toyota Remanufacturado', 'Palier Toyota Remanufacturado', '100.00', '100.00', 1, '2019-07-10 10:10:34', 2),
(193, 'Caliper/disco subaru forester', 'Caliper/disco subaru forester', '200.00', '200.00', 1, '2019-07-10 10:11:28', 4),
(194, 'Pastilla de freno CENTRIC-6', 'Pastilla de freno CENTRIC-6', '180.00', '152.54', 1, '2019-07-10 10:16:11', 2),
(195, 'Filtro de cabina ca1810', 'Filtro de cabina ca1810', '21.19', '21.19', 1, '2019-07-10 10:20:07', 2),
(196, 'Filtro de aire 1654673c10lb', 'Filtro de aire 1654673c10lb', '8.47', '8.47', 1, '2019-07-10 10:21:17', 2),
(197, 'Argón', 'Argón', '27.99', '27.99', 1, '2019-07-10 11:45:27', 11),
(198, 'Pastillas de freno-7', 'Pastillas de freno-7', '61.46', '61.46', 1, '2019-07-10 12:43:01', 2),
(199, 'Reten-2', 'Reten-2', '158.24', '158.24', 1, '2019-07-11 14:46:09', 8),
(200, 'Brazos de suspensión posterior', 'Brazos de suspensión posterior', '220.00', '220.00', 1, '2019-07-15 09:10:09', 0),
(201, 'Manguera de radiador', 'Manguera de radiador', '145.00', '145.00', 1, '2019-07-15 09:53:27', 1),
(202, 'Toma de agua de radiador en to', 'Toma de agua de radiador en topa', '130.00', '130.00', 1, '2019-07-15 09:59:41', 1),
(203, 'Abrazadores y mangueras de tur', 'Abrazadores y mangueras de turbo', '220.00', '220.00', 1, '2019-07-15 10:05:17', 1),
(204, 'Bomba de embrague y liquido', 'Bomba de embrague y liquido', '260.00', '260.00', 1, '2019-07-15 10:52:05', 0),
(205, 'Brida con termistato', 'Brida con termostato', '250.00', '250.00', 1, '2019-07-15 11:10:17', 0),
(206, 'Ventilador', 'Ventilador', '170.00', '170.00', 1, '2019-07-15 11:10:53', 0),
(207, 'Manguera de recirculacion', 'Manguera de recirculacion', '32.00', '32.00', 1, '2019-07-15 11:12:37', 0),
(208, 'Brazos de terminales de direcc', 'Brazos de terminales de dirección', '330.00', '330.00', 1, '2019-07-15 12:13:55', 0),
(209, 'Vidrios de espejos', 'Vidrios de espejos', '160.00', '160.00', 1, '2019-07-15 12:14:35', 0),
(210, 'Focos de luz principal', 'Focos de luz principal', '76.00', '76.00', 1, '2019-07-15 12:15:18', 0);

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
  `idEstados` int(11) NOT NULL DEFAULT '1',
  `factura` int(11) NOT NULL,
  `fechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaFacturacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `serviciorepuestos`
--

INSERT INTO `serviciorepuestos` (`id`, `idEntregaServicios`, `idPiezas`, `cantidad`, `monto`, `idEstados`, `factura`, `fechaRegistro`, `fechaFacturacion`) VALUES
(1, 1, 1, 510, '153000.00', 1, 0, '2019-07-15 20:48:16', '0000-00-00'),
(2, 3, 1, 2, '600.00', 1, 0, '2019-07-15 20:48:16', '0000-00-00'),
(3, 3, 2, 2, '3000.00', 1, 0, '2019-07-15 20:48:16', '0000-00-00'),
(4, 5, 1, 12, '3600.00', 1, 0, '2019-07-15 20:48:16', '0000-00-00'),
(5, 6, 1, 2, '600.00', 1, 0, '2019-07-15 20:48:16', '0000-00-00'),
(6, 7, 1, 2, '700.00', 1, 0, '2019-07-15 20:48:16', '0000-00-00'),
(7, 9, 31, 2, '140.00', 0, 0, '2019-07-15 20:48:16', '0000-00-00'),
(8, 9, 30, 4, '36.00', 1, 0, '2019-07-15 20:48:16', '0000-00-00'),
(9, 9, 31, 1, '10.00', 0, 0, '2019-07-15 20:48:16', '0000-00-00'),
(10, 9, 31, 1, '10.00', 0, 0, '2019-07-15 20:48:16', '0000-00-00'),
(11, 9, 31, 1, '10.00', 0, 0, '2019-07-15 20:48:16', '0000-00-00'),
(12, 10, 31, 1, '10.00', 1, 0, '2019-07-15 20:48:16', '0000-00-00'),
(13, 9, 31, 1, '10.00', 0, 0, '2019-07-15 20:48:16', '0000-00-00'),
(14, 9, 31, 2, '20.00', 1, 0, '2019-07-15 20:48:16', '0000-00-00'),
(15, 10, 62, 2, '15.00', 1, 0, '2019-07-15 20:48:16', '0000-00-00'),
(16, 18, 72, 1, '3.13', 1, 0, '2019-07-15 20:48:16', '0000-00-00'),
(17, 18, 73, 1, '25.00', 1, 0, '2019-07-15 20:48:16', '0000-00-00'),
(18, 18, 73, 1, '25.00', 0, 0, '2019-07-15 20:48:16', '0000-00-00'),
(19, 18, 71, 1, '3.13', 1, 1, '2019-07-15 20:48:16', '0000-00-00'),
(20, 19, 91, 1, '90.00', 1, 0, '2019-07-15 20:48:16', '2019-07-17'),
(21, 19, 92, 1, '290.00', 1, 0, '2019-07-15 20:48:16', '0000-00-00'),
(22, 19, 93, 1, '132.00', 1, 0, '2019-07-15 20:48:16', '2019-07-24'),
(23, 19, 94, 1, '150.00', 1, 0, '2019-07-15 20:48:16', '2019-07-17'),
(24, 20, 95, 1, '440.00', 0, 0, '2019-07-15 20:48:16', '0000-00-00'),
(25, 20, 95, 1, '440.00', 1, 0, '2019-07-15 20:48:16', '0000-00-00'),
(26, 23, 99, 1, '100.00', 1, 0, '2019-07-15 20:48:16', '2019-07-16'),
(27, 23, 101, 2, '40.00', 1, 0, '2019-07-15 20:48:16', '0000-00-00'),
(28, 36, 107, 2, '420.00', 1, 1, '2019-07-15 20:48:16', '0000-00-00'),
(29, 36, 106, 2, '400.00', 0, 1, '2019-07-15 20:48:16', '0000-00-00'),
(30, 36, 106, 2, '430.00', 1, 1, '2019-07-15 20:48:16', '0000-00-00'),
(31, 38, 108, 1, '530.00', 1, 0, '2019-07-15 20:48:16', '0000-00-00'),
(32, 38, 109, 1, '500.00', 1, 0, '2019-07-15 20:48:16', '0000-00-00'),
(33, 50, 200, 2, '440.00', 1, 0, '2019-07-15 20:48:16', '0000-00-00'),
(34, 51, 204, 1, '260.00', 1, 0, '2019-07-15 20:48:16', '0000-00-00'),
(35, 52, 205, 1, '250.00', 1, 0, '2019-07-15 20:48:16', '0000-00-00'),
(36, 52, 206, 1, '170.00', 1, 1, '2019-07-15 20:48:16', '0000-00-00'),
(37, 52, 201, 3, '88.00', 1, 1, '2019-07-15 20:48:16', '2019-07-16'),
(38, 52, 207, 1, '32.00', 1, 0, '2019-07-15 20:48:16', '0000-00-00'),
(39, 54, 208, 1, '330.00', 0, 0, '2019-07-15 20:48:16', '0000-00-00'),
(40, 54, 209, 1, '160.00', 0, 0, '2019-07-15 20:48:16', '0000-00-00'),
(41, 55, 208, 2, '330.00', 1, 1, '2019-07-15 20:48:16', '2019-07-16'),
(42, 55, 209, 2, '160.00', 1, 0, '2019-07-15 20:48:16', '0000-00-00'),
(43, 55, 210, 4, '76.00', 1, 0, '2019-07-15 20:48:16', '0000-00-00'),
(44, 57, 147, 1, '220.00', 1, 1, '2019-07-15 20:48:16', '2019-07-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(90) DEFAULT NULL,
  `detalle` text,
  `idEstados` int(11) NOT NULL,
  `fechaRegistro` datetime DEFAULT NULL,
  `costo` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `descripcion`, `detalle`, `idEstados`, `fechaRegistro`, `costo`) VALUES
(1, 'Cambio de aceite', 'Consiste en cambio de aciete y accesorios, como: Filtro,empaque', 1, '0000-00-00 00:00:00', '75.00'),
(2, 'qer', 'qereqr', 0, '0000-00-00 00:00:00', '0.00'),
(3, 'servicio nuevo', 'Detalle del servicio nuevo2', 0, '0000-00-00 00:00:00', '0.00'),
(4, 'Mantenimiento frenos', 'Limpieza de pastillas y regulación', 1, '0000-00-00 00:00:00', '100.00'),
(5, 'Adaptacion de motor', 'Adaptacion de motor', 1, '0000-00-00 00:00:00', '2500.00'),
(6, 'Mantenimiento de palieres', '.', 1, '0000-00-00 00:00:00', '300.00'),
(7, 'Nuevo', 'sdfsdf', 0, '2019-04-29 23:29:47', '500.00'),
(8, 'otro', 'dsfsdf', 0, '2019-04-29 23:29:56', '123.00'),
(9, 'Reparación de Motor', 'Reparación de motor', 1, '2019-05-15 11:12:05', '2200.00'),
(10, 'Por revisión de falla', 'Revisión de la falla', 1, '2019-05-27 11:54:48', '100.00'),
(11, 'Cambiar empaque de turbo', 'Cambiar empaque de turbo', 1, '2019-05-28 09:46:26', '180.00'),
(12, 'Desmontaje y montaje de motor', 'Desmontaje y montaje de motor', 1, '0000-00-00 00:00:00', '500.00'),
(13, 'Cambio de ramal de motor', 'Cambio de ramal de motor', 1, '0000-00-00 00:00:00', '200.00'),
(14, 'Cambiar palanca de cambios', 'Cambiar palanca de cambios', 1, '2019-05-28 15:03:11', '150.00'),
(15, 'Cambio de timón', 'cambio de timon', 1, '2019-05-28 15:04:32', '30.00'),
(16, 'Cambio de bocamaza de timon', 'Cambio de bocamaza de timon', 1, '2019-05-28 15:04:58', '50.00'),
(17, 'Cambio de amortiguadores', 'cambio de amortiguadores', 1, '2019-05-28 15:05:25', '280.00'),
(18, 'Cambio de linea de escape completa', '.', 1, '2019-05-28 15:05:51', '180.00'),
(19, 'Cambio de embrague', 'Cambio de embrague', 1, '2019-05-29 09:58:19', '400.00'),
(20, 'cambio de brazos y terminales', 'cambio de brazos y terminales', 1, '2019-06-28 14:41:32', '200.00'),
(21, 'Hacer turbo header', 'Hacer turbo header', 1, '2019-07-10 09:28:15', '700.00'),
(22, 'Poner a pintar motor', 'Poner a pintar motor', 1, '2019-07-10 09:28:38', '220.00'),
(23, 'Reforzar puerta, hacer soporte nuevo', 'Reforzar puerta, hacer soporte nuevo', 1, '2019-07-10 09:29:59', '650.00'),
(24, 'Reforzar soportes originales', 'Reforzar soportes originales', 1, '2019-07-10 09:30:36', '250.00'),
(25, 'Desmontaje y montaje de turbo header', 'Desmontaje y montaje de turbo header', 1, '2019-07-10 09:31:48', '200.00'),
(26, 'Reparar fibra', 'Reparar fibra', 1, '2019-07-10 09:32:23', '280.00'),
(27, 'Modificar pipa de turbo', 'Modificar pipa de turbo', 1, '0000-00-00 00:00:00', '480.00'),
(28, 'Cambio de bomba de gasolina', 'Cambio de bomba de gasolina', 1, '2019-07-12 09:53:00', '0.00'),
(29, 'Asistencia a practica y carrera', 'Asistencia a practica y carrera', 1, '2019-07-12 09:53:57', '1000.00'),
(30, 'Cambiar linea de escape y resonador', 'Cambiar linea de escape y resonador', 1, '2019-07-12 10:24:23', '750.00'),
(31, 'Alineamiento', 'Alineamiento', 1, '2019-07-15 09:09:02', '120.00'),
(32, 'cambio de bomba de embrague', 'cambio de bomba de embrague', 1, '2019-07-15 10:52:44', '130.00'),
(33, 'Instalar radiador y bridas', 'Instalar radiador y bridas', 1, '2019-07-15 11:08:55', '280.00'),
(34, 'Enderezado de chasis', 'Enderezado de chasis', 1, '2019-07-15 12:08:18', '320.00'),
(35, 'Reparar cremallera', 'Reparar cremallera', 1, '2019-07-15 12:12:57', '210.00'),
(36, 'Enllante de 4', 'Enllante de 4', 1, '2019-07-15 12:18:05', '32.00');

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
(1, 'admin', 'd1f47c3c7abf7d67b34bb2ff67daedbd'),
(2, 'jmc', 'bc67790863cb164cfcc9f083919afee1');

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
(1, 'AUU112', 1, 1, '12312', 2022, 'daf', '1.jpg', 1, 0, '2019-04-12 17:23:11'),
(2, 'aaaaa', 1, 1, '', 0, '', '', 0, 1, '2019-04-15 14:00:38'),
(3, 'aaaaa', 1, 1, 'aefa', 456, 'grfgrg', '', 0, 1, '2019-04-15 14:00:57'),
(4, 'afaef', 1, 2, '', 0, '', '', 1, 0, '2019-04-15 14:01:37'),
(5, 'aaaaaaaa', 1, 1, '', 0, '', '', 1, 0, '2019-04-15 14:01:51'),
(6, 'aaaaa', 2, 1, 'fadafdadf', 12312, '3123', '1.jpg', 1, 0, '2019-04-15 14:02:04'),
(7, 'bbb', 1, 1, '', 0, '', '', 0, 1, '2019-04-16 08:20:38'),
(8, 'franz', 1, 1, '', 0, '', '', 1, 0, '2019-04-16 08:32:02'),
(9, 'kkk', 1, 1, '122', 2013, '', '1.jpg', 1, 0, '2019-04-16 08:40:16'),
(10, 'hh', 1, 1, '', 0, '', '1.jpg', 1, 0, '2019-04-16 08:50:59'),
(11, 'EO3691', 1, 6, '4AG', 1993, 'AE111', '1.jpg', 2, 0, '2019-04-24 12:34:26'),
(12, 'XXX999', 1, 6, '1234567890', 2000, '1234567890', '1.jpg', 6, 0, '2019-05-01 10:49:03'),
(13, 'D4V411', 8, 12, '.', 2002, '.', '1.jpeg', 7, 1, '2019-05-14 11:40:44'),
(14, 'F8V640', 9, 13, '15s', 2014, 'lSJZ14EES015187', '1.jpeg', 8, 0, '2019-05-15 10:37:26'),
(15, 'ZZZ000', 2, 7, 'UWERUUWERU834584538', 1990, 'JHFHFH85858', '1.jpg', 12, 0, '2019-05-15 18:18:57'),
(16, 'C2Y-783', 11, 18, '.', 111, '.', '1.jpg', 34, 1, '2019-05-27 11:30:07'),
(17, '12345678', 18, 24, '4AG', 1989, '.', '1.jpg', 35, 0, '2019-05-27 12:18:09'),
(18, 'XXY999', 2, 7, 'UTYTYTRYT6565656', 2001, 'JHJHJHJH878787', '1.jpg', 36, 0, '2019-05-27 18:49:16'),
(19, 'F7R621', 20, 26, 'SR20DET', 1993, '', '1.jpg', 38, 1, '2019-05-28 09:47:55'),
(20, 'A3W159', 7, 9, 'B186A', 1993, '.', '1.jpg', 39, 1, '2019-05-28 10:02:03'),
(21, 'LLL111', 1, 6, 'UTYTYTRYT6565656', 2013, 'JHJHJHJH878787', '1.jpg', 41, 0, '2019-05-28 13:18:05'),
(22, '08D258', 7, 9, '24', 2012, '111', '', 42, 1, '2019-05-29 09:53:23'),
(23, 'F1R235', 7, 9, 'K20A', 2007, '.', '1.jpg', 47, 0, '2019-06-28 12:20:43'),
(24, 'B7L535', 20, 27, 'GA16', 1992, 'BEAB13012096', '1.jpeg', 48, 1, '2019-07-01 10:34:28'),
(25, 'f9R555', 6, 28, 'G4F', 2014, 'KTMHDH41CAEU125414', '1.jpeg', 49, 1, '2019-07-01 11:11:27'),
(26, '123456', 21, 29, 'M16A', 2007, '1111', '1.jpg', 52, 1, '2019-07-10 10:01:51'),
(27, '00000', 7, 9, 'D16b', 1996, '1111', '1.jpeg', 55, 1, '2019-07-12 09:44:52'),
(28, 'A7Z874', 20, 30, 'kA24', 2010, '', '1.jpg', 56, 1, '2019-07-12 10:28:25'),
(29, '11111', 1, 23, '356tE', 1985, '111111111', '1.jpg', 57, 1, '2019-07-15 09:15:18'),
(30, 'FQ1812', 15, 17, '4AG', 1980, '.', '1.jpg', 58, 1, '2019-07-15 11:05:54'),
(31, '1234567', 14, 16, 'B1BC', 1995, '11111', '1.jpg', 53, 1, '2019-07-15 11:39:54');

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
-- Indices de la tabla `entregaimagen`
--
ALTER TABLE `entregaimagen`
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
-- Indices de la tabla `imagenentregas`
--
ALTER TABLE `imagenentregas`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `comprasrepuestos`
--
ALTER TABLE `comprasrepuestos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de la tabla `datosgenerales`
--
ALTER TABLE `datosgenerales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `entregaimagen`
--
ALTER TABLE `entregaimagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `entregas`
--
ALTER TABLE `entregas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `entregaservicios`
--
ALTER TABLE `entregaservicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `imagenentregas`
--
ALTER TABLE `imagenentregas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `modelos`
--
ALTER TABLE `modelos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `pagoclientes`
--
ALTER TABLE `pagoclientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `piezas`
--
ALTER TABLE `piezas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT de la tabla `serviciorepuestos`
--
ALTER TABLE `serviciorepuestos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
