<?php
 // includes
include('data.php');

// function to print items according to argument
function get_items($name)
{
  $pageTitle = ucfirst($name);
  global $catalog;
  echo "<div class='row'>";
  echo "<h1 class='blue-text text-darken-1'>" . ucfirst($name) . "</h1>";
  foreach ($catalog as $id => $item) {
    if (strtolower($item['category']) == strtolower($name)) {
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

// show random images in index page
function get_random_item($id, $item)
{
  $output = "<a class='carousel-item' href='details.php?id=$id'><img src='" . $item["img"] . "'></a>";
  return $output;
}
