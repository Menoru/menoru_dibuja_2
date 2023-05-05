<?php
/**
* Este archivo es el encargado de conectar la página web con la base de datos.
*/

define('BD_HOST','localhost');
define('BD_USR','root');
define('BD_PASS','0st3yj49xt');
define('BD_NAME','menoruco_dibuja_2');

$connect = new mysqli(BD_HOST, BD_USR, BD_PASS, BD_NAME);

if ($connect -> connect_errno) {
	echo 'Fallo al conectar a MySQL: ('.$connect -> connect_errno.') '.$mysqli -> connect_error;
	exit;
}
mysqli_query($connect,'SET NAMES "utf8"');
?>