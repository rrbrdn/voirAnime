<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=tp_crud', "root", "");
$id_anime = $_SESSION['id_anime'];
var_dump($_SESSION);
var_dump($_POST);

$req = "SELECT * FROM user INNER JOIN comment ON user.id = comment.user_id INNER JOIN anime ON anime.id = comment.id_anime WHERE anime.id = :id_anime ORDER BY comment.id DESC";

$stmt = $bdd->prepare($req);
$stmt->bindValue(":id_anime", $id_anime, PDO::PARAM_INT);
$result = $stmt->execute();
$myComment = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();

if (!empty($_POST['comment'])) {

$user_id = $_SESSION['id'];
$comment = $_POST['comment'];
$id_anime = $_SESSION['id_anime'];

$req = "INSERT INTO comment(comment,user_id,id_anime) VALUES (:comment,:user_id,:id_anime)";

$stmt = $bdd->prepare($req);
$stmt->bindValue(":comment", $comment, PDO::PARAM_STR);
$stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);
$stmt->bindValue(":id_anime", $id_anime, PDO::PARAM_INT);
$result = $stmt->execute();
$stmt->closeCursor();

if ($result) {
    header('Location: ./../../Pages/showAnime.php');
}

}
