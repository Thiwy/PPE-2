<?php
        
    include 'mesFonctionsGenerales.php';
        
    // Connexion à la base de données bdgsb
    $cnxBDD = connexion();
    //Supprimer un visteur
    $suppressionVisiteur = $_GET['id'] ;
    if($suppressionVisiteur){
    $cnxBDD -> query('DELETE FROM visiteur WHERE id="'.$suppressionVisiteur.'"');
    }
    header("Location: liste.php")
?>
           
           