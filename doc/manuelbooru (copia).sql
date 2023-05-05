-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 23-06-2022 a las 17:59:07
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `manuelbooru`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_img_cat`
--

CREATE TABLE `rel_img_cat` (
  `img_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_img_etq`
--

CREATE TABLE `rel_img_etq` (
  `img_id` int(11) NOT NULL,
  `etq_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `site_config`
--

CREATE TABLE `site_config` (
  `page_title` varchar(256) NOT NULL,
  `page_slogan` varchar(256) DEFAULT NULL,
  `page_url` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `site_config`
--

INSERT INTO `site_config` (`page_title`, `page_slogan`, `page_url`) VALUES
('Manuelbooru', 'Una galería de imágenes igual que muchas otras.', 'http://manuelbooru.lan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_categorias`
--

CREATE TABLE `tab_categorias` (
  `id_cat` int(11) NOT NULL,
  `categoria` varchar(64) NOT NULL,
  `cat_nbsp` varchar(64) NOT NULL,
  `color` varchar(7) NOT NULL,
  `prioridad` tinyint(1) DEFAULT NULL,
  `cant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tab_categorias`
--

INSERT INTO `tab_categorias` (`id_cat`, `categoria`, `cat_nbsp`, `color`, `prioridad`, `cant`) VALUES
(1, 'General', `general`, '#ef2929', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_etiquetas`
--

CREATE TABLE `tab_etiquetas` (
  `id_etq` int(11) NOT NULL,
  `etiqueta` varchar(64) NOT NULL,
  `etq_nbsp` varchar(64) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `cant` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tab_etiquetas`
--

INSERT INTO `tab_etiquetas` (`id_etq`, `etiqueta`, `etq_nbsp`, `cat_id`, `cant`) VALUES
(1, 'Etiquétame', `etiquetame`, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_imagenes`
--

CREATE TABLE `tab_imagenes` (
  `id_img` int(11) NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `ext` varchar(4) NOT NULL,
  `tamano` int(11) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `ancho` int(11) NOT NULL,
  `alto` int(11) NOT NULL,
  `dir` varchar(2) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `usr_id` int(11) NOT NULL,
  `seguro` char(1) NOT NULL,
  `visitas` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_usuarios`
--

CREATE TABLE `tab_usuarios` (
  `id_usr` int(11) NOT NULL,
  `usuario` varchar(64) NOT NULL,
  `contrasena` varchar(128) NOT NULL,
  `tipo_usr` varchar(10) NOT NULL DEFAULT 'usr',
  `visitas` int(11) NOT NULL DEFAULT 0,
  `cant_img` int(11) NOT NULL DEFAULT 0,
  `img_por_pag` int(3) NOT NULL DEFAULT 25,
  `bytes` varchar(3) DEFAULT 'bin',
  `ultima_sesion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `tab_usuarios`
--

INSERT INTO `tab_usuarios` (`id_usr`, `usuario`, `contrasena`, `tipo_usr`, `visitas`, `cant_img`, `img_por_pag`, `bytes`, `ultima_sesion`) VALUES
(1, 'Menoru', '$2y$12$LzgtioKSH8DQDk/rx7CQ8uVXbf0ecGSlH2d3A5uuy5xVriyt6gbpO', 'admin', 1, 0, 25, 'dec', '2022-06-21 19:04:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_visitas`
--

CREATE TABLE `tab_visitas` (
  `id_visita` int(11) NOT NULL,
  `usuario` varchar(64) NOT NULL,
  `tipo` varchar(4) NOT NULL,
  `ip_usr` varchar(15) NOT NULL,
  `inicio_sesion` datetime NOT NULL,
  `token` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `rel_img_cat`
--
ALTER TABLE `rel_img_cat`
  ADD KEY `img_id` (`img_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indices de la tabla `rel_img_etq`
--
ALTER TABLE `rel_img_etq`
  ADD KEY `img_id` (`img_id`),
  ADD KEY `etq_id` (`etq_id`);

--
-- Indices de la tabla `tab_categorias`
--
ALTER TABLE `tab_categorias`
  ADD PRIMARY KEY (`id_cat`),
  ADD UNIQUE KEY `categoria_unico` (`categoria`),
  ADD KEY `prioridad` (`prioridad`);

--
-- Indices de la tabla `tab_etiquetas`
--
ALTER TABLE `tab_etiquetas`
  ADD PRIMARY KEY (`id_etq`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indices de la tabla `tab_imagenes`
--
ALTER TABLE `tab_imagenes`
  ADD PRIMARY KEY (`id_img`),
  ADD UNIQUE KEY `hash` (`hash`),
  ADD KEY `usr_id_idx` (`usr_id`);

--
-- Indices de la tabla `tab_usuarios`
--
ALTER TABLE `tab_usuarios`
  ADD PRIMARY KEY (`id_usr`),
  ADD UNIQUE KEY `usuario_unico` (`usuario`),
  ADD UNIQUE KEY `contrasena_unico` (`contrasena`);

--
-- Indices de la tabla `tab_visitas`
--
ALTER TABLE `tab_visitas`
  ADD PRIMARY KEY (`id_visita`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tab_categorias`
--
ALTER TABLE `tab_categorias`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tab_etiquetas`
--
ALTER TABLE `tab_etiquetas`
  MODIFY `id_etq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `tab_imagenes`
--
ALTER TABLE `tab_imagenes`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `tab_usuarios`
--
ALTER TABLE `tab_usuarios`
  MODIFY `id_usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tab_visitas`
--
ALTER TABLE `tab_visitas`
  MODIFY `id_visita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
