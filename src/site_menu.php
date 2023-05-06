<?php
if (isset($_SESSION['usr_type'])) {
	if ($_SESSION['usr_type'] === 'Administrador') {
		echo '<ul>
			<li> <a href="/">Inicio</a> </li>
			<li> <a href="/gallery">Galería</a> </li>
			<li> <a href="/tags">Etiquetas</a> </li>
			<li> <a href="/categories">Categorías</a> </li>
			<li> <a href="/blog">Blog</a> </li>
			<li> <a href="/users">Usuario</a> </li>
			<li> <a href="/help">Ayuda</a> </li>
			<li> <a href="/adm">Panel de control</a> </li>
			<li> <a href="/logout">Cerrar sesión</a> </li>
		</ul>';
	}
}
else {
	echo '<ul>
		<li> <a href="/login">Login</a> </li>
		<li> <a href="/gallery">Galería</a> </li>
		<li> <a href="/tags">Etiquetas</a> </li>
		<li> <a href="/categories">Categorías</a> </li>
		<li> <a href="/blog">Blog</a> </li>
		<li> <a href="/help">Ayuda</a> </li>
	</ul>';
}
?>