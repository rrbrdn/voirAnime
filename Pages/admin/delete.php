<?php

var_dump($_POST);

$bdd = new PDO('mysql:host=localhost;dbname=tp_crud', "root", "");

$idAnime = $_POST['animeID'];

$req = "DELETE FROM anime WHERE id = :id";
$stmt = $bdd->prepare($req);
$stmt->bindValue(":id", $idAnime, PDO::PARAM_INT);
$result = $stmt->execute();
$stmt->closeCursor();

if ($result) {
    header('Location: admin.php');
}