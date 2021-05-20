<?php

include 'mesFonctionsGenerales.php';

// Connexion BD
$cnxBDD = connexion();

// Récup variables

$idVisiteur = 8;
$idFicheFrais = $_POST['idFicheFrais'];

$mois = $_POST['mois'];
$annee = $_POST['annee'];

$dte = date("Y-m-d");

$repas = $_POST['repas'];
$nuit = $_POST['nuit'];
$etape = $_POST['etape'];
$km = $_POST['km'];

$totalRepas = $repas*getForfait('REP');
$totalNuit = $nuit*getForfait('NUI');
$totalKm = $km*getForfait('K4E');
$totalEtape = $etape*8;

$sqlRepas="UPDATE lignefraisforfait SET quantite = '$repas' WHERE idForfait='REP' AND idFicheFrais='$idFicheFrais'";      
$result = $cnxBDD->query($sqlRepas)
    or die ("Requete invalide : ".$sqlRepas);
    
$sqlNuit="UPDATE lignefraisforfait SET quantite = '$nuit' WHERE idForfait='NUI' AND idFicheFrais='$idFicheFrais'"; 
$result = $cnxBDD->query($sqlNuit)
    or die ("Requete invalide : ".$sqlNuit);

$sqlKm="UPDATE lignefraisforfait SET quantite = '$km' WHERE idForfait='KM' AND idFicheFrais='$idFicheFrais'";   
$result = $cnxBDD->query($sqlKm)
    or die ("Requete invalide : ".$sqlKm);

$sqlEtape="UPDATE lignefraisforfait SET quantite = '$etape' WHERE idForfait='ETA' AND idFicheFrais='$idFicheFrais'";   
$result = $cnxBDD->query($sqlEtape)
    or die ("Requete invalide : ".$sqlEtape);

    header("Location: ListerFichedeFrais.php")
?>