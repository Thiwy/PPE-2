<!DOCTYPE html>

<?php
include 'mesFonctionsGenerales.php';

// Connexion à la base de données
$cnxBDD = connexion();

$moisActuel = date("m");
$anneeActuelle = date("Y");
?>

<html>

<head>

    <link href="FeuilleCSS.css" rel="stylesheet">
    <meta charset=utf8></meta>

</head>

<body class="bodyRenseignerFicheFrais" style="background-color:lightskyblue; color:white">

    <form action="FormSaiseFrais.php" method="post">

        <div>
            <p style="font-size:30px"><b>Saisie</b></p>
        </div>

        <div>
            <legend style="float:left; display:inline"> PERIODE <br /> D'ENGAGEMENT : &nbsp</legend>
            <br />
            <label for="mois" style="float:left; display:inline">Mois (2 chiffres) : </label>
            <?php echo '<input type="text" name="mois" id="mois" size="5" maxlength="2" value="'.$moisActuel.'" readonly="readonly">';?>
            <label for="Année">Année (4 chiffres) : </label>
            <?php echo '<input type="text" name="annee" id="annee" size="6" maxlength="4" value="'.$anneeActuelle.'" readonly="readonly">';?>
            <br />
        </div>

        <div>
            <br />
            <legend style="font-size:30px"> <b>Frais au forfait </b></legend>
            <br />
            <label for="repas">Repas midi : </label>
            &nbsp &nbsp &nbsp<input type="text" name="repas" id="mois" size="5" maxlength="2" required>
        </div>

        <div>
            <label for="nuit">Nuitées : </label>
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type="text" name="nuit" id="nuit" size="5" maxlength="2" required>
        </div>

        <div>
            <label for="etape">Étape : </label>
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type="text" name="etape" id="etape" size="5" maxlength="2" required>
        </div>

        <div>
            <label for="Km"> Km : </label>
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type="text" name="km" id="km" size="5" maxlength="5" required>
        </div>

        <div>
            <br />
	    	<input id="envoyer" name="envoyer" type="submit" value="Soumettre la requête" title="" />
        </div>

    
    </form>

</body>

</html>