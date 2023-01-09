<?php

session_start();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../asset/css/lux.css">
    <link rel="stylesheet" href="./../asset/css/style.css">
    <link rel="stylesheet" href="./../asset/css/base.css">
    <title>Document</title>
</head>

<body>

    <?php include './../src/component/navBar.php';?>

    <div class="wrapper">
        <h2><strong>Mon profil</strong></h2>

        <div class="container mt-5" id="coucou">
            <div class="d-flex">
                <img src="./../asset/img/<?= $_SESSION['img_profil'] ?>" width="150" class="rounded-circle border border-2">
                <div class="d-flex align-items-center ms-3">
                    <h4 class="text-white"><?= $_SESSION['username'] ?></h4>
                </div>
            </div>

            <style>
                #coucou {
                    background-color: RGB(35, 37, 43);
                    color: RGB(244, 117, 33);
                }
            </style>
            <div class="mt-5 text-white row" id="coucou">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" href="#home" aria-selected="true" role="tab">Home</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile" aria-selected="false" role="tab" tabindex="-1">Profile</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active show" id="home" role="tabpanel">
                        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel">
                        <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>

</html>