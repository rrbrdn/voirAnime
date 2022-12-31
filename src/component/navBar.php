<?php

session_start();
define("URL","http://localhost/voiranime/");

if (!empty($_SESSION['roleUser'])) {
    if ($_SESSION['roleUser'] == 'admin') {

        $nav = "<li class='nav-item'>
                    <a class='nav-link' href='".URL."./Pages/admin/exo7.php'>admin</a>
                </li> 
                <li class='nav-item'>
                    <a class='nav-link' href='".URL."./src/component/deco.php'>deco</a>
                </li>";
    } elseif ($_SESSION['roleUser'] == 'user') {
        $nav = "
  
        <li class='nav-item dropdown'>
          <a class='nav-link dropdown-toggle' data-bs-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'> 
            <img class='rounded-circle' width='50' src='".URL."./asset/img/".$_SESSION['img_profil']."'></a>
          <div class='dropdown-menu'>
            <form action='".URL."./Pages/mon-compte.php' method='post'>
                <a class='dropdown-item'>Favoris<input hidden name='idUser' value="  . $_SESSION ['id'] .">
                <button class='btn' type='submit'></button>
                </a>
            </form>
            <div class='dropdown-divider'></div>
            <a class='dropdown-item' href='".URL."./src/component/deco.php'>Deconnexion</a>
            <form action='".URL."./src/component/delete-compte.php' method='post'>
            <a class='dropdown-item'>Supprimer<input hidden name='idUser' value=" . $_SESSION ['id'] .">
            <button class='btn' type='submit'></button>
            </a>
        </form>
          </div>
        </li>  
                "; 
    }
} else {
    $nav = "    <li class='nav-item'>
                    <a class='nav-link' id='connect' href='#'>Connexion</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' id='inscription' href='".URL."./src/component/inscription.php'>Inscription</a>
                </li>";
}

?>



<nav class="navbar navbar-expand-lg navbar-dark" id="nav"> 
    <div class="container-fluid">
        <a class="navbar-brand" id="titre" href="./../../voiranime/index.php">VoirAnime</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <?= $nav ?>
            </ul>
            <form class="d-flex" method="POST" action="./index.php">
                <input class="form-control me-sm-2" type="search" name="search" placeholder="Search" autocomplete="off">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit" name="envoyer">Search</button>
            </form>
        </div>
    </div>
</nav>