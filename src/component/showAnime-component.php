<?php if (!empty($_SESSION['roleUser'])) {
  // if ($_SESSION['roleUser'] == 'admin') {
  //   $btn = "
  //                 <form action='./mon-compte.php' method='post'> 
  //                 <button type='submit' class='btn btn-secondary btn-sm'>Ajouter à ma collection
  //                 <input hidden name='idAnime' value=' " . $anime['id'] . " '>
  //                 <input hidden name='idUser' value=' " . $_SESSION['id'] . " '>
  //                 </button> 
  //                 </form>
  //               ";
  // } else 
  if ($_SESSION['roleUser'] == 'user') {
    $btn = "
                  <form action='./mon-compte.php' method='post'> 
                  <button id='btn' class='btn btn-sm rounded-1 d-flex align-items-center'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-bookmark me-2'       viewBox='0 0 16 16'>
                    <path d='M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z'/>
                  </svg>Ajouter à ma collection
                  <input hidden name='idAnime' value=' " . $anime['id'] . " '>
                  <input hidden name='idUser' value=' " . $_SESSION['id'] . " '>
                  </button> 
                  </form>
                ";
  }
} else {
  $btn = " <button id='btn' class='btn btn-sm rounded-1 d-flex align-items-center'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-bookmark me-2' viewBox='0 0 16 16'>
            <path d='M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z'/>
          </svg>Ajouter à ma collection</button>";
}
