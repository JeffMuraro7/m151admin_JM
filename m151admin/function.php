<?php
    /**
     * Created by PhpStorm.
     * User: Muraro Jeff
     * Date: 26.08.2015
     * Time: 15:31
     */

    require_once('mysqLinc.php');

    //Fonction pour la connection � la base de donn�es.
    function getConnection(){

        static $dbh = null;

        try {
            if($dbh === null) {
                $dbh = new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER,PASS);
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
        if((isset($nom)) && (isset($prenom)) && (isset($birthday)) && (isset($description)) && (isset($email)) && (isset($pseudo)) && (isset($password))) {
            $user = getConnection()->prepare('INSERT INTO users (nom, prenom, dateNaissance, description, email, pseudo, mdp) VALUES(:nom, :prenom, :birthday, :description, :email, :pseudo, :password);');

            $user->bindParam(':nom', $nom, PDO::PARAM_STR);
            $user->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $user->bindParam(':birthday', $birthday, PDO::PARAM_STR);
            $user->bindParam(':description', $description, PDO::PARAM_STR);
            $user->bindParam(':email', $email, PDO::PARAM_STR);
            $user->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
            $user->bindParam(':password', $password, PDO::PARAM_STR);

            $user->execute();
        }
    }

    function selectAllUser(){
        $tab = getConnection()->prepare('SELECT * FROM users;');
        $tab->execute();
        return $tabRequest = $tab->fetchAll(PDO::FETCH_ASSOC);
    }

    function selectOneUser($idUserSearch) {
        $tab = getConnection()->prepare('SELECT * FROM users WHERE idUser = '. $idUserSearch .';');
        $tab->execute();
        return $tabRequest = $tab->fetchAll(PDO::FETCH_ASSOC);
    }