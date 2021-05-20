<?php
    include 'mesFonctionsGenerales.php';
 
    // Connexion à la base de données BDEtudiant
    $cnxBDD = connexion();
 
    // les noms sont dans le fichier nom.txt
    $NomFichier = 'nom.txt';
    $TabloNomFamille = file($NomFichier);
 
    // les prenoms garcon sont dans le fichier garcon.txt
    $NomFichier = 'garcon.txt';
    $TabloPrenom = file($NomFichier);
 
    // les prenoms fille sont dans le fichier fille.txt
    $NomFichier = 'fille.txt';
    $TabloPrenomFille = file($NomFichier);
 
    // les adresses sont dans le fichier adresse.txt
    $NomFichier = 'adresse.txt';
    $TabloAdresse = file($NomFichier);
 
    // les villes sont dans le fichier ville.txt
    $NomFichier = 'ville.txt';
    $TabloVille = file($NomFichier);
 
    // les dates de naissance sont dans le fichier date.txt
    $NomFichier = 'date.txt';
    $TabloDate = file($NomFichier);
 
    for ($i=1; $i<=10; $i++) {
 
    // rand(x, y) fournit un nombre au hasard entre x et y
    $n = rand(1, sizeof($TabloNomFamille));         // $n contient un rang au hasard
    $p = rand(1, sizeof($TabloPrenom));             // $p contient un rang au hasard
    $a = rand(1, sizeof($TabloAdresse));                // $a contient un rang au hasard
    $v = rand(1, sizeof($TabloVille));              // $v contient un rang au hasard
    $d = rand(1, sizeof($TabloDate));               // $d contient un rang au hasard
 
    // Insertion dans la table ETUDIANT du ni�me nom de famille et du pi�me pr�nom 
    $sql="INSERT INTO visiteur(nom, prenom, adresse,ville, dte ) VALUES ('$TabloNomFamille[$n]', '$TabloPrenom[$p]', '$TabloAdresse[$a]', '$TabloVille[$v]', '$TabloDate[$d]');";
    
    echo "Sql : ".$sql."<br />";
    $result = $cnxBDD->query($sql)
         or die ("Requete invalide : ".$sql);    
 
    }
 
    // Fermer la connexion MYSQL
    $cnxBDD->close();    
 
?>