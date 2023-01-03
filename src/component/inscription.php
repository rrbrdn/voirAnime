<?php

// check if submitted with post
if (isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['pdw'])) {

    $regUsername = "/^[a-zA-Z0-9_ -]{3,50}$/";
    $regEmail = "/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/";
    $regPdw = "/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/";
    if (preg_match($regUsername, $_POST['username'])) {
        echo "oui <br>";

        if (preg_match($regEmail, $_POST['email'])) {
            echo "email valid <br>";

            if (preg_match($regEmail, $_POST['pdw'])) {
                echo "pdw valid <br>";



                // check if file was uploaded without errors
                // if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
                //     var_dump($_FILES['img']);
                //     // get details of the uploaded file
                //     $file_tmp = $_FILES['img']['tmp_name'];
                //     $file_name = $_FILES['img']['name'];
                //     $file_size = $_FILES['img']['size'];
                //     $file_type = $_FILES['img']['type'];
                //     $file_ext = explode('.', $file_name);

                //     // set upload directory
                //     $upload_dir = './../../asset/img/';
                //     // set allowed file extensions
                //     $allowed = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'];

                //     // check if file extension is on the list of allowed ones
                //     if (in_array($file_type, $allowed)) {
                //         // check if file size is not beyond expected size
                //         if ($file_size < 2097152) {
                //             // rename file
                //             $file_name_new = uniqid() . '.' . $file_ext[1];
                //             // and move it to the upload directory
                //             if (move_uploaded_file($file_tmp, $upload_dir . $file_name_new)) {
                //                 // if upload was successful
                //                 echo 'File uploaded successfully.';

                //                 $bdd = new PDO('mysql:host=localhost;dbname=tp_crud', "root", "");

                //                 $username = $_POST['username'];
                //                 $email = $_POST['email'];
                //                 $pdw = $_POST['pdw'];
                //                 $req = "INSERT INTO user(username,email,pdw,img_profil) VALUES 
                //                     (:username,
                //                     :email,
                //                     :pdw,
                //                     :img_profil)";

                //                 $stmt = $bdd->prepare($req);
                //                 $stmt->bindValue(":username", $username, PDO::PARAM_STR);
                //                 $stmt->bindValue(":email", $email, PDO::PARAM_STR);
                //                 $stmt->bindValue(":pdw", $pdw, PDO::PARAM_STR);
                //                 $stmt->bindValue(":img_profil", $file_name_new, PDO::PARAM_STR);
                //                 $result = $stmt->execute();
                //                 $stmt->closeCursor();

                //                 if ($result) {
                //                     header('Location: ./../../index.php');
                //                 }
                //             } else {
                //                 echo 'File upload failed - CHMOD/Folder doesn\'t exist?';
                //             }
                //         } else {
                //             echo 'File size exceeds the maximum allowed size.';
                //         }
                //     } else {
                //         echo 'File type not allowed.';
                //     }
                // } else {
                //     echo 'File upload failed - CHMOD/Folder doesn\'t exist?';
                // }
            
            } else {
                echo "pdw pas valid";
            }
        } else {
            echo "email pas valid";
        }
    } else {
        echo "non";
    }
}

?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../asset/css/lux.css">
    <link rel="stylesheet" href="./../../asset/css/inscri.css">
    <title>Document</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg" id="nav">
        <div class="navbar-center mx-auto">
            <a class="navbar-brand" id="titre" href="./../../index.php">VoirAnime</a>
        </div>
    </nav>

    <div class="container text-white d-flex justify-content-center mt-5">
        <form action="inscription.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="form-group p-1">
                    <input type="text" class="form-control rounded-3 bg-transparent text-white border-bottom-2" name="username" placeholder="Nom d'utilisateur" autocomplete="off">
                </div>
                <hr>
                <div class="form-group p-1">
                    <input type="email" class="form-control rounded-3 bg-transparent text-white border-bottom-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email" autocomplete="off">
                </div>
                <hr>
                <div class="form-group p-1">
                    <input type="password" class="form-control rounded-3 bg-transparent text-white border-bottom-2" id="exampleInputPassword1" placeholder="Mot de passe" name="pdw" autocomplete="off">
                </div>
                <hr>
                <div class="form-group p-1">
                    <input class="form-control rounded-3 bg-transparent text-white border-bottom-2" type="file" id="fileToUpload" name="img">
                    <small class="form-text text-muted">Selectionnez une image de profil</small>
                </div>
                <hr>
                <div class="d-flex justify-content-center p-1 ">
                    <button type="submit" id="btn" class="btn rounded-3 w-75" name="submit">Crée un compte</button>
                </div>
            </fieldset>
        </form>
    </div>

</body>

</html>