<?php
class blog {
  public function listaPosts($connect) {
    $sql = "SELECT * FROM blog_posts ORDER BY id_post ASC";

    $query = mysqli_query($connect, $sql);

    while ($row = mysqli_fetch_array($query)) {
      $posts[] = array(
        'id_post' => $row['id_post'],
        'title' => $row['title'],
        'permalink' => $row['permalink'],
        'date' => $row['date'],
        'author' => $row['author'],
        'text' => $row['text'],
        'extract' => $row['extract'],
        'views' => $row['views'],
        'comments' => $row['comments'],
        'status' => $row['status']
      );
    }

    if (isset($posts)) { return $posts; }
    else { return null; }
  }
}

?>