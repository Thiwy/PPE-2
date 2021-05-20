<?php

include 'mesFonctionsGenerales.php';

//Connexion BD
$cnxBDD = connexion();

//Récup variables

$idVisiteur = 1;

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

$sqlLastFiche ="SELECT id FROM fichefrais WHERE idVisiteur='".$idVisiteur."' ORDER BY id DESC LIMIT 1;";
    $sqlLastFiche = $cnxBDD -> query($sqlLastFiche);
    while($userData = $sqlLastFiche -> fetch_assoc()) {
        $LastFicheId = $userData['id'];
}

$LastFicheId = $LastFicheId + 1;

$montantValide = $totalRepas+$totalNuit+$totalKm+$totalEtape;

// Insertion dans la table LigneFraisForfait de idFicheFrais, idForfait, quantite

$sql="INSERT INTO fichefrais(id, idVisiteur, mois, annee, nbJustificatifs, montantValide, dateModif, idEtat) VALUES ($LastFicheId, $idVisiteur, $mois, $annee, 0, $montantValide, '$dte', 2);";
         
echo "Sql : $sql <br />";
$result = $cnxBDD->query($sql)
    or die ("Requete invalide : ".$sql); 
    

$sqlRepas="INSERT INTO lignefraisforfait(idFicheFrais, idForfait, quantite) VALUES ($LastFicheId, 'REP', $repas);";      
$result = $cnxBDD->query($sqlRepas)
    or die ("Requete invalide : ".$sqlRepas);

$sqlNuit="INSERT INTO lignefraisforfait(idFicheFrais, idForfait, quantite) VALUES ($LastFicheId, 'NUI', $nuit);"; 
$result = $cnxBDD->query($sqlNuit)
    or die ("Requete invalide : ".$sqlNuit);

$sqlKm="INSERT INTO lignefraisforfait(idFicheFrais, idForfait, quantite) VALUES ($LastFicheId, 'KM', $km);";   
$result = $cnxBDD->query($sqlKm)
    or die ("Requete invalide : ".$sqlKm);

$sqlEtape="INSERT INTO lignefraisforfait(idFicheFrais, idForfait, quantite) VALUES ($LastFicheId, 'ETA', $etape);";   
$result = $cnxBDD->query($sqlEtape)
    or die ("Requete invalide : ".$sqlEtape);
      

// Fermer la connexion MYSQL
$cnxBDD->close();	 

header('Location: ListerFichedeFrais.php');
?>