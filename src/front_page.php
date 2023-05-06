<!DOCTYPE html>
<html lang="es-MX">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Menoru dibuja</title>
	<link rel="stylesheet" href="/css/fontawesome.css">
	<link rel="stylesheet" media="all" href="/css/site_styles.css">
</head>
<body>
	<div class="front-page-wrapper">
		<!-- ENCABEZADO DE PÁGINA. -->
		<header class="front-page-header" id="header">
			<h1><a href="">Menoru dibuja</a></h1>
		</header>

		<!-- BARRA DE NAVEGACIÓN. -->
		<nav class="front-page-nav" id="nav">
			<?php include_once 'site_menu.php'; ?>
		</nav>

		<!-- CONTENIDO PRINCIPAL DE LA PÁGINA. -->
		<main class="front-page-main" id="main">
			<form class="forms" action="index.html" method="post">
				<input type="text" name="" value="">
				<button type="submit" name="button"><span class="fas fa-search"></span> Buscar</button>
			</form>
			<p>Actualmente hay:</p>
			<p>0 imágenes en la galería.</p>
			<p>0 artículos en el blog.</p>
			<p>Eres el visitante número 0.</p>
		</main>
	</div>
</body>
</html>
