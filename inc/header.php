<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- Compiled and minified CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- navbar -->
    <nav>
        <div class="container">
            <div class="nav-wrapper">
                <a href="index.php" class="brand-logo"><i class="material-icons">local_library</i></a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a href="catalog.php?cat=books"><i class="left material-icons">library_books</i> Books</a>
                    </li>
                    <li>
                        <a href="catalog.php?cat=movies"><i class="left material-icons">movie</i> Movies</a>
                    </li>
                    <li>
                        <a href="catalog.php?cat=music"><i class="left material-icons">library_music</i> Music</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar mobile -->
    <ul class="sidenav" id="mobile-demo">
        <li>
            <a href="sass.html"><i class="left material-icons">library_books</i> Books</a>
        </li>
        <li>
            <a href="badges.html"><i class="left material-icons">movie</i> Movies</a>
        </li>
        <li>
            <a href="collapsible.html"><i class="left material-icons">library_music</i> Music</a>
        </li>
    </ul> 