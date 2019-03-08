<?php include('inc/data.php'); ?>
<?php
foreach ($catalog as $id => $item) {
  if ($_GET['id'] == $id) {
    $pageTitle = $item['title'];
  }
}
?>
<?php include('inc/header.php'); ?>
<div class="container">
    <?php
    if (isset($_GET['id'])) {
      foreach ($catalog as $id => $item) {
        if ($_GET['id'] == $id) {
          echo "
          <div>
            <a class='breadcrumb' href='catalog.php'>Catalog</a>
            <a class='breadcrumb' href='catalog.php?cat=" . strtolower($item['category']) . "'>" . $item['category'] . "</a>
            <a class='breadcrumb'>" . $item['title'] . "</a>
          </div>";
          echo "<h1 class='blue-text text-darken-1'>" . $item['title'] . "</h1>";
          echo "
      <div class='row'>
        <div class='col s12 l6'>
            <img class='responsive-img' src='" . $item['img'] . "' alt='" . $item['title'] . "'>
        </div>
        <div class='col s12 l6'>
            <h5 class='grey-text text-darken-1'>Genre: <span class='blue-text text-darken-1'>" . $item['genre'] . "</span></h5>
            <h5 class='grey-text text-darken-1'>Format: <span class='blue-text text-darken-1'>" . $item['format'] . "</span></h5>
            <h5 class='grey-text text-darken-1'>Year: <span class='blue-text text-darken-1'>" . $item['year'] . "</span></h5>
            <h5 class='grey-text text-darken-1'>Category: <span class='blue-text text-darken-1'>" . $item['category'] . "</span></h5>";
          if (strtolower($item['category']) == strtolower('books')) {
            echo "
              <h5 class='grey-text text-darken-1'>Authors: <span class='blue-text text-darken-1'>" . implode(', ', $item['authors']) . "</span></h5>
              <h5 class='grey-text text-darken-1'>Publisher: <span class='blue-text text-darken-1'>" . $item['publisher'] . "</span></h5>
              <h5 class='grey-text text-darken-1'>ISBN: <span class='blue-text text-darken-1'>" . $item['isbn'] . "</span></h5>
              ";
          } else if (strtolower($item['category']) == strtolower('movies')) {
            echo "
              <h5 class='grey-text text-darken-1'>Director: <span class='blue-text text-darken-1'>" . $item['director'] . "</span></h5>
              <h5 class='grey-text text-darken-1'>Writers: <span class='blue-text text-darken-1'>" . implode(', ', $item['writers']) . "</span></h5>
              <h5 class='grey-text text-darken-1'>Stars: <span class='blue-text text-darken-1'>" . implode(', ', $item['stars']) . "</span></h5>
              ";
          } else if (strtolower($item['category']) == strtolower('music')) {
            echo "
              <h5 class='grey-text text-darken-1'>Artist: <span class='blue-text text-darken-1'>" . $item['artist'] . "</span></h5>
              ";
          }
          echo "</div></div>";
        }
      }
    } else {
      header('location: catalog.php');
    }
    ?>
</div>
<?php include('inc/footer.php'); ?> 