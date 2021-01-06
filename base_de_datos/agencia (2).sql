-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2019 a las 20:03:20
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agencia`
--
CREATE DATABASE IF NOT EXISTS `agencia` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE `agencia`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aeropuerto`
--

CREATE TABLE `aeropuerto` (
  `id_aeropuerto` int(11) NOT NULL,
  `nombre_aeropuerto` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `aeropuerto`
--

INSERT INTO `aeropuerto` (`id_aeropuerto`, `nombre_aeropuerto`, `direccion`, `telefono`) VALUES
(15, 'Internacional Ilopango', 'Soyapnago', 987987),
(17, 'EL NORTE', 'Ilopango', 2147483647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agencia`
--

CREATE TABLE `agencia` (
  `id_agencia` int(11) NOT NULL,
  `nombre_agencia` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` int(8) NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `agencia`
--

INSERT INTO `agencia` (`id_agencia`, `nombre_agencia`, `telefono`, `id_departamento`) VALUES
(6, 'Rocio S.A DE RUS', 987654321, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avion`
--

CREATE TABLE `avion` (
  `cod_avion` int(11) NOT NULL,
  `nombre_cod_avion` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `capacidad` int(11) NOT NULL,
  `num_asientos` int(11) NOT NULL,
  `id_aeropuerto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `avion`
--

INSERT INTO `avion` (`cod_avion`, `nombre_cod_avion`, `capacidad`, `num_asientos`, `id_aeropuerto`) VALUES
(2, 'A690-900', 800, 600, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase_vuelo`
--

CREATE TABLE `clase_vuelo` (
  `id_clase` int(11) NOT NULL,
  `nombre_clase` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `clase_vuelo`
--

INSERT INTO `clase_vuelo` (`id_clase`, `nombre_clase`) VALUES
(1, 'Economica'),
(2, 'VIP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `nombre_departamento` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre_departamento`) VALUES
(1, 'San Salvador'),
(2, 'Sonsonate');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE `destino` (
  `id_destino` int(11) NOT NULL,
  `nombre_destino` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `id_pais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `destino`
--

INSERT INTO `destino` (`id_destino`, `nombre_destino`, `id_pais`) VALUES
(9, 'Medellin, Colombia', 56),
(10, 'Madrid', 77),
(11, 'Buenos Aires', 3),
(12, 'Belmopán, Aerodromo Héctor Silva', 29),
(13, 'Brasilia, Aeropuerto Internacional de brasilia', 37),
(14, 'Roma,  Aeropuerto Fiumicino', 116),
(15, 'Berlín, Tegel', 8),
(16, 'París, Aeropuerto Charles de Gaulle', 86);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `nombre_estado` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `nombre_estado`) VALUES
(1, 'Reservados'),
(2, 'Disponibles'),
(3, 'Reprogramado / Reservados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `origen`
--

CREATE TABLE `origen` (
  `id_origen` int(11) NOT NULL,
  `nombre_origen` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `id_pais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `origen`
--

INSERT INTO `origen` (`id_origen`, `nombre_origen`, `id_pais`) VALUES
(7, 'San Salvador, Monseñor Romero', 1),
(8, 'San Salvador, Ilopango', 1),
(9, 'Sonsonate, el jocotillo', 1),
(10, 'San Miguel, El papalón', 1),
(11, 'La libertad, Cangrejera', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL,
  `nombre_pais` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id_pais`, `nombre_pais`) VALUES
(1, 'El Salvador'),
(2, 'Rusia'),
(3, 'Argentina'),
(4, 'Estados Unidos'),
(5, 'Afganistán'),
(6, 'Islas Gland'),
(7, 'Albania'),
(8, 'Alemania'),
(9, 'Andorra'),
(10, 'Angola'),
(11, 'Anguilla'),
(12, 'Antártid'),
(13, 'Antigua y Barbuda'),
(14, 'Antillas Holandesas'),
(15, 'Arabia Saudí'),
(16, 'Argelia'),
(17, 'Argentina'),
(18, 'Armenia'),
(19, 'Aruba'),
(20, 'Australia'),
(21, 'Austria'),
(22, 'Azerbaiyán'),
(23, 'Bahamas'),
(24, 'Bahré'),
(25, 'Bangladesh'),
(26, 'Barbados'),
(27, 'Bielorrusia'),
(28, 'Bélgica'),
(29, 'Belice'),
(30, 'Benin'),
(31, 'Bermudas'),
(32, 'Bhután'),
(33, 'Bolivia'),
(34, 'Bosnia y Herzegovina'),
(35, 'Botsuana'),
(36, 'Isla Bouvet'),
(37, 'Brasil'),
(38, 'Brunéi'),
(39, 'Bulgaria'),
(40, 'Burkina Faso'),
(41, 'Burundi'),
(42, 'Cabo Verde'),
(43, 'Islas Caimán'),
(44, 'Camboya'),
(45, 'Camerún'),
(46, 'Canadá'),
(47, 'República Centroafricana'),
(48, 'Chad'),
(49, 'República Checa'),
(50, 'Chile'),
(51, 'China'),
(52, 'Chipre'),
(53, 'Isla de Navidad'),
(54, 'Ciudad del Vaticano'),
(55, 'Islas Cocos'),
(56, 'Colombia'),
(57, 'Comoras'),
(58, 'República Democrática del Congo'),
(59, 'Congo'),
(60, 'Islas Cook'),
(61, 'Corea del Norte'),
(62, 'Corea del Sur'),
(63, 'Costa de Marfil'),
(64, 'Costa Rica'),
(65, 'Croacia'),
(66, 'Cuba'),
(67, 'Dinamarca'),
(68, 'Dominica'),
(69, 'República Dominicana'),
(70, 'Ecuador'),
(71, 'Egipto'),
(72, 'El Salvador'),
(73, 'Emiratos Árabes Unidos'),
(74, 'Eritrea'),
(75, 'Eslovaquia'),
(76, 'Eslovenia'),
(77, 'España'),
(78, 'Islas ultramarinas de Estados Unidos'),
(79, 'Estados Unidos'),
(80, 'Estonia'),
(81, 'Etiopía'),
(82, 'Islas Feroe'),
(83, 'Filipinas'),
(84, 'Finlandia'),
(85, 'Fiyi'),
(86, 'Francia'),
(87, 'Gabón'),
(88, 'Gambia'),
(89, 'Georgia'),
(90, 'Islas Georgias del Sur y Sandwich del Sur'),
(91, 'Ghana'),
(92, 'Gibraltar'),
(93, 'Granada'),
(94, 'Grecia'),
(95, 'Groenlandia'),
(96, 'Guadalupe'),
(97, 'Guam'),
(98, 'Guatemala'),
(99, 'Guayana Francesa'),
(100, 'Guinea'),
(101, 'Guinea Ecuatorial'),
(102, 'Guinea-Bissau'),
(103, 'Guyana'),
(104, 'Haití'),
(105, 'islas Heard y McDonald'),
(106, 'honduras'),
(107, 'hong Kong'),
(108, 'hungría'),
(109, 'india'),
(110, 'Indonesia'),
(111, 'Irán'),
(112, 'Iraq'),
(113, 'Irlanda'),
(114, 'Islandia'),
(115, 'Israel'),
(116, 'Italia'),
(117, 'Jamaica'),
(118, 'Japón'),
(119, 'Jordania'),
(120, 'Kazajstán'),
(121, 'Kenia'),
(122, 'Kirguistán'),
(123, 'Kiribati'),
(124, 'Kuwait'),
(125, 'Laos'),
(126, 'Lesotho'),
(127, 'Letonia'),
(128, 'Líbano'),
(129, 'Liberia'),
(130, 'Libia'),
(131, 'Liechtenstein'),
(132, 'Lituania'),
(133, 'Luxemburgo'),
(134, 'Macao'),
(135, 'ARY Macedonia'),
(136, 'Madagascar'),
(137, 'Malasia'),
(138, 'Malawi'),
(139, 'Maldivas'),
(140, 'Malí'),
(141, 'Malta'),
(142, 'Islas Malvinas'),
(143, 'Islas Marianas del Norte'),
(144, 'Marruecos'),
(145, 'Islas Marshall'),
(146, 'Martinica'),
(147, 'Mauricio'),
(148, 'Mauritania'),
(149, 'Mayotte'),
(150, 'México'),
(151, 'Micronesia'),
(152, 'Moldavia'),
(153, 'Mónaco'),
(154, 'Mongolia'),
(155, 'Montserrat'),
(156, 'Mozambique'),
(157, 'Myanmar'),
(158, 'Namibia'),
(159, 'Nauru'),
(160, 'Nepal'),
(161, 'Nicaragua'),
(162, 'Níger'),
(163, 'Nigeria'),
(164, 'Niue'),
(165, 'Isla Norfolk'),
(166, 'Noruega'),
(167, 'Nueva Caledonia'),
(168, 'Nueva Zelanda'),
(169, 'Omán'),
(170, 'Países Bajos'),
(171, 'Pakistán'),
(172, 'Palau'),
(173, 'Palestina'),
(174, 'Panamá'),
(175, 'Papúa Nueva Guinea'),
(176, 'Paraguay'),
(177, 'Perú'),
(178, 'Islas Pitcairn'),
(179, 'Polinesia Francesa'),
(180, 'Polonia'),
(181, 'Portugal'),
(182, 'Puerto Rico'),
(183, 'Qatar'),
(184, 'Reino Unido'),
(185, 'Reunión'),
(186, 'Ruanda'),
(187, 'Rumania'),
(188, 'Rusia'),
(189, 'Sahara Occidental'),
(190, 'Islas Salomón'),
(191, 'Samoa'),
(192, 'Samoa Americana'),
(193, 'San Cristóbal y Nevis'),
(194, 'San Marino'),
(195, 'San Pedro y Miquelón'),
(196, 'San Vicente y las Granadinas'),
(197, 'Santa Helena'),
(198, 'Santa Lucía'),
(199, 'Santo Tomé y Príncipe'),
(200, 'Senegal'),
(201, 'Serbia y Montenegro'),
(202, 'Seychelles'),
(203, 'Sierra Leona'),
(204, 'Singapur'),
(205, 'Siria'),
(206, 'Somalia'),
(207, 'Sri Lanka'),
(208, 'Suazilandia'),
(209, 'Sudáfrica'),
(210, 'Sudán'),
(211, 'Suecia'),
(212, 'Suiza'),
(213, 'Surinam'),
(214, 'Svalbard y Jan Mayen'),
(215, 'Tailandia'),
(216, 'Taiwán'),
(217, 'Tanzania'),
(218, 'Tayikistán'),
(219, 'Territorio Británico del Océano Índico'),
(220, 'Territorios Australes Franceses'),
(221, 'Timor Oriental'),
(222, 'Togo'),
(223, 'Tokelau'),
(224, 'Tonga'),
(225, 'Trinidad y Tobago'),
(226, 'Túnez'),
(227, 'Islas Turcas y Caicos'),
(228, 'Turkmenistán'),
(229, 'Turquía'),
(230, 'Tuvalu'),
(231, 'Ucrania'),
(232, 'Uganda'),
(233, 'Uruguay'),
(234, 'Uzbekistán'),
(235, 'Vanuatu'),
(236, 'Venezuela'),
(237, 'Vietnam'),
(238, 'Islas Vírgenes Británicas'),
(239, 'Islas Vírgenes de los Estados Unidos'),
(240, 'Wallis y Futuna'),
(241, 'Yemen'),
(242, 'Yibuti'),
(243, 'Zambia'),
(244, 'Zimbabue');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_viaje`
--

CREATE TABLE `reserva_viaje` (
  `id_reserva_viaje` int(11) NOT NULL,
  `dui_turista` int(9) NOT NULL,
  `id_agencia` int(11) NOT NULL,
  `id_vuelo` int(11) NOT NULL,
  `id_clase` int(11) NOT NULL,
  `fecha_inicial_reserva` date NOT NULL,
  `fecha_final_reserva` date NOT NULL,
  `num_asientos` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `id_sexo` int(11) NOT NULL,
  `nombre_sexo` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`id_sexo`, `nombre_sexo`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turistas`
--

CREATE TABLE `turistas` (
  `dui_turista` int(9) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(70) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` int(8) NOT NULL,
  `pasaporte` int(9) NOT NULL,
  `id_sexo` int(11) NOT NULL,
  `id_pais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `turistas`
--

INSERT INTO `turistas` (`dui_turista`, `nombre`, `apellido`, `direccion`, `telefono`, `pasaporte`, `id_sexo`, `id_pais`) VALUES
(0, 'Cristian', 'Cruz', 'Chalchuapa', 777777777, 123456789, 1, 18),
(16546546, 'Rodrigo', 'Estupinian', 'San Salvador', 223255, 26564649, 1, 1),
(123456789, 'Rocio', 'Miranda', 'San Salvador', 12345678, 123456670, 2, 1),
(265514165, 'Luis', 'Miranda', 'apopa', 22325689, 23288922, 1, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelos`
--

CREATE TABLE `vuelos` (
  `id_vuelo` int(11) NOT NULL,
  `id_origen` int(11) NOT NULL,
  `id_destino` int(11) NOT NULL,
  `fecha_salida` date NOT NULL,
  `hora_salida` time NOT NULL,
  `fecha_llegada` date NOT NULL,
  `hora_llegada` time NOT NULL,
  `asientos_disponibles` int(11) NOT NULL,
  `cod_avion` int(11) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `vuelos`
--

INSERT INTO `vuelos` (`id_vuelo`, `id_origen`, `id_destino`, `fecha_salida`, `hora_salida`, `fecha_llegada`, `hora_llegada`, `asientos_disponibles`, `cod_avion`, `precio`) VALUES
(8, 7, 9, '2019-11-22', '12:12:00', '2019-11-16', '23:23:00', 23, 2, 500),
(9, 9, 12, '2019-11-21', '02:02:00', '2019-11-21', '03:04:00', 2, 2, 500);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aeropuerto`
--
ALTER TABLE `aeropuerto`
  ADD PRIMARY KEY (`id_aeropuerto`);

--
-- Indices de la tabla `agencia`
--
ALTER TABLE `agencia`
  ADD PRIMARY KEY (`id_agencia`),
  ADD KEY `sucursal_departamento` (`id_departamento`);

--
-- Indices de la tabla `avion`
--
ALTER TABLE `avion`
  ADD PRIMARY KEY (`cod_avion`),
  ADD KEY `avion_aeropuerto` (`id_aeropuerto`) USING BTREE;

--
-- Indices de la tabla `clase_vuelo`
--
ALTER TABLE `clase_vuelo`
  ADD PRIMARY KEY (`id_clase`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `destino`
--
ALTER TABLE `destino`
  ADD PRIMARY KEY (`id_destino`),
  ADD KEY `destino_pais` (`id_pais`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `origen`
--
ALTER TABLE `origen`
  ADD PRIMARY KEY (`id_origen`),
  ADD KEY `origen_pais` (`id_pais`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `reserva_viaje`
--
ALTER TABLE `reserva_viaje`
  ADD PRIMARY KEY (`id_reserva_viaje`),
  ADD KEY `rv1` (`dui_turista`),
  ADD KEY `rv2` (`id_agencia`),
  ADD KEY `rv3` (`id_vuelo`),
  ADD KEY `rv4` (`id_clase`),
  ADD KEY `rv5` (`id_estado`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id_sexo`);

--
-- Indices de la tabla `turistas`
--
ALTER TABLE `turistas`
  ADD PRIMARY KEY (`dui_turista`),
  ADD KEY `turista_sexo` (`id_sexo`),
  ADD KEY `turista_pais` (`id_pais`);

--
-- Indices de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  ADD PRIMARY KEY (`id_vuelo`),
  ADD KEY `vuelo_origen` (`id_origen`),
  ADD KEY `vuelo_destino` (`id_destino`),
  ADD KEY `vuelo_avion` (`cod_avion`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aeropuerto`
--
ALTER TABLE `aeropuerto`
  MODIFY `id_aeropuerto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `agencia`
--
ALTER TABLE `agencia`
  MODIFY `id_agencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `avion`
--
ALTER TABLE `avion`
  MODIFY `cod_avion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `clase_vuelo`
--
ALTER TABLE `clase_vuelo`
  MODIFY `id_clase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `destino`
  MODIFY `id_destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `origen`
--
ALTER TABLE `origen`
  MODIFY `id_origen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT de la tabla `reserva_viaje`
--
ALTER TABLE `reserva_viaje`
  MODIFY `id_reserva_viaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `sexo`
--
ALTER TABLE `sexo`
  MODIFY `id_sexo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  MODIFY `id_vuelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agencia`
--
ALTER TABLE `agencia`
  ADD CONSTRAINT `sucursal_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`);

--
-- Filtros para la tabla `avion`
--
ALTER TABLE `avion`
  ADD CONSTRAINT `avion_horario` FOREIGN KEY (`id_aeropuerto`) REFERENCES `aeropuerto` (`id_aeropuerto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `destino`
--
ALTER TABLE `destino`
  ADD CONSTRAINT `destino_pais` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id_pais`);

--
-- Filtros para la tabla `origen`
--
ALTER TABLE `origen`
  ADD CONSTRAINT `origen_pais` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id_pais`);

--
-- Filtros para la tabla `reserva_viaje`
--
ALTER TABLE `reserva_viaje`
  ADD CONSTRAINT `rv1` FOREIGN KEY (`dui_turista`) REFERENCES `turistas` (`dui_turista`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rv2` FOREIGN KEY (`id_agencia`) REFERENCES `agencia` (`id_agencia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rv3` FOREIGN KEY (`id_vuelo`) REFERENCES `vuelos` (`id_vuelo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rv4` FOREIGN KEY (`id_clase`) REFERENCES `clase_vuelo` (`id_clase`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rv5` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `turistas`
--
ALTER TABLE `turistas`
  ADD CONSTRAINT `turista_pais` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id_pais`),
  ADD CONSTRAINT `turista_sexo` FOREIGN KEY (`id_sexo`) REFERENCES `sexo` (`id_sexo`);

--
-- Filtros para la tabla `vuelos`
--
ALTER TABLE `vuelos`
  ADD CONSTRAINT `vuelo_compañia` FOREIGN KEY (`cod_avion`) REFERENCES `avion` (`cod_avion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vuelo_destino` FOREIGN KEY (`id_destino`) REFERENCES `destino` (`id_destino`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vuelo_origen` FOREIGN KEY (`id_origen`) REFERENCES `origen` (`id_origen`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
