<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=tp_crud', "root", "");

if (isset($_POST['submit'])) {

    $id_anime = $_POST['id_anime'];
    var_dump($id_anime);
    var_dump($_POST['comment']);
    $user_id = $_SESSION['id'];
    $comment = $_POST['comment'];

    $req = "INSERT INTO comment(comment,user_id,id_anime) VALUES (:comment,:user_id,:id_anime)";

    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":comment", $comment, PDO::PARAM_STR);
    $stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);
    $stmt->bindValue(":id_anime", $id_anime, PDO::PARAM_INT);
    $result = $stmt->execute();
    $stmt->closeCursor();

    if ($result) {
        header('Location: ./../../index.php');
    }
}






// if (!empty($_POST['comment']) && !empty($_GET['id_anime'])) {

// $user_id = $_SESSION['id'];
// $comment = $_POST['comment'];
// $id_anime = $_GET['id_anime'];

// $req = "INSERT INTO comment(comment,user_id,id_anime) VALUES (:comment,:user_id,:id_anime)";

// $stmt = $bdd->prepare($req);
// $stmt->bindValue(":comment", $comment, PDO::PARAM_STR);
// $stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);
// $stmt->bindValue(":id_anime", $id_anime, PDO::PARAM_INT);
// $result = $stmt->execute();
// $stmt->closeCursor();

// if ($result) {
//     header('Location: ./../../Pages/showAnime.php');
// }

// }
