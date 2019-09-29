-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-04-2018 a las 08:44:28
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tesis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `idCalificacion` int(11) NOT NULL,
  `idEvento` int(11) NOT NULL,
  `puntaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idcomentarios` int(11) NOT NULL,
  `comentario` varchar(120) DEFAULT NULL,
  `eventos_idevento` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `dateComentario` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idcomentarios`, `comentario`, `eventos_idevento`, `idUsuario`, `dateComentario`) VALUES
(43, 'Me parece muy buena iniciativa. ', 100, 7, '2018-04-09 10:34:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denuncias`
--

CREATE TABLE `denuncias` (
  `idDenuncia` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `denuncia` varchar(256) NOT NULL,
  `idEvento` int(11) NOT NULL,
  `statusDenuncia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `denuncias`
--

INSERT INTO `denuncias` (`idDenuncia`, `idUsuario`, `denuncia`, `idEvento`, `statusDenuncia`) VALUES
(14, 7, 'jjj6tft', 100, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `idevento` int(11) NOT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL,
  `tileX` double DEFAULT NULL,
  `tileY` double DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `reference` varchar(120) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `startHour` char(8) DEFAULT NULL,
  `endHour` char(8) DEFAULT NULL,
  `typeEvent` varchar(10) DEFAULT NULL,
  `description` varchar(120) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `statusEvento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`idevento`, `lat`, `lng`, `tileX`, `tileY`, `address`, `reference`, `startDate`, `endDate`, `startHour`, `endHour`, `typeEvent`, `description`, `users_id`, `statusEvento`) VALUES
(100, 10.690302, -71.649857, 9862, 15405, 'Avenida 16, Maracaibo 4005, Zulia, Venezuela', 'En frente de plaza de toros', '2018-04-09', '2018-04-20', '09:01 AM', '09:01 AM', 'reciclaje', 'Este sera un evento especial para ayudar a mejorar los alrededores de nuestra comunidad, y al mismo tiempo el planeta.', 7, 2),
(101, 10.680780, -71.632332, 9863, 15406, 'Barrio San Agustin, Maracaibo, Zulia, Venezue', 'En frente de la bomba la estrella ', '2018-04-09', '2018-04-19', '06:27 PM', '04:27 PM', 'voluntario', 'Espero su ayuda para resolver la problemÃ¡tica de la basura que se genera en nuestra comunidad , se limpiara las aceras ', 7, 0),
(102, 10.691873, -71.655235, 9861, 15405, 'Barrio Los Planazos, Maracaibo 4005, Zulia, V', 'Cerca de los chinos ', '2018-04-11', '2018-04-18', '11:45 PM', '09:46 PM', 'educativo', 'Un evento pensado para los mas chicos de la casa, sera un evento bastante entretenido con bastantes dinÃ¡micas.', 8, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos_has_materiales`
--

CREATE TABLE `eventos_has_materiales` (
  `eventos_idevento` int(11) NOT NULL,
  `eventos_users_id` int(11) NOT NULL,
  `materiales_idmateriales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos_has_materiales`
--

INSERT INTO `eventos_has_materiales` (`eventos_idevento`, `eventos_users_id`, `materiales_idmateriales`) VALUES
(100, 7, 1),
(100, 7, 2),
(100, 7, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `idmateriales` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`idmateriales`, `name`) VALUES
(1, 'Papel'),
(2, 'Plastico'),
(3, 'Carton'),
(4, 'Electronicos'),
(5, 'Vidrios ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mensaje` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operaciones`
--

CREATE TABLE `operaciones` (
  `idOperacion` int(11) NOT NULL,
  `idLider` int(11) NOT NULL,
  `idPatrocinante` int(11) NOT NULL,
  `materialSolicitado` int(11) NOT NULL,
  `cantidadMaterial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participaciones`
--

CREATE TABLE `participaciones` (
  `idParticipacion` int(11) NOT NULL,
  `idEvento` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `participaciones`
--

INSERT INTO `participaciones` (`idParticipacion`, `idEvento`, `idUsuario`) VALUES
(11, 100, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `idPregunta` int(11) NOT NULL,
  `pregunta` varchar(256) NOT NULL,
  `idOperacion` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `datePregunta` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`idPregunta`, `pregunta`, `idOperacion`, `idUsuario`, `datePregunta`) VALUES
(1, 'Mi primera pregunta', 1, 5, '2018-04-08 08:33:48'),
(2, 'Mi segunda pregunta', 1, 5, '2018-04-08 08:33:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `idRespuesta` int(11) NOT NULL,
  `respuesta` varchar(256) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `dateRespuesta` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `tlf` varchar(45) DEFAULT NULL,
  `tipo` tinyint(4) DEFAULT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `tlf`, `tipo`, `estatus`) VALUES
(7, 'Administrador', 'admin@jal.com', 'Ciudadela Faria Edf Btijoque', '0414-6611344', 4, 1),
(8, 'Juan Carlos', 'lider@jal.com', 'Delicias Edf. Jardin Canaima', '0414-6611326', 2, 1),
(11, 'Eduardo Franco', 'participante@jal.com', 'San jacinto sector 7', '0424-6611344', 1, 1),
(12, 'Roberto Jose', 'patrocinante@jal.com', 'Cumbres de maracaibo , villa alta', '0261-7539202', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_social`
--

CREATE TABLE `users_social` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `social_id` varchar(45) DEFAULT NULL,
  `service` varchar(45) DEFAULT NULL,
  `imgUrl` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users_social`
--

INSERT INTO `users_social` (`id`, `users_id`, `social_id`, `service`, `imgUrl`) VALUES
(16, 7, '$2y$10$569/EPlrGfc0b3eJRAX2re1fK9dIPtqlANq85z', 'JAL', 'http://localhost/tesis/assets/img/default_profile_normal2.png'),
(17, 8, '$2y$10$z1Sd/bXnq1k.MJlYeRiwZeDHNDoK/VvS5SsHKp', 'JAL', 'http://localhost/tesis/assets/img/default_profile_normal2.png'),
(20, 11, '$2y$10$Mt851IKr9KGgkriBnSzoreaDyzZf.eVciNTG2a', 'JAL', 'http://localhost/tesis/assets/img/default_profile_normal2.png'),
(21, 12, '$2y$10$j8DMBrQUuKQHMhfwBU/6ceXcACURWDnJnK0ZO0', 'JAL', 'http://localhost/tesis/assets/img/default_profile_normal2.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`idCalificacion`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idcomentarios`,`eventos_idevento`),
  ADD KEY `fk_comentarios_eventos1_idx` (`eventos_idevento`);

--
-- Indices de la tabla `denuncias`
--
ALTER TABLE `denuncias`
  ADD PRIMARY KEY (`idDenuncia`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`idevento`,`users_id`),
  ADD KEY `fk_eventos_users1_idx` (`users_id`);

--
-- Indices de la tabla `eventos_has_materiales`
--
ALTER TABLE `eventos_has_materiales`
  ADD PRIMARY KEY (`eventos_idevento`,`eventos_users_id`,`materiales_idmateriales`),
  ADD KEY `fk_eventos_has_materiales_materiales1_idx` (`materiales_idmateriales`),
  ADD KEY `fk_eventos_has_materiales_eventos1_idx` (`eventos_idevento`,`eventos_users_id`);

--
-- Indices de la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`idmateriales`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `operaciones`
--
ALTER TABLE `operaciones`
  ADD PRIMARY KEY (`idOperacion`);

--
-- Indices de la tabla `participaciones`
--
ALTER TABLE `participaciones`
  ADD PRIMARY KEY (`idParticipacion`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`idPregunta`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`idRespuesta`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_social`
--
ALTER TABLE `users_social`
  ADD PRIMARY KEY (`id`,`users_id`),
  ADD KEY `fk_users_social_users_idx` (`users_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `idCalificacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idcomentarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT de la tabla `denuncias`
--
ALTER TABLE `denuncias`
  MODIFY `idDenuncia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `idevento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT de la tabla `materiales`
--
ALTER TABLE `materiales`
  MODIFY `idmateriales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `operaciones`
--
ALTER TABLE `operaciones`
  MODIFY `idOperacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `participaciones`
--
ALTER TABLE `participaciones`
  MODIFY `idParticipacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `idPregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `idRespuesta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `users_social`
--
ALTER TABLE `users_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_comentarios_eventos1` FOREIGN KEY (`eventos_idevento`) REFERENCES `eventos` (`idevento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `fk_eventos_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `eventos_has_materiales`
--
ALTER TABLE `eventos_has_materiales`
  ADD CONSTRAINT `fk_eventos_has_materiales_eventos1` FOREIGN KEY (`eventos_idevento`,`eventos_users_id`) REFERENCES `eventos` (`idevento`, `users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_eventos_has_materiales_materiales1` FOREIGN KEY (`materiales_idmateriales`) REFERENCES `materiales` (`idmateriales`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users_social`
--
ALTER TABLE `users_social`
  ADD CONSTRAINT `fk_users_social_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
