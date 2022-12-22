<?php  if (!empty($_SESSION['roleUser'])) {
             if ($_SESSION['roleUser'] == 'admin') {
          $btn = "
                  <form action='./mon-compte.php' method='post'> 
                  <button type='submit' class='btn btn-secondary btn-sm'>Ajouter à ma collection
                  <input hidden name='idAnime' value=' ".$anime['id']." '>
                  <input hidden name='idUser' value=' ". $_SESSION['id']." '>
                  </button> 
                  </form>
                ";
                    } else if ($_SESSION['roleUser'] == 'user') {
          $btn = "
                  <form action='./mon-compte.php' method='post'> 
                  <button type='submit' class='btn btn-secondary btn-sm'>Ajouter à ma collection
                  <input hidden name='idAnime' value=' ".$anime['id']." '>
                  <input hidden name='idUser' value=' ". $_SESSION['id']." '>
                  </button> 
                  </form>
                ";
          } 
          }else {
            $btn =" <button class='btn btn-secondary btn-sm'>Ajouter à ma collection</button>"; 
            }
?>