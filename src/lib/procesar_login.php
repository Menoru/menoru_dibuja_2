<?php
// Esta sección del fichero solo funcionará cuando la variable global $_POST tenga algún valor.
if (isset($_POST['login'])) {
  require_once '../connect.php';
  include_once 'class_login.php';// Clase para inicio de sesión.
  include_once 'class_crypt.php'; //Cifra la contraseña ingresada por el usuario.

  $login = new login;//Llamada a class_login.php
  $crypt = new crypt;//Llamada a class_crypt.php;

  // Captura de datos enviados desde "login.php" mediante el metodo POST para almacenarlos en variables.
  $user = $_POST['user'];//Almacena el dato "usuario" enviado desde "login.php".
  $password = $_POST['password'];//Almacena el dato "contrasena" enviado desde "login.php".

  // Selecciona datos del usuario desde la tabla "funcionarios".
  $usr_query = $login -> usrQuery($connect, $user);
  $usr_id = $usr_query['id_usr'];
  $usr_name = $usr_query['name'];
  $usr_type = $usr_query['type'];
  $usr_password = $usr_query['password'];
	$usr_signup_date = $usr_query['signup_date'];
	$usr_last_login = $usr_query['last_login'];
	$usr_visits = $usr_query['visits'];
	$usr_images = $usr_query['images'];
	$usr_images_per_page = $usr_query['images_per_page'];
	$usr_comments = $usr_query['comments'];
	$usr_favorites = $usr_query['favorites'];
	$usr_avatar = $usr_query['avatar'];

  // Suma de verificación del nombre dado por el usuario.
  $name_sha = hash('sha512', $user);
  $usr_name_sha = hash('sha512', $usr_name);
  //Se encripta la contraseña ingresada por el usuario.
  $passCrypt = $crypt -> pass($password);
  // Verificación de contraseña del usuario.
  $pass_verificado = $crypt -> passVerify($password, $usr_password);

  // Verificación de nombre de usuario
  if($user_sha === $usr_usuario_sha){
    //Si el usuario es correcto se valida su contraseña.
    if($pass_verificado == 1) {
      //Se crea la sesión.
      session_start();

      //Establecen las variables superglobales para sesion.
      $_SESSION['id_usr'] = $usr_id;
      $_SESSION['name'] = $usr_name;
      $_SESSION['type'] = $usr_type;
      $_SESSION['signup_date'] = $usr_signup_date;
			$_SESSION['last_login'] = $usr_last_login;
			$_SESSION['visits'] = $usr_visits;
			$_SESSION['images'] = $usr_images;
			$_SESSION['images_per_page'] = $usr_images_per_page;
			$_SESSION['comments'] = $usr_comments;
			$_SESSION['favorites'] = $usr_favorites;
			$_SESSION['avatar'] = $usr_avatar;

      // Destrucción de variables $usr_password.
      unset($usr_password);

			if ($usr_type != 'Administrador') {header('location: /');}
			else {header('location: /admin/control_panel.php');}
    }
    else {
      //En caso que la contraseña sea incorrecta se envía el mensaje "¡Contraseña incorrecta!" y redirecciona a login.
      echo '<script>alert("ERROR:\n\n¡Contraseña incorrecta!"); location.href = "/login";</script>';
    }
  }
  else {
    //En caso que el usuario sea incorrecto se envía el mensaje "¡Nombre de usuario incorrecto!" y redirecciona a login.
    echo '<script>alert("ERROR:\n\n¡Nombre de usuario incorrecto!"); location.href = "/login";</script>';
  }

  // Se cierra conexión a base de datos.
  mysqli_close($connect);
}
?>