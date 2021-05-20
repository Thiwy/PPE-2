<?php

function connexion(){
    $host = "localhost";
        $user = "root";
        $password = "password";
        $dbname = "bdgsb";
        $port ="3307";

        $mysqli = new mysqli($host, $user, $password, $dbname, $port);
        if ($mysqli->connect_errno) {
            echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            return($mysqli->connect_errno);
        }
        return $mysqli;

}
       
function erreurSQL() {
    global $cnxBDD;
    
    $err = mysql_errno($link) . ": " . mysql_error($cnxBDD). "\n";
    return $err;
}

function afficheErreur($sql, $erreur) {

	$uneChaine = "ERREUR SQL : ".date("j M Y - G:i:s.u --> ").$sql." : ($erreur) \r\n";

	ecritRequeteSQL($uneChaine);

	return "Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"].
	"</b>.<br />Dans le fichier : ".__FILE__.
	" a la ligne : ".__LINE__.
	"<br />".$erreur.
	"<br /><br /><b>REQUETE SQL : </b>$sql<br />";

}

function ecritRequeteSQL($uneChaine) {
	$handle=fopen("requete.sql","a");
	fwrite($handle,$uneChaine);
	fclose($handle);
}


// Fonction Extraire Commune
function ExtraireCommune($ligne, &$CodePostal, &$Ville) {
	$CodePostal = 0;
	$Ville = 0;
	$ligneSep = explode( ";" , $ligne , 6);
	$CodePostal = $ligneSep[2];
    $Ville = $ligneSep[3];
    
	return 1;
}

function getForfait($unforfait)
{
    switch ($unforfait) {
        case "REP" : 
            $valeur=29.0;
            break;
        case "NUI" : 
            $valeur=80.0;
            break;
        case "K6E" : 
            $valeur=0.67;
            break;
        case "K6D" : 
            $valeur=0.58;
            break;
        case "K4E" : 
            $valeur=0.62;
            break;
        case "K4D" : 
            $valeur=0.52;
            break;
        default : 
            $valeur=0;
    }
    return $valeur;
}



?>


