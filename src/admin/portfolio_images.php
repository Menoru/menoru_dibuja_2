<?php
require_once 'admin_header.php';
require_once '../lib/class_portfolio.php';

if (empty($_GET['page'])) {
	$page = 1;
}
else {
	$page = $_GET['page'];
}

$portfolio = new portfolio;

$portfolio_images = $portfolio -> portfolioListPagination($connect, $page, $_SESSION['images_per_page']);

include_once 'header.php';
?>

<div class="row">
	<?php include_once 'admin_aside.php'; ?>
	<main class="col-xl-10">
		<header class="row">
			<div class="col-xl-12 control-panel-title">
				<h2>Imágenes del portafolio</h2>
			</div>
		</header>
	
		<article class="row justify-content-center">
			<section class="col-12 control-panel-section">
				<table class="control-panel-table">
					<thead>
						<th colspan="3">ACCIONES</th>
						<th>ID</th>
						<th>IMAGEN</th>
						<th>NOMBRE</th>
						<th>TIPO</th>
						<th>TAMAÑO</th>
						<th>ANCHO</th>
						<th>ALTO</th>
						<th>HASH</th>
						<th>DIRECCIÓN</th>
						<th>SUBIDO POR</th>
						<th>CATEGORÍAS</th>
						<th>ETIQUETAS</th>
						<th>FECHA DE PUBLICACIÓN</th>
						<th>RESTRICCIÓN</th>
						<th>VISTAS</th>
						<th>FAVORITOS</th>
					</thead>
					<tbody>
						<?php
						if (isset($portfolio_images)) {
							foreach ($portfolio_images as $image) {
						echo '<tr>
							<td><a href="/portfolio/'.$image['id_img'].'" title="Ver imagen"><span class="fas fa-eye"></span></a></td>
							<td><a href="/admin/portfolio.php?id_img='.$image['id_img'].'&action=edit" title="Editar imagen"><span class="fas fa-pencil-alt"></span></a></td>
							<td><a href="/admin/portfolio.php?id_img='.$image['id_img'].'&action=delete" title="Eliminar imagen"><span class="fas fa-eraser"></span></a></td>
							<td>'.$image['id_img'].'</td>
							<td><img src="'.$image['directory'].'" alt="'.$image['name'].'"></td>
							<td>'.$image['name'].'</td>
							<td>'.$image['type'].'</td>
							<td>'.$image['size'].'</td>
							<td>'.$image['width'].'</td>
							<td>'.$image['height'].'</td>
							<td>'.$image['hash'].'</td>
							<td>'.$image['directory'].'</td>
							<td>'.$image['user'].'</td>
							<td></td>
							<td></td>
							<td>'.$image['date'].'</td>
							<td>'.$image['restricted'].'</td>
							<td>'.$image['views'].'</td>
							<td>'.$image['favorites'].'</td>
						</tr>';
							}
						}
						else{
							echo '<tr><td colspan="19"><p>No hay imágenes para mostrar.</p></td></tr>';
						}
						?>
					</tbody>
				</table>
			</section>
		</article>
	</main>
</div>

<?php include_once 'footer.php'; ?>