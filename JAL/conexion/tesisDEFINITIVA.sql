-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-04-2018 a las 08:55:06
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
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `idCalificacion` int(11) NOT NULL,
  `idEvento` int(11) NOT NULL,
  `puntaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`idCalificacion`, `idEvento`, `puntaje`) VALUES
(3, 55, 4),
(4, 55, 6),
(5, 55, 6),
(6, 55, 6),
(7, 55, 6),
(8, 55, 6),
(9, 55, 6),
(10, 55, 6),
(11, 55, 6),
(12, 55, 6),
(13, 55, 6),
(14, 55, 6),
(15, 55, 6),
(16, 55, 6),
(17, 55, 6),
(18, 55, 6);

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
(43, 'Comentario numero 101', 101, 6, '2018-04-12 11:10:53');

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
(2, 5, 'Este es mi primera denuncia con exito', 57, 1),
(3, 5, 'Este es mi segunda denuncia con exito', 57, 2),
(9, 5, 'sdfsdf', 56, 0),
(10, 5, 'sdfsdf', 64, 0),
(11, 5, 'erte', 95, 0),
(12, 9, 'Este evento malo', 87, 0),
(13, 2, 'zxc', 64, 0),
(14, 11, 'Reporto el evento 100\n', 100, 2),
(15, 11, 'no stoy deacuerdo\n', 101, 2),
(16, 6, 'Reportando evento 101', 101, 0);

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
(54, 10.690363, -71.649841, 9862, 15405, 'Urb. Ciudadela Faria, Maracaibo 4005, Zulia, ', 'asdasdasdasdddasdasdas', '2018-04-02', '2018-04-02', '09:16PM', '09:16PM', 'voluntario', 'voluntario', 3, 0),
(55, 10.693957, -71.634918, 9863, 15404, 'Maracaibo, Zulia, Venezuela', 'dfgdfgdf dfg dfgdfgdfg dfgdfgdfg dfg dfgdfgdgdf dfgdfgdfgd dfgdfgdfg dfg df gdfggdfgdfgdfgdfgdf', '2018-03-26', '2018-04-19', '09:17PM', '09:18PM', 'educativo', 'educativo', 3, 1),
(63, 10.700039, -71.636734, 9863, 15404, 'La Picola, Av 15O, Maracaibo 4005, Zulia, Ven', 'Segundo edificio', '2018-03-30', '2018-04-02', '07:14AM', '03:57AM', 'reciclaje', 'Evento para recolectar esos materiales', 3, 0),
(64, 10.685917, -71.640625, 9863, 15405, 'Barrio San Agustin, Maracaibo, Zulia, Venezue', 'Luz', '2018-03-26', '2018-04-12', '08:09AM', '09:09AM', 'educativo', 'EnseÃ±aremos', 3, 0),
(66, 10.688732, -71.645172, 9862, 15405, 'Barrio San Agustin, Maracaibo, Zulia, Venezue', 'San juan', '2018-04-08', '2018-04-08', '02:38 AM', '02:38 AM', 'voluntario', 'asd', 9, 0),
(67, 10.703316, -71.636223, 9863, 15404, 'Urb. Ciudadela Faria, Maracaibo 4005, Zulia, ', 'San juan', '0000-00-00', '0000-00-00', '2018-04-', 'Voluntar', 'voluntario', 'asd', 5, 0),
(68, 10.703316, -71.636223, 9863, 15404, 'Urb. Ciudadela Faria, Maracaibo 4005, Zulia, ', 'San juan', '0000-00-00', '0000-00-00', '2018-04-', 'Voluntar', 'voluntario', 'asd', 5, 0),
(69, 10.703316, -71.636223, 9863, 15404, 'Urb. Ciudadela Faria, Maracaibo 4005, Zulia, ', 'San juan', '0000-00-00', '0000-00-00', '2018-04-', 'Voluntar', 'voluntario', 'asd', 5, 0),
(70, 10.703316, -71.636223, 9863, 15404, 'Urb. Ciudadela Faria, Maracaibo 4005, Zulia, ', 'San juan', '0000-00-00', '0000-00-00', '2018-04-', 'Voluntar', 'voluntario', 'asd', 5, 0),
(71, 10.703316, -71.636223, 9863, 15404, 'Urb. Ciudadela Faria, Maracaibo 4005, Zulia, ', 'San juan', '0000-00-00', '0000-00-00', '2018-04-', 'Voluntar', 'voluntario', 'asd', 5, 0),
(72, 10.703316, -71.636223, 9863, 15404, 'Urb. Ciudadela Faria, Maracaibo 4005, Zulia, ', 'San juan', '0000-00-00', '0000-00-00', '2018-04-', 'Voluntar', 'voluntario', 'asd', 5, 0),
(73, 10.703316, -71.636223, 9863, 15404, 'Urb. Ciudadela Faria, Maracaibo 4005, Zulia, ', 'San juan', '0000-00-00', '0000-00-00', '2018-04-', 'Voluntar', 'voluntario', 'asd', 5, 0),
(74, 10.703316, -71.636223, 9863, 15404, 'Urb. Ciudadela Faria, Maracaibo 4005, Zulia, ', 'San juan', '0000-00-00', '0000-00-00', '2018-04-', 'Voluntar', 'voluntario', 'asd', 5, 0),
(75, 10.703316, -71.636223, 9863, 15404, 'Urb. Ciudadela Faria, Maracaibo 4005, Zulia, ', 'San juan', '0000-00-00', '0000-00-00', '2018-04-', 'Voluntar', 'voluntario', 'asd', 5, 0),
(76, 10.703316, -71.636223, 9863, 15404, 'Urb. Ciudadela Faria, Maracaibo 4005, Zulia, ', 'San juan', '0000-00-00', '0000-00-00', '2018-04-', 'Voluntar', 'voluntario', 'asd', 5, 0),
(77, 10.703316, -71.636223, 9863, 15404, 'Urb. Ciudadela Faria, Maracaibo 4005, Zulia, ', 'San juan', '0000-00-00', '0000-00-00', '2018-04-', 'Voluntar', 'voluntario', 'asd', 5, 0),
(78, 10.703316, -71.636223, 9863, 15404, 'Urb. Ciudadela Faria, Maracaibo 4005, Zulia, ', 'San juan', '0000-00-00', '0000-00-00', '2018-04-', 'Voluntar', 'voluntario', 'asd', 5, 0),
(79, 10.703316, -71.636223, 9863, 15404, 'Urb. Ciudadela Faria, Maracaibo 4005, Zulia, ', 'San juan', '0000-00-00', '0000-00-00', '2018-04-', 'Voluntar', 'voluntario', 'asd', 5, 0),
(80, 10.696369, -71.653976, 9861, 15404, 'Barrio Los Planazos, Maracaibo 4005, Zulia, V', 'asd', '2018-04-22', '2018-04-29', '04:02 AM', '04:02 AM', 'voluntario', 'asd', 5, 0),
(81, 10.696369, -71.653976, 9861, 15404, 'Barrio Los Planazos, Maracaibo 4005, Zulia, V', 'asd', '2018-04-22', '2018-04-29', '04:02 AM', '04:02 AM', 'voluntario', 'asd', 5, 0),
(82, 10.696369, -71.653976, 9861, 15404, 'Barrio Los Planazos, Maracaibo 4005, Zulia, V', 'asd', '2018-04-22', '2018-04-29', '04:02 AM', '04:02 AM', 'voluntario', 'asd', 5, 0),
(83, 10.696369, -71.653976, 9861, 15404, 'Barrio Los Planazos, Maracaibo 4005, Zulia, V', 'asd', '2018-04-22', '2018-04-29', '04:02 AM', '04:02 AM', 'voluntario', 'asd', 5, 0),
(84, 10.696369, -71.653976, 9861, 15404, 'Barrio Los Planazos, Maracaibo 4005, Zulia, V', 'asd', '2018-04-22', '2018-04-29', '04:02 AM', '04:02 AM', 'voluntario', 'asd', 5, 0),
(85, 10.696369, -71.653976, 9861, 15404, 'Barrio Los Planazos, Maracaibo 4005, Zulia, V', 'asd', '2018-04-22', '2018-04-29', '04:02 AM', '04:02 AM', 'voluntario', 'asd', 5, 0),
(86, 10.691611, -71.646385, 9862, 15405, 'Cd Lossada, Maracaibo 4005, Zulia, Venezuela', 'asda', '2018-04-13', '2018-04-21', '04:06 AM', '04:06 AM', 'educativo', 'asdasd', 5, 0),
(87, 10.691611, -71.646385, 9862, 15405, 'Cd Lossada, Maracaibo 4005, Zulia, Venezuela', 'asda', '2018-04-13', '2018-04-21', '04:06 AM', '04:06 AM', 'educativo', 'asdasd', 5, 0),
(88, 10.691994, -71.648605, 9862, 15405, 'Urb. Ciudadela Faria, Maracaibo 4005, Zulia, ', 'asdasd', '2018-04-25', '2018-04-19', '02:13 AM', '04:13 AM', 'voluntario', 'asdasd', 5, 0),
(89, 10.690341, -71.649857, 9862, 15405, 'Barrio San Agustin, Maracaibo, Zulia, Venezue', 'asdasd', '2018-04-27', '2018-04-28', '04:15 AM', '04:15 AM', 'educativo', 'asd', 5, 0),
(90, 10.690341, -71.649857, 9862, 15405, 'Urb. Ciudadela Faria, Maracaibo 4005, Zulia, ', 'asdasd', '0000-00-00', '0000-00-00', '2018-04-', 'Educativ', 'reciclaje', 'asd', 5, 0),
(91, 10.692374, -71.649597, 9862, 15405, 'Urb. Ciudadela Faria, Maracaibo 4005, Zulia, ', 'asdasd', '2018-04-28', '0000-00-00', '04:15 AM', 'Reciclaj', 'reciclaje', 'asd', 5, 0),
(92, 10.692374, -71.649597, 9862, 15405, 'Urb. Ciudadela Faria, Maracaibo 4005, Zulia, ', 'asdasd', '2018-04-28', '0000-00-00', '04:15 AM', 'Reciclaj', 'reciclaje', 'asd', 5, 0),
(93, 10.691556, -71.649796, 9862, 15405, 'Urb. Ciudadela Faria, Maracaibo 4005, Zulia, ', 'sdf', '2018-04-25', '2018-04-27', '04:38 AM', '04:38 AM', 'reciclaje', 'sdf', 5, 0),
(94, 10.690632, -71.649773, 9862, 15405, 'Urb. Ciudadela Faria, Maracaibo 4005, Zulia, ', 'ascascasc', '2018-04-26', '2018-04-27', '04:40 AM', '04:40 AM', 'reciclaje', 'asdasdas', 5, 0),
(95, 10.690784, -71.649773, 9862, 15405, 'Urb. Ciudadela Faria, Maracaibo 4005, Zulia, ', 'sdcds', '2018-04-28', '2018-04-25', '04:43 AM', '04:43 AM', 'reciclaje', 'sdcsd', 5, 0),
(96, 10.692708, -71.649986, 9862, 15405, 'Urb. Ciudadela Faria, Maracaibo 4005, Zulia, ', 'Prueba Sin completar datos Sin Materiales', '2018-04-08', '2018-04-08', '05:56 AM', '07:56 AM', 'voluntario', 'asdas', 5, 0),
(97, 10.690346, -71.649849, 9862, 15405, 'Urb. Ciudadela Faria, Maracaibo 4005, Zulia, ', 'Prueba Sin completar datos CON Materiales', '0000-00-00', '0000-00-00', '2018-04-', 'Voluntar', 'reciclaje', 'Prueba Sin completar datos CON Materiales', 5, 0),
(98, 10.690763, -71.649773, 9862, 15405, 'Urb. Ciudadela Faria, Maracaibo 4005, Zulia, ', 'Prueba CON  completar datos SIN Materiales', '2018-04-08', '2018-04-25', '06:03 AM', '05:03 AM', 'voluntario', 'ASDASD', 5, 0),
(99, 10.694099, -71.634140, 9863, 15404, '06:03 AM', 'Prueba CON  completar datos CON  Materiales', '2018-04-25', '0000-00-00', '05:03 AM', '08:04 AM', 'reciclaje', 'ASDASD', 5, 0),
(100, 10.695789, -71.654892, 9861, 15404, 'Barrio Los Planazos, Maracaibo 4005, Zulia, V', 'en frente del edf aziñ', '2018-04-12', '2018-04-12', '10:28 AM', '10:30 AM', 'reciclaje', 'Mi evento super genial ñññ más ', 11, 2),
(101, 10.691606, -71.645988, 9862, 15405, 'Cd Lossada, Maracaibo 4005, Zulia, Venezuela', 'bla', '2018-04-12', '2018-04-11', '10:53 AM', '10:56 AM', 'reciclaje', 'Mi descripcion', 11, 2),
(102, 10.677692, -71.673927, 9860, 15406, 'Urbanizacion La Rosaleda, Maracaibo 4005, Zul', 'Por la panaderia don pepe', '2018-04-12', '2018-04-20', '01:27 PM', '11:27 AM', 'reciclaje', 'El evento del dia de hoy recolectaremos toda los materiales que tengan por ahi botaos, vengan a traerlos', 9, 0);

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
(95, 5, 4),
(97, 5, 2),
(97, 5, 3),
(97, 5, 4),
(99, 5, 1),
(99, 5, 2),
(99, 5, 3),
(99, 5, 4),
(99, 5, 5),
(100, 11, 2),
(100, 11, 3),
(100, 11, 4),
(101, 11, 3),
(101, 11, 4),
(101, 11, 5),
(102, 9, 1),
(102, 9, 2),
(102, 9, 3),
(102, 9, 4),
(102, 9, 5);

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
  `fechae` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`idmensaje`, `receptor`, `emisor`, `mensaje`, `nuevo`, `fechae`) VALUES
(7, '2', '4', 'Hola que tal?', 0, '2018-04-08 09:24:00'),
(8, '2', '4', 'Hola que tal?', 0, '2018-04-08 09:24:00'),
(9, '2', '3', 'Hola menor', 0, '2018-04-20 09:12:00'),
(10, '4', '2', 'Quisiera subir de nivel por que si', 0, '2018-04-08 01:00:00'),
(11, '4', '2', 'Hola quiero subir de nivel por que si pues!', 0, '2018-04-08 00:00:00'),
(12, '4', '2', 'CoÃ±o que me subas de nivel nojoda!', 0, '2018-04-08 00:00:00'),
(13, '4', '2', 'asd', 0, '2018-04-08 00:00:00'),
(14, '4', '2', 'Subime nojoda', 0, '2018-04-08 00:00:00'),
(15, '4', '2', 'Prueba estilo', 0, '2018-04-18 02:05:00'),
(16, '6', '6', 'quiero ser admin', 0, '2018-04-08 00:00:00'),
(17, '6', '7', 'Hola quiero me subas de rango por que si', 0, '2018-04-09 00:00:00'),
(18, '6', '10', 'Quiero ser patrocinador por que soy una persona bastante productiva para la sociedad', 0, '2018-04-10 00:00:00'),
(19, '6', '5', 'Hola adminnnnnn subime plz', 0, '2018-04-10 00:00:00'),
(20, '6', '8', 'Por que me bloquearon?', 1, '2018-04-10 00:00:00'),
(21, '6', '8', 'por que me bloquearon mi usuario', 1, '2018-04-10 00:00:00'),
(22, '6', '7', 'asdasdasdasdasdasd', 1, '2018-04-11 00:00:00'),
(23, '6', '9', 'Cuenta lider', 1, '2018-04-11 00:00:00'),
(24, '6', '9', 'Mensaje de lider 2', 1, '2018-04-11 00:00:00');

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
(1, 64, 5),
(2, 59, 5),
(3, 55, 5),
(4, 57, 5),
(5, 56, 6),
(6, 64, 9),
(7, 87, 10),
(8, 64, 11),
(9, 101, 11),
(10, 101, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peticiones`
--

CREATE TABLE `peticiones` (
  `idp` int(11) NOT NULL,
  `ide` int(11) NOT NULL,
  `idr` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `des` int(11) NOT NULL,
  `speti` int(11) NOT NULL,
  `mat` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `peticiones`
--

INSERT INTO `peticiones` (`idp`, `ide`, `idr`, `fecha`, `des`, `speti`, `mat`) VALUES
(63, 3, 10, '2018-04-12 00:39:25', 0, 1, '1'),
(64, 3, 10, '2018-04-12 00:43:17', 0, 1, '3'),
(65, 4, 10, '2018-04-12 01:28:38', -320, 4, '1'),
(66, 6, 10, '2018-04-12 04:59:49', -10, 4, '3'),
(67, 6, 10, '2018-04-12 05:00:34', -10, 4, '3'),
(68, 6, 10, '2018-04-12 05:03:03', -10, 4, '3'),
(69, 3, 10, '2018-04-12 05:19:08', -8, 4, '3'),
(70, 9, 10, '2018-04-12 11:29:59', -60, 2, '1'),
(71, 3, 10, '2018-04-13 00:46:43', 0, 1, '2'),
(72, 6, 10, '2018-04-13 00:47:22', 0, 1, '3');

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
(1, 'Mi primera pregunta', 20, 5, '2018-04-08 08:33:48'),
(2, 'Mi segunda pregunta', 20, 5, '2018-04-08 08:33:48'),
(4, 'Mi tercera pregunta', 20, 10, '2018-04-11 00:00:00'),
(9, 'Mi cuarta pregunta', 20, 10, '2018-04-11 00:00:00'),
(10, 'Mi quinta pregunta', 20, 10, '2018-04-11 00:00:00'),
(11, 'Mi sexta pregunta', 20, 10, '2018-04-11 00:00:00'),
(12, 'Mi séptima pregunta', 20, 10, '2018-04-11 00:00:00'),
(13, 'Mi octava pregunta', 20, 10, '2018-04-11 00:00:00'),
(14, 'Mi Novena pregunta', 20, 10, '2018-04-11 00:00:00'),
(15, 'Mi décima pregunta para confirmar', 20, 10, '2018-04-11 00:00:00'),
(16, 'Mi ultima pregunta', 20, 10, '2018-04-11 00:00:00'),
(17, 'Mi primera pregunta', 64, 10, '2018-04-12 00:00:00'),
(18, 'Mi segunda pregunta', 65, 10, '2018-04-12 01:01:23'),
(19, 'Buenos dias, tienes disponible 60Kg??', 70, 10, '2018-04-12 11:30:45');

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
(1, 1, 3, 12),
(2, 1, 3, 12),
(3, 2, 6, 50),
(4, 2, 3, 50),
(5, 3, 3, 60),
(6, 3, 3, 60),
(7, 1, 3, 12),
(9, 1, 3, 90),
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
(25, 1, 3, 21),
(26, 1, 3, 1),
(27, 4, 3, 1),
(28, 5, 3, 1),
(34, 1, 3, 3),
(37, 1, 3, 4),
(38, 1, 3, 3),
(41, 1, 3, 2),
(44, 1, 3, 2),
(49, 1, 3, 2),
(50, 1, 3, 30),
(51, 1, 3, 1),
(52, 1, 3, 5),
(54, 1, 4, 321),
(55, 1, 3, 5),
(56, 1, 3, 6),
(57, 1, 6, 12),
(58, 3, 6, 31),
(59, 5, 6, 1),
(60, 5, 6, 1),
(61, 5, 6, 2),
(62, 5, 6, 1),
(63, 5, 6, 1),
(64, 4, 6, 23),
(66, 1, 6, 9),
(67, 1, 9, 4),
(68, 2, 9, 5),
(69, 1, 9, 56),
(70, 1, 9, 4),
(71, 4, 9, 1),
(72, 1, 9, 46),
(73, 3, 6, -10),
(74, 3, 3, -8),
(75, 1, 9, -60);

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

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`idRespuesta`, `respuesta`, `idUsuario`, `idPregunta`, `dateRespuesta`) VALUES
(1, 'Mi primera respuesta', 9, 1, '2018-04-11 05:43:37'),
(2, 'Mi segunda respuesta', 9, 2, '2018-04-11 05:43:37'),
(3, 'Mi tercera respuesta', 9, 4, '2018-04-11 00:00:00'),
(10, 'Mi séptima respuesta', 9, 12, '2018-04-11 00:00:00'),
(11, 'Mi sexta respuesta', 9, 11, '2018-04-11 00:00:00'),
(12, 'Mi quinta respuesta', 9, 10, '2018-04-11 00:00:00'),
(14, 'Mi cuarta respuesta', 9, 9, '2018-04-11 00:00:00'),
(16, 'Mi octava respuesta', 9, 13, '2018-04-11 00:00:00'),
(17, 'Mi novena y ultima respuesta', 9, 14, '2018-04-11 00:00:00'),
(19, 'Decima respuesta', 9, 15, '2018-04-11 00:00:00'),
(20, 'Mi ultima respuesta', 9, 16, '2018-04-11 00:00:00'),
(21, 'Segunda respuesta', 3, 18, '2018-04-12 00:00:00'),
(22, 'Mi primera respuesta', 3, 17, '2018-04-12 01:04:43'),
(23, 'Buenos dias, claro amigo', 9, 19, '2018-04-12 11:35:45');

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
  `estatus` int(11) NOT NULL DEFAULT '1',
  `pregSeguriada1` varchar(256) NOT NULL,
  `respSeguriada1` varchar(256) NOT NULL,
  `pregSeguriada2` varchar(256) NOT NULL,
  `respSeguriada2` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `tlf`, `tipo`, `estatus`, `pregSeguriada1`, `respSeguriada1`, `pregSeguriada2`, `respSeguriada2`) VALUES
(2, 'admin', 'admin@admin.com', 'admin', '0261-1234567', 4, 1, '', '', '', ''),
(3, 'ademin2', 'admin2@admin.com', 'admin2', '0261-1234567', 3, 1, '', '', '', ''),
(4, 'alejandro de jesus', 'alexjesus08@gmail.com', 'faria', '0424-6744200', 3, 1, '', '', '', ''),
(5, 'Jorge', 'alex_jesus-08@hotmail.com', 'ASDASD', '0414-6611344', 2, 1, '', '', '', ''),
(6, 'Johandry', 'johan.tenias@gmail.com', 'La florida', '0424-6088355', 4, 1, '', '', '', ''),
(7, 'asd', 'nancy@gmail.com', 'su casa la de la esquina', '1234-7654321', 1, 1, '', '', '', ''),
(8, 'Roberto carlo', 'participante@jal.com', 'Faria edf betijoque', '0414-6611344', 1, 1, '', '', '', ''),
(9, 'Alejandro ', 'lider@jal.com', 'Delicias edf canaima', '0261-7785268', 2, 1, '', '', '', ''),
(10, 'Pedro Lugo', 'patrocinador@jal.com', 'San jacinto', '0261-7785269', 3, 1, '', '', '', ''),
(11, 'Jal', 'jal.proyect@gmail.com', 'fariua edf betijoque', '0414-6611344', 2, 1, '', '', '', '');

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
(11, 2, '$2y$10$WirIAYZGqstzKpQKxhhdqe5ied2sTP10QT8Fay', 'JAL', 'http://localhost/tesis/assets/img/default_profile_normal2.png'),
(12, 3, '$2y$10$iGxAXzoVeBmHQVsVzjLnUOPLAwT5HVvwICgxVC', 'JAL', 'http://localhost/tesis/assets/img/default_profile_normal2.png'),
(13, 4, '107813404644975868025', 'Google', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg?sz=200'),
(14, 5, '$2y$10$Zu8B/cTwx9OydXt0amYUWeajaaN5BvsIimzeYh', 'JAL', 'http://localhost/tesis/assets/img/default_profile_normal2.png'),
(15, 6, '$2y$10$HP5IbIudsk7QT7fue/TF3u.wSM6cr./nst0CEE', 'JAL', 'http://localhost/tesis/assets/img/default_profile_normal2.png'),
(16, 7, '$2y$10$AGgGslb442I3NO3Qasik/.cPMAs0sha4pBZCAU', 'JAL', 'http://localhost/tesis/assets/img/default_profile_normal2.png'),
(17, 8, '$2y$10$jHo.nmyH3AHdfoottkNCyOzhFUuPFJtrMb4xgv', 'JAL', 'http://localhost/tesis/assets/img/default_profile_normal2.png'),
(18, 9, '$2y$10$S/vbMvLHsCyeXtG4vVQiyOfrTVUS3zukZX0zrC', 'JAL', 'http://localhost/tesis/assets/img/default_profile_normal2.png'),
(19, 10, '$2y$10$X6dLY4UFT2B2TFufU6LmmekBtEokvslLcQKjRc', 'JAL', 'http://localhost/tesis/assets/img/default_profile_normal2.png'),
(20, 11, '9.6606737433936E+17', 'Twitter', 'http://pbs.twimg.com/profile_images/976676004260401152/qo-qF5AY.jpg');

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
  ADD PRIMARY KEY (`idmensaje`);

--
-- Indices de la tabla `participaciones`
--
ALTER TABLE `participaciones`
  ADD PRIMARY KEY (`idParticipacion`);

--
-- Indices de la tabla `peticiones`
--
ALTER TABLE `peticiones`
  ADD PRIMARY KEY (`idp`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`idPregunta`);

--
-- Indices de la tabla `relacionum`
--
ALTER TABLE `relacionum`
  ADD PRIMARY KEY (`idrmu`),
  ADD KEY `id` (`idu`),
  ADD KEY `idmateriales` (`idma`);

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
  MODIFY `idCalificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idcomentarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `denuncias`
--
ALTER TABLE `denuncias`
  MODIFY `idDenuncia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `idmensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `participaciones`
--
ALTER TABLE `participaciones`
  MODIFY `idParticipacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `peticiones`
--
ALTER TABLE `peticiones`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `idPregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `relacionum`
--
ALTER TABLE `relacionum`
  MODIFY `idrmu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `idRespuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users_social`
--
ALTER TABLE `users_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
