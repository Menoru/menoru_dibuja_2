<?php include_once 'admin_header.php'; ?>

<div class="row">
	<?php include_once 'admin_aside.php'; ?>
	<main class="col-xl-10">
		<header class="row">
			<div class="col-xl-12 control-panel-title">
				<h2>Multimedia</h2>
			</div>
		</header>
	
		<article class="row justify-content-center">
			<section class="col-12 control-panel-section">
				<table class="control-panel-table">
					<thead>
						<th colspan="3">ACCIONES</th>
						<th>ID</th>
						<th>NOMBRE</th>
						<th>TIPO</th>
						<th>FECHA DE INGRESO</th>
						<th>ÚLTIMO INGRESO</th>
						<th>VISITAS</th>
						<th>IMÁGENES</th>
						<th>IMÁGENES POR PÁGINA</th>
						<th>COMENTARIOS</th>
						<th>FAVORITOS</th>
						<th>AVATAR</th>
					</thead>
					<tbody>
						<tr>
						<td><a href="" title="Ver elemento multimedia"><span class="fas fa-eye"></span></a></td>
							<td><a href="" title="Editar elemento multimedia"><span class="fas fa-pencil-alt"></span></a></td>
							<td><a href="" title="Eliminar elemento multimedia"><span class="fas fa-eraser"></span></a></td>
							<td>1</td>
							<td>Manuel</td>
							<td>Administrador</td>
							<td>2020-12-16</td>
							<td>2022-09-17</td>
							<td>255</td>
							<td>78</td>
							<td>36</td>
							<td>70</td>
							<td>62</td>
							<td><img src="/uploads/avatars/manuel/manuel.png" alt="avatar-manuel" /></td>
						</tr>
					</tbody>
				</table>
			</section>
		</article>
	</main>
</div>

<?php include_once 'admin_footer.php'; ?>