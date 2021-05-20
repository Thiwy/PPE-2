<doctype HTML!>
<html lang="fr">
<html>
<head>
<meta charset="utf-8">
<title> liste des visiteurs </title>
<link href="styleform.css" rel="stylesheet" type="text/css"/>
<form id="connexion" method="GET" action="adminconnex.php">
</head>
<body>
    <strong><H1>VISITEUR</H1></strong>
           
                <p>
                    <label for="nom">Identifiant : </label>
                    <input id="login" name="login" placeholder="Entrer l'administrateur" type="text"  /><br>
                </p>
                
                <p>
                    <label for="mdp">Mot De Passe : </label>
                    <input id="mdp" name="mdp" placeholder="Entrer le mot de passe" type="password"  /><br>
                </p>
                <p>
                    <br>
                    <form method="post" action="adminconnex.php">  <input type="submit" value='CONNEXION'> </form>
                </p>
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
               
            </body>
            </html>
    </form>