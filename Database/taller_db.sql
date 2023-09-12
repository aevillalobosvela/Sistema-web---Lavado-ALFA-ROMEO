-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-07-2023 a las 17:41:55
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taller_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `ci_cliente` int(11) NOT NULL,
  `nom_cliente` varchar(20) NOT NULL,
  `app_cliente` varchar(15) NOT NULL,
  `apm_cliente` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`ci_cliente`, `nom_cliente`, `app_cliente`, `apm_cliente`) VALUES
(2167479, 'Sirena', 'Asentacion', 'Zamora'),
(2487789, 'Akina', 'Tatsu', 'Sempertegui'),
(5498248, 'Juan Carlos', 'Flores', 'Villanueva'),
(9721487, 'Arturo', 'Coronado', 'Valencia'),
(9976215, 'Aaron', 'Justo', 'Cambio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `cod_emp` int(11) NOT NULL,
  `ci_emp` int(11) NOT NULL,
  `nom_emp` varchar(30) NOT NULL,
  `app_emp` varchar(15) NOT NULL,
  `apm_emp` varchar(15) NOT NULL,
  `salario` decimal(10,2) NOT NULL,
  `fecnac_emp` date NOT NULL,
  `cargo` varchar(15) NOT NULL,
  `login` varchar(10) NOT NULL,
  `pass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`cod_emp`, `ci_emp`, `nom_emp`, `app_emp`, `apm_emp`, `salario`, `fecnac_emp`, `cargo`, `login`, `pass`) VALUES
(1, 74194172, 'Alejandro', 'Miranda', 'Cama', '2000.00', '2002-12-10', 'mecanico', '122', '122'),
(2, 7419416, 'Alvaro Edwin', 'Villalobos', 'Vela', '2000.50', '2002-12-10', 'administrador', '123', '123'),
(5, 74194162, 'Carlos', 'Juan', 'Mayor', '200.00', '2023-05-23', 'ayudante', '12', '12'),
(6, 4621579, 'Roman', 'Bellic', 'Siendo', '2000.00', '1998-12-12', 'administrador', '1', '1'),
(7, 2146548, 'Ramiro', 'Balcazar', 'Tercero', '1500.00', '1997-06-11', 'tec. lavado', '2', '2'),
(9, 1687965, 'Maria', 'Camila', 'Cabello', '2000.00', '1995-09-15', 'tec. lavado', '5', '5'),
(10, 21645612, 'Samuel', 'Zed', 'Zona', '1500.00', '1999-05-04', 'ayudante', '7', '7'),
(11, 24973741, 'David', 'Jhon', 'Stat', '1588.00', '1989-04-05', 'mecanico', '7', '7'),
(12, 6491974, 'Hamm', 'State', 'Save', '1200.00', '1995-07-09', 'tec. lavado', '55', '55'),
(13, 7921574, 'Jaime', 'Parra', 'Guerrero', '900.00', '2001-02-19', 'ayudante', '98', '98'),
(14, 3575143, 'Aram', 'Judem', 'Sabhi', '2000.00', '1979-05-16', 'mecanico', '333', '3333');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lavado`
--

CREATE TABLE `lavado` (
  `cod_lavado` int(11) NOT NULL,
  `tipo_lavado` varchar(20) NOT NULL,
  `hora_lavado` time NOT NULL,
  `costo_lavado` decimal(10,2) NOT NULL,
  `cod_encargado` int(11) NOT NULL,
  `cod_ayudante` int(11) NOT NULL,
  `cod_v` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lavado`
--

INSERT INTO `lavado` (`cod_lavado`, `tipo_lavado`, `hora_lavado`, `costo_lavado`, `cod_encargado`, `cod_ayudante`, `cod_v`) VALUES
(10, '1', '23:16:50', '20.00', 7, 5, 21),
(11, '4', '23:17:24', '45.00', 7, 5, 23),
(12, '4', '23:18:45', '45.00', 7, 5, 20),
(13, '3', '23:19:24', '35.00', 7, 5, 9),
(14, '2', '23:19:43', '25.00', 7, 5, 9),
(15, '4', '23:30:58', '45.00', 7, 5, 20),
(16, '1', '23:31:37', '20.00', 7, 5, 22),
(17, '3', '23:31:56', '35.00', 7, 5, 9),
(18, '4', '23:32:14', '45.00', 7, 5, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `cod_mant` int(11) NOT NULL,
  `cant_servicios` int(11) NOT NULL,
  `hora_mant` time NOT NULL,
  `costo_mant` decimal(10,2) NOT NULL,
  `cod_encargado` int(11) NOT NULL,
  `cod_ayudante` int(11) NOT NULL,
  `cod_v` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`cod_mant`, `cant_servicios`, `hora_mant`, `costo_mant`, `cod_encargado`, `cod_ayudante`, `cod_v`) VALUES
(4, 1, '22:58:31', '260.00', 9, 13, 20),
(5, 2, '23:01:37', '190.00', 9, 5, 21),
(6, 3, '23:14:27', '245.00', 7, 10, 9),
(7, 2, '23:15:08', '170.00', 7, 5, 22),
(8, 1, '23:16:17', '80.00', 7, 5, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `cod_producto` int(11) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `tipo_producto` varchar(20) NOT NULL,
  `precio_unidad` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`cod_producto`, `descripcion`, `tipo_producto`, `precio_unidad`, `stock`) VALUES
(1, 'Aceite sintetico', 'Aceite de motor', '120.00', 8),
(2, 'Aceite semi-sintetico', 'Aceite de motor', '140.00', 11),
(3, 'Aceite de alto kilometraje', 'Aceite de motor', '250.00', 5),
(4, 'Filtro mecanico', 'Filtro de aceite', '20.00', 6),
(5, 'Filtro magnetico', 'Filtro de aceite', '23.00', 19),
(6, 'Filtro de alta eficiencia', 'Filtro de aceite', '35.00', 15),
(7, 'Filtro centrifugo', 'Filtro de aceite', '25.00', 11),
(8, 'Balatas mecanicas', 'Balatas de freno', '45.00', 14),
(9, 'Balatas sinteticas', 'Balatas de freno', '50.00', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rampa`
--

CREATE TABLE `rampa` (
  `cod_rampa` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rampa`
--

INSERT INTO `rampa` (`cod_rampa`, `estado`) VALUES
(1, 0),
(2, 1),
(3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `cod_v` int(11) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `marca` varchar(15) NOT NULL,
  `modelo` varchar(15) NOT NULL,
  `color` varchar(15) NOT NULL,
  `ci_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`cod_v`, `placa`, `marca`, `modelo`, `color`, `ci_cliente`) VALUES
(9, 'AGQ458', 'Toyota', 'Corolla', 'Blanco', 5498248),
(20, '437BOA', 'Suzuki', 'Terra', 'Blanco', 9721487),
(21, '824UUS', 'Mitsubishi', 'Samtek', 'Gris', 2167479),
(22, '799APQ', 'BMW', '20XX', 'Rojo', 2487789),
(23, '125MNW', 'Dodge', 'Filled', 'Otro', 9976215);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ci_cliente`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`cod_emp`);

--
-- Indices de la tabla `lavado`
--
ALTER TABLE `lavado`
  ADD PRIMARY KEY (`cod_lavado`),
  ADD KEY `cod_encargado` (`cod_encargado`,`cod_ayudante`,`cod_v`),
  ADD KEY `cod_v` (`cod_v`),
  ADD KEY `cod_ayudante` (`cod_ayudante`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`cod_mant`),
  ADD KEY `cod_encargado` (`cod_encargado`,`cod_ayudante`,`cod_v`),
  ADD KEY `cod_ayudante` (`cod_ayudante`),
  ADD KEY `cod_v` (`cod_v`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`cod_producto`);

--
-- Indices de la tabla `rampa`
--
ALTER TABLE `rampa`
  ADD PRIMARY KEY (`cod_rampa`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`cod_v`),
  ADD KEY `ci_cliente` (`ci_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `cod_emp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `lavado`
--
ALTER TABLE `lavado`
  MODIFY `cod_lavado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `cod_mant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `cod_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `cod_v` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `lavado`
--
ALTER TABLE `lavado`
  ADD CONSTRAINT `lavado_ibfk_1` FOREIGN KEY (`cod_v`) REFERENCES `vehiculo` (`cod_v`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lavado_ibfk_2` FOREIGN KEY (`cod_encargado`) REFERENCES `empleado` (`cod_emp`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lavado_ibfk_3` FOREIGN KEY (`cod_ayudante`) REFERENCES `empleado` (`cod_emp`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `mantenimiento_ibfk_1` FOREIGN KEY (`cod_encargado`) REFERENCES `empleado` (`cod_emp`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mantenimiento_ibfk_2` FOREIGN KEY (`cod_ayudante`) REFERENCES `empleado` (`cod_emp`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mantenimiento_ibfk_3` FOREIGN KEY (`cod_v`) REFERENCES `vehiculo` (`cod_v`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`ci_cliente`) REFERENCES `cliente` (`ci_cliente`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
