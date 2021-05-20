<?php
    header('Content-Type: text/html; charset=utf-8');
    include('mesFonctionsGenerales.php');
    $cnxBDD = connexion();

    $randomFiche = array();
    $getRandomFicheReq = "SELECT id FROM fichefrais";
    $getRandomFicheReq = $cnxBDD -> query($getRandomFicheReq);
    while($getRandomFicheData = $getRandomFicheReq -> fetch_assoc()) {
        $randomFiche[] = $getRandomFicheData['id'];
    }
    $fiche = $randomFiche[rand(1, sizeof($randomFiche)-1)];

    $randomForfait = array();
    $getRandomForfaitReq = "SELECT id FROM forfait";
    $getRandomForfaitReq = $cnxBDD -> query($getRandomForfaitReq);
    while($getRandomForfaitData = $getRandomForfaitReq -> fetch_assoc()) {
        $randomForfait[] = $getRandomForfaitData['id'];
    }
    $forfait = $randomForfait[rand(1, sizeof($randomForfait)-1)];
    $quantite = rand(1, 100);

    $sql = "INSERT INTO lignefraisforfait(idFicheFrais,idForfait,quantite) VALUES ($fiche,'$forfait',$quantite);";
    $result = $cnxBDD -> query($sql) or die ("Error : " . $sql);

?>