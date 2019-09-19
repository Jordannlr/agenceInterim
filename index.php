<?php

session_start();

include 'vue/header.php';


if (isset($_GET['page'])){
    
    if($_GET['page'] == 'enregistrement'){
        include 'Enregistrement.html';
    }
    
    if($_GET['page'] == 'connexion'){
        include 'Connexion.html';
    }
    
    if($_GET['page'] == 'consultOffres'){
        include 'ConsultOffres.php';
    }
    
    if($_GET['page'] == 'postulePoste'){
        include 'PostulePoste.php';
    }
    
    if($_GET['page'] == 'transfertFichier'){
        include 'TransfertFichier.phtml';
    }
    
    if($_GET['page'] == 'transfert'){
        include 'TransfertFichier.php';
    }
}
else {
    include 'vue/accueil.html';
}

include 'vue/footer.php';

?>