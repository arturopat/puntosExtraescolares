-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2023 a las 18:08:23
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_actividad` int(11) NOT NULL,
  `nombre_actividad` varchar(200) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_finalizacion` date NOT NULL,
  `horario` time NOT NULL,
  `puntos` int(11) NOT NULL,
  `cupo_disponible` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id_actividad`, `nombre_actividad`, `fecha_inicio`, `fecha_finalizacion`, `horario`, `puntos`, `cupo_disponible`, `id_responsable`, `url`) VALUES
(4, 'Voleibol', '2023-05-16', '2023-05-24', '22:38:00', 20, 28, 5, 'https://www.bbva.com/wp-content/uploads/2017/08/bbva-balon-futbol-2017-08-11-1024x622.jpg'),
(5, 'Basquetball', '2023-06-13', '2023-06-13', '20:38:00', 30, 19, 6, 'https://www.fiba.basketball/api/img/graphic/c5132053-5932-4af1-9e9b-8597ed500e94/940/529');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adminsresponsables`
--

CREATE TABLE `adminsresponsables` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `contrasena` varchar(200) NOT NULL,
  `tipo_usuario` varchar(200) NOT NULL DEFAULT 'usuario',
  `imgperfil` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `adminsresponsables`
--

INSERT INTO `adminsresponsables` (`id`, `nombre`, `correo`, `contrasena`, `tipo_usuario`, `imgperfil`) VALUES
(1, 'admin', 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 'Captura de pantalla 2023-04-26 182327.png'),
(5, 'responsable2', 'responsable2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'respon', 'Captura de pantalla 2023-04-26 163038.png'),
(6, 'responsable', 'responsable@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'respon', 'Captura de pantalla 2023-06-08 095606.png'),
(7, 'responsable3', 'responsable3@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'respon', 'Captura de pantalla 2023-04-26 183852.png'),
(8, 'responsable', 'responsable4@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'respon', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `semestre` int(11) NOT NULL,
  `carrera` varchar(200) NOT NULL,
  `contrasena` varchar(200) NOT NULL,
  `puntos` int(11) NOT NULL,
  `imgperfil` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombres`, `apellidos`, `correo`, `semestre`, `carrera`, `contrasena`, `puntos`, `imgperfil`) VALUES
(9, 'Arturo Leonardo', 'Pat Poot', '20890130@ittizimin.edu.mx', 6, 'Ing.Informatica', '81dc9bdb52d04dc20036dbd8313ed055', 0, 'channels4_profile.jpg'),
(10, 'Alan Abel', 'Cauich Perera', '20890131@ittizimin.edu.mx', 6, 'Ing.Informatica', '81dc9bdb52d04dc20036dbd8313ed055', 0, 'profile_6472346dc269f8.24867538.jpg'),
(11, 'Eladio Alejandro', 'Osorio Bah', '20890132@ittizimin.edu.mx', 6, 'Ing.Informatica', '81dc9bdb52d04dc20036dbd8313ed055', 60, 'Captura de pantalla 2023-04-26 183852.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evidencia`
--

CREATE TABLE `evidencia` (
  `id` int(11) NOT NULL,
  `evidenciaimg` varchar(200) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `fecha_subida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `evidencia`
--

INSERT INTO `evidencia` (`id`, `evidenciaimg`, `id_responsable`, `fecha_subida`) VALUES
(5, 'evidencias/Captura de pantalla 2023-06-07 132308.png', 6, '2023-06-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroactividades`
--

CREATE TABLE `registroactividades` (
  `id` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registroactividades`
--

INSERT INTO `registroactividades` (`id`, `id_actividad`, `id_alumno`, `id_responsable`, `fecha_registro`) VALUES
(9, 4, 9, 5, '2023-05-27'),
(10, 5, 11, 6, '2023-06-08');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actividad`),
  ADD KEY `id_responsable` (`id_responsable`);

--
-- Indices de la tabla `adminsresponsables`
--
ALTER TABLE `adminsresponsables`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evidencia`
--
ALTER TABLE `evidencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registroactividades`
--
ALTER TABLE `registroactividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_actividad` (`id_actividad`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `id_responsable` (`id_responsable`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `adminsresponsables`
--
ALTER TABLE `adminsresponsables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `evidencia`
--
ALTER TABLE `evidencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `registroactividades`
--
ALTER TABLE `registroactividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`id_responsable`) REFERENCES `adminsresponsables` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `registroactividades`
--
ALTER TABLE `registroactividades`
  ADD CONSTRAINT `registroactividades_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividad`) ON DELETE CASCADE,
  ADD CONSTRAINT `registroactividades_ibfk_2` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `registroactividades_ibfk_3` FOREIGN KEY (`id_responsable`) REFERENCES `adminsresponsables` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
