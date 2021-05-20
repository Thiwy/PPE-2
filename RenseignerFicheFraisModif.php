<!DOCTYPE html>

<?php
include 'mesFonctionsGenerales.php';

// Connexion à la base de données
$cnxBDD = connexion();

session_start();


$nomVisiteur=$_SESSION['nomVisiteur'];

$idVisiteur=$_SESSION['idVisiteur'];

$idFicheFrais = $_GET['id'];


$sqlMois ="SELECT mois FROM fichefrais WHERE idVisiteur='".$idVisiteur."' AND id='".$idFicheFrais."';";
    $sqlMois = $cnxBDD -> query($sqlMois);
    while($userData = $sqlMois -> fetch_assoc()) {
        $mois = $userData['mois'];
}

$sqlAnnee ="SELECT annee FROM fichefrais WHERE idVisiteur='".$idVisiteur."' AND id='".$idFicheFrais."';";
    $sqlAnnee = $cnxBDD -> query($sqlAnnee);
    while($userData = $sqlAnnee -> fetch_assoc()) {
        $annee = $userData['annee'];
}

$sqlRep ="SELECT idForfait, quantite, idFicheFrais FROM lignefraisforfait WHERE idFicheFrais='".$idFicheFrais."' AND idForfait='REP';";
    $sqlRep = $cnxBDD -> query($sqlRep);
    while($userData = $sqlRep -> fetch_assoc()) {
        $rep = $userData['quantite'];
}

$sqlNui ="SELECT idForfait, quantite, idFicheFrais FROM lignefraisforfait WHERE idFicheFrais='".$idFicheFrais."' AND idForfait='NUI';";
    $sqlNui = $cnxBDD -> query($sqlNui);
    while($userData = $sqlNui -> fetch_assoc()) {
        $nui = $userData['quantite'];
}

$sqlEta ="SELECT idForfait, quantite, idFicheFrais FROM lignefraisforfait WHERE idFicheFrais='".$idFicheFrais."' AND idForfait='ETA';";
    $sqlEta = $cnxBDD -> query($sqlEta);
    while($userData = $sqlEta -> fetch_assoc()) {
        $eta = $userData['quantite'];
}

$sqlKm ="SELECT idForfait, quantite, idFicheFrais FROM lignefraisforfait WHERE idFicheFrais='".$idFicheFrais."' AND idForfait='KM';";
    $sqlKm = $cnxBDD -> query($sqlKm);
    while($userData = $sqlKm -> fetch_assoc()) {
        $km = $userData['quantite'];
}

?>

<html>

<head>

    <link href="FeuilleCSS.css" rel="stylesheet">
    <meta charset=utf8></meta>

</head>

<body class="bodyRenseignerFicheFrais" style="background-color:lightskyblue; color:white">

    <form action="FormModifFrais.php" method="post">

        <div>
            <p style="font-size:30px"><b>Saisie</b></p>
        </div>
<?php
        echo "<div>";
            echo '<legend style="float:left; display:inline"> PERIODE <br /> D\'ENGAGEMENT : &nbsp</legend>';
            echo "<br />";
            echo '<label for="mois" style="float:left; display:inline">Mois (2 chiffres) : </label>';
            echo '<input type="text" name="mois" id="mois" size="5" maxlength="2" value ="'.$mois.'">';
            echo '<label for="Année">Année (4 chiffres) : </label>';
            echo '<input type="text" name="annee" id="annee" size="6" maxlength="4" value="'.$annee.'">';
            echo "<br />";
        echo "</div>";
?>
        <div>
            <br />
            <legend style="font-size:30px"> <b>Frais au forfait </b></legend>
            <br />
            <label for="repas">Repas midi : </label>
            &nbsp &nbsp &nbsp <input type="text" name="repas" id="mois" size="5" maxlength="2" value="<?php echo $rep ?>" required>
        </div>

        <div>
            <label for="nuit">Nuitées : </label>
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type="text" name="nuit" id="nuit" size="5" maxlength="2" value="<?php echo $nui ?>" required>
        </div>

        <div>
            <label for="etape">Étape : </label>
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type="text" name="etape" id="etape" size="5" maxlength="2" value="<?php echo $eta ?>" required>
        </div>

        <div>
            <label for="Km"> Km : </label>
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type="text" name="km" id="km" size="5" maxlength="5" value="<?php echo $km ?>" required>
        </div>

        <input type='hidden' name='idFicheFrais' value='<?php echo $idFicheFrais ?>'>

        <div>
            <br />
	    	<input id="envoyer" name="envoyer" type="submit" value="Soumettre la requête" title="" />
        </div>

    
    </form>

</body>

</html>
