<!DOCTYPE html>

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

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>m151admin</title>
    <link rel="stylesheet" type="text/css" href="myStyle.css" />
</head>
    <body>
        <div id="center">
            <form id="formulaire" method="post" action="">
                <fieldset>
                    <legend>Formulaire</legend>

                    <label class="styleLabel" for="nom">Nom :</label>
                    <input type="text" id="nom" class="styleInput" required autofocus />

                    <label class="styleLabel" for="prenom">Prénom :</label>
                    <input type="text" id="prenom" class="styleInput" required />

                    <label class="styleLabel" for="birthday">Date de naissance :</label>
                    <input type="date" id="birthday" class="styleInput" required />

                    <label class="styleLabel" for="description">Description :</label>
                    <textarea id="description" class="styleInput" required></textarea>

                    <label class="styleLabel" for="email">Email :</label>
                    <input type="email" id="email" class="styleInput" required />

                    <label class="styleLabel" for="pseudo">Pseudo :</label>
                    <input type="text" id="pseudo" class="styleInput" required />

                    <label class="styleLabel" for="password">Mot de passe :</label>
                    <input type="text" id="password" class="styleInput" required /> </br>

                    <input type="submit" name="valider" value="Envoyer" id="valider" /> <input type="reset" name="annuler" value=" Annuler " id="reset" />
                </fieldset>
            </form>
        </div>
    </body>
</html>

