<?php


var_dump($_POST);

$bdd = new PDO('mysql:host=localhost;dbname=tp_crud', "root", "");

$idUser = $_POST['idUser'];
$email = $_POST['email'];

$statement = $bdd->prepare("UPDATE user SET email = :email WHERE id = :idUser");
$statement->bindValue(":idUser", $idUser, PDO::PARAM_INT);
$statement->bindValue(":email", $email, PDO::PARAM_STR);
$result = $statement->execute();
$statement->closeCursor();


if ($result) {
    header('Location: ./../../Pages/mon-profil.php');
}