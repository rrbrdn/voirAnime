<?php
$bdd = new PDO('mysql:host=localhost;dbname=tp_crud', "root", "");



session_start();

// COMPARRE L EMAIL ET LE MOT DE PASSE AVEC LA BDD
    $connectTest = $bdd->query('SELECT * FROM user');
    if(isset($_POST['connect-btn'])){
        while($connect = $connectTest->fetch()){
            if($_POST['email'] == $connect['email'] && $_POST['pdw'] == $connect['pdw']){
                echo '<script>alert("Connexion réussie")</script>';
                $_SESSION['id'] = $connect['id'];
                $_SESSION['email'] = $connect['email'];
                $_SESSION['pdw'] = $connect['pdw'];
                $_SESSION['roleUser'] = $connect['roleUser'];
                $_SESSION['username'] = $connect['username'];
                $_SESSION['img_profil'] = $connect['img_profil'];
                header('Location: ./../../index.php');
            }
        }
    }
?>