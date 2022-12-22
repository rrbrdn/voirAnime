<?php var_dump($_POST);
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=tp_crud', "root", "");

$idUser = $_POST['idUser'];

$req = "DELETE FROM user WHERE id = :id";
$stmt = $bdd->prepare($req);
$stmt->bindValue(":id", $idUser, PDO::PARAM_INT);
$result = $stmt->execute();
$stmt->closeCursor();

if ($result) {
    session_destroy();
    header('Location: ./../../index.php');
} 