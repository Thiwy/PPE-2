<?php

include 'mesFonctionsGenerales.php';
  // Connexion à la base de données bdgsb
  $cnxBDD = connexion();
  session_start();

$login=$_GET['login'];
$mdp=$_GET['mdp'];


if(isset($login) && isset($mdp))
{

    $req="SELECT count(*) FROM admin where login = '$login' and password= '$mdp';";
    $execute= mysqli_query($cnxBDD,$req);
    $reponse = mysqli_fetch_array($execute);
    $count = $reponse['count(*)'];
    if($count!=0) 
    {
      header('Location: liste.php');
     }
     else
     {
        header('Location: admin.php?erreur=1'); // utilisateur ou mot de passe incorrect
     }
 
 
}
else
{
header( 'Location: admin.php');
}
?>