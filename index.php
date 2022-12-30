<?php
$bdd = new PDO('mysql:host=localhost;dbname=tp_crud', "root", "");
$req = $bdd->prepare("SELECT * FROM anime");
$req->execute();
$myAnime = $req->fetchAll(PDO::FETCH_ASSOC);
$req->closeCursor();




$req = $bdd->prepare("SELECT * FROM anime WHERE id IN (1,48,49)");
$req->execute();
$bigs3 = $req->fetchAll(PDO::FETCH_ASSOC);
$req->closeCursor();


// //////////////////////////////////////////////////





?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./asset/css/lux.css">
  <link rel="stylesheet" href="./asset/css/style.css">
  <link rel="stylesheet" href="./asset/css/background.css">
  <title>Document</title>
</head>

<body>


  <?php 

    include './src/component/navBar.php'; 
    include './src/component/modal-connect.php';
    echo connect('./src/component/connexion.php');

?>


  <div class="wrapper">

    <div class="cards">
      <?php 
      if (!empty($_POST['search'])) {
        
        $search = $_POST['search'];


        $sql = "SELECT * FROM anime WHERE titre LIKE :search";
        $stmt = $bdd->prepare($sql);
        $stmt->execute(['search' => "%$search%"]);
        while ($row = $stmt->fetch()) { ?>
     
      <figure class="card">
        <img src="./asset/img/<?=$row['img']?>">
        <?php echo "<figcaption>" . $row['titre'] . "</figcaption>"; ?>
      </figure>
      <?php  }} ?>
    </div>

    <h2><strong>Le big three</strong></h2>
    <p class="text-white ">Le Big 3 (également orthographié Big Three) est une expression employée pour décrire les
      trois séries de manga les plus populaires à l'époque de leur âge d'or, au milieu des années 2000, à savoir
      One Piece, Naruto et Bleach. Ce surnom leur a été attribué en raison de leur immense notoriété planétaire et
      de leur longueur qui a permis de combler le vide laissé par la fin de parution de Dragon Ball et de Slam
      Dunk. Elles ont systématiquement figuré en tête des couvertures partagées du magazine Weekly Shonen Jump et
      ont largement contribué à relancer les ventes de ce dernier. Leurs héros sont leur mascotte attitrée : Luffy
      pour One Piece, Ichigo pour Bleach et Naruto pour l'œuvre du même nom.</p>
    <div class="cards">
      <?php foreach ($bigs3 as $big3) : ?>
      <form action="./Pages/showAnime.php" method="post">
        <button type="submit">
          <figure class="card">
            <input hidden type="text" name="titre" value="<?= $big3['titre'] ?>">
            <img src="./asset/img/<?= $big3['img'] ?>" />
            <figcaption class="bg-light text-black"><?= $big3['titre'] ?></figcaption>
          </figure>
        </button>
      </form>
      <?php endforeach; ?>
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
            <figcaption class="bg-light opacity-75 text-black"><?= $anime['titre'] ?></figcaption>
          </figure>
        </button>
      </form>

      <?php endforeach; ?>
    </div>
  </div>

  <script src="./asset/js/connect.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
  </script>
</body>

</html>