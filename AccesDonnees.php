<?php
// /appli/students/AccesDonnees.php VERSION 5.78

/**
 *  Bibliotheque de fonctions AccesDonnees.php
 *
 *
 * @author Erwan
 * @copyright Erwan
 * @version ENT/Student Mardi 29 Decembre 2020
 *
 *
 */

$modeacces = "mysqli";


$mysql_data_type_hash = array(
    1=>'tinyint',
    2=>'smallint',
    3=>'int',
    4=>'float',
    5=>'double',
    7=>'timestamp',
    8=>'bigint',
    9=>'mediumint',
    10=>'date',
    11=>'time',
    12=>'datetime',
    13=>'year',
    16=>'bit',
    252=>'blob',
    253=>'varchar', //string
    254=>'char',    //string
    246=>'decimal'
);


/**
 * Retourne le numero de version de AccesDonnees.php.
 *
 * @return string - Retourne une chaine de caracteres representant le numero de la version de la
 *         bibliotheque "AccesDonnees.php".
 */
function numeroVersion()
{
    return "ENT 5.78";
}


/**
 * Retourne la date de la version de AccesDonnees.php.
 *
 * @return string - Retourne une chaine de caracteres representant le date de la version de la
 *         bibliotheque "AccesDonnees.php".
 */
function dateVersion()
{
    return "Mardi 29 Decembre 2020";
}


/**
 * Ouvre une connexion a un serveur de base de donnees et selectionne une base.
 *
 * @param string $host Adresse du serveur.
 * @param integer $port Numero du port du serveur.
 * @param string $dbname Nom de la base de donnees.
 * @param string $user Nom de l'utilisateur.
 * @param string $password Mot de passe de l'utilisateur.</p>
 *
 * @return resource - Retourne l'identifiant de connexion en cas de succes
 *         ou <b>false</b> si une erreur survient.
 */
function connexion($host, $port, $dbname, $user, $password)
{
    global $modeacces, $connexion;

    if ($modeacces=="mysqli") {
        @$connexion = mysqli_connect("$host", "$user", "$password", "$dbname", $port);
        if (mysqli_connect_errno($connexion)) {
            die("Erreur de connexion : ".mysqli_connect_error($connexion));
        }
        return $connexion;
    }
}

/**
 * Ferme la connexion SQL.
 */
function deconnexion()
{
    global $modeacces, $connexion;

    if ($modeacces=="mysqli") {
        @mysqli_close($connexion);
    }
}

/**
 * Envoie une requete a un serveur SQL.
 *
 * @param string $sql Requete SQL.
 *
 * @return resource - Pour les requetes du type SELECT, SHOW, DESCRIBE, EXPLAIN et
 *          les autres requetes retournant un jeu de resultats, <b>executeSQL</b>
 *          retournera une ressource en cas de succes, ou <b>DIE</b> en cas d'erreur.
 *
 *          Pour les autres types de requetes, INSERT, UPDATE, DELETE, DROP, etc.,
 *          <b>executeSQL</b> retourne <b>TRUE</b> en cas de succes ou <b>DIE</b> en cas d'erreur.
 */
function executeSQL($sql)
{
    $result=executeSQL_GE($sql);
    
    if (!$result) {
        die(afficheErreur($sql));
    } else {
        return $result;
    }
}



/**
 *Envoie une requete a un serveur SQL laisse le programmeur gerer les Erreurs.
 *
 * @param string $sql Requete SQL.
 *
 * @return resource - Pour les requetes du type SELECT, SHOW, DESCRIBE, EXPLAIN et
 *          les autres requetes retournant un jeu de resultats, <b>executeSQL</b>
 *          retournera une ressource en cas de succes, ou <b>false</b> en cas d'erreur.
 *
 *          Pour les autres types de requetes, INSERT, UPDATE, DELETE, DROP, etc.,
 *          <b>executeSQL</b> retourne <b>TRUE</b> en cas de succes ou <b>false</b> en cas d'erreur.
 */
function executeSQL_GE($sql)
{
    global $modeacces, $connexion;

    if ($modeacces=="mysqli") {
        $result = mysqli_query($connexion, $sql);
    }

    return $result;
}



/**
 * Retourne le texte associe avec l'erreur generee lors de la derniere requete.
 *
 * @return string - Retourne le texte de l'erreur de la derniere fonction MySQL,
 *         ou '' (chaine vide) si aucune erreur survient.
 */
function erreurSQL()
{
    global $modeacces, $connexion;

    if ($modeacces=="mysqli") {
        return mysqli_error_list($connexion)[0]['error'];
    }
}



/**
 * Formate l'erreur de la requete SQL pour afficher les informations :
 * <ul> <li>Nom du serveur</li>
 *      <li>Nom du fichier</li>
 *      <li>Ligne de l'erreur</li>
 *      <li>Erreur SQL</li>
 *      <li><b>Requete SQL (en gras)</b></li></ul>
 *
 * @param string $sql Requete SQL.
 *
 * @return string - Chaine de carateres bien formatee.
 */
function afficheErreur($sql)
{
    return "Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"].
    "</b>.<br />Dans le fichier : ".__FILE__.
    " a la ligne : ".__LINE__.
    "<br />".erreurSQL().
    "<br /><br /><b>REQUETE SQL : </b>$sql<br />";
}



/**
 * Retourne le nombre de lignes d'un resultat SQL.
 *
 * @param string $sql Requete SQL.
 *
 * @return integer - Le nombre de lignes dans le jeu de resultats en cas de succes
 *         ou <b>false</b> si une erreur survient.
 */
function compteSQL($sql)
{
    global $modeacces;

    $result = executeSQL($sql);

    if ($modeacces=="mysqli") {
        $num_rows = mysqli_num_rows($result);
    }

    return $num_rows;
}



/**
 * Retourne un seul champ resultat d'une requete SQL.
 *
 * @param string $sql Requete SQL.
 *
 * @return string - une chaine resultat de la requete SQL.
 */
function champSQL($sql)
{
    global $modeacces;

    $result = executeSQL($sql);

    if ($modeacces=="mysqli") {
        $rows = mysqli_fetch_array($result, MYSQLI_NUM);
    }

    return $rows[0];
}



/**
 * Retourne un tableau resultat d'une requete SQL.
 *
 * @param string $sql Requete SQL.
 *
 * @return array - Tableau indexe et associatif resultat de la requete SQL.
 *
 * @example
 * <code>
 * $sql = "select * from user";            <br />
 * $results = tableSQL($sql);              <br />
 * foreach ($results as $row) {            <br />
 *   $login = $row['login'];     <br />
 *   $password = $row[3];        <br />
 *   echo $login." ".$password;  <br />
 * }                                       <br />
 * </code>
 */
function tableSQL($sql)
{
    global $modeacces;

    $rows=array();
    $result = executeSQL($sql);

    if ($modeacces=="mysqli") {
        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
            array_push($rows, $row);
        }
    }

    return $rows;
}



/**
 * Retourne un seule ligne resultat d'une requete SQL.
 *
 * @param string $sql Requete SQL.
 *
 * @return array - un tableau indexe et associatif representant la ligne.
 *
 * <br />
 * @example
 * <code>
 * $sql = "select * from user where numero = 1 "; <br />
 * $results = ligneSQL($sql);                     <br />
 * $login = $results['login'];                    <br />
 * $password = $results[3];                       <br />
 * echo $login." ".$password;                     <br />
 * </code>
 */
function ligneSQL($sql)
{
    global $modeacces;
    
    $result = executeSQL($sql);
    
    if ($modeacces=="mysqli") {
        $rows = mysqli_fetch_array($result, MYSQLI_BOTH);
    }
    
    return $rows;
}



/**
 * Affiche sous forme d'un tableau le resultat d'une requete SQL.
 *
 * @param string $sql Requete SQL.
 */
function afficheRequete($sql)
{
    $results = tableSQL($sql);
    $nbchamps = nombreChamp($sql);

    echo "<pre><table style=\"border: 2px solid blue; border-collapse: collapse; \">";
    echo "   <caption style=\"color:green;font-weight:bold\">$sql</caption>
	<tr style=\"border: 2px solid blue; border-collapse: collapse; \" >";
    for ($i=0; $i<$nbchamps; $i++) {
        echo "<th style=\"border: 2px solid blue; border-collapse: collapse; \">".nomChamp($sql, $i);
        echo "(".typeChamp($sql, $i).")</th>";
    }
    echo "   </tr>";

    foreach ($results as $ligne) {
        echo "<tr style=\"border: 1px solid red; border-collapse: collapse; \">";
        //on extrait chaque valeur de la ligne courante
        for ($i=0; $i<$nbchamps; $i++) {
            echo "<td style=\"border: 1px solid red; border-collapse: collapse; \">".$ligne[$i]."</td>";
        }
        echo "</tr>";
    }

    echo "</table></pre>";
}



/**
 * Retourne le nombre de champs d'une requete SQL.
 *
 * @param string $sql Requete SQL.
 *
 * @return integer - le nombre de champs d'un jeu de resultat en cas de succes
 *         ou <b>false</b> si une erreur survient.
 */
function nombreChamp($sql)
{
    global $modeacces;

    if ($modeacces=="mysqli") {
        $result = executeSQL($sql);
        return mysqli_num_fields($result);
    }
}



/**
 * Retourne le type d'une colonne SQL specifique.
 *
 * @param string $sql Requete SQL.
 * @param integer $field_offset Position numerique du champ. field_offset commence a 0.
 *        Si field_offset n'existe pas, une alerte <b>E_WARNING</b> sera egalement generee.
 *
 * @return string - Retourne le type du champ il peut etre : "int", "real", "string", "blob"
 *         ou autres, comme detaille dans la documentation MySQL.
 */
function typeChamp($sql, $field_offset)
{
    global $modeacces, $mysql_data_type_hash;

    $result = executeSQL($sql);

    if ($modeacces=="mysqli") {
        //transforme l'objet renvoye par mysqli_fetch_field_direct en tableau
        $infos = (array)mysqli_fetch_field_direct($result, $field_offset);
        //recherche dans le tableau $mysql_data_type_hash la correspondance en chaine du type
        return  $mysql_data_type_hash[$infos["type"]];
    }
}



/**
 * Converti une adresse IPV6 en IPV4, ne fait rien si une adresse IPV4
 * est passee en parametre.
 *
 * @param string $uneAdresse Adresse sous la forme IPV6 ou IPV4.
 *
 * @return string - Retourne l'adresse IPV4
 */
function adresseIPV4($uneAdresse)
{
    if (strpos($uneAdresse, ":")>0) {
        $test = explode(":", $uneAdresse);
        $ip = hexdec(substr($test[1], 0, 2));
        $ip .= ".".hexdec(substr($test[1], 2, 2));
        $ip .= ".".hexdec(substr($test[2], 0, 2));
        $ip .= ".".hexdec(substr($test[2], 2, 2));
    } else {
        $ip = $uneAdresse;
    }

    return $ip;
}



/**
 * Retourne le nom d'une colonne SQL specifique.
 *
 * @param string $sql Requete SQL.
 * @param integer $field_offset Position numerique du champ. field_offset commence a 0.
 *        Si field_offset n'existe pas, une alerte <b>E_WARNING</b> sera egalement generee.
 *
 * @return string - Retourne le nom du champ d'une colonne specifique.
 */
function nomChamp($sql, $field_offset)
{
    global $modeacces, $mysql_data_type_hash;

    if ($modeacces=="mysqli") {
        $result = executeSQL($sql);
        $infos = (array)mysqli_fetch_field_direct($result, $field_offset);
        return $infos["name"];
    }
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

/**
 * Protege une commande SQL de la presence de caracteres speciaux.
 *
 * @param string $sql Requete SQL.
 *
 * @return string - Requete SQL sans les caracteres speciaux, ou
 *         <b>false</b> si une erreur survient.
 */
function protectSQL($sql)
{
    global $modeacces, $connexion;
    
    if ($modeacces=="mysqli") {
        return mysqli_real_escape_string($connexion, stripslashes($sql));
    }
}
