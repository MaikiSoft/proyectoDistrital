-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2023 a las 08:26:29
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `datosclientes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroautos`
--

CREATE TABLE `registroautos` (
  `Nombre` varchar(50) NOT NULL,
  `identificacion` int(11) NOT NULL,
  `placa` varchar(6) NOT NULL,
  `modelo` int(11) NOT NULL,
  `cilindraje` int(11) NOT NULL,
  `Fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registroautos`
--

INSERT INTO `registroautos` (`Nombre`, `identificacion`, `placa`, `modelo`, `cilindraje`, `Fecha`) VALUES
('ANDRES FELIPE CARDOSO', 79920469, 'LWQ749', 2012, 1200, '2022-07-16'),
('ANTURI SOFIA CESPEDES', 1027954874, 'KUJ369', 2016, 1200, '2023-06-19'),
('Dabian Castillo virguez', 1034279541, 'WPM382', 2020, 1000, '2023-06-19'),
('PAULA ANDREA CARDONA', 651247854, 'POL547', 2020, 250, '2023-06-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registromotos`
--

CREATE TABLE `registromotos` (
  `Nombre` varchar(50) NOT NULL,
  `identificacion` int(11) NOT NULL,
  `placa` varchar(6) NOT NULL,
  `modelo` int(11) NOT NULL,
  `cilindraje` int(11) NOT NULL,
  `Fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registromotos`
--

INSERT INTO `registromotos` (`Nombre`, `identificacion`, `placa`, `modelo`, `cilindraje`, `Fecha`) VALUES
('ANDERSON COSOCO', 7654127, 'BAN65K', 2024, 650, '2023-06-19'),
('CALAMARDO TENTACULOS', 2147483647, 'XJL60O', 2013, 600, '2023-06-19'),
('Dabian Castillo virguez', 1034279541, 'zlm39f', 2022, 160, '2022-02-24'),
('LOCA SANCHEZ CRISTO', 4568441, 'PNE42O', 2015, 250, '2023-06-19'),
('PAULA ANDREA CARDONA', 4674897, 'QKA69L', 2018, 160, '2023-06-19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registroautos`
--
ALTER TABLE `registroautos`
  ADD UNIQUE KEY `Nombre` (`Nombre`,`identificacion`,`placa`,`modelo`,`cilindraje`,`Fecha`);

--
-- Indices de la tabla `registromotos`
--
ALTER TABLE `registromotos`
  ADD UNIQUE KEY `Nombre` (`Nombre`,`identificacion`,`placa`,`modelo`,`cilindraje`,`Fecha`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
