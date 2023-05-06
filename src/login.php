<!DOCTYPE html>
<html lang="es-MX">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Menoru dibuja - Login</title>
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/fontawesome.css">
	<link rel="stylesheet" href="/css/site_styles.css">
</head>
<body>
	<header class="page-header">
		<h1><a href="/">Menoru dibuja</a></h1>
	</header>
	<main class="container">
		<section class="row justify-content-center">
			<form class="col-xl-4 forms" action="lib/procesar_login.php" method="post">
				<div class="form-field">
					<label for="user">Usuario:</label><br>
					<input id="user" type="text" name="user" required>
				</div>

				<div class="form-field">
					<label for="password">Contraseña:</label><br>
					<input id="password" type="password" name="password" required>
				</div>

				<div class="form-field">
					<button class="button" type="submit" name="login" value="Iniciar">Iniciar <span class="fas fa-arrow-right"></span></button>
				</div>
			</form>
		</section>
	</main>
</body>
</html>