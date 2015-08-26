<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 26.08.2015
 * Time: 13:51
 */

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
            <table>
                <tr>
                    <td>
                        <label>Nom : </label>
                    </td>
                    <td>
                        <input type="text" name="nom" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Prénom : </label>
                    </td>
                    <td>
                        <input type="text" name="prenom" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Date de naissance : </label>
                    </td>
                    <td>
                        <input type="date" name="birthday" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Description : </label>
                    </td>
                    <td>
                        <textarea cols="40" name="description"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Email : </label>
                    </td>
                    <td>
                        <input type="email" name="mail"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Pseudo : </label>
                    </td>
                    <td>
                        <input type="text" name="pseudo" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Mot de passe : </label>
                    </td>
                    <td>
                        <input type="password" name="password" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit">Envoyer</input>
                    </td>
                    <td>
                        <input type="button">Annuler</input>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>

