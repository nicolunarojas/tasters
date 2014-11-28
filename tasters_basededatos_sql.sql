-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2014 a las 19:39:14
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tasters_basededatos_sql`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_posts`
--

CREATE TABLE IF NOT EXISTS `comentarios_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `comentario` varchar(50) COLLATE utf8_bin NOT NULL,
  `likes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `comentarios_posts`
--

INSERT INTO `comentarios_posts` (`id`, `id_usuario`, `id_post`, `comentario`, `likes`) VALUES
(11, 8, 1, 'Mi comentario', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_restaurante`
--

CREATE TABLE IF NOT EXISTS `comentarios_restaurante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_restaurante` int(11) NOT NULL,
  `comentario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `likes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idp` int(11) NOT NULL,
  `idu` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`id`, `idp`, `idu`) VALUES
(1, 1, 7),
(2, 1, 2),
(3, 1, 6),
(4, 1, 7),
(5, 1, 8),
(6, 1, 6),
(7, 1, 6),
(8, 1, 6),
(9, 1, 6),
(10, 1, 6),
(11, 1, 6),
(12, 1, 6),
(13, 1, 1),
(14, 1, 1),
(15, 1, 1),
(16, 1, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `idp` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `contenido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `likes` int(11) NOT NULL,
  `id_lugar` int(11) NOT NULL,
  PRIMARY KEY (`idp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`idp`, `id_usuario`, `contenido`, `imagen`, `fecha`, `likes`, `id_lugar`) VALUES
(1, 8, 'ola k ace', 'img/posts/fotopedro.jpg', '2014-11-27', 46, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE IF NOT EXISTS `registros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `contrasena` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `imagenUsuario` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `nombre`, `correo`, `tipo`, `contrasena`, `imagenUsuario`) VALUES
(1, 'ALEJANDRO SANCLEMENTE', 'alejost848@gmail.com', 1, '1234', 'img/usuarios/user1.jpg'),
(2, 'NICODEMUS LUNA', 'nicodemus@gmail.com', 1, '5678', 'img/usuarios/user2.jpg'),
(3, 'JUAN ESTEBAN', 'juanes@gmail.com', 1, '9101', 'img/usuarios/user3.jpg'),
(4, 'SEBASTIAN WILCHEZ', 'sewilchez@gmail.com', 1, '1213', 'img/usuarios/user4.jpg'),
(5, 'ANDRES BONILLA', 'abonilla.esc@gmail.com', 1, '1415', 'img/usuarios/user5.jpg'),
(6, 'NATALIA AYALA', 'natalia@gmail.com', 1, '1617', 'img/usuarios/user6.jpg'),
(7, 'HECTOR MEJIA', 'hector@gmail.com', 1, '2021', 'img/usuarios/user7.jpg'),
(8, 'nata', 'natayu@we', 1, '123', 'profile_default.jpg'),
(9, 'LA CASONA', 'lc@com', 2, '123', 'img/usuarios/cake.png'),
(10, 'Acomer', 'tengoH@mbre', 2, 'hambre', 'img/usuarios/cake.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurante`
--

CREATE TABLE IF NOT EXISTS `restaurante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `latitud` float NOT NULL,
  `longitud` float NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguidores`
--

CREATE TABLE IF NOT EXISTS `seguidores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_seguidor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=45 ;

--
-- Volcado de datos para la tabla `seguidores`
--

INSERT INTO `seguidores` (`id`, `id_usuario`, `id_seguidor`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 4),
(4, 1, 5),
(5, 1, 6),
(6, 1, 7),
(7, 2, 1),
(8, 2, 3),
(9, 2, 4),
(10, 2, 5),
(11, 2, 6),
(12, 2, 7),
(13, 3, 1),
(14, 3, 2),
(15, 3, 4),
(16, 3, 5),
(17, 3, 6),
(18, 3, 7),
(19, 4, 1),
(20, 4, 2),
(21, 4, 3),
(22, 4, 5),
(23, 4, 6),
(24, 4, 7),
(25, 5, 1),
(26, 5, 3),
(27, 5, 4),
(28, 5, 2),
(29, 5, 6),
(30, 5, 7),
(31, 6, 1),
(32, 6, 2),
(33, 6, 4),
(34, 6, 5),
(35, 6, 3),
(36, 6, 7),
(37, 7, 1),
(38, 7, 2),
(39, 7, 3),
(40, 7, 5),
(41, 7, 6),
(42, 7, 4),
(43, 1, 8),
(44, 2, 8);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
