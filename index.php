<?php
$bdd = new PDO('mysql:host=localhost;dbname=tp_crud', "root", "");
$req = $bdd->prepare("SELECT * FROM anime");
$req->execute();
$myAnime = $req->fetchAll(PDO::FETCH_ASSOC);
$req->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/lux.css">
    <link rel="stylesheet" href="./asset/css/style.css">
    <title>Document</title>
</head>

<body>


    <?php include './src/component/navBar.php'; ?>
    <?php include './src/component/modal-connect.php';

    echo connect('./src/component/connexion.php');

    ?>

    <div class="wrapper">
        <h2><strong>Le Big 3</strong></h2>

        <div class="cards">
            <form action="./Pages/showAnime.php" method="post">
                <button type="submit">
                    <figure class="card">
                        <input hidden type="text" name="titre" value="Naruto">
                        <img src="./asset/img/naruto.jpg" />
                        <figcaption class="bg-light text-black">Naruto</figcaption>
                    </figure>
                </button>
            </form>
            <form action="./Pages/showAnime.php" method="post">
                <button type="submit">
                    <figure class="card">
                        <input hidden type="text" name="titre" value="Bleach">
                        <img src="./asset/img/636c448b51ba1bleach.jpg" />
                        <figcaption class="bg-light text-black">Bleach</figcaption>
                    </figure>
                </button>
            </form>
            <form action="./Pages/showAnime.php" method="post">
                <button type="submit">
                    <figure class="card">
                        <input hidden type="text" name="titre" value="One piece">
                        <img src="./asset/img/636c46e8adb4fone-piece.jpg" />
                        <figcaption class="bg-light text-black">One piece</figcaption>
                    </figure>
                </button>
            </form>
        </div>
    </div>

    <div class="wrapper">
        <h2><strong>All Animes</strong></h2>

        <div class="cards">
            <?php foreach ($myAnime as $anime) : ?>

                <form action="./Pages/showAnime.php" method="post">
                    <button type="submit">
                        <figure class="card">
                            <input hidden type="text" name="titre" value="<?= $anime['titre'] ?>">
                            <img src="./asset/img/<?= $anime['img'] ?>" />
                            <figcaption class="bg-light text-black"><?= $anime['titre'] ?></figcaption>
                        </figure>
                    </button>
                </form>

            <?php endforeach; ?>
        </div>
    </div>

    <script src="./asset/js/connect.js"></script>
</body>

</html>