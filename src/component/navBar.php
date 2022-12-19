<?php

session_start();

if (!empty($_SESSION['roleUser'])) {
    if ($_SESSION['roleUser'] == 'admin') {

        $nav = "<li class='nav-item'>
                    <a class='nav-link' href='./Pages/admin/exo7.php'>admin</a>
                </li> 
                <li class='nav-item'>
                    <a class='nav-link' href='./src/component/deco.php'>deco</a>
                </li>";
    } elseif ($_SESSION['roleUser'] == 'user') {
        $nav = "
            <div class='d-flex justify-content-between'>
                <li class='nav-item d-flex w-25'>
                    <a class='nav-link' href='./Pages/mon-compte.php'> ". $_SESSION['username'] ."</a>
                    <div class='w-25 d-flex justify-content-between'>
                        <img class='rounded-circle' width='50' src='./asset/img/".$_SESSION['img_profil']."'>
                    </div>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='./src/component/deco.php'>deco</a>
                </li>
            </div>";    
    }
} else {
    $nav = "<li class='nav-item'>
                    <a class='nav-link' id='connect' href='#'>Connexion</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' id='inscription' href='./src/component/inscription.php'>Inscription</a>
                </li>";
}

?>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="./../../voiranime/index.php">VoirAnime</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="./../../voiranime/index.php">Home
                        <span class="visually-hidden">(current)</span>
                    </a>
                </li>
                <div class="d-flex">
                    <?= $nav ?>
                </div>
            </ul>
            <form class="d-flex" method="GET">
                <input class="form-control me-sm-2" type="search" name="search" placeholder="Search" autocomplete="off">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit" name="envoyer">Search</button>
            </form>
        </div>
    </div>
</nav>

