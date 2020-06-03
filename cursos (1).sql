-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-03-2020 a las 19:12:36
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cursos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentacion`
--

CREATE TABLE `documentacion` (
  `id_documentacion` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `photoProfile` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `experiment` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `documentacion`
--

INSERT INTO `documentacion` (`id_documentacion`, `id_users`, `photoProfile`, `cv`, `experiment`, `description`) VALUES
(2, 24, 'ricardo1.jpg', '', '', ''),
(3, 9, 'perfil.jpg', '', '', ''),
(4, 17, 'perfil.jpg', '', '', ''),
(5, 16, 'perfil.jpg', '', '', ''),
(6, 18, 'perfil.jpg', '', '', ''),
(7, 20, 'ricardo.jpg', 'aca1.png', 'asdasd', 'asdasd'),
(8, 21, 'perfil.jpg', '', '', ''),
(9, 22, 'perfil.jpg', '', '', ''),
(10, 25, 'perfil.jpg', '', '', ''),
(11, 26, 'perfil.jpg', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

CREATE TABLE `examenes` (
  `id_examenes` int(11) NOT NULL,
  `id_titulo` int(11) NOT NULL,
  `pregunta` varchar(255) NOT NULL,
  `respuesta` varchar(255) NOT NULL,
  `numero_examen` int(11) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historailprofesor`
--

CREATE TABLE `historailprofesor` (
  `id_historailProfesor` int(11) NOT NULL,
  `calificadoPor` varchar(100) NOT NULL,
  `sede` varchar(10) NOT NULL,
  `profesor` varchar(30) NOT NULL,
  `punctuality` int(11) NOT NULL,
  `uniform` int(11) NOT NULL,
  `neatness` int(11) NOT NULL,
  `methodology` int(11) NOT NULL,
  `instructions` int(11) NOT NULL,
  `enthusiam` int(11) NOT NULL,
  `observaciones` varchar(255) NOT NULL,
  `fechaCalificacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialcalificacion`
--

CREATE TABLE `historialcalificacion` (
  `id_historialCalificacion` int(11) NOT NULL,
  `estudiante` varchar(50) NOT NULL,
  `profesor` varchar(50) NOT NULL,
  `clase` varchar(50) NOT NULL,
  `calificacion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id_horarios` int(11) NOT NULL,
  `clase` varchar(50) NOT NULL,
  `salon_clase` varchar(50) NOT NULL,
  `profesor` varchar(50) NOT NULL,
  `hora_clase` varchar(20) NOT NULL,
  `dias` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id_horarios`, `clase`, `salon_clase`, `profesor`, `hora_clase`, `dias`) VALUES
(2, 'clase 1', '1', 'prefesor 1', '09:00', 'Lunes,Martes.Miercoles,Jueves,Viernes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios2`
--

CREATE TABLE `horarios2` (
  `id_horarios2` int(11) NOT NULL,
  `sede` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `nameProfesor` varchar(40) NOT NULL,
  `description` varchar(255) NOT NULL,
  `color` varchar(10) NOT NULL,
  `textColor` varchar(20) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `libro` int(11) NOT NULL,
  `rango` int(11) NOT NULL,
  `leccion1` int(11) NOT NULL,
  `leccion2` int(11) NOT NULL,
  `leccion3` int(11) NOT NULL,
  `totalLeccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horarios2`
--

INSERT INTO `horarios2` (`id_horarios2`, `sede`, `title`, `nameProfesor`, `description`, `color`, `textColor`, `start`, `end`, `libro`, `rango`, `leccion1`, `leccion2`, `leccion3`, `totalLeccion`) VALUES
(9, 'medellin', 'Interactive station', 'ricard javier', 'sdfsdf', '#000000', '#fff', '2020-02-17 07:00:00', '2020-02-17 07:50:00', 1, 1, 10, 6, 8, 3),
(10, 'medellin', 'Interactive station', 'ricard javier', 'adsfasdf', '#000000', '#fff', '2020-02-20 07:00:00', '2020-02-20 07:50:00', 1, 2, 27, 24, 17, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infousers`
--

CREATE TABLE `infousers` (
  `id_infoUsers` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `idpassport` varchar(20) NOT NULL,
  `Document` varchar(20) NOT NULL,
  `headquarters` varchar(20) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `phone_reference` varchar(30) NOT NULL,
  `curso1` int(11) NOT NULL,
  `examen_curso1` int(11) NOT NULL,
  `repuesta_1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `infousers`
--

INSERT INTO `infousers` (`id_infoUsers`, `id_users`, `firstname`, `lastname`, `idpassport`, `Document`, `headquarters`, `phone`, `phone_reference`, `curso1`, `examen_curso1`, `repuesta_1`) VALUES
(2, 20, 'ricard javier', 'fuentes mendoza', '2343423', 'C.C', 'medellin', '232423', '342343', 0, 0, 0),
(4, 24, 'Ricardo javier', 'fuentes mendoza', '234432', 'C.C', 'medellin', '23423432', '', 0, 0, 0),
(5, 25, 'daniel rafael', 'fuentes mendoza', '23423423', 'C.C', 'medellin', '', '', 0, 0, 0),
(6, 26, 'moises ernesto', 'fuentes mendoza', '234234', 'C.C', 'medellin', '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculados`
--

CREATE TABLE `matriculados` (
  `id_matriculados` int(11) NOT NULL,
  `fechaClass` varchar(100) NOT NULL,
  `profesor` varchar(30) NOT NULL,
  `nameClass` varchar(50) NOT NULL,
  `estudiante` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referidos`
--

CREATE TABLE `referidos` (
  `id_referidos` int(11) NOT NULL,
  `estudiante` varchar(30) NOT NULL,
  `nameCompleto` varchar(50) NOT NULL,
  `Document` varchar(5) NOT NULL,
  `numeroDocumento` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `referidos`
--

INSERT INTO `referidos` (`id_referidos`, `estudiante`, `nameCompleto`, `Document`, `numeroDocumento`, `email`, `phone`) VALUES
(2, 'fuentesricardo1995@gmail.com', 'Rafael pepe mendoza perez', 'C.C', '34343', 'rafael@gmail.com', 345345);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id_solicitudes` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `estudiante` varchar(50) NOT NULL,
  `solicitud` int(11) NOT NULL,
  `fechaInactividad` date NOT NULL,
  `precio` int(11) NOT NULL,
  `fondo` varchar(100) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulo`
--

CREATE TABLE `titulo` (
  `id_titulo` int(11) NOT NULL,
  `curso` int(11) NOT NULL,
  `numero_examen` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `titulo`
--

INSERT INTO `titulo` (`id_titulo`, `curso`, `numero_examen`, `titulo`, `video`, `descripcion`) VALUES
(2, 1, 1, 'hola', '', 'sdfsfgvsfgsdnfsjldnfjsda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `rol` varchar(10) NOT NULL,
  `sede` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `estrellas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_users`, `email`, `pass`, `rol`, `sede`, `status`, `estrellas`) VALUES
(9, 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 'todos', 1, 0),
(16, 'superAdmin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'superAdmin', 'todos', 1, 0),
(17, 'monitor1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'monitor', 'rionegro', 1, 0),
(18, 'monitor2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'monitor', 'medellin', 1, 0),
(20, 'ricardo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'profesor', 'medellin', 1, 0),
(21, 'recepMedellin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'secretaria', 'medellin', 1, 0),
(22, 'recepRionegro@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'secretaria', 'rionegro', 1, 0),
(24, 'fuentesricardo1995@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'estudiante', 'medellin', 1, 0),
(25, 'daniel@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'estudiante', 'medellin', 1, 0),
(26, 'moises@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'estudiante', 'medellin', 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `documentacion`
--
ALTER TABLE `documentacion`
  ADD PRIMARY KEY (`id_documentacion`),
  ADD KEY `id_users` (`id_users`);

--
-- Indices de la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD PRIMARY KEY (`id_examenes`),
  ADD KEY `id_titulo` (`id_titulo`);

--
-- Indices de la tabla `historailprofesor`
--
ALTER TABLE `historailprofesor`
  ADD PRIMARY KEY (`id_historailProfesor`);

--
-- Indices de la tabla `historialcalificacion`
--
ALTER TABLE `historialcalificacion`
  ADD PRIMARY KEY (`id_historialCalificacion`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id_horarios`);

--
-- Indices de la tabla `horarios2`
--
ALTER TABLE `horarios2`
  ADD PRIMARY KEY (`id_horarios2`);

--
-- Indices de la tabla `infousers`
--
ALTER TABLE `infousers`
  ADD PRIMARY KEY (`id_infoUsers`),
  ADD KEY `id_users` (`id_users`);

--
-- Indices de la tabla `matriculados`
--
ALTER TABLE `matriculados`
  ADD PRIMARY KEY (`id_matriculados`);

--
-- Indices de la tabla `referidos`
--
ALTER TABLE `referidos`
  ADD PRIMARY KEY (`id_referidos`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id_solicitudes`),
  ADD KEY `id_estudiante` (`id_estudiante`);

--
-- Indices de la tabla `titulo`
--
ALTER TABLE `titulo`
  ADD PRIMARY KEY (`id_titulo`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `documentacion`
--
ALTER TABLE `documentacion`
  MODIFY `id_documentacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `examenes`
--
ALTER TABLE `examenes`
  MODIFY `id_examenes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historailprofesor`
--
ALTER TABLE `historailprofesor`
  MODIFY `id_historailProfesor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historialcalificacion`
--
ALTER TABLE `historialcalificacion`
  MODIFY `id_historialCalificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id_horarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `horarios2`
--
ALTER TABLE `horarios2`
  MODIFY `id_horarios2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `infousers`
--
ALTER TABLE `infousers`
  MODIFY `id_infoUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `matriculados`
--
ALTER TABLE `matriculados`
  MODIFY `id_matriculados` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `referidos`
--
ALTER TABLE `referidos`
  MODIFY `id_referidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id_solicitudes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `titulo`
--
ALTER TABLE `titulo`
  MODIFY `id_titulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `documentacion`
--
ALTER TABLE `documentacion`
  ADD CONSTRAINT `documentacion_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);

--
-- Filtros para la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD CONSTRAINT `examenes_ibfk_1` FOREIGN KEY (`id_titulo`) REFERENCES `titulo` (`id_titulo`);

--
-- Filtros para la tabla `infousers`
--
ALTER TABLE `infousers`
  ADD CONSTRAINT `infousers_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `users` (`id_users`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
