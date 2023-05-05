<?php
class upload{
	//Obtiene el ID del usuario.
	public function usr_id($conectar, $usuario){
		$query = "SELECT id_usr FROM users WHERE name = '$usuario'";
		$sql = mysqli_query($conectar, $query);
		$row = mysqli_fetch_array($sql);
		return $row['id_usr'];
	}

	//Cuenta la cantidad de registros que tengan el mismo hash MD5.
	public function countImagesByHash($conectar, $uploadedfile_hash){
		$query = "SELECT COUNT(*) AS contar FROM portfolio WHERE hash LIKE '$uploadedfile_hash'";
		$sql = mysqli_query($conectar, $query);
		$row = mysqli_fetch_array($sql);
		return $row['contar'];
	}

	//Agrega la extensión al archivo antes de mandarla al directorio que le corresponda.
	public function renameFileWithHash($uploadedfile_type, $uploadedfile_hash){
		if($uploadedfile_type == 'image/jpeg')
		return $uploadedfile_hash.'.jpg';
		elseif($uploadedfile_type == 'image/')
		return $uploadedfile_hash.'.png';
	}

	//Establece el formato de la imagen antes de agregarla a la base de datos.
	public function fileExtension($type){
		if($type == 'image/jpeg')
		return 'JPEG';
		elseif($type == 'image/png')
		return 'PNG';
	}

	//Obtiene las primeras dos letras del nombre del hash MD5 del archivo para determinar el directorio en el que se guardará.
	public function letras($string){
		for($i=0; $i < strlen($string); $i++){
			$letras = $string[0].$string[1];//Concatena los caracteres extraídos.
		}
		return $letras;
	}

	//Registra la imagen en la base de datos.
	public function registerImageInDataBase($connect, $file_name, $file_extension, $file_size, $file_width, $file_height, $file_hash, $file_directory, $file_user, $file_restricted){
		// $query = "INSERT INTO tab_imagenes (id_img, nombre, ext, tamano, hash, ancho, alto, dir, fecha, usr_id, seguro, visitas) VALUES (NULL,'$nombre', '$ext', $size, '$hash', $ancho, $alto, '$dir', '$fecha', $usr_id, '$seguro', 0)";
		// mysqli_query($conectar, $query) or die('<script>alert("ERROR: No se pudo registrar la imagen en la base de datos."); location.href="/upload/";</script>');
		$connect -> autocommit(false);

		try {
			$connect -> query("INSERT INTO portfolio (id_img, name, type, size, width, height, hash, directory, user, date, restricted, views, favorites) VALUES (null, '$file_name', '$file_extension', '$file_size', '$file_width', '$file_height', '$file_hash', '$file_directory', '$file_user', CURRENT_TIMESTAMP, '$file_restricted' 0, 0)");
			$connect -> commit();
		} catch (exception $e) {
			$connect -> rollback();
    	echo 'La imagen no pudo ser registrada. '.$e."\n";
		}

	}

	//Realiza el conteo de imágenes en la tabla de imágenes para registrar el número obtenido en la tabla de datos generales.
	public function countImages($conectar){
		$query = "SELECT COUNT(*) AS contar FROM portfolio";
		$sql = mysqli_query($conectar, $query);
		$row = mysqli_fetch_array($sql);
		return $row['contar'];
	}

	//Cuenta las imágenes que ha subido el usuario.
	public function userImages($conectar, $usr_id){
		$query = "SELECT images FROM users WHERE id_usr = $usr_id";
		$sql = mysqli_query($conectar, $query);
		$row = mysqli_fetch_array($sql);
		return $row['images'];
	}

	//Actualiza el número de imágenes que ha subido el usuario.
	public function userRegisteredImages($conectar, $UsrImg, $usr_id){
		$query = "UPDATE users SET images = ".($UsrImg+1)." WHERE id_usr = $usr_id";
		mysqli_query($conectar, $query);
	}
}
?>
