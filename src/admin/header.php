<?php
require_once '../connect.php';

session_start();

if (empty($_SESSION['type']) || $_SESSION['type'] != 'Administrador') {header('location: /');}
?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Menoru dibuja - Panel de control</title>
	<link rel="stylesheet" media="all" href="/css/bootstrap.min.css">
	<link rel="stylesheet" media="all" href="/css/fontawesome.css">
	<link rel="stylesheet" media="all" href="/admin/css/styles.css">
</head>

<body>
	<div class="container-fluid">
		<header class="row admin-header">
			<div class="col-xl-12">
				<h1><a href="/">Menoru dibuja</a></h1>
			</div>
		</header>
