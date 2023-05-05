<?php include_once 'header.php'; ?>

<div class="row">
	<?php include_once 'admin_aside.php'; ?>
	<main class="col-xl-10">
		<header class="row">
			<div class="col-xl-12 control-panel-title">
				<h2>Categorías del portafolio</h2>
			</div>
		</header>
	
		<article class="row justify-content-center">
			<section class="col-12 control-panel-section">
				<table class="control-panel-table">
					<thead>
						<th colspan="2">ACCIONES</th>
						<th>ID</th>
						<th>CATEGORÍA</th>
						<th>PERMALINK</th>
						<th>COLOR</th>
						<th>ETIQUETAS</th>
					</thead>
					<tbody>
						<tr>
							<td><ahref="" title="Editar categoría"><span class="fas fa-pencil-alt"></span></a></td>
							<td><a href="" title="Eliminar categoría"><span class="fas fa-eraser"></span></a></td> 
							<td>1</td>
							<td>General</td>
							<td>general</td>
							<td>#C0C0C0</td>
							<td>0</td>
						</tr>

						<tr>
						<td><a href="" title="Editar categoría"><span class="fas fa-pencil-alt"></span></a></td>
							<td><a href="" title="Eliminar categoría"><span class="fas fa-eraser"></span></a></td>
							<td>2</td>
							<td>Franquicia</td>
							<td>franquicia</td>
							<td>#FF0000</td>
							<td>0</td>
						</tr>

						<tr>
						<td><a href="" title="Editar categoría"><span class="fas fa-pencil-alt"></span></a></td>
							<td><a href="" title="Eliminar categoría"><span class="fas fa-eraser"></span></a></td>
							<td>3</td>
							<td>Personaje</td>
							<td>personaje</td>
							<td>#00C000</td>
							<td>0</td>
						</tr>
					</tbody>
				</table>
			</section>
		</article>
	</main>
</div>

<?php include_once 'footer.php'; ?>