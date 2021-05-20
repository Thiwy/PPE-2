<?php

include 'mesFonctionsGenerales.php';

// Connexion à la base de données
$cnxBDD = connexion();  
session_start();
//Récup variables auth

$nomVisiteur=$_SESSION['nomVisiteur'];

$idVisiteur=$_SESSION['idVisiteur'];

?>
<DOCTYPE HTML>
<html>

<head>

    <link href="FeuilleCSS.css" rel="stylesheet" action="connex.php" method="GET">
    <meta charset=utf8></meta>

</head>

<body class="bodyListerFicheFrais">

    <div>
    <p class="listerFicheFrais-nom">Fiche de frais de : <?php echo $nomVisiteur ;?><a href='RenseignerFicheFrais.php'><img src="ImagesListerFrais/+.png" alt="bouton ajouter" class="imgAjouter"></a> </p>
    </div>

    <div>

    <table class='table1'>

<tr>
    <th scope='col'>Date</th>
    <th scope='col'>Somme</th>
    <th scope='col'>État</th>
    <th scope='col'>supprimer</th>
    <th scope='col'>modifier</th>
    <th scope='col'>voir</th>
</tr>

<?php

//Requêtes sql

for ($id=0; $id<=1000; $id++) {
$sqlDate = 'SELECT mois, annee FROM FicheFrais WHERE idVisiteur='.$idVisiteur.' AND id='.$id.';';
                        $sqlDate = $cnxBDD -> query($sqlDate);
                        while($userData = $sqlDate -> fetch_assoc()) {
                            $sqlDateComplete = $userData['mois'].'/'.$userData['annee'];
                        }



$sqlEtat = 'SELECT idEtat FROM ficheFrais WHERE idVisiteur='.$idVisiteur.' AND id='.$id.';';
                        $sqlEtat = $cnxBDD -> query($sqlEtat);
                         while($userData = $sqlEtat -> fetch_assoc()) {
                            $sqlNumeroEtat = $userData['idEtat'];
                        
                            if ($sqlNumeroEtat == '1') {
                                $idEtat = "Cloturé";
                            } elseif ($sqlNumeroEtat == '2') {
                                $idEtat = "En cours";
                            } elseif ($sqlNumeroEtat == '3') {
                                $idEtat = "Remboursé";
                            }
                         }

$sqlDate1 = 'SELECT mois, annee, montantValide, idEtat, id FROM FicheFrais WHERE idVisiteur='.$idVisiteur.' AND id='.$id.';';
                        $sqlDate1 = $cnxBDD -> query($sqlDate1);
                        while($userData = $sqlDate1 -> fetch_assoc()) {

                            echo '<tr>
                                <td>'. $sqlDateComplete.'</td>
                                <td>'. $userData["montantValide"].' €</td>
                                <td>'. $idEtat.'</td>
                                <td> <a href="delete.php?id='. $userData['id'] .'">  <img src="ImagesListerFrais/poubelle.png" width=35px height=35px></a></td>
                       
                                <td> <a href="RenseignerFicheFraisModif.php?id='. $userData['id'] .'"><img src="ImagesListerFrais/crayon.png" width=35px height=35px></a></td>
                       
                                <td> <a href="LireFicheFrais.php?id='. $userData['id'] .'"><img src="ImagesListerFrais/oeil.png" width=35px height=35px></a></td>';
                        }
}

?>

            </table>

        </div>



    </body>
                        
                        
</html>