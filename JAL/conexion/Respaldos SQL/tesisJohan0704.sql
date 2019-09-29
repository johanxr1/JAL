-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-04-2018 a las 20:06:22
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idcomentarios` int(11) NOT NULL,
  `comentario` varchar(120) DEFAULT NULL,
  `eventos_idevento` int(11) NOT NULL,
  `dateComentario` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`idevento`, `lat`, `lng`, `tileX`, `tileY`, `address`, `reference`, `startDate`, `endDate`, `startHour`, `endHour`, `typeEvent`, `description`, `users_id`) VALUES
(54, 10.690363, -71.649841, 9862, 15405, 'Urb. Ciudadela Faria, Maracaibo 4005, Zulia, ', 'asdasdasdasdddasdasdas', '2018-03-27', '2018-03-27', '09:16PM', '09:16PM', 'voluntario', 'voluntario', 3),
(55, 10.693957, -71.634918, 9863, 15404, 'Maracaibo, Zulia, Venezuela', 'dfgdfgdf dfg dfgdfgdfg dfgdfgdfg dfg dfgdfgdgdf dfgdfgdfgd dfgdfgdfg dfg df gdfggdfgdfgdfgdfgdf', '2018-03-26', '2018-03-26', '09:17PM', '09:18PM', 'educativo', 'educativo', 3),
(56, 10.688360, -71.641434, 9863, 15405, 'Barrio San Agustin, Maracaibo, Zulia, Venezue', 'Uno dos tres', '2018-03-25', '2018-03-29', '09:18PM', '09:18PM', 'reciclaje', 'asdasdasda sdasdasdasdasda sdasdasdasdasdasdasdasdasd asdasdasdasdasdasdasdasdasdasda sdasdadasdasdasdasdasda sdasda', 1),
(57, 10.697943, -71.645370, 9862, 15404, 'Cd Lossada, Maracaibo 4005, Zulia, Venezuela', 'asdasssss sssssssssssssssdasdd ddddddddddddddd dddddddddddasdasssssdasda sdasdasd', '2018-03-29', '2018-03-29', '09:20PM', '09:20PM', 'reciclaje', 'reciclaje', 1),
(58, 10.696637, -71.638496, 9863, 15404, 'Barrio San Agustin, Maracaibo, Zulia, Venezue', 'asdasd', '2018-03-28', '2018-03-29', '09:22PM', '09:22PM', 'reciclaje', 'reciclaje', 1),
(59, 10.691543, -71.657684, 9861, 15405, 'Barrio La Victoria, Maracaibo 4005, Zulia, Ve', 'sdfsdfs', '2018-03-30', '2018-03-30', '09:48AM', '09:48AM', 'educativo', 'sfgsdf', 4),
(60, 10.675085, -71.611603, 9865, 15406, 'Residencias RubÃ­, Calle 69, Maracaibo 4002, ', 'asda', '2018-03-30', '2018-03-30', '01:21PM', '01:21PM', 'voluntario', 'asdasd', 1),
(61, 10.674444, -71.617180, 9865, 15406, 'St.Tierra Negra La Esperanza, Maracaibo 4002,', 'asdasd', '2018-03-29', '2018-03-29', '01:21PM', '01:21PM', 'educativo', 'sosdnflsndfvosn sdofsndokfnsdo soifhwosdfiwoei weoifhweofnqweoi', 1),
(62, 10.670434, -71.608818, 9866, 15407, '72 Av. Bella Vista, Maracaibo 4002, Zulia, Ve', 'asdasd', '2018-03-31', '2018-03-31', '01:21PM', '01:22PM', 'voluntario', 'asdasdasd', 1),
(63, 10.700039, -71.636734, 9863, 15404, 'La Picola, Av 15O, Maracaibo 4005, Zulia, Ven', 'Segundo edificio', '2018-03-30', '2018-03-31', '07:14AM', '03:57AM', 'reciclaje', 'Evento para recolectar esos materiales', 3),
(64, 10.685917, -71.640625, 9863, 15405, 'Barrio San Agustin, Maracaibo, Zulia, Venezue', 'Luz', '2018-03-26', '2018-04-12', '08:09AM', '09:09AM', 'educativo', 'EnseÃ±aremos', 3);

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
(56, 1, 1),
(56, 1, 2),
(56, 1, 3),
(57, 1, 2),
(57, 1, 3),
(57, 1, 4),
(57, 1, 5),
(58, 1, 1),
(58, 1, 2),
(58, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `idmateriales` int(11) NOT NULL,
  `namem` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`idmateriales`, `namem`) VALUES
(1, 'Papel'),
(2, 'Plastico'),
(3, 'Carton'),
(4, 'Electronicos'),
(5, 'Vidrios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `idmensaje` int(11) NOT NULL,
  `receptor` varchar(50) NOT NULL,
  `emisor` varchar(45) NOT NULL,
  `mensaje` varchar(256) NOT NULL,
  `nuevo` tinyint(1) NOT NULL DEFAULT '1',
  `fechae` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`idmensaje`, `receptor`, `emisor`, `mensaje`, `nuevo`, `fechae`) VALUES
(7, '2', '4', 'Hola que tal?', 0, '2018-04-08 09:24:00'),
(8, '2', '4', 'Hola que tal?', 0, '2018-04-08 09:24:00'),
(9, '2', '3', 'Hola menor', 0, '2018-04-20 09:12:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peticiones`
--

CREATE TABLE `peticiones` (
  `idp` int(11) NOT NULL,
  `ide` int(11) NOT NULL,
  `idr` int(11) NOT NULL,
  `fecha` int(11) NOT NULL,
  `des` int(11) NOT NULL,
  `speti` int(11) NOT NULL,
  `mat` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `peticiones`
--

INSERT INTO `peticiones` (`idp`, `ide`, `idr`, `fecha`, `des`, `speti`, `mat`) VALUES
(20, 5, 4, 123, 123, 2, 'Plastico'),
(21, 5, 5, 20180405, 1234, 1, 'Carton'),
(22, 5, 3, 20180405, 123, 1, 'Papel'),
(25, 4, 4, 20180405, 123, 2, 'Papel'),
(26, 4, 4, 20180405, 321, 1, 'Carton'),
(27, 4, 5, 20180405, 321, 1, 'Carton'),
(28, 4, 5, 20180405, 321, 1, 'Carton'),
(29, 4, 4, 2147483647, 55, 1, 'Plastico'),
(30, 4, 4, 20180405, 567, 1, 'Plastico'),
(31, 4, 4, 20180405, 66, 1, 'Plastico'),
(32, 4, 5, 20180406, 88, 1, '3'),
(33, 4, 5, 20180406, 88, 1, '3'),
(34, 5, 5, 20180406, 541, 1, '3'),
(35, 5, 5, 20180406, 5, 1, '1'),
(36, 5, 3, 20180406, 100, 1, '2'),
(37, 5, 3, 20180406, 20, 1, '2'),
(38, 5, 5, 20180406, 80, 1, '3'),
(39, 5, 5, 20180406, 6656, 1, '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacionum`
--

CREATE TABLE `relacionum` (
  `idrmu` int(11) NOT NULL,
  `idma` int(11) NOT NULL,
  `idu` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `relacionum`
--

INSERT INTO `relacionum` (`idrmu`, `idma`, `idu`, `cantidad`) VALUES
(1, 1, 4, 12),
(2, 1, 4, 12),
(3, 2, 4, 50),
(4, 2, 3, 50),
(5, 3, 4, 60),
(6, 3, 3, 60),
(7, 1, 2, 12),
(8, 1, 5, 65),
(9, 1, 3, 90),
(10, 3, 5, 12),
(11, 1, 3, 12),
(12, 1, 3, 12),
(13, 1, 3, 21),
(14, 4, 3, 2),
(15, 2, 3, 3),
(16, 3, 3, 5),
(17, 4, 3, 5),
(18, 5, 3, 4),
(19, 2, 3, 3),
(20, 2, 3, 4),
(21, 3, 3, 3),
(22, 5, 3, 2),
(23, 1, 3, -22),
(24, 1, 3, -33),
(25, 1, 3, 21),
(26, 1, 3, 1),
(27, 4, 3, 1),
(28, 5, 3, 1),
(30, 1, 3, -4),
(32, 1, 3, -4),
(33, 1, 3, -2),
(34, 1, 3, 3),
(35, 1, 3, -3),
(36, 1, 3, -3),
(37, 1, 3, 4),
(38, 1, 3, 3),
(39, 1, 3, -7),
(40, 1, 3, -2),
(41, 1, 3, 2),
(42, 1, 3, -4),
(43, 1, 3, -1),
(44, 1, 3, 2),
(45, 1, 3, -1),
(49, 1, 3, 2),
(50, 1, 3, 30),
(51, 1, 3, 1);

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
  `tipo` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `tlf`, `tipo`, `status`) VALUES
(1, 'Jal', 'admin@gmail.com', 'asdasdasd', '0414-6611344', 2, 1),
(2, 'Admin', 'admin@admin.com', 'La casa del admin', '0424-6088355', 1, 1),
(3, 'Segundo admin', 'admin2@admin.com', 'La casa del Admin2', '0261-1234567', 2, 1),
(4, 'johan', 'johan.tenias@gmail.com', 'La florida', '0261-7785269', 4, 1),
(5, 'Nancy', 'nancy@gmail.com', 'Su casa', '0261-7785269', 3, 1);

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
(1, 1, '114908877938770407253', 'Google', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg?sz=200'),
(2, 1, '114908877938770407253', 'Google', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg?sz=200'),
(3, 1, '114908877938770407253', 'Google', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg?sz=200'),
(4, 1, '114908877938770407253', 'Google', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg?sz=200'),
(5, 1, '114908877938770407253', 'Google', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg?sz=200'),
(6, 1, '114908877938770407253', 'Google', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg?sz=200'),
(7, 1, '114908877938770407253', 'Google', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg?sz=200'),
(8, 1, '114908877938770407253', 'Google', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg?sz=200'),
(9, 1, '9.6606737433936E+17', 'Twitter', 'http://pbs.twimg.com/profile_images/976676004260401152/qo-qF5AY.jpg'),
(10, 1, '114908877938770407253', 'Google', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg?sz=200'),
(11, 2, '$2y$10$kBXgx0oEwpmonnMYrHfGheuIs8B4OtXmJ.ac6k', 'JAL', 'http://localhost/tesis/assets/img/default_profile_normal2.png'),
(12, 3, '$2y$10$99iTkzdZ2/D445Nx3BH3fu8nuJ33rJeUcVs89E', 'JAL', 'http://localhost/tesis/assets/img/default_profile_normal2.png'),
(13, 4, '$2y$10$KPYdKac9C/p2CDgxESA5QejA0rdNs.gsnfA0R4', 'JAL', 'http://localhost/tesis/assets/img/default_profile_normal2.png'),
(14, 5, '$2y$10$miWdf7qPDwYe8zcuWx/J/e9SNesVMUtwbcfPPy', 'JAL', 'http://localhost/tesis/assets/img/default_profile_normal2.png'),
(15, 4, '103756561461381536345', 'Google', 'https://lh6.googleusercontent.com/-P5i0N1DPJVM/AAAAAAAAAAI/AAAAAAAAAEE/yvnGlhPki0o/photo.jpg?sz=200'),
(16, 4, '103756561461381536345', 'Google', 'https://lh6.googleusercontent.com/-P5i0N1DPJVM/AAAAAAAAAAI/AAAAAAAAAEE/yvnGlhPki0o/photo.jpg?sz=200'),
(17, 4, '103756561461381536345', 'Google', 'https://lh6.googleusercontent.com/-P5i0N1DPJVM/AAAAAAAAAAI/AAAAAAAAAEE/yvnGlhPki0o/photo.jpg?sz=200'),
(18, 4, '103756561461381536345', 'Google', 'https://lh6.googleusercontent.com/-P5i0N1DPJVM/AAAAAAAAAAI/AAAAAAAAAEE/yvnGlhPki0o/photo.jpg?sz=200'),
(19, 4, '103756561461381536345', 'Google', 'https://lh6.googleusercontent.com/-P5i0N1DPJVM/AAAAAAAAAAI/AAAAAAAAAEE/yvnGlhPki0o/photo.jpg?sz=200'),
(20, 4, '103756561461381536345', 'Google', 'https://lh6.googleusercontent.com/-P5i0N1DPJVM/AAAAAAAAAAI/AAAAAAAAAEE/yvnGlhPki0o/photo.jpg?sz=200'),
(21, 4, '103756561461381536345', 'Google', 'https://lh6.googleusercontent.com/-P5i0N1DPJVM/AAAAAAAAAAI/AAAAAAAAAEE/yvnGlhPki0o/photo.jpg?sz=200'),
(22, 4, '103756561461381536345', 'Google', 'https://lh6.googleusercontent.com/-P5i0N1DPJVM/AAAAAAAAAAI/AAAAAAAAAEE/yvnGlhPki0o/photo.jpg?sz=200'),
(23, 4, '103756561461381536345', 'Google', 'https://lh6.googleusercontent.com/-P5i0N1DPJVM/AAAAAAAAAAI/AAAAAAAAAEE/yvnGlhPki0o/photo.jpg?sz=200');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idcomentarios`,`eventos_idevento`),
  ADD KEY `fk_comentarios_eventos1_idx` (`eventos_idevento`);

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
  ADD PRIMARY KEY (`idmensaje`);

--
-- Indices de la tabla `peticiones`
--
ALTER TABLE `peticiones`
  ADD PRIMARY KEY (`idp`);

--
-- Indices de la tabla `relacionum`
--
ALTER TABLE `relacionum`
  ADD PRIMARY KEY (`idrmu`),
  ADD KEY `id` (`idu`),
  ADD KEY `idmateriales` (`idma`);

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
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idcomentarios` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `idevento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `materiales`
--
ALTER TABLE `materiales`
  MODIFY `idmateriales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `idmensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `peticiones`
--
ALTER TABLE `peticiones`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `relacionum`
--
ALTER TABLE `relacionum`
  MODIFY `idrmu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users_social`
--
ALTER TABLE `users_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
-- Filtros para la tabla `relacionum`
--
ALTER TABLE `relacionum`
  ADD CONSTRAINT `relacionum_ibfk_1` FOREIGN KEY (`idu`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `relacionum_ibfk_2` FOREIGN KEY (`idma`) REFERENCES `materiales` (`idmateriales`);

--
-- Filtros para la tabla `users_social`
--
ALTER TABLE `users_social`
  ADD CONSTRAINT `fk_users_social_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
