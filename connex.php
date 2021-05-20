<?php

include 'mesFonctionsGenerales.php';
  // Connexion à la base de données bdgsb
  $cnxBDD = connexion();
  session_start();

$login=$_GET['login'];
$mdp=$_GET['mdp'];


if(isset($login) && isset($mdp))
{

    $req="SELECT count(*) FROM visiteur where login = '$login' and password= '$mdp';";
    $execute= mysqli_query($cnxBDD,$req);
    $reponse = mysqli_fetch_array($execute);
    $count = $reponse['count(*)'];
    if($count!=0) 
    {
      $userReq ="SELECT * FROM visiteur where login= '$login' and password= '$mdp';";
      $userReq = $cnxBDD -> query($userReq);
      $userData = $userReq -> fetch_assoc();{
      echo '<td>'. $userData['id'] .'</td>';
      echo '<td>'. $userData['nom'] .'</td>';}
      $_SESSION['idVisiteur']=$userData['id'];
      $_SESSION['nomVisiteur']=$userData['nom'];
      header('Location: ListerFichedeFrais.php');
     }
     else
     {
        header('Location: connexion.php?erreur=1'); // utilisateur ou mot de passe incorrect
     }
 
 
}
else
{
header( 'Location: connexion.php');
}
?>