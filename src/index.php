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
	/* GENERAL */
	
	case '/':
		include_once 'front_page.php';
		break;
	
	case '/gallery':
		include_once 'site_gallery.php';
		break;
	
/* 	case '/categories':
		include_once 'site_categories.php';
		break;
	
	case '/tags':
		include_once 'site_tags.php';
		break;
	
	case '/blog':
		include_once 'site_blog.php';
		break; */
	
	/* CONTROL DE SESION */
	
		case '/login':
		include_once 'login.php';
		break;
	
	case '/logout':
		include_once 'logout.php';
		break;

	/* PANEL DE CONTROL */

	case '/adm':
		include_once 'admin_control_panel.php';
		break;

	case '/adm/upload-file':
		include_once 'admin_upload_file.php';
		break;

	case '/adm/statistics':
		include_once 'admin_statistics.php';
		break;

	case '/adm/blog-posts':
		include_once 'admin_blog_posts.php';
		break;

	case '/adm/blog-categories':
		include_once 'admin_blog_categories.php';
		break;

	case '/adm/blog-tags':
		include_once 'admin_blog_tags.php';
		break;

	case '/adm/portfolio-images':
		include_once 'admin_portfolio_images.php';
		break;

	case '/adm/portfolio-categories':
		include_once 'admin_portfolio_categories.php';
		break;

	case '/adm/portfolio-tags':
		include_once 'admin_portfolio_tags.php';
		break;

	case '/adm/multimedia':
		include_once 'admin_multimedia.php';
		break;

	case '/adm/config':
		include_once 'admin_config.php';
		break;

	case '/adm/users':
		include_once 'admin_users.php';
		break;

	case '/adm/backups':
		include_once 'admin_backups.php';
		break;

	case '/adm/help':
		include_once 'admin_help.php';
		break;

	// INICIO DE SESIÓN
	default:
		include_once 'site_404.php';
		break;
}
?>