<?php
// require 'connect.php';

session_start();

if (!isset($_SESSION['area'])) { $area = null; }
else { $area = $_SESSION['area']; }

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

$seccion = $_SERVER['REQUEST_URI'];

switch ($seccion) {
  // CASO PARA PÁGINA DE INICIO.
  case '/':
    include_once 'site/front_page.php';
    break;

  // CASOS PARA SITIO WEB.
  case '/gallery':
  case '/gallery/'.$parametro_2:
    include_once 'site/gallery.php';
    break;

  case '/gallery/tag':
  case '/gallery/tag/'.$parametro_3:
    include_once 'site/gallery_by_tag.php';
    break;

  case '/tag_list':
  case '/tag_list/'.$parametro_2:
    include_once 'site/tag_list.php';
    break;

  case '/category_list':
  case '/category_list/'.$parametro_2:
    include_once 'site/category_list.php';
    break;

  case '/blog':
  case '/blog/'.$parametro_2:
    include_once 'site/blog.php';
    break;

  case '/blog/tag':
  case '/blog/tag/'.$parametro_3:
    include_once 'site/blog_tags.php';
    break;

  default:
    include_once '404.php';
    break;
}
?>
