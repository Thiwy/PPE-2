
<doctype HTML!>
<html lang="fr">
<html>
<head>
<meta charset="utf-8">
<title> liste des visiteurs </title>
<link href="styleform.css" rel="stylesheet" type="text/css"/>
<form id="formulaire" method="GET" action="ajout.php">
</head>
<body>
    <strong><H1>VISITEUR</H1></strong>
    <?php
     include 'mesFonctionsGenerales.php';   
     date_default_timezone_set('utc');
    $date= date ("Y-m-d");
    
     ?> 
           
                <p>
                    <label for="nom">Nom : </label>
                    <input id="nom" name="nom" type="text" value="" size="10" /><br>
                </p>
                <p>
                    <label for="prenom">Prenom : </label>
                    <input id="prenom" name="prenom" type="text" value="" size="10" /><br>
                </p>
                <p>
                    <label for="adresse">Adresse : </label>
                    <input id="adresse" name="adresse" type="text" value="" size="10" /><br>
                </p>
                <p>
                    <label for="ville">Ville : </label>
                    <input id="ville" name="ville" type="text" value="" size="10" /><br>
                </p>
                <p>
                    <label for="cp">CP : </label>
                    <input id="cp" name="cp" type="text" value="" size="10" /><br>
                </p>
                <p>
                    <label for="date">Date d'embauche : </label>
                    <input id="date" name="date" type="text" value="<?php echo $date;?>"readonly="readonly" size="10" /><br>
                </p>
                <p>
                    <label for="mdp">mdp : </label>
                    <input id="mdp" name="mdp" type="password" value="" size="10" /><br>
                </p>
                <p>
                    <br>
                    <input type="submit" id="envoyer" name="envoyer" value="Envoyer">
                </p>
            </body>
            </html>
    </form>