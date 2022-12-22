<?php
$bdd = new PDO('mysql:host=localhost;dbname=tp_crud', "root", "");

if (!empty($_POST['idUser']) && !empty($_POST['idAnime'])) {
    $id_user = $_POST['idUser'];
    $id_anime = $_POST['idAnime'];


$req = "INSERT INTO favoris(id_user,id_anime) VALUES 
(:id_user,
:id_anime)";

$stmt = $bdd->prepare($req);
$stmt->bindValue(":id_user", $id_user, PDO::PARAM_STR);
$stmt->bindValue(":id_anime", $id_anime, PDO::PARAM_STR);
$result = $stmt->execute();
$stmt->closeCursor();

}

$req = $bdd->prepare("SELECT * FROM anime INNER JOIN favoris ON anime.id = favoris.id_anime");
$req->execute();
$myFavoris = $req->fetchAll(PDO::FETCH_ASSOC);
$req->closeCursor();

var_dump($_POST);

?>


 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../asset/css/lux.css">
    <link rel="stylesheet" href="./../asset/css/style.css">
    <title>Document</title>
</head>
<body>

<?php 

include './../src/component/navBar.php'; 
include './../src/component/modal-connect.php';
echo connect('./../src/component/connexion.php');

// var_dump($_POST);

?>



    <div class="wrapper">
        <h2><strong>Mes favoris</strong></h2>
        <div class="cards">
            <?php foreach ($myFavoris as $favoris) : ?>
                <form action="<?= URL ?>./Pages/showAnime.php" method="post">
                    <button type="submit">
                        <figure class="card">
                            <input hidden type="text" name="titre" value="<?= $favoris['titre'] ?>">
                            <img src="./../asset/img/<?= $favoris['img'] ?>" />
                            <figcaption class="bg-light text-black"><?= $favoris['titre'] ?></figcaption>
                        </figure>
                    </button>
                </form>
            <?php endforeach; ?>
        </div>
    </div>

    
    <script src="./../asset/js/connect.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>
</html>