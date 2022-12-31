<?php

// if(!empty($_FILES['img']))
//     {
//          if(!empty($_FILES['img']))
//         {
//             var_dump($_FILES['img']);
//             $nameFile = $_FILES['img']['name'];
//             $typeFile = $_FILES['img']['type'];
//             $sizeFile = $_FILES['img']['size'];
//             $tmpFile = $_FILES['img']['tmp_name'];
//             $errFile = $_FILES['img']['error'];
            
//             // Extensions
//             $extensions = ['png', 'jpg', 'jpeg', 'gif'];
//             // Type d'image
//             $type = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'];
//             // On récupère
//             $extension = explode('.', $nameFile);
//             // Max size
//             $max_size = 100000;

          
//     $img =   uniqid() . $_FILES['img']['name'];
           
//             if(move_uploaded_file($tmpFile, './asset/img/'. $img ) ) 
//             {
//                 echo "This is uploaded!";
//             }
//             else
//             {
//                 echo "failed";
//             }
//         }
//     }

// $bdd = new PDO('mysql:host=localhost;dbname=tp_crud', "root", "");


// if (empty($_POST['titre']) && empty($_POST['genre'])) {
// }else {
//     $titre = $_POST['titre'];
//     $genre = $_POST['genre'];
//     $descri = $_POST['descri'];
//     $video = $_POST['video'];
//     var_dump($_POST);
//     var_dump($img);
//     $req = "INSERT INTO anime(titre,genre,descri,img,video) VALUES 
//     (:titre,
//     :genre,
//     :descri,
//     :img,
//     :video)";

// $stmt = $bdd->prepare($req);
// $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
// $stmt->bindValue(":genre", $genre, PDO::PARAM_STR);
// $stmt->bindValue(":descri", $descri, PDO::PARAM_STR);
// $stmt->bindValue(":video", $video, PDO::PARAM_STR);
// $stmt->bindValue(":img", $img , PDO::PARAM_STR);
// $result = $stmt->execute();
// $stmt->closeCursor();

// if (isset($_POST["submit"])) {
//     if ($result) {
//         echo "<div class='alert alert-dismissible alert-success'>
//         <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
//         <strong>Well done!</strong> You successfully read <a href='#' class='alert-link'>this important alert message</a>.
//       </div>";
//     }else {
//       echo "<div class='alert alert-dismissible alert-danger'>
//       <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
//       <strong>Oh snap!</strong> <a href='#' class='alert-link'>Change a few things up</a> and try submitting again.
//     </div>";
//     }
// }
// }

// check if submitted with post
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

                    $titre = $_POST['titre'];
                    $genre = $_POST['genre'];
                    $descri = $_POST['descri'];
                    $video = $_POST['video'];
                    var_dump($_POST);
                    $req = "INSERT INTO anime(titre,genre,descri,img,video) VALUES 
                    (:titre,
                    :genre,
                    :descri,
                    :img,
                    :video)";
                
                $stmt = $bdd->prepare($req);
                $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
                $stmt->bindValue(":genre", $genre, PDO::PARAM_STR);
                $stmt->bindValue(":descri", $descri, PDO::PARAM_STR);
                $stmt->bindValue(":video", $video, PDO::PARAM_STR);
                $stmt->bindValue(":img", $file_name_new , PDO::PARAM_STR);
                $result = $stmt->execute();
                $stmt->closeCursor();

                    if ($result) {
                        header('Location: ./exo7.php');
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

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../asset/css/lux.css">
    <title>Document</title>
</head>

<body>
    <div class="container my-5">

        <div class="card border-dark mb-3">

            <div class="card-header d-flex">
                <div class="p-2 flex-grow-1">
                    Anime
                </div>
                <div class="p-2">
                    <a href="./exo7.php"><button type="button" class="btn btn-outline-dark btn-sm">back</button></a>
                </div>
            </div>

            <form action="./exo7-create.php" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="form-group p-3">
                        <label class="col-form-label mt-4" for="inputDefault">Titre</label>
                        <input type="text" class="form-control" placeholder="Ex: Dragon Ball..." name="titre">
                    </div>
                    <div class="form-group p-3">
                        <label class="col-form-label mt-4" for="inputDefault">Genre</label>
                        <input type="text" class="form-control" placeholder="Ex: Shonen..." name="genre">
                    </div>
                    <div class="form-group p-3">
                        <label for="exampleTextarea" class="form-label mt-4">Description</label>
                        <input type="text" class="form-control" name="descri">
                    </div>
                    <div class="form-group p-3">
                        <label class="col-form-label mt-4" for="inputDefault">Video</label>
                        <input type="text" class="form-control" name="video">
                    </div>
                    <div class="form-group p-3">
                        <label for="formFile" class="form-label mt-4">Selectionnez une image</label>
                        <input class="form-control" type="file" id="fileToUpload" name="img">
                    </div>
                    <hr>
                    <div class="d-flex justify-content-end p-3">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</body>

</html>