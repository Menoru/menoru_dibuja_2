<?php
require_once 'admin_header.php';
?>

<!-- MAIN SECTION -->
<main class="admin-front-page">
	<h2>Panel de control</h2>
	<div class="container-fluid">
		<div class="row justify-content-center">
			<section class="col-xl-4">
				<div class="admin-front-page-section">
					<h3>Archivos</h3>
					<ul>
						<li><a href="/adm/upload-file">Subir archivo</a></li>
					</ul>
				</div>
			</section>
			<section class="col-xl-4">
				<div class="admin-front-page-section">
					<h3>Estadística</h3>
					<ul>
						<li><a href="/adm/statistics">Estadística del sitio</a></li>
					</ul>
				</div>
			</section>

			<section class="col-xl-4">
				<div class="admin-front-page-section">
					<h3>Blog</h3>
					<ul>
						<li><a href="/adm/blog-posts">Entradas</a></li>
						<li><a href="/adm/blog-categories">Categorías</a></li>
						<li><a href="/adm/blog-tags">Etiquetas</a></li>
					</ul>
				</div>
			</section>
	
			<section class="col-xl-4">
				<div class="admin-front-page-section">
					<h3>Portafolio</h3>
					<ul>
						<li><a href="/adm/portfolio-images">Imágenes</a></li>
						<li><a href="/adm/portfolio-categories">Categorías</a></li>
						<li><a href="/adm/portfolio-tags">Etiquetas</a></li>
					</ul>
				</div>
			</section>

			<section class="col-xl-4">
				<div class="admin-front-page-section">
					<h3>Multimedia</h3>
					<ul>
						<li><a href="/adm/multimedia">Multimedia</a></li>
					</ul>
				</div>
			</section>
	
			<section class="col-xl-4">
				<div class="admin-front-page-section">
					<h3>Configuración</h3>
					<ul>
						<li><a href="/adm/users">Usuarios</a></li>
						<li><a href="/adm/backups">Respaldos</a></li>
						<li><a href="/adm/help">Ayuda</a></li>
					</ul>
				</div>
			</section>
		</div>
	</div>
</main>

<?php include_once 'admin_footer.php'; ?>