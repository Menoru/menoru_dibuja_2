<?php include_once 'header.php'; ?>

<div class="row">
	<?php include_once 'admin_aside.php'; ?>
	<main class="col-xl-10">
		<header class="row">
			<div class="col-xl-12 control-panel-title">
				<h2>Categorías del blog</h2>
			</div>
		</header>
	
		<article class="row justify-content-center">
			<section class="col-12 control-panel-section">
				<table class="control-panel-table">
					<thead>
						<th colspan="3">ACCIONES</th>
						<th>ID</th>
						<th>CATEGORIA</th>
						<th>PERMALINK</th>
						<th>ENTRADAS</th>
					</thead>
					<tbody>
						<tr>
							<td><a href="" title="Ver entrada"><span class="fas fa-eye"></span></a></td>
							<td><a href="" title="Editar entrada"><span class="fas fa-pencil-alt"></span></a></td>
							<td><a href="" title="Eliminar entrada"><span class="fas fa-eraser"></span></a></td>
							<td>1</td>
							<td><a href="">General</a></td>
							<td>general</td>
							<td>5</td>
						</tr>
						<tr>
							<td><a href="" title="Ver entrada"><span class="fas fa-eye"></span></a></td>
							<td><a href="" title="Editar entrada"><span class="fas fa-pencil-alt"></span></a></td>
							<td><a href="" title="Eliminar entrada"><span class="fas fa-eraser"></span></a></td>
							<td>1</td>
							<td><a href="">Fanart</a></td>
							<td>fanart</td>
							<td>2</td>
						</tr>
					</tbody>
				</table>
			</section>
		</article>
	</main>
</div>

<?php include_once 'footer.php'; ?>