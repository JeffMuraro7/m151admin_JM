<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>m151admin</title>
    <link rel="stylesheet" type="text/css" href="myStyle.css" />
</head>
    <body>
        <div id="center">
            <form id="formulaire" method="post" action="function.php">
                <fieldset>
                    <legend>Formulaire</legend>

                    <label class="styleLabel" for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" class="styleInput" required autofocus />

                    <label class="styleLabel" for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" class="styleInput" required />

                    <label class="styleLabel" for="birthday">Date de naissance :</label>
                    <input type="date" id="birthday" name="birthday" class="styleInput" required />

                    <label class="styleLabel" for="description">Description :</label>
                    <textarea id="description" name="description" class="styleInput" required></textarea>

                    <label class="styleLabel" for="email">Email :</label>
                    <input type="email" id="email" name="email" class="styleInput" required />

                    <label class="styleLabel" for="pseudo">Pseudo :</label>
                    <input type="text" id="pseudo" name="pseudo" class="styleInput" required />

                    <label class="styleLabel" for="password">Mot de passe :</label>
                    <input type="text" id="password" name="password" class="styleInput" required /> </br>

                    <input type="submit" name="valider" value="Envoyer" id="valider" /> <input type="reset" name="annuler" value=" Annuler " id="reset" />
                </fieldset>
            </form>
        </div>
    </body>
</html>

