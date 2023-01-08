<?php
session_start();

var_dump($_POST);

$bdd = new PDO('mysql:host=localhost;dbname=tp_crud', "root", "");

// $idAnime = $_POST['animeID'];
$_SESSION['idAnime'] = $_POST['animeID'];

$req = $bdd->prepare("SELECT * FROM anime WHERE id = :animeID");

$req->bindValue('animeID', $_SESSION['idAnime'], PDO::PARAM_INT);
$req->execute();

$anime = $req->fetchAll(PDO::FETCH_ASSOC);

$req->closeCursor();    

var_dump($anime);
var_dump($anime[0]['titre']);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../asset/css/lux.css">
    <title>Document</title>
</head>
<body>
    <div class="container my-5">

        <div class="card border-dark mb-3">

            <div class="card-header d-flex">
                <div class="p-2 flex-grow-1">
                    Anime
                </div>
                <div class="p-2">
                    <a href="./admin.php"><button type="button" class="btn btn-outline-dark btn-sm">back</button></a>
                </div>
            </div>

            <form action="./editValid.php" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="form-group p-3">
                        <input type="text" class="form-control" name="titre" value="<?=$anime[0]['titre']?>">
                    </div>
                    <div class="form-group p-3">
                        <input type="text" class="form-control" name="genre" value="<?=$anime[0]['genre']?>">
                    </div>
                    <div class="form-group p-3">
                        <input type="text" class="form-control" name="descri" value="<?=$anime[0]['descri']?>">
                    </div>
                    <div class="form-group p-3">
                        <input type="text" class="form-control" name="video" value="<?=$anime[0]['video']?>">
                    </div>
                    <div class="form-group p-3">
                        <input class="form-control" type="file" name="img" value="<?=$anime[0]['img']?>">
                    </div>
                        <input hidden type="text" name="animeID" value="<?= $anime[0]['id']?>">
                    <hr>
                    <div class="d-flex justify-content-end p-3">
                        <button type="submit" class="btn btn-primary" name="submit">Edit</button>
                    </div>
                </fieldset>
            </form>
        </div>

    </div>
</body>
</html>