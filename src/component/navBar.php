<?php

define("URL", "http://localhost/voiranime/");

if (!empty($_SESSION['roleUser'])) {
    if ($_SESSION['roleUser'] == 'admin') {

        $nav = "<li class='nav-item'>
                    <a class='nav-link' href='" . URL . "./Pages/admin/admin.php'>admin</a>
                </li> 
                <li class='nav-item'>
                    <a class='nav-link' href='" . URL . "./src/component/deco.php'>deco</a>
                </li>";
    } elseif ($_SESSION['roleUser'] == 'user') {
        $nav = "
  
        <li class='nav-item dropdown'>
          <a class='nav-link dropdown-toggle' data-bs-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'> 
            <img class='rounded-circle' width='50' src='" . URL . "./asset/img/" . $_SESSION['img_profil'] . "'></a>
            <div class='dropdown-menu'>
                <a class='dropdown-item d-flex align-items-center' href='" . URL . "./Pages/ma-collection.php?idUser=".$_SESSION['id']."'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-bookmark me-2' viewBox='0 0 16 16'>
                <path d='M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z'/>
              </svg>Ma collection</a>
                <a class='dropdown-item d-flex align-items-center' href='" . URL . "./Pages/mon-profil.php?idUser=".$_SESSION['id']."'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person me-2' viewBox='0 0 16 16'>
                <path d='M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z'/>
              </svg>Mon profil</a>
            <div class='dropdown-divider'></div>
            <a class='dropdown-item' href='" . URL . "./src/component/deco.php'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-box-arrow-right me-2' viewBox='0 0 16 16'>
            <path fill-rule='evenodd' d='M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z'/>
            <path fill-rule='evenodd' d='M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z'/>
          </svg>Se déconnecter</a>
            <form action='" . URL . "./src/component/delete-compte.php' method='post'>
            <a class='dropdown-item'>Supprimer<input hidden name='idUser' value=" . $_SESSION['id'] . ">
            <button class='btn' type='submit'></button>
            </a>
        </form>
          </div>
        </li>  
                ";
    }
} else {
    $nav = "    <li class='nav-item'>
                    <a class='nav-link' href='" . URL . "./src/component/login.php'>Connexion</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='" . URL . "./src/component/inscription.php'>Inscription</a>
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
        </div>
    </div>
</nav>