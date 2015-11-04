<!DOCTYPE html>

<?php
    session_start();

    include 'function.php';
    include 'functionTable.php';

    $error = "";
    
    
    if(isset($_REQUEST['login'])) {
        $pseudo = $_REQUEST['pseudo'];
        $mdp = $_REQUEST['mdp'];
        $mdpSHA = sha1($mdp);
        
        login($pseudo, $mdpSHA);
    } else {
        if(empty($_REQUEST['pseudo']) || empty($_REQUEST['mdp'])) {
            $error = "Pseudo ou mot de passe invalide.";
        }
    }
    
    if(isset($_SESSION['login_user'])){
        header('location:affichageUsers.php');
    }
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
                <a href="affichageUsers.php">Liste utilisateurs</a>
            </nav>
            <form action="login.php" method="POST">
                <input type="text" name="pseudo" placeholder="Pseudo"/>
                <input type="password" name="mdp" placeholder="Mot de passe"/>
                <input type="submit" name="login" value="login">
            </form>

        </div>
    </body>
</html>
