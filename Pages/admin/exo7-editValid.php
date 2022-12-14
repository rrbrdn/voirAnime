<?php

$bdd = new PDO('mysql:host=localhost;dbname=tp_crud', "root", "");

$idAnime = $_POST['animeID'];
$titre = $_POST['titre'];
$genre = $_POST['genre'];
$descri = $_POST['descri'];
$video = $_POST['video'];
$img = $_FILES['img'];

$statement = $bdd->prepare("UPDATE anime SET titre = :titre, genre = :genre, descri=:descri, video = :video, img = :img WHERE id = :animeID");
$statement->bindValue(":animeID",$idAnime, PDO::PARAM_INT);
$statement->bindValue(":titre",$titre, PDO::PARAM_STR);
$statement->bindValue(":genre",$genre, PDO::PARAM_STR);
$statement->bindValue(":descri",$descri, PDO::PARAM_STR);
$statement->bindValue(":video",$video, PDO::PARAM_STR);
$statement->bindValue(":img",$img, PDO::PARAM_STR);
$result = $statement->execute();
$statement->closeCursor();

if ($result) {
    header("Location: exo7.php");
}           