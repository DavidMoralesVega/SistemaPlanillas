-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-08-2019 a las 19:24:43
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `planilla`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellidos` varchar(30) NOT NULL,
  `CedulaIdentidad` varchar(15) NOT NULL,
  `User` varchar(20) NOT NULL,
  `Password` text NOT NULL,
  `Nivel` char(1) NOT NULL,
  `Estado` char(1) NOT NULL DEFAULT '1',
  `FechaRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `Nombre`, `Apellidos`, `CedulaIdentidad`, `User`, `Password`, `Nivel`, `Estado`, `FechaRegistro`) VALUES
(1, 'DAVID', 'MORALES VEGA', '7845784', 'DMV', '$2a$07$asxx54ahjppf45sd87a5au.G2ODdOEnqW6fisFWd.zJ40gla5x0t6', 'A', '1', '2019-07-31 02:38:54'),
(2, 'ROBERTO', 'UGARTE PEREZ', '4587858', 'RUP', '$2a$07$asxx54ahjppf45sd87a5auMm0g.VTQl9HS2enVGnBYN8sjiCoLTA2', 'S', '1', '2019-07-31 02:39:00'),
(3, 'hola', 'como', '4878695-1M', 'qwe', 'qwe', 'A', '1', '2019-07-31 02:39:07'),
(4, 'DIEGO', 'ZAMBRANA ESTRELLA', '9865265', '', '$2a$07$asxx54ahjppf45sd87a5auQTMt0deILb/WrZN0DjtCQSm.DaaBUdO', 'A', '1', '2019-07-31 02:39:13'),
(5, 'JURGEN', 'BELEN LOPEZ', '6978525', '', '$2a$07$asxx54ahjppf45sd87a5auzZcYdeoYE9KOauAJtDSRw05WxI3I/ky', 'S', '1', '2019-07-31 02:39:20'),
(6, 'JURGEN', 'BELEN LOPEZ', '7815953', '', '$2a$07$asxx54ahjppf45sd87a5auzZcYdeoYE9KOauAJtDSRw05WxI3I/ky', 'S', '1', '2019-07-31 02:39:24'),
(7, 'JUNIOR', 'PEREZ TORREZ', '7895698', 'JPT', '$2a$07$asxx54ahjppf45sd87a5auDQs8dJpbHXb2QJfaeo76pyvNXyFLbn6', 'A', '1', '2019-07-31 02:39:28'),
(8, 'MARIA', 'CHAVEZ VARGAS', '7693658', 'MCV', '$2a$07$asxx54ahjppf45sd87a5auZbVXiCOrC1HfylouHSRTm7VJSzvtG/u', 'A', '1', '2019-07-31 02:39:32'),
(9, 'IVER', 'MISERICORDIA MAMANI', '78458959-1D', 'IMM', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'S', '1', '2019-07-31 03:17:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
