<?php
require_once '../connect.php';
require_once 'class_upload.php';

session_start();

$upload = new upload;

if (isset($_POST['action'])) {
	if ($_POST['action'] == 'Upload file') {
		if ($_POST['place'] == 'portfolio') {
			date_default_timezone_set('MST'); // Establece el sistema de horario. MST = Hora Estandar de la Montaña.
			$date = date('Y-m-d H:i:s');

			$uploaded_file_load = 'true';
			$uploaded_file_name = $_FILES['file']['name'];// Obtiene nombre del archivo subido.
			$uploaded_file_dimensions = getimagesize($_FILES['file']['tmp_name']);// Obtiene las dimensiones de ancho y alto de la imagen a partir del archivo temporal subido.
			$uploaded_file_size = $_FILES['file']['size'];// Obtiene el tamaño en bytes del archivo temporal subido.
			$uploaded_file_type = $_FILES['file']['type'];// Obtiene el tipo de archivo desde el archivo temporal subido.
			$uploaded_file_hash = hash('sha512',($_FILES['file']['tmp_name']));// Obtiene hash SHA512 del archivo subido.
			$uploaded_file_restriction = $_POST['restriction'];// Recibe el tipo de restricción que se aplica a la imagen.

			//$usr_id = $up -> usr_id($connect, $usuario);//Se obtiene el ID del usuario.
			$count_images_by_hash = $upload -> countImagesByHash($connect, $uploaded_file_hash);// Cuenta la cantidad de registros que tengan el mismo hash SHA512.

			// Si $contar vale 0, comienza el proceso de subida del archivo.
			if($count_images_by_hash == 0){
				// Si el archivo subido, supera los 128 MB, despliega mensaje de error.
				if ($uploaded_file_size > 128000000){
					$msg = "El archivo es mayor que 128MB, debes reducir su tamaño antes de subirlo.";
					$uploaded_file_load = "false";// Esta variable cambia a falso para evitar que la condición de más adelante se cumpla y se suba el archivo.
				}

				// Si el tipo del archivo subido, no coincide con los formatos aceptados, salta el mensaje de error.
				if (!($uploaded_file_type == "image/jpeg" || $uploaded_file_type == "image/png")){
					$msg = "El archivo tiene que ser JPG o PNG. Otros tipos de archivo no son permitidos.";
					$uploaded_file_load = "false";// Esta variable cambia a falso para evitar que la condición de más adelante se cumpla y se suba el archivo.
				}

				//Si $uploaded_file_load es verdadera, se procede a subir la imagen.
				if($uploaded_file_load == "true"){
					$uploaded_file_extension = $upload -> fileExtension($uploaded_file_type);
					$file_name = $uploaded_file_hash.'.'.$uploaded_file_extension;// Nombre del fichero que se guardará en el almacenamiento del servidor.
					$thumbnail = 'thumb_'.$uploaded_file_hash.'.jpg';//Nombre que tendrán el thumbnail y la vista media de la imagen al ser convertida por ImageMagick.
					$medium_image = 'medium_'.$uploaded_file_hash.'.jpg';

					$dir = $upload -> letras($uploaded_file_hash);//Determina el directorio en el que se guardarán las imágenes.
					$dir_img = '../storage/'.$dir;//Dirección donde se guardarán las imágenes procesadas.
					$add = $dir_img.'/'.$file_name;//Dirección de disco duro donde se guardará la imagen procesada.

					//Si la carpeta de destino de la imagen no existe, se crea para alojarla.
					if (!file_exists($dir_img)){
						mkdir($dir_img, 0777, true);//Crea la carpeta.
					}

					if(move_uploaded_file($_FILES['file']['tmp_name'], $add)){
						passthru("/usr/bin/convert -thumbnail 1500x1500 -background white -alpha remove -alpha off -quality 80 $add $dir_img/$medium_image");// Crea una vista de tamaño medio (1500x1500) de la imagen subida usando ImageMagick.
						passthru("/usr/bin/convert -thumbnail 500x500 -background white -alpha remove -alpha off -quality 80 $add $dir_img/$thumbnail");// Crea el thumbnail (500x500) de la imagen subida usando ImageMagick.

						$msg = $upload -> registerImageInDataBase($connect, $uploaded_file_name, $uploaded_file_extension, $uploaded_file_size, $uploaded_file_dimensions[0], $uploaded_file_dimensions[1], $uploaded_file_hash, $dir_img, $_SESSION['id_usr'], $uploaded_file_restriction);//Registra los datos de la imagen en la base de datos.
						$contar = $upload -> countImages($connect);//Cuenta las imágenes registradas en la base de datos.
						$UsrImg = $upload -> userImages($connect, $_SESSION['id_usr']);//Cuenta las imágenes que ha subido el usuario.
						$upload -> userRegisteredImages($connect, $UsrImg, $_SESSION['id_usr']);//Actualiza el número de imágenes que ha subido el usuario

						mysqli_close($connect);// Cierra la conexión con la base de datos.
						header('location: /admin/upload_file.php');// Regresa al formulario de subida de archivos.
					}
					else{
						echo 'No se pudo subir el archivo.';
						// echo "
						// <script type='text/javascript'>
						// alert('ERROR: No se pudo subir el archivo.');
						// location.href = '/admin/upload_file.php';
						// </script>
						// ";
					}
				}
				else{
					echo $msg;// Si la subida de archivo no ha ido bien, despliega el mensaje.
				}
			}
			// Si $contar es diferente de 0, cancela el proceso de subida y despliega el mensaje.
			else{
				echo '<script type="text/javascript">
				alert("ERROR:\n\nEl hash de esta imagen ('.$uploaded_file_hash.')\ncoincide con el de una ya existente.\n\nEs posible que sea la misma.");
				location.href = "/admin/upload_file.php";
				</script>';
			}
			mysqli_close($connect);//Cierra la conexión con la base de datos.
		}
		elseif ($_POST['place'] == 'multimedia') {
			
		}
		else {
			$_SESSION['msg'] = 'Ha intentado utilizar una opción no válida.';
			header('location: /admin/upload_file.php');	
		}
		
	} else {
		$_SESSION['msg'] = 'Ha sido redirigido porque ha intentado acceder a un área no autorizada para usted';
		header('location: /admin/upload_file.php');
	}
	
} else {
	$_SESSION['msg'] = 'Ha intentado subir un archivo no válido.';
	header('location: /admin/upload_file.php');
}

?>