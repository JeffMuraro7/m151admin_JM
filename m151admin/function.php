<?php

/**
 * Created by PhpStorm.
 * User: Muraro Jeff
 * Date: 26.08.2015
 * Time: 15:31
 */
require_once('mysqLinc.php');

//Fonction pour la connection � la base de donn�es.
function getConnection() {

    static $dbh = null;

    try {
        if ($dbh === null) {
            $dbh = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASS);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    } catch (PDOException $e) {
        echo "Erreur !: " . $e->getMessage() . "<br/>";
        echo 'N� : ' . $e->getCode();
        die('Could not connect to MySQL');
    }

    return $dbh;
}

function insertUser($nom, $prenom, $birthday, $description, $email, $pseudo, $password) {
    if ((isset($nom)) && (isset($prenom)) && (isset($birthday)) && (isset($description)) && (isset($email)) && (isset($pseudo)) && (isset($password))) {
        $shaPassword = sha1($password);

        $user = getConnection()->prepare('INSERT INTO users (nom, prenom, dateNaissance, description, email, pseudo, mdp) VALUES(:nom, :prenom, :birthday, :description, :email, :pseudo, :password);');

        $user->bindParam(':nom', $nom, PDO::PARAM_STR);
        $user->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $user->bindParam(':birthday', $birthday, PDO::PARAM_STR);
        $user->bindParam(':description', $description, PDO::PARAM_STR);
        $user->bindParam(':email', $email, PDO::PARAM_STR);
        $user->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $user->bindParam(':password', $shaPassword, PDO::PARAM_STR);

        $user->execute();
    }
}

function updateUser($nom, $prenom, $birthday, $description, $email, $pseudo, $password, $id) {
    if ((isset($nom)) && (isset($prenom)) && (isset($birthday)) && (isset($description)) && (isset($email)) && (isset($pseudo)) && (isset($password)) && (isset($id))) {
        $user = getConnection()->prepare('UPDATE users SET nom=:nom, prenom=:prenom, dateNaissance=:birthday, description=:description, email=:email, pseudo=:pseudo, mdp=:password WHERE idUser = ' . $id . ';');

        $shaPassword = sha1($password);

        $user->bindParam(':nom', $nom, PDO::PARAM_STR);
        $user->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $user->bindParam(':birthday', $birthday, PDO::PARAM_STR);
        $user->bindParam(':description', $description, PDO::PARAM_STR);
        $user->bindParam(':email', $email, PDO::PARAM_STR);
        $user->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $user->bindParam(':password', $shaPassword, PDO::PARAM_STR);

        $user->execute();
    }
}

function deleteUser($idDelete) {
    $deleteUser = getConnection()->prepare('DELETE FROM users WHERE idUser=' . $idDelete . ';');
    $deleteUser->execute();
}

function selectAllUser() {
    $tab = getConnection()->prepare('SELECT * FROM users;');
    $tab->execute();
    return $tabRequest = $tab->fetchAll(PDO::FETCH_ASSOC);
}

function selectOneUser($idUserSearch) {
    $tab = getConnection()->prepare('SELECT * FROM users WHERE idUser = ' . $idUserSearch . ';');
    $tab->execute();
    return $tabRequest = $tab->fetch(PDO::FETCH_ASSOC);
}

function login() {
    session_start();
    $error = "";
    if (isset($_REQUEST['login'])) {
        if (empty($_REQUEST['pseudo']) || empty($_REQUEST['mdp'])) {
            $error = "Pseudo et Mot de passe sont invalid.";
        }
        vardump($_REQUEST['pseudo']);
    } else {
        $pseudo = $_REQUEST['pseudo'];
        $mpd = $_REQUEST['mdp'];

        $connexion = mysql_connect(DBNAME, USER, PASS);
        $db = mysql_select_db("users", $connexion);
        
        $query = mysql_query("select * from users where mdp='$mdp' AND pseudo='$pseudo'");
        $rows = mysql_num_rows($query);
        if ($rows == 1) {
            $_SESSION['login_user'] = $pseudo;
            //header("location: affichageUsers.php?id=".$id);
        } else {
            $error = "Pseudo ou Mot de passe sont invalid.";
        }        
        mysql_close($connexion);
    }
}
