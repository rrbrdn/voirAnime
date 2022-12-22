<?php
$bdd = new PDO('mysql:host=localhost;dbname=tp_crud', "root", "");
$req = $bdd->prepare("SELECT * FROM anime");
$req->execute();
$myAnime = $req->fetchAll(PDO::FETCH_ASSOC);
$req->closeCursor();
$idAnime = $_POST['titre'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta charset="utf8_general_ci">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../asset/css/lux.css">
  <link rel="stylesheet" href="./../asset/css/showAnime.css">
  <title>Document</title>
</head>

<body>

  <?php include './../src/component/navBar.php'; 
   include './../src/component/modal-connect.php';
  echo connect('./../src/component/connexion.php');
  ?>



  <a class="p-3 text-white" href="./../../voiranime/index.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
    </svg>
  </a>


  <div class="container">
    <?php
    foreach ($myAnime as $anime) {
      if ($anime['titre'] == $idAnime) {
    ?>
        <div class='p-3'>
          <h4><?= $anime['titre'] ?></h4>
          <p><?= $anime['descri'] ?></p>

          <?php require_once "./../src/component/showAnime-component.php"?>
        <?= $btn ?>
        </div>
        <div class='d-flex justify-content-center p-3'>

          <iframe class="col-lg-12" width="1100" height="430" src="<?= $anime['video'] ?>" . $video . frameborder="0" allowfullscreen></iframe>

        </div>
    <?php
      }
    } ?>
  </div>


  <script src="https://vjs.zencdn.net/7.20.3/video.min.js"></script>
  <script src="./../asset/js/connect.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>

</html>