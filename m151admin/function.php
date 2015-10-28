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

function updateUser($nom, $prenom, $birthday, $description, $email, $pseudo, $password, $id, $admin) {
    if ((isset($nom)) && (isset($prenom)) && (isset($birthday)) && (isset($description)) && (isset($email)) && (isset($pseudo)) && (isset($password)) && (isset($id))) {
        $user = getConnection()->prepare('UPDATE users SET nom=:nom, prenom=:prenom, dateNaissance=:birthday, description=:description, email=:email, pseudo=:pseudo, mdp=:password, adminUser=:admin WHERE idUser = ' . $id . ';');

        //$shaPassword = sha1($password);

        $user->bindParam(':nom', $nom, PDO::PARAM_STR);
        $user->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $user->bindParam(':birthday', $birthday, PDO::PARAM_STR);
        $user->bindParam(':description', $description, PDO::PARAM_STR);
        $user->bindParam(':email', $email, PDO::PARAM_STR);
        $user->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $user->bindParam(':password', $shaPassword, PDO::PARAM_STR);
        $user->bindParam(':admin', $admin, PDO::PARAM_STR);

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

function login($pseudo, $mdpSHA) {
    session_start();
    
    $connect = getConnection()->prepare("SELECT * FROM users WHERE pseudo='$pseudo' AND mdp='$mdpSHA'");
    $connect->execute();
    $result = $connect->fetch(PDO::FETCH_ASSOC);
    
    if ($result) {
       echo "Ca marche";
        $_SESSION['login_user'] = $pseudo;
        $_SESSION['idUser'] = $result['idUser'];
        $_SESSION['adminUser'] = $result['adminUser'];
    }
}
