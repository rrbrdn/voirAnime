<?php



?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../asset/css/lux.css">
    <link rel="stylesheet" href="./../asset/css/mon-compte.css">
    <title>Document</title>
</head>
<body>

<?php 

include './../src/component/navBar.php'; 
include './../src/component/modal-connect.php';
echo connect('./../src/component/connexion.php');

var_dump($_POST);

?>


</body>
</html>