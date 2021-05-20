<?php
    header('Content-Type: text/html; charset=utf-8');
    include('mesFonctionsGenerales.php');
    $cnxBDD = connexion();

    $randomUser = array();
    $getRandomUserReq = "SELECT id FROM visiteur";
    $getRandomUserReq = $cnxBDD -> query($getRandomUserReq);
    while($getRandomUserData = $getRandomUserReq -> fetch_assoc()) {
        $randomUser[] = $getRandomUserData['id'];
    }
    $user = $randomUser[rand(1, sizeof($randomUser))];
    $nbJustificatifs = rand(1, 20);
    $montantValide = rand(1, 500);

    $idEtat = "CR";

    $mois = 12;
    $annee = 2019;
    
    $sql = "INSERT INTO fichefrais(idVisiteur, mois, annee, nbJustificatifs, montantValide,idEtat) VALUES ('$user', $mois, $annee, $nbJustificatifs, $montantValide,'$idEtat');";
    $result = $cnxBDD -> query($sql) or die ("Error : " . $sql);


    $mois = 1;
    $annee = 2020;


    $sql = "INSERT INTO fichefrais(idVisiteur, mois, annee, nbJustificatifs, montantValide, idEtat) VALUES ('$user', $mois, $annee, $nbJustificatifs, $montantValide,'$idEtat');";
    $result = $cnxBDD -> query($sql) or die ("Error : " . $sql);

?>