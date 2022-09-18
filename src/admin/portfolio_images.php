<?php include_once 'header.php'; ?>

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
						<tr>
						<td><a href="" title="Ver imagen"><span class="fas fa-eye"></span></a></td>
							<td><a href="" title="Editar imagen"><span class="fas fa-pencil-alt"></span></a></td>
							<td><a href="" title="Eliminar imagen"><span class="fas fa-eraser"></span></a></td>
							<td>1</td>
							<td><img src="" alt="imagen-1"></td>
							<td>Imagen 1</td>
							<td>JPEG</td>
							<td>2.58MB</td>
							<td>2550</td>
							<td>3300</td>
							<td>d0f4ee4532efadbc876522a2b2ee2ff22d242115f1</td>
							<td>d0</td>
							<td>Manuel</td>
							<td>Categoría 1, Categoría 2</td>
							<td>Etiqueta 1, Etiqueta 2</td>
							<td>2022-08-22</td>
							<td>NO</td>
							<td>55</td>
							<td>9</td>
						</tr>

						<tr>
						<td><a href="" title="Ver entradaimagen><span class="fas fa-eye"></span></a></td>
							<td><a href="" title="Editar imagen"><span class="fas fa-pencil-alt"></span></a></td>
							<td><a href="" title="Eliminar imagen"><span class="fas fa-eraser"></span></a></td>
							<td>2</td>
							<td><img src="" alt="imagen-2"></td>
							<td>Imagen 2</td>
							<td>JPEG</td>
							<td>5.62MB</td>
							<td>3300</td>
							<td>5100</td>
							<td>d0f4ee4532efadbc876522a2b2ee2ff22d242115f1</td>
							<td>d0</td>
							<td>Manuel</td>
							<td>Categoría 1, Categoría 2</td>
							<td>Etiqueta 1, Etiqueta 2</td>
							<td>2022-08-22</td>
							<td>NO</td>
							<td>55</td>
							<td>9</td>
						</tr>
					</tbody>
				</table>
			</section>
		</article>
	</main>
</div>

<?php include_once 'footer.php'; ?>