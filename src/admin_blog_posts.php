<?php
require_once 'lib/class_blog.php';

$blog = new blog;

$lista_posts = $blog -> listaPosts($connect);

include_once 'admin_header.php';
?>

<div class="row">
	<?php include_once 'admin_aside.php'; ?>
	<main class="col-xl-10">
		<header class="row">
			<div class="col-xl-12 control-panel-title">
				<h2>Entradas del blog</h2>
			</div>
		</header>
	
		<article class="row justify-content-center">
			<section class="col-12">
				<ul class="control-panel-buttons-bar">
					<li><a href="/adm/blog-post-new">Crear entrada</a></li>
				</ul>
			</section>

			<section class="col-12 control-panel-section">
				<table class="control-panel-table">
					<thead>
						<th colspan="3">ACCIONES</th>
						<th>ID</th>
						<th>TÍTULO</th>
						<th>PERMALINK</th>
						<th>FECHA DE PUBLICACIÓN</th>
						<th>AUTOR</th>
						<th>CATEGORÍAS</th>
						<th>ETIQUETAS</th>
						<th>EXTRACTO</th>
						<th>VISTAS</th>
						<th>COMENTARIOS</th>
						<th>ESTADO</th>
					</thead>
					<tbody>
						<?php
						if (isset($lista_posts)) {
							foreach ($lista_posts as $post) {
								echo '<tr>
								<td><a href="" title="Ver entrada"><span class="fas fa-eye"></span></a></td>
								<td><a href="" title="Editar entrada"><span class="fas fa-pencil-alt"></span></a></td>
								<td><a href="" title="Eliminar entrada"><span class="fas fa-eraser"></span></a></td>
								<td>'.$post['id_post'].'</td>
								<td><a href="">'.$post['title'].'</a></td>
								<td>'.$post['permalink'].'</td>
								<td>'.$post['date'].'</td>
								<td>'.$post['author'].'</td>
								<td>Categorías</td>
								<td>Etiquetas</td>
								<td>'.$post['extract'].'</td>
								<td>'.$post['views'].'</td>
								<td>'.$post['comments'].'</td>
								<td>'.$post['status'].'</td>
								</tr>';
							}
						}
						else {
							echo '<td colspan="14">No hay entradas para mostrar.</td>';
						}
						?>
					</tbody>
				</table>
			</section>
		</article>
	</main>
</div>

<?php include_once 'admin_footer.php'; ?>