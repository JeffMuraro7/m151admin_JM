<?php
    /**
     * Created by PhpStorm.
     * User: Muraro Jeff
     * Date: 26.08.2015
     * Time: 13:51
     */

    require_once('function.php');
    require_once('mysqLinc.php');



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>m151admin</title>
    <link rel="stylesheet" type="text/css" href="myStyle.css" />
</head>
    <body>
        <div id="center">
            <div id="title">Formulaire</div>
            <div id="formulaireStyle">
                <form id="formulaire" method="post" action="">
                    <label for="nom">Nom :</label><input type="text" id="nom" /></br></br>
                    <label for="prenom">Prénom :</label><input type="text" id="prenom" /></br></br>
                    <label for="birthday">Date de naissance :</label><input type="date" id="birthday" /></br></br>
                    <label for="description">Description :</label><textarea id="description"></textarea></br></br>
                    <label for="email">Email :</label><input type="email" id="email" /></br></br>
                    <label for="pseudo">Pseudo :</label><input type="text" id="pseudo" /></br></br>
                    <label for="password">Mot de passe :</label><input type="text" id="password" /></br></br>
                    <input type="submit" name="valider" value="Envoyer"/> <input type="reset" name="annuler" value=" Annuler "/>
                </form>
            </div>
        </div>
    </body>
</html>

