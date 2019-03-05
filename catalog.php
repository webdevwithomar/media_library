<!-- conditionals for each page titles -->
<?php
if (isset($_GET["cat"])) {
  if ($_GET["cat"] == 'books') {
    $pageTitle = 'Books';
  } else if ($_GET["cat"] == 'movies') {
    $pageTitle = 'Movies';
  } else if ($_GET["cat"] == 'music') {
    $pageTitle = 'Music';
  }
} else {
  $pageTitle = 'Catalog';
}
?>

<!-- includes -->
<?php include('inc/data.php'); ?>
<?php include('inc/functions.php'); ?>
<?php include('inc/header.php'); ?>

<!-- page container -->
<div class="container">
    <!-- conditionals to print according to the query string (?cat='books') -->
    <?php
    if (isset($_GET["cat"])) {
      if ($_GET["cat"] == 'books') {
        get_items('books');
      } else if ($_GET["cat"] == 'movies') {
        get_items('movies');
      } else if ($_GET["cat"] == 'music') {
        get_items('music');
      }
    } else {
      $pageTitle = 'Catalog';
      $category_names = [];
      foreach ($catalog as $item) {
        $category_names[] = $item['category'];
      }
      $unique_names = array_unique($category_names);
      foreach ($unique_names as $id => $heading) {
        echo "
            <div class='row'>
            <h2 class='red-text text-lighten-2'>$heading</h1>";
        foreach ($catalog as $id => $item) {
          if (strtolower($heading) == strtolower($item['category'])) {
            echo "
                <div class='col s12 m6 l3'>
                  <a href='details.php?id=" . $id . "'><div class='card'>
                    <div class='card-image'>
                      <img src='$item[img]'>
                    </div>
                  </div></a>
                </div>";
          }
        }
        echo "</div>";
      }
    }
    ?>
</div>

<!-- footer -->
<?php include('inc/footer.php'); ?> 