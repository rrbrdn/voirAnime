<?php

session_start();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../asset/css/lux.css">
    <link rel="stylesheet" href="./../asset/css/style.css">
    <link rel="stylesheet" href="./../asset/css/base.css">
    <title>Document</title>
</head>

<body>

    <?php include './../src/component/navBar.php'; ?>

    <div class="wrapper">
        <h2><strong>Mon profil</strong></h2>

        <div class="container mt-5" id="coucou">
            <div class="d-flex">
                <img src="./../asset/img/<?= $_SESSION['img_profil'] ?>" width="150" class="rounded-circle border border-2">
                <div class="d-flex align-items-center ms-3">
                    <h4 class="text-white"><?= $_SESSION['username'] ?></h4>
                </div>
            </div>

            <style>
                #coucou {
                    background-color: RGB(35, 37, 43);
                    color: RGB(244, 117, 33);
                }
            </style>
            <div class="mt-5" id="coucou">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" href="#email" aria-selected="true" role="tab">Changer l'adresse e-mail</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#mdp" aria-selected="false" role="tab" tabindex="-1">Profile</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#supprimer" aria-selected="false" role="tab" tabindex="-1">Supprimer mon profil</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active show" id="email" role="tabpanel">
                        <div class="m-3">
                            <small class="text-white">Adresse e-mail actuelle</small>
                            <p><?= $_SESSION['email'] ?></p>
                        </div>
                        <form action="./../src/component/edit-user.php" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group p-3">
                                    <input type="text" class="form-control bg-transparent border border-2 w-25" name="email">
                                </div>
                                <input hidden type="text" name="idUser" value="<?= $_SESSION['id'] ?>">
                                <hr>
                                <div class="d-flex justify-content-end p-3">
                                    <button type="submit" class="btn btn-primary" name="submit">Edit</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="mdp" role="tabpanel">
                        <p>mdp</p>
                    </div>
                    <div class="tab-pane fade" id="supprimer" role="tabpanel">
                        <form action='./../src/component/delete-compte.php' method='post'>
                            <input hidden name='idUser' value="<?= $_SESSION['id'] ?>">
                            <button class='btn' type='submit'>Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>

</html>