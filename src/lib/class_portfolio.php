<?php
/**
 * En esta clase se llevan a cabo todas las operaciones concernientes al
 * portafolio de imágenes.
 */

class portfolio {
	// Lista de imágenes en el portafolio con paginación.
	public function portfolioListPagination($connect, $page, $images_per_page) {
		$sql = "SELECT * FROM portfolio ORDER BY id_img ASC LIMIT ".($page-1)*$images_per_page.",$images_per_page";
		$query = mysqli_query($connect, $sql);
		while ($row = mysqli_fetch_array($query)) {
			$portfolio[] = array(
				'id_img' => $row['id_img'],
				'name' => $row['name'],
				'type' => $row['type'],
				'size' => $row['size'],
				'width' => $row['width'],
				'height' => $row['height'],
				'hash' => $row['hash'],
				'directory' => $row['directory'],
				'user' => $row['user'],
				'date' => $row['date'],
				'restricted' => $row['restricted'],
				'views' => $row['views'],
				'favorites' => $row['favorites']
			);
		}

		if (!empty($portfolio)) {return $portfolio;}
		else {return null;}
	}
}
?>