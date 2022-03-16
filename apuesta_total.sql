-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-03-2022 a las 17:14:44
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `apuesta_total`
--
CREATE DATABASE IF NOT EXISTS `apuesta_total` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `apuesta_total`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `billeterovirtual`
--

DROP TABLE IF EXISTS `billeterovirtual`;
CREATE TABLE `billeterovirtual` (
  `idbilletero` int(10) UNSIGNED NOT NULL,
  `idvoucher` int(11) DEFAULT NULL,
  `idcanal` int(11) NOT NULL,
  `idpromotor` int(11) NOT NULL,
  `montoingresado` decimal(6,2) DEFAULT NULL,
  `creation_time` timestamp NULL DEFAULT current_timestamp(),
  `modification_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `billeterovirtual`
--

INSERT INTO `billeterovirtual` (`idbilletero`, `idvoucher`, `idcanal`, `idpromotor`, `montoingresado`, `creation_time`, `modification_time`) VALUES
(2, 2, 1, 1, '350.00', '2022-03-16 14:19:16', '2022-03-16 16:13:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canales`
--

DROP TABLE IF EXISTS `canales`;
CREATE TABLE `canales` (
  `idcanal` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `canales`
--

INSERT INTO `canales` (`idcanal`, `nombre`) VALUES
(1, 'Whatsapp'),
(2, 'Telegram');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `playerid` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `dni` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`playerid`, `nombre`, `dni`) VALUES
(1, 'Alejandro Toledo', '10203345'),
(2, 'Alan Garcia', '17890920');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_cuenta`
--

DROP TABLE IF EXISTS `info_cuenta`;
CREATE TABLE `info_cuenta` (
  `idvoucher` int(10) UNSIGNED NOT NULL,
  `playerid` int(11) DEFAULT NULL,
  `voucher` varchar(50) DEFAULT NULL,
  `monto` decimal(6,2) DEFAULT NULL,
  `ingresado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `info_cuenta`
--

INSERT INTO `info_cuenta` (`idvoucher`, `playerid`, `voucher`, `monto`, `ingresado`) VALUES
(1, 0, '----', '0.00', 0),
(2, 1, 'B001-001', '350.00', 1),
(3, 2, 'B001-002', '500.00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promotor`
--

DROP TABLE IF EXISTS `promotor`;
CREATE TABLE `promotor` (
  `idpromotor` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `dni` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `promotor`
--

INSERT INTO `promotor` (`idpromotor`, `nombre`, `dni`) VALUES
(1, 'Patricio Parodi', '11223355'),
(2, 'Carlos Alvarez', '12080765');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `billeterovirtual`
--
ALTER TABLE `billeterovirtual`
  ADD PRIMARY KEY (`idbilletero`);

--
-- Indices de la tabla `canales`
--
ALTER TABLE `canales`
  ADD PRIMARY KEY (`idcanal`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`playerid`);

--
-- Indices de la tabla `info_cuenta`
--
ALTER TABLE `info_cuenta`
  ADD PRIMARY KEY (`idvoucher`);

--
-- Indices de la tabla `promotor`
--
ALTER TABLE `promotor`
  ADD PRIMARY KEY (`idpromotor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `billeterovirtual`
--
ALTER TABLE `billeterovirtual`
  MODIFY `idbilletero` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `canales`
--
ALTER TABLE `canales`
  MODIFY `idcanal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `playerid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `info_cuenta`
--
ALTER TABLE `info_cuenta`
  MODIFY `idvoucher` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `promotor`
--
ALTER TABLE `promotor`
  MODIFY `idpromotor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
