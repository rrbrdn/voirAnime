<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=tp_crud', "root", "");

$req = "SELECT * FROM comment ORDER BY id DESC";
$stmt = $bdd->prepare($req);
$result = $stmt->execute();
$myComment = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();

if (!empty($_POST['comment'])) {

$user_id = $_SESSION['id'];
$comment = $_POST['comment'];

$req = "INSERT INTO comment(comment,user_id) VALUES (:comment,:user_id)";

$stmt = $bdd->prepare($req);
$stmt->bindValue(":comment", $comment, PDO::PARAM_STR);
$stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);
$result = $stmt->execute();
$stmt->closeCursor();

if ($result) {
    header('Location: ./../../Pages/showAnime.php');
}

}