<?php
// session_start();

unset($_SESSION['id_usr']);
unset($_SESSION['name']);
unset($_SESSION['type']);
unset($_SESSION['signup_date']);
unset($_SESSION['last_login']);
unset($_SESSION['visits']);
unset($_SESSION['images']);
unset($_SESSION['images_per_page']);
unset($_SESSION['comments']);
unset($_SESSION['favorites']);
unset($_SESSION['avatar']);

$_SESSION = array(); // Destruye todas las variables de sesión.

session_destroy(); // Destruye la Sesión
?>

<script type="text/javascript"> window.location = "/"; </script>
