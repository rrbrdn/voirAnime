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
                    <a href="./../../index.php"><button type="button"
                            class="btn btn-outline-dark btn-sm">Back</button></a>
                </div>
                <div class="p-2">
                    <a href="./create.php"><button type="button"
                            class="btn btn-outline-dark btn-sm">Ajouter</button></a>
                </div>
            </div>

            <div class="card-body">
                <div class="row d-flex justify-content-between">

                    <?php foreach ($myAnime as $anime) : ?>
                    <div class="card border-dark mb-3 m-3" style="max-width: 20rem;">
                        <div class="card-header"><?= $anime['genre']?></div>
                        <div class="card-body">
                            <h4 class="card-title"><?= $anime['titre']?></h4>
                            <div class="d-flex justify-content-center">
                                <img src="./../../asset/img/<?=$anime['img']?>" class="w-50">
                            </div>
                        </div>
                        <div class="p-3 d-flex justify-content-between">
                            <form action="./edit.php" method="post">
                                <input hidden type="text" name="animeID" value="<?= $anime['id']?>">
                                <button class="btn" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path
                                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                    </svg>
                                </button>
                            </form>
                            <form action="./delete.php" method="post"
                                onSubmit="return confirm('êtes-vous certain ?')">
                                <input hidden type="text" name="animeID" value="<?= $anime['id']?>">
                                <button class="btn" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path
                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>

        </div>

    </div>
</body>

</html>