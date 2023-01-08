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

if ($result) {
    header('Location: ./../index.php');
}
}

$id_user = $_POST['idUser'];

$req = "SELECT * FROM anime INNER JOIN favoris ON anime.id = favoris.id_anime WHERE id_user = :id";
$stmt = $bdd->prepare($req);
$stmt->bindValue(":id", $id_user, PDO::PARAM_INT);
$result = $stmt->execute();
$myFavoris = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();


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

    <?php 

include './../src/component/navBar.php'; 

// var_dump($_POST);
// var_dump($_SESSION);


?>



    <div class="wrapper">
        <!-- <img src="./../asset/img/<?= $_SESSION['img_profil'] ?>" /> -->
        <h2><strong>Mes favoris</strong></h2>
        <div class="cards">
            <?php foreach ($myFavoris as $favoris) : ?>
            <?php if ($_SESSION['id'] == $_POST['idUser']) { ?>
            <form action="<?= URL ?>./Pages/showAnime.php" method="post">
                <button type="submit">
                    <figure class="card">
                        <input hidden type="text" name="titre" value="<?= $favoris['titre'] ?>">
                        <img src="./../asset/img/<?= $favoris['img'] ?>" />
                    </figure>
                </button>
            </form>

            <form action="./../src/component/delete-favoris.php" method="post" onSubmit="return confirm('êtes-vous certain ?')">
                <input hidden type="text" name="animeID" value="<?= $favoris['id']?>">
                <button class="btn text-light" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x"
                        viewBox="0 0 16 16">
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                </button>
            </form>
            <?php } ?>
            <?php endforeach; ?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>

</html>