<!DOCTYPE html>

<?php
include 'function.php';
include 'functionTable.php';
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>m151admin</title>
        <link rel="stylesheet" type="text/css" href="myStyle.css" />
    </head>
    <body>
        <div id="centerUsers">
            <nav>
                <a href="index.php">Inscription</a>
            </nav>
            <form action="" method="POST">
                <input type="text" name="pseudo" placeholder="Pseudo"/>
                <input type="password" name="mdp" placeholder="Mot de passe"/>
                <input type="submit" name="login" value="Login">
            </form>

        </div>
    </body>
</html>
