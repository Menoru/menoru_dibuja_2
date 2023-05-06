			<footer class="row">
				<div class="col-xl-4"></div>
				<div class="col-xl-4"></div>
				<div class="col-xl-4"></div>
			</footer>
		</div>
	</div>

	<?php
	// En caso que haya un mensaje a pantalla, se despliega el script.
	if (!empty($_SESSION['msg'])) {
		echo '<script>
			alert("'.$_SESSION['msg'].'");
			location.href="/admin/upload_file.php";
		</script>';
	}
	?>
</body>
</html>