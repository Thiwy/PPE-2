 <doctype HTML!>
    <html lang="fr">
<html>
<head>
<meta charset="utf-8">
<title> liste des visiteurs </title>
<link href="style.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<div class="entete">
    <strong><H1>LISTE DES VISITEURS </H1></strong>
    <a class="image" href="formulaire.php">
        <p class="text">Ajouter</p>
        <img class="ajouterimage"src="https://th.bing.com/th/id/OIP.RGV_tSpUGlE6KQwCd26R9QHaHa?w=175&h=180&c=7&o=5&pid=1.7"/>
    </a>
</div>
<table class="tablo">
<tr class="hauttab" >
            <td >Nom:</td>
            <td >Prenom:</td>
            <td >Adresse:</td>
            <td >Ville:</td>
            <td >Date:</td>
            <td >Code Postal:</td>
            <td >Supprimer</td>
            <td >Modifier</td> 
        </tr>

    <?php

include 'mesFonctionsGenerales.php';
	// Connexion à la base de données BDEtudiant
    $cnxBDD = connexion();
        $userReq = 'SELECT * FROM visiteur ORDER BY nom, prenom;';
        $userReq = $cnxBDD -> query($userReq);
    while($userData = $userReq -> fetch_assoc()) {
    echo '<tr  class="bastab">';
    echo '<td>'. $userData['nom'] .'</td>';
    echo '<td>'. $userData['prenom'] .'</td>';
    echo '<td>'. $userData['adresse'] .'</td>';
    echo '<td>'. $userData['ville'] .'</td>';
    echo '<td>'. $userData['dte'] .'</td>';
    echo '<td>'. $userData['CP'] .'</td>';
    echo '<td class="poubelle"> <a href="supprimer.php?id='. $userData['id'] .'"> <img class="poubelle" src="https://th.bing.com/th/id/OIP.yx8-zD8mZrNKFBjPKVkW2QAAAA?w=186&h=169&c=7&o=5&pid=1.7"> </a> </td>';
    echo '<td class="poubelle"> <a href="modifier.php?id='. $userData['id'] .'"> <img class="poubelle" src="https://th.bing.com/th/id/OIP.BCEonH6nyfAyrkjqTIpJggAAAA?w=147&h=150&c=7&o=5&pid=1.7"> </a> </td>';
    echo '</tr>';
     }
      
     ?>
   
      </tr>
  </table>

</body>
</html>
