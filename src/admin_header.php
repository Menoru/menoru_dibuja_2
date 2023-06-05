<?php if (!isset($_SESSION['usr_type']) === 'Administrador') { header('location: /'); } ?>

<!DOCTYPE html>
<html lang="es-MX">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Menoru dibuja - Panel de control</title>
	<link rel="stylesheet" media="all" href="/css/bootstrap.min.css">
	<link rel="stylesheet" media="all" href="/css/fontawesome.css">
	<link rel="stylesheet" media="all" href="/css/admin_styles.css">
	<?php if($_SERVER['REQUEST_URI'] === '/adm/blog-post-new') :?>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<link href="/summernote/summernote-lite.css" rel="stylesheet">
	<script src="/summernote/summernote-lite.js"></script>
	<?php endif; ?>
</head>

<body>
	<div class="container-fluid">