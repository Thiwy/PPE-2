<?php
include 'mesFonctionsGenerales.php';
  // Connexion à la base de données bdgsb
  $cnxBDD = connexion();
   
$modifVisiteur=$_GET['id'];
$nom=$_GET['nom'];
$prenom=$_GET['prenom'];
$adresse=$_GET['adresse'];
$ville=$_GET['ville'];
$date=$_GET['date'];
$cp=$_GET['cp'];
$login=$_GET['login'];
$mdp=$_GET['mdp'];

$req="update visiteur set nom='$nom', prenom='$prenom', adresse='$adresse', ville='$ville',dte='$date',CP='$cp',login='$login',password='$mdp' WHERE id='$modifVisiteur';";
echo $req;
$userReq = $cnxBDD -> query($req);
$cnxBDD -> query($req);
header("Location: liste.php");