<?php
require_once 'admin_header.php';
require_once 'header.php';
?>

<div class="row">
	<?php include_once 'admin_aside.php'; ?>
	<main class="col-xl-10">
		<header class="row">
			<div class="col-xl-12 control-panel-title">
				<h2>Categorías del blog</h2>
			</div>
		</header>
	
		<article class="row justify-content-center">
			<section class="col-4 control-panel-section">
				<form enctype="multipart/form-data" action="../lib/process_file.php" method="post">
					<div class="form-field">
						<label for="file">Archivo:</label><br>
						<input type="file" name="file" id="file" required>
					</div>

					<div class="form-field">
						<p>El archivo será utilizado en:</p>
						<input type="radio" name="place" id="portfolio" value="portfolio" required>
						<label for="portfolio">Portafolio</label> &nbsp;&nbsp;&nbsp;
						<input type="radio" name="place" id="multimedia" value="multimedia" required>
						<label for="multimedia">Multimedia</label>
					</div>

					<div class="form-field">
						<select name="restriction" id="restriction" required>
							<option value=""></option>
							<option value="Borrador">Borrador</option>
							<option value="Público">Público</option>
							<option value="Privado">Privado</option>
							<option value="Restringido">Restringido</option>
						</select>
					</div>

					<div class="form-field">
						<button class="control-panel-button" type="submit" name="action" value="Upload file"><span class="fas fa-arrow-up"></span> Subir archivo</button>
					</div>
				</form>
			</section>
		</article>
	</main>
</div>

<?php
require_once 'footer.php';
?>