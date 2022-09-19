<?php
require_once 'admin_header.php';
include_once 'header.php';
?>

<!-- MAIN SECTION -->
<main class="admin-front-page">
	<h2>Panel de control</h2>
	<div class="container-fluid">
		<div class="row justify-content-center">
			<section class="col-xl-4">
				<div class="admin-front-page-section">
					<h3>Estadística</h3>
					<ul>
						<li><a href="/admin/statistics.php">Estadística del sitio</a></li>
					</ul>
				</div>
			</section>

			<section class="col-xl-4">
				<div class="admin-front-page-section">
					<h3>Blog</h3>
					<ul>
						<li><a href="/admin/blog_posts.php">Entradas</a></li>
						<li><a href="/admin/blog_categories.php">Categorías</a></li>
						<li><a href="/admin/blog_tags.php">Etiquetas</a></li>
					</ul>
				</div>
			</section>
	
			<section class="col-xl-4">
				<div class="admin-front-page-section">
					<h3>Portafolio</h3>
					<ul>
						<li><a href="/admin/portfolio_images.php">Imágenes</a></li>
						<li><a href="/admin/portfolio_categories.php">Categorías</a></li>
						<li><a href="/admin/portfolio_tags.php">Etiquetas</a></li>
					</ul>
				</div>
			</section>

			<section class="col-xl-4">
				<div class="admin-front-page-section">
					<h3>Multimedia</h3>
					<ul>
						<li><a href="/admin/multimedia.php">Multimedia</a></li>
					</ul>
				</div>
			</section>
	
			<section class="col-xl-4">
				<div class="admin-front-page-section">
					<h3>Configuración</h3>
					<ul>
						<li><a href="/admin/users.php">Usuarios</a></li>
						<li><a href="/admin/backups.php">Respaldos</a></li>
						<li><a href="/admin/help.php">Ayuda</a></li>
					</ul>
				</div>
			</section>
		</div>
	</div>
</main>

<?php include_once 'footer.php'; ?>