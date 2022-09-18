<?php
class login {
	//Se obtienen los datos del usuario que inicia sesión.
	public function usrQuery($connect, $usuario) {
		 $sql = "SELECT * FROM users WHERE name = '$usuario'";
		 $query = mysqli_query($connect, $sql);
		 $row = mysqli_fetch_array($query);

		 return array(
		 	'id_usr' => $row['id_usr'],
		 	'name' => $row['name'],
		 	'type' => $row['type'],
		 	'password' => $row['password'],
		 	'signup_date' => $row['signup_date'],
		 	'last_login' => $row['last_login'],
		 	'visits' => $row['visits'],
		 	'images' => $row['images'],
		 	'images_per_page' => $row['images_per_page'],
		 	'comments' => $row['comments'],
		 	'favorites' => $row['favorites'],
		 	'avatar' => $row['avatar']
		 );
	}
}
?>
