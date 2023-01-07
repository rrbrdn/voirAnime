<?php
$id_anime = $_GET['id_anime'];
$bdd = new PDO('mysql:host=localhost;dbname=tp_crud', "root", "");
$req = $bdd->prepare("SELECT * FROM anime WHERE id = :id");
$req->bindValue(":id", $id_anime, PDO::PARAM_INT);
$req->execute();
$myAnime = $req->fetchAll(PDO::FETCH_ASSOC);
$req->closeCursor();

$req = "SELECT * FROM user INNER JOIN comment ON user.id = comment.user_id INNER JOIN anime ON anime.id = comment.id_anime WHERE anime.id = :id_anime ORDER BY comment.id DESC";

$stmt = $bdd->prepare($req);
$stmt->bindValue(":id_anime", $id_anime, PDO::PARAM_INT);
$result = $stmt->execute();
$myComment = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();

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

  <?php require_once "./../src/component/comment.php";
  include './../src/component/navBar.php';
  include './../src/component/modal-connect.php';
  echo connect('./../src/component/connexion.php');
  ?>
  
  <div class="container">
    <?php foreach ($myAnime as $anime) : ?>
      <div class='p-3 text-white'>
        <h4 class="text-white"><?= $anime['titre'] ?></h4>
        <p><?= $anime['descri'] ?></p>

        <?php require_once "./../src/component/showAnime-component.php" ?>
        <?= $btn ?>
      </div>
      <div class='d-flex justify-content-center p-3'>

        <iframe class="col-lg-12" width="1100" height="430" src="<?= $anime['video'] ?>" . $video . frameborder="0" allowfullscreen></iframe>

      </div>
    <?php endforeach; ?>
  </div>

  <div class="container mt-5">
    <h4 class="text-white">Laisser un commentaire</h4>
    <form action="./../src/component/comment.php" method="post" class="w-50">
      <div class="form-group ">
        <textarea name="comment" class="form-control" id="exampleTextarea" rows="3" style="height: 92px;"></textarea>
        <input hidden type="text" name="id_anime" value="<?= $id_anime ?>">
      </div>
      <div class="d-flex justify-content-end mt-4">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>

  <?php if (isset($_SESSION['id'])) : ?>

    <h4 class='text-white container'>Commentaires</h4>

    <?php foreach ($myComment as $comment) : ?>
      <div class="container">
        <div class="toast show mt-5 w-50" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <img class='rounded-circle' width='50' src=./../asset/img/<?= $comment['img_profil'] ?>><strong class="me-auto ms-2"><?= $comment['username'] ?></strong>
            <small>11 mins ago</small>
          </div>
          <div class="toast-body">
            <?= $comment['comment'] ?>
          </div>
        </div>
      </div>

  <?php endforeach;
  endif; ?>





  <script src="https://vjs.zencdn.net/7.20.3/video.min.js"></script>
  <script src="./../asset/js/connect.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
  </script>
</body>

</html>