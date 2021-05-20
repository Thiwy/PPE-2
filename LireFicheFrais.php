<!DOCTYPE html>

<?php
include 'mesFonctionsGenerales.php';

// Connexion à la base de données
$cnxBDD = connexion();
session_start();


$nomVisiteur=$_SESSION['nomVisiteur'];

$idVisiteur=$_SESSION['idVisiteur'];

$idFicheFrais = $_GET['id'];


$sqlDate = 'SELECT mois, annee FROM FicheFrais WHERE idVisiteur='.$idVisiteur.' AND id='.$idFicheFrais.';';
                        $sqlDate = $cnxBDD -> query($sqlDate);
                        while($userData = $sqlDate -> fetch_assoc()) {
                            $sqlDateComplete = '0'.$userData['mois'].'/'.$userData['annee'];
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

$sqlEtat = 'SELECT idEtat FROM ficheFrais WHERE idVisiteur='.$idVisiteur.' AND id='.$idFicheFrais.';';
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

$sqlRemboursement ="SELECT montantValide, idVisiteur, id FROM fichefrais WHERE id='".$idFicheFrais."' AND idVisiteur='".$idVisiteur."';";
    $sqlRemboursement = $cnxBDD -> query($sqlRemboursement);
    while($userData = $sqlRemboursement -> fetch_assoc()) {
        $remboursement = $userData['montantValide']."€";
}


?>

<html>

    <head>

        <link href="FeuilleCSS.css" rel="stylesheet">
        <meta charset=utf8></meta>

    </head>

    <body class="bodyRenseignerFicheFrais" style="background-color:lightskyblue; color:white">
  
        <div> <h1>Fiche de frais de : <?php echo $nomVisiteur ?></h1> </div>

        <h1>Période &nbsp &nbsp &nbsp | &nbsp &nbsp &nbsp Mois / Année : <?php echo $sqlDateComplete; ?> </h1>
        <br />
        <br />

        <table style="border-collapse:collapse; margin:25px; color:black;">
            <tr>
                <th> Repas midi </th>
                <th> Nuitée(s) </th>
                <th> Étape(s) </th>
                <th> KM </th>
                <th> Situation </th>
                <th> Date opération </th>
                <th> Remboursement </th>
            </tr>
            <tr>
                <td> <?php echo $rep ?> </td>
                <td> <?php echo $nui ?> </td>
                <td> <?php echo $eta ?> </td>
                <td> <?php echo $km ?> </td>
                <td> <?php echo $idEtat ?> </td>
                <td> <?php echo $sqlDateComplete ?> </td>
                <td> <?php echo $remboursement ?> </td>
        </table>




    </body>

</html>