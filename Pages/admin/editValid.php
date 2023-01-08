<?php

if (isset($_POST['submit']) && !empty($_POST['titre']) && !empty($_POST['genre']) && !empty($_POST['descri']) && !empty($_POST['video'])) {
    // check if file was uploaded without errors
    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        var_dump($_FILES['img']);
        // get details of the uploaded file
        $file_tmp = $_FILES['img']['tmp_name'];
        $file_name = $_FILES['img']['name'];
        $file_size = $_FILES['img']['size'];
        $file_type = $_FILES['img']['type'];
        $file_ext = explode('.', $file_name);

        // set upload directory
        $upload_dir = './../../asset/img/';
        // set allowed file extensions
        $allowed = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'];

        // check if file extension is on the list of allowed ones
        if (in_array($file_type, $allowed)) {
            // check if file size is not beyond expected size
            if ($file_size < 2097152) {
                // rename file
                $file_name_new = uniqid() . '.' . $file_ext[1];
                // and move it to the upload directory
                if (move_uploaded_file($file_tmp, $upload_dir . $file_name_new)) {
                    // if upload was successful
                    echo 'File uploaded successfully.';

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
                    $statement->bindValue(":img", $file_name_new, PDO::PARAM_STR);
                    $result = $statement->execute();
                    $statement->closeCursor();


                    if ($result) {
                        header('Location: admin.php');
                    }
                } else {
                    echo 'File upload failed - CHMOD/Folder doesn\'t exist?';
                }
            } else {
                echo 'File size exceeds the maximum allowed size.';
            }
        } else {
            echo 'File type not allowed.';
        }
    } else {
        echo 'File upload failed - CHMOD/Folder doesn\'t exist?';
    }
}