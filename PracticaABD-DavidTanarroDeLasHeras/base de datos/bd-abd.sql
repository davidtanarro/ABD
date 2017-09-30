-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2017 a las 14:18:36
-- Versión del servidor: 10.1.22-MariaDB
-- Versión de PHP: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd-abd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bandeja`
--

CREATE TABLE `bandeja` (
  `codigo` int(10) NOT NULL,
  `emisor` int(10) NOT NULL,
  `receptor` int(10) NOT NULL,
  `asunto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `mensaje` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `bandeja`
--

INSERT INTO `bandeja` (`codigo`, `emisor`, `receptor`, `asunto`, `mensaje`, `fecha`) VALUES
(21, 513, 511, 'el concierto se pospone', 'el concierto se pospone para el dia 5 de noviembre', '2017-05-23 11:25:46'),
(25, 509, 510, 'que gran concierto', 'fue un gran concierto, estuvimos muy cerca!', '2017-05-24 15:23:06'),
(27, 512, 510, 'Elvis Presley', 'Me pasas la biofrafia de Elvis Presley??', '2017-05-26 13:21:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro`
--

CREATE TABLE `foro` (
  `id` int(10) NOT NULL,
  `usuario` int(10) NOT NULL,
  `titulo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cuerpo` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `foro`
--

INSERT INTO `foro` (`id`, `usuario`, `titulo`, `cuerpo`, `fecha`) VALUES
(1, 509, 'que esta pasando con en el concierto?', 'No he podido ir al concierto porque tenia que estudiar abd, alguien me puede pasar una foto o decirme que se siente?? Me hubiera gustao haber estado alli', '2017-05-22 00:00:00'),
(2, 509, 'no esta pasando nada', 'El concierto se suspendio por razones climatologicas y dicen que tambien el cantante esta afonico...y ya sabes no esta en sus valores hacer playback.\r\n\r\nestudia! ;)', '2017-05-22 00:00:01'),
(3, 509, 'concierto brutal', 'el concierto de melendi fue bestial', '2017-05-23 10:53:49'),
(4, 513, 'concierto decepcionante', 'estuve en el concierto y fue una pena que lo cancelaran', '2017-05-23 11:24:46'),
(10, 509, 'MELEENDII', 'melendi crack!!', '2017-05-24 15:44:38'),
(11, 512, 'La musica es vida', 'que temazo del ultimo disco de Elvis Presley, lo seguire escuchando aunque pasen años y años', '2017-05-26 13:20:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forogrupo`
--

CREATE TABLE `forogrupo` (
  `id` int(10) NOT NULL,
  `usuario` int(10) NOT NULL,
  `titulo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cuerpo` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `idGrupo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `forogrupo`
--

INSERT INTO `forogrupo` (`id`, `usuario`, `titulo`, `cuerpo`, `fecha`, `idGrupo`) VALUES
(500, 511, 'Bienvenidos al grupo', 'Bienvenidos al grupo!! espero que lo pasemos muy bien comentando los conciertos de rock!', '2017-05-24 01:15:00', 500),
(501, 509, 'Genial nuevo grupo de rock', 'Me apasiona el rock!!', '2017-05-26 13:11:26', 500),
(502, 510, 'Hay un nuevo concierto pronto?', 'Sabeis alguno si hay un nuevo concierto pronto?', '2017-05-26 13:14:40', 500),
(503, 512, '25 de Julio', 'El 25 de julio habra un cocierto de rock con las estrellas mas importantes del momento en la Casa Campo (Madrid)', '2017-05-26 13:23:15', 500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `idGrupo` int(10) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `genero` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `edad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`idGrupo`, `nombre`, `genero`, `edad`) VALUES
(500, 'Rockeros', 'Rock', 18),
(501, 'Populares', 'Pop', 12),
(502, 'Flamenkitos flameantes', 'Flamenco', 21),
(503, 'Salsita', 'Salsa', 16),
(504, 'Tertulianos del hip-hop', 'Hip-Hop', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participante`
--

CREATE TABLE `participante` (
  `idGrupo` int(10) NOT NULL,
  `idParticipante` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `participante`
--

INSERT INTO `participante` (`idGrupo`, `idParticipante`) VALUES
(500, 509),
(500, 510),
(500, 512),
(501, 514),
(502, 514),
(503, 514);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) NOT NULL,
  `nick` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(110) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `edad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nick`, `password`, `nombre`, `apellidos`, `email`, `edad`) VALUES
(1, 'admin', '$2y$10$pSn9qWMu0l2lBKYJarjUsesewhmWQhEJpYIbT/8fmW/seCPsosDEq', 'admin', 'admin admin', 'x@x.xx', 23),
(509, 'a', '$2y$10$lLXzWJNHCf/dOWY7y0V0V.Kjf95ParWficnY05vluZS8D4lD6yD7e', 'a', 'a a', 'a', 18),
(510, 'e', '$2y$10$e.PWDIRZmrU9Nip8DkfoCu51tDO7NdM6VdFCswuGx7fxCmB.5Td8.', 'e', 'e e', 'e', 18),
(511, 'i', '$2y$10$oaLQlGdGLZdSOYyWremXUu.TH1hRDMpVKUwcmxVA4m.d6S3PUwide', 'i', 'i i', 'i', 16),
(512, 'u', '$2y$10$fj1Rf4ogJgApS2EFJfZVIegQgazyM7O50WNMWhfXyoLi9QOU3Nape', 'u', 'u u', 'u', 20),
(513, 'o', '$2y$10$NWjrIvfCnMQ1xKUA4TUB/erPbQtt9ca5RYz14opegBcoGV61tnLnK', 'o', 'o o', 'o', 21),
(514, 'david', '$2y$10$TUnHGaZwfQXD01jvtLpjguYZtqqrq1zPnOhSNTcP5BiQKyYk37rT6', 'David', 'Tanarro DeLasHeras', 'davidtan@ucm.es', 23);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bandeja`
--
ALTER TABLE `bandeja`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `emisor` (`emisor`),
  ADD KEY `receptor` (`receptor`);

--
-- Indices de la tabla `foro`
--
ALTER TABLE `foro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `forogrupo`
--
ALTER TABLE `forogrupo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `idGrupo` (`idGrupo`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`idGrupo`);

--
-- Indices de la tabla `participante`
--
ALTER TABLE `participante`
  ADD PRIMARY KEY (`idGrupo`,`idParticipante`),
  ADD KEY `idParticipante` (`idParticipante`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nick` (`nick`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bandeja`
--
ALTER TABLE `bandeja`
  MODIFY `codigo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `foro`
--
ALTER TABLE `foro`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `forogrupo`
--
ALTER TABLE `forogrupo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=504;
--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `idGrupo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=505;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=515;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bandeja`
--
ALTER TABLE `bandeja`
  ADD CONSTRAINT `bandeja_ibfk_1` FOREIGN KEY (`emisor`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bandeja_ibfk_2` FOREIGN KEY (`receptor`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `foro`
--
ALTER TABLE `foro`
  ADD CONSTRAINT `foro_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `forogrupo`
--
ALTER TABLE `forogrupo`
  ADD CONSTRAINT `forogrupo_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forogrupo_ibfk_2` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`idGrupo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `participante`
--
ALTER TABLE `participante`
  ADD CONSTRAINT `participante_ibfk_1` FOREIGN KEY (`idParticipante`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participante_ibfk_2` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`idGrupo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
