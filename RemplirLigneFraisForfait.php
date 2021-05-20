<?php

include 'mesFonctionsGenerales.php';

// Connexion à la base de données BDEtudiant
$cnxBDD = connexion();

// Ids au hasard
$idFicheFrais = rand(1, 9);
$idForfait = rand(1, 9);
$quantite = rand(1, 100);

// Insertion dans la table LigneFraisForfait de idFicheFrais, idForfait, quantite
for ($i = 1; $i <= 10; $i++) {
$sql="INSERT INTO lignefraisforfait(idFicheFrais, idForfait, quantite) VALUES ('$idFicheFrais', '$idForfait', '$quantite');";
     
echo "Sql : ".$sql."<br />";
$result = $cnxBDD->query($sql)
	or die ("Requete invalide : ".$sql);    

}

// Fermer la connexion MYSQL
$cnxBDD->close();	 


?>