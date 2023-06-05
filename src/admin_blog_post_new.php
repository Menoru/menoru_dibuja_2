<?php include_once 'admin_header.php'; ?>

<div class="row">
	<?php include_once 'admin_aside.php'; ?>
	<main class="col-xxl-10 col-xl-10 col-lg-9">
		<header class="row">
			<div class="col-12 control-panel-title">
				<h2>Nueva entrada en el blog</h2>
			</div>
		</header>
		
		<article class="row justify-content-center">
			<div class="col-12">
				<section class="control-panel-section">
					<form class="row" action="" method="post">
						<div class="col-12">
							<input type="text" name="titulo" id="titulo" placeholder="Título aquí">
						</div>

						<div class="col-12 mt-4">
							<textarea id="summernote"></textarea>
						</div>
						
						<div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-12 mt-4">
							<h5>Estado de publicación</h5>
							<select name="estado_publicacion" id="estado_publicacion">
								<option value=""></option>
								<option value="Público">Público</option>
								<option value="Privado">Privado</option>
								<option value="Borrador">Borrador</option>
								<option value="Programado">Programado</option>
							</select>
						</div>
						
						<div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-12 mt-4">
							<h5>Fecha de creación</h5>
							<input type="date" name="fecha_creacion" id="fecha_creacion">
							<input type="time" name="hora_creacion" id="hora_creacion">
						</div>
						
						<div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-12 mt-4">
							<h5>Fecha publicación</h5>
							<input type="date" name="fecha_publicacion" id="fecha_publicacion">
							<input type="time" name="hora_publicacion" id="hora_publicacion">
						</div>
						
						<div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-12 mt-4">
							<h5>Categorías</h5>
							<input type="text" name="categorias" id="categorias">
						</div>
						
						<div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-12 mt-4">
							<h5>Etiquetas</h5>
							<input type="text" name="etiquetas" id="etiquetas">
						</div>
						
						<div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-12 mt-4">
							<input type="submit" value="Publicar">
						</div>
					</form>
				</section>
			</div>
		</article>
	</main>
</div>

<script>
	$(document).ready(function() {
		$('#summernote').summernote();
	});
</script>
<?php include_once 'admin_footer.php'; ?>