SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Creación de la base de datos.
--

-- --------------------------------------------------------

CREATE DATABASE IF NOT EXISTS `menoruco_dibuja_2`;

USE `menoruco_dibuja_2`;

-- --------------------------------------------------------

CREATE TABLE `site_config` (
	`id` int(11) NOT NULL,
	`option` varchar(256) NOT NULL,
	`value` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Valores predeterminados para la configuración de sitio web.

INSERT INTO `site_config` (`id`, `option`, `value`) VALUES
(1, 'site_title', 'Manuelbooru'),
(2, 'site_slogan', 'Una galería de imágenes igual que muchas otras.'),
(3, 'site_url', 'http://manuelbooru.lan'),
(4, 'site_header_image', '/multimedia/header_background.jpg'),
(5, 'images_per_page', '25');

-- --------------------------------------------------------

CREATE TABLE `site_pages` (
	`id_page` int(11) NOT NULL,
	`title` varchar(256) NOT NULL,
	`permalink` varchar(256) NOT NULL,
	`date` date NOT NULL,
	`author` int(11) NOT NULL,
	`text` longtext NOT NULL,
	`status` varchar(16) NOT NULL DEFAULT 'Borrador'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

CREATE TABLE `users` (
	`id_usr` int(11) NOT NULL,
	`name` varchar(64) NOT NULL,
	`type` varchar(16) NOT NULL DEFAULT 'usr',
	`password` varchar(32) NOT NULL,
	`signup_date` date NOT NULL DEFAUlt current_timestamp(),
	`last_login` date DEFAULT NULL,
	`visits` int(11) NOT NULL DEFAULT 0,
	`images` int(11) NOT NULL DEFAULT 0,
	`images_per_page` int(11) DEFAULT NULL,
	`comments` int(11) NOT NULL DEFAULT 0,
	`favorites` int(11) NOT NULL DEFAULT 0,
	`avatar` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Usuario predeterminado de la BD.

INSERT INTO `users` (`id_usr`, `name`, `type`, `password`, `signup_date`, `last_login`, `visits`, `images`, `images_per_page`, `comments`, `favorites`, `avatar`) VALUES
(1, 'Menoru', 'Administrador', '$2y$12$LzgtioKSH8DQDk/rx7CQ8uVXbf0ecGSlH2d3A5uuy5xVriyt6gbpO', '2020-12-01', NULL, 0, 0, NULL, 0, 0, NULL);

-- --------------------------------------------------------

CREATE TABLE `portfolio` (
	`id_img` int(11) NOT NULL,
	`name` varchar(256) NOT NULL,
	`type` varchar(5) NOT NULL,
	`size` int(11) NOT NULL,
	`width` int(11) NOT NULL,
	`height` int(11) NOT NULL,
	`hash` varchar(128) NOT NULL,
	`directory` varchar(256) NOT NULL,
	`user` int(11) NOT NULL,
	`date` date NOT NULL DEFAULT current_timestamp(),
	`restricted` char(1) NOT NULL,
	`views` int(11) NOT NULL DEFAULT 0,
	`favorites` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

CREATE TABLE `portfolio_categories` (
	`id_category` int(11) NOT NULL,
	`category` varchar(128) NOT NULL,
	`permalink` varchar(128) NOT NULL,
	`color` varchar(8) NOT NULL,
	`tags` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Primer valor de la tabla.


INSERT INTO `portfolio_categories` (`id_category`, `category`, `permalink`, `color`, `tags`) VALUES
(1, 'Sin categoría', 'sin_categoria', '#c0c0c0', 0);

-- --------------------------------------------------------

CREATE TABLE `portfolio_tags` (
	`id_tag` int(11) NOT NULL,
	`tag` varchar(128) NOT NULL,
	`permalink` varchar(128) NOT NULL,
	`id_category` int(11) NOT NULL,
	`images` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Primer valor de la tabla.

INSERT INTO `portfolio_tags` (`id_tag`, `tag`, `permalink`, `id_category`, `images`) VALUES
(1, 'Etiquétame', 'etiquetame', 1, 0);

-- --------------------------------------------------------

CREATE TABLE `portfolio_comments` (
	`id_comment` int(11) NOT NULL,
	`id_img` int(11) NOT NULL,
	`id_usr` int(11) NOT NULL,
	`date` datetime NOT NULL DEFAULT current_timestamp(),
	`comment` text NOT NULL,
	`response_to` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

CREATE TABLE `blog_posts` (
	`id_post` int(11) NOT NULL,
	`title` varchar(256) NOT NULL,
	`permalink` varchar(256) NOT NULL,
	`date` datetime NOT NULL DEFAULT current_timestamp(),
	`author` int(11) NOT NULL,
	`text` longtext NOT NULL,
	`views` int(11) NOT NULL DEFAULT 0,
	`comments` int(11) NOT NULL DEFAULT 0,
	`status` varchar(16) NOT NULL DEFAULT 'Borrador'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

CREATE TABLE `blog_tags` (
	`id_tag` int(11) NOT NULL,
	`tag` varchar(128) NOT NULL,
	`permalink` varchar(128) NOT NULL,
	`posts` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

CREATE TABLE `blog_categories` (
	`id_category` int(11) NOT NULL,
	`tag` varchar(128) NOT NULL,
	`permalink` varchar(128) NOT NULL,
	`posts` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

CREATE TABLE `blog_comments` (
	`id_comment` int(11) NOT NULL,
	`id_usr` int(11) NOT NULL,
	`id_post` int(11) NOT NULL,
	`date` datetime NOT NULL DEFAULT current_timestamp(),
	`comment` longtext NOT NULL,
	`answer_to` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

CREATE TABLE `multimedia` (
	`id_media` int(11) NOT NULL,
	`name` varchar(256) NOT NULL,
	`type` varchar(5) NOT NULL,
	`size` int(11) NOT NULL,
	`width` int(11) NOT NULL,
	`height` int(11) NOT NULL,
	`directory` varchar(256) NOT NULL,
	`date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

CREATE TABLE `templates` (
	`id_template` int(11) NOT NULL,
	`name` varchar(64) NOT NULL,
	`author` varchar(64) NOT NULL,
	`creation_date` date NOT NULL,
	`active` char(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

CREATE TABLE `visits` (
	`id_visit` int(11) NOT NULL,
	`user` varchar(64) NOT NULL,
	`date_time` datetime NOT NULL DEFAULT current_timestamp(),
	`token` varchar(256) NOT NULL,
	`from` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablas de relación.
--

-- --------------------------------------------------------

CREATE TABLE `rel_portfolio_category` (
	`id_img` int(11) NOT NULL,
	`id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

CREATE TABLE `rel_portfolio_tag` (
	`id_img` int(11) NOT NULL,
	`id_tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

CREATE TABLE `rel_portfolio_favorites` (
	`id_usr` int(11) NOT NULL,
	`id_img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

CREATE TABLE `rel_post_tag` (
	`id_post` int(11) NOT NULL,
	`id_tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

CREATE TABLE `rel_post_category` (
	`id_post` int(11) NOT NULL,
	`id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Índices para tablas.
--

-- --------------------------------------------------------

ALTER TABLE `site_config`
	ADD PRIMARY KEY (`id`);

-- --------------------------------------------------------

ALTER TABLE `site_pages`
	ADD PRIMARY KEY (`id_page`),
	ADD KEY `author` (`author`);

-- --------------------------------------------------------

ALTER TABLE `templates`
	ADD PRIMARY KEY (`id_template`);

-- --------------------------------------------------------

ALTER TABLE `multimedia`
	ADD PRIMARY KEY (`id_media`);

-- --------------------------------------------------------

ALTER TABLE `users`
	ADD PRIMARY KEY (`id_usr`);

-- --------------------------------------------------------

ALTER TABLE `visits`
	ADD PRIMARY KEY (`id_visit`);

-- --------------------------------------------------------

ALTER TABLE `portfolio`
	ADD PRIMARY KEY (`id_img`);

-- --------------------------------------------------------

ALTER TABLE `portfolio_categories`
	ADD PRIMARY KEY (`id_category`);

-- --------------------------------------------------------

ALTER TABLE `portfolio_tags`
	ADD PRIMARY KEY (`id_tag`);

-- --------------------------------------------------------

ALTER TABLE `portfolio_comments`
	ADD PRIMARY KEY (`id_comment`),
	ADD KEY `id_img` (`id_img`),
	ADD KEY `id_usr` (`id_usr`);

-- --------------------------------------------------------

ALTER TABLE `blog_posts`
	ADD PRIMARY KEY (`id_post`),
	ADD KEY `author` (`author`);

-- --------------------------------------------------------

ALTER TABLE `blog_tags`
	ADD PRIMARY KEY (`id_tag`);

-- --------------------------------------------------------

ALTER TABLE `blog_categories`
	ADD PRIMARY KEY (`id_category`);

-- --------------------------------------------------------

ALTER TABLE `blog_comments`
	ADD PRIMARY KEY (`id_comment`),
	ADD KEY `id_usr` (`id_usr`),
	ADD KEY `id_post` (`id_post`);

-- --------------------------------------------------------

--
-- Se establecen las relaciones entre tablas.
--

-- --------------------------------------------------------

ALTER TABLE `rel_portfolio_category`
	ADD KEY `id_img` (`id_img`),
	ADD KEY `id_category` (`id_category`);

-- --------------------------------------------------------

ALTER TABLE `rel_portfolio_tag`
	ADD KEY `id_img` (`id_img`),
	ADD KEY `id_tag` (`id_tag`);

-- --------------------------------------------------------

ALTER TABLE `rel_portfolio_favorites`
	ADD KEY `id_usr` (`id_usr`),
	ADD KEY `id_img` (`id_img`);

-- --------------------------------------------------------

ALTER TABLE `rel_post_tag`
	ADD KEY `id_post` (`id_post`),
	ADD KEY `id_tag` (`id_tag`);

-- --------------------------------------------------------

ALTER TABLE `rel_post_category`
	ADD KEY `id_post` (`id_post`),
	ADD KEY `id_category` (`id_category`);

-- --------------------------------------------------------

--
-- AUTO_INCREMENT para las tablas.
--

-- --------------------------------------------------------

ALTER TABLE `site_config`
	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `site_pages`
	MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `templates`
	MODIFY `id_template` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `multimedia`
	MODIFY `id_media` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `visits`
	MODIFY `id_visit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `users`
	MODIFY `id_usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `portfolio`
	MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `portfolio_categories`
	MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `portfolio_tags`
	MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `portfolio_comments`
	MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `blog_posts`
	MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `blog_tags`
	MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `blog_categories`
	MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `blog_comments`
	MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- --------------------------------------------------------

COMMIT;
