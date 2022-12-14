<?php

session_start();


if ($_SESSION['roleUser']){

    session_destroy();
    header('Location: ./../../index.php');
    
}



?>