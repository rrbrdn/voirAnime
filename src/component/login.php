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
        <form action="connexion.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class='form-group'>
                    <input type='email' class='form-control rounded-3 bg-transparent text-white border-bottom-2' id='exampleInputEmail1' aria-describedby='emailHelp' placeholder='Enter email' name='email'>
                </div>
                <hr>
                <div class='form-group'>
                    <input type='password' class='form-control rounded-3 bg-transparent text-white border-bottom-2' id='exampleInputPassword1' placeholder='Password' name='pdw'>
                </div>
                <hr>
                <div class="d-flex justify-content-center p-1 ">
                    <button type="submit" id="btn" class="btn rounded-3 w-75" name='connect-btn'>Connexion</button>
                </div>
            </fieldset>
        </form>
    </div>

</body>

</html>
