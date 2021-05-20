<?php
include 'mesFonctionsGenerales.php';
  // Connexion à la base de données bdgsb
  $cnxBDD = connexion();

$nom=$_GET['nom'];
$prenom=$_GET['prenom'];
$adresse=$_GET['adresse'];
$ville=$_GET['ville'];
$date=$_GET['date'];
$cp=$_GET['cp'];

$mdp=$_GET['mdp'];

$matricule= strtoupper( $prenom[0]);
$matricule.=substr($nom,0,9);

$login=$matricule;
		

$req="insert into visiteur ( `nom`, `prenom`, `adresse`, `ville`, `dte`, `CP`, `login`, `password`) values (' $nom',' $prenom',' $adresse','$ville','$date','$cp','$login','$mdp' );";
echo $req;
$cnxBDD -> query($req);
header("Location: liste.php");