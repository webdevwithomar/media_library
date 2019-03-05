<!-- page title and includes -->
<?php $pageTitle = 'Home'; ?>
<?php include('inc/functions.php'); ?>
<?php include 'inc/header.php' ?>

<!-- main -->
<div class="container">
    <h1 class="red-text text-lighten-1 center-align">Media Library</h1>
    <p class="center-align flow-text grey-text">
        An online library to explore your favorite books, movies and music
    </p>
    <!-- carousel -->
    <div class="carousel" style="margin-bottom: 100px;">
        <?php
        $random = array_rand($catalog, 4);
        foreach ($random as $id) {
            echo get_random_item($id, $catalog[$id]);
        }
        ?>
    </div>
    <!-- button to see catalog -->
    <div style="margin-bottom: 50px;">
        <a href="catalog.php" class="waves-effect waves-light btn-large red lighten-2">See All</a>
    </div>
</div>

<!-- footer -->
<?php include 'inc/footer.php' ?> 