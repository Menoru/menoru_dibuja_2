<?php
/**
 * Este fichero solo contiene los casos para las secciones dentro del sitio
 * principal, las cuales utilizan el estilo de URL amigables para facilitar
 * la navegación al usuario que visite el sitio web.
 * 
 * El panel de control se rige mediante enlaces a los ficheros PHP
 * correspondientes, y utiliza URL no amigables para su navegación.
*/

require 'connect.php';

session_start();

// Separa la URI en un arreglo utilizando las diagonales (/) como separador.
$aux = substr($_SERVER['REQUEST_URI'], strlen('/'));
if( substr($aux, -1) == '/'){ $aux = substr($aux, 0, -1); }
$url_array = explode('/', $aux);

// VALORES A UTILIZAR.
if (isset($url_array[0])) { $parametro_1 = $url_array[0]; }
else { $parametro_1 = null; }

if (isset($url_array[1])) { $parametro_2 = $url_array[1]; }
else { $parametro_2 = null; }

if (isset($url_array[2])) { $parametro_3 = $url_array[2]; }
else { $parametro_3 = null; }

if (isset($url_array[3])) { $parametro_4 = $url_array[3]; }
else { $parametro_4 = null; }

if (isset($url_array[4])) { $parametro_5 = $url_array[4]; }
else { $parametro_5 = null; }

if (isset($url_array[5])) { $parametro_6 = $url_array[5]; }
else { $parametro_6 = null; }

/* URI DE LA SECCIÓN. */
$section = $_SERVER['REQUEST_URI'];
// Sección en la que se encuentra el usuario actualmente.
$_SESSION['section'] = $section;
// Se establece tipo de usuario en caso de ser anónimo.
if (empty($_SESSION['user_type'])) { $_SESSION['user_type'] = 'Anónimo'; }

switch ($section) {
	case '/':
		include_once 'front_page.php';
    break;
	
	case '/login':
		include_once 'login.php';
		break;
	
	case '/logout':
		include_once 'logout.php';
		break;

	case '/adm':
		include_once 'admin_control_panel.php';
		break;

  // INICIO DE SESIÓN
  default:
    include_once 'site/404.php';
    break;
}
?>