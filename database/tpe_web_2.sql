-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2023 a las 00:50:18
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpe_web_2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artistas`
--

CREATE TABLE `artistas` (
  `id_artist` int(11) NOT NULL,
  `artist_name` varchar(100) NOT NULL,
  `artist_dob` date NOT NULL,
  `artist_pob` varchar(100) NOT NULL,
  `selected` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `artistas`
--

INSERT INTO `artistas` (`id_artist`, `artist_name`, `artist_dob`, `artist_pob`, `selected`) VALUES
(1, 'Charly García', '1951-10-23', 'Argentina', 0),
(2, 'León Gieco', '1951-11-20', 'Argentina', 1),
(6, 'Luis Alberto Spinetta', '1950-01-23', 'Argentina', 1),
(7, 'Fito Páez', '1963-03-13', 'Argentina', 1),
(8, 'Caetano Veloso', '1942-08-07', 'Brasil', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discos`
--

CREATE TABLE `discos` (
  `id_album` int(11) NOT NULL,
  `album_name` varchar(100) NOT NULL,
  `release_date` date NOT NULL,
  `id_artist` int(11) NOT NULL,
  `duration` time NOT NULL,
  `selected` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `discos`
--

INSERT INTO `discos` (`id_album`, `album_name`, `release_date`, `id_artist`, `duration`, `selected`) VALUES
(1, 'Clicks Modernos', '1983-11-05', 1, '00:33:04', 1),
(2, 'Por favor, perdón y gracias', '2005-09-06', 2, '00:59:18', 0),
(5, 'El fantasma de Canterville', '1976-02-03', 2, '00:41:00', 1),
(6, 'León Gieco', '1973-07-16', 2, '00:33:00', 0),
(7, 'La banda de caballos cansados', '1974-09-01', 2, '00:36:00', 0),
(8, '4º L.P.', '1979-07-28', 2, '00:40:00', 0),
(9, 'Pensar en nada', '1981-12-05', 2, '00:43:00', 0),
(11, 'De Ushuaia a la Quiaca vol.2', '1986-04-03', 2, '00:42:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`) VALUES
(7, 'webadmin', '$2y$10$WU3Z7Qt2xF/u0vp/H5WXD.bypCt1YAD0ITfxlvstYYEXJrOOylmtO'),
(8, 'manumujica', '$2y$10$zAjI6mvz8X9obmzDBtBAke93C28Jc1GByMTpX3JeqBjh0m5I7X3uK');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artistas`
--
ALTER TABLE `artistas`
  ADD PRIMARY KEY (`id_artist`);

--
-- Indices de la tabla `discos`
--
ALTER TABLE `discos`
  ADD PRIMARY KEY (`id_album`) USING BTREE,
  ADD KEY `idx_id_artist` (`id_artist`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artistas`
--
ALTER TABLE `artistas`
  MODIFY `id_artist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `discos`
--
ALTER TABLE `discos`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
