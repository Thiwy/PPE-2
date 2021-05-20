<doctype HTML!>
    <html lang="fr">
<html>
<head>
<meta charset="utf-8">
<title> liste des visiteurs </title>
<link href="styleform.css" rel="stylesheet" type="text/css"/>
<form id="modification" method="GET" action="update.php">
</head>
<body>
    <strong><H1>VISITEUR</H1></strong>
    <?php
     include 'mesFonctionsGenerales.php';

     // Connexion à la base de données bdgsb
     $cnxBDD = connexion();

     $modifVisiteur = $_GET['id'] ;

    $sql='select * from visiteur where id="'.$modifVisiteur.'"';
    $userReq = $cnxBDD -> query($sql);
    $userData = $userReq -> fetch_assoc();

   
     ?> 
                <p>
                    <label for="id">Identifiant : </label>
                    <input id="id" name="id" type="text" value="<?php echo $userData['id'];?>" readonly="readonly" size="10" /><br>
                </p>
                <p>
                    <label for="nom">Nom : </label>
                    <input id="nom" name="nom" type="text" value="<?php echo $userData['nom'];?>" size="10" /><br>
                </p>
                <p>
                    <label for="prenom">Prenom : </label>
                    <input id="prenom" name="prenom" type="text" value="<?php echo $userData['prenom'];?>" size="10" /><br>
                </p>
                <p>
                    <label for="adresse">Adresse : </label>
                    <input id="adresse" name="adresse" type="text" value="<?php echo $userData['adresse'];?>" size="10" /><br>
                </p>
                <p>
                    <label for="ville">Ville : </label>
                    <input id="ville" name="ville" type="text" value="<?php echo $userData['ville'];?>" size="10" /><br>
                </p>
                <p>
                    <label for="cp">CP : </label>
                    <input id="cp" name="cp" type="text" value="<?php echo $userData['CP'];?>" size="10" /><br>
                </p>
                <p>
                    <label for="date">Date d'embauche : </label>
                    <input id="date" name="date" type="text" value="<?php echo $userData['dte'];?>" size="10" /><br>
                </p>
                <p>
                    <label for="login">login : </label>
                    <input id="login" name="login" type="text" value="<?php echo $userData['login'];?>"  size="10" /><br>
                </p>
                <p>
                    <label for="mdp">mdp : </label>
                    <input id="mdp" name="mdp" type="password" value="<?php echo $userData['password'];?>" size="10" /><br>
                </p>

                <p>
                    <br>
                    <input type="submit" id="modifier" name="modifier" value="Modifier">
                </p>
            </body>
            </html>

    
    </form>