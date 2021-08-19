-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2021 a las 18:48:42
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `apirest`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `NumLote` int(11) NOT NULL,
  `Nombre` varchar(35) NOT NULL,
  `ApellidoP` varchar(30) NOT NULL,
  `ApellidoM` varchar(30) NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaTerm` date NOT NULL,
  `Tipo` varchar(35) NOT NULL,
  `Numero` varchar(11) NOT NULL,
  `PiezasDef` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`NumLote`, `Nombre`, `ApellidoP`, `ApellidoM`, `FechaInicio`, `FechaTerm`, `Tipo`, `Numero`, `PiezasDef`) VALUES
(2523, 'Antonio', 'Gutierrez', 'Gomez', '2021-08-11', '2021-08-20', 'Limpieza', '2', '0'),
(2535, 'Pablo', 'Martinez', 'Perez', '0000-00-00', '0000-00-00', 'Jardin', '5', '1'),
(2536, 'Carlos', 'Carrillo', 'Marquez', '2021-08-12', '2021-08-15', 'Sala', '5', '1'),
(2580, 'Galilea', 'Escobedo', 'Rios', '2021-08-02', '2021-08-08', 'Mascotas', '10', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(5) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Contra` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `Nombre`, `Correo`, `Contra`) VALUES
(1, 'Equipo', 'equipo@gmail.com', '12345678'),
(1, 'Equipo', 'equipo@gmail.com', '12345678');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`NumLote`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
