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
  <meta charset="utf8_general_ci">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../asset/css/lux.css">
  <!-- <link rel="stylesheet" href="./../asset/css/showAnime.css"> -->
  <link rel="stylesheet" href="./../asset/css/base.css">
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
    // if (!empty($_POST['titre'])) {
    $idAnime = $_POST['titre'];
    foreach ($myAnime as $anime) {
      if ($anime['titre'] == $idAnime) {
    ?>
        <div class='p-3 text-white'>
          <h4 class="text-white"><?= $anime['titre'] ?></h4>
          <p><?= $anime['descri'] ?></p>

          <?php require_once "./../src/component/showAnime-component.php" ?>
          <?= $btn ?>
        </div>
        <div class='d-flex justify-content-center p-3'>

          <iframe class="col-lg-12" width="1100" height="430" src="<?= $anime['video'] ?>" . $video . frameborder="0" allowfullscreen></iframe>

        </div>
    <?php
      }
    }
    // } 
    ?>
  </div>


  <?php
    $bdd = new PDO('mysql:host=localhost;dbname=tp_crud', "root", "");

    $req = "SELECT * FROM comment";
    $stmt = $bdd->prepare($req);
    $result = $stmt->execute();
    $myComment = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

  if (isset($_POST['submit']) && !empty($_POST['comment'])) {


    $user_id = $_SESSION['id'];
    $comment = $_POST['comment'];


    $req = "INSERT INTO comment(comment,user_id) VALUES 
(:comment,:user_id)";

    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":comment", $comment, PDO::PARAM_STR);
    $stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);
    $result = $stmt->execute();
    $stmt->closeCursor();

    var_dump($myComment);
    var_dump($user_id);
  }


  ?>

  <div class="container">
    <h4 class="text-white">Laisser un commentaire</h4>
    <form action="showAnime.php" method="post" class="w-50">
      <div class="form-group ">
        <textarea name="comment" class="form-control" id="exampleTextarea" rows="3" style="height: 92px;"></textarea>
      </div>
      <div class="d-flex justify-content-end mt-4">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>

    <h4 class="text-white">Commentaires</h4>
  </div>
  <?php
  
    foreach ($myComment as $comment) { ?>
      <div class="container">
        <div class="toast show mt-5 w-50" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <img class='rounded-circle' width='50' src=./../asset/img/<?= $_SESSION['img_profil'] ?>><strong class="me-auto ms-2"><?= $_SESSION['username'] ?></strong>
            <small>11 mins ago</small>
          </div>
          <div class="toast-body">
            <?= $comment['comment'] ?>
          </div>
        </div>
      </div>
  <?php } ?>


  <script src="https://vjs.zencdn.net/7.20.3/video.min.js"></script>
  <script src="./../asset/js/connect.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
  </script>
</body>

</html>