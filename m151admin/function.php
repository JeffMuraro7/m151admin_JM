<?php
    /**
     * Created by PhpStorm.
     * User: Muraro Jeff
     * Date: 26.08.2015
     * Time: 15:31
     */

    require_once('mysqLinc.php');

    //Fonction pour la connection à la base de données.
    function getConnection(){

        static $dbh = null;

        try {
            if($dbh === null) {
                $dbh = new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER,PASS);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (PDOException $e) {
            echo "Erreur !: " . $e->getMessage() . "<br/>";
            echo 'N° : ' . $e->getCode();
            die('Could not connect to MySQL');
        }

        return $dbh;
    }

    function insertUser(){
        $nom = $_REQUEST['nom'];
        $prenom = $_REQUEST['prenom'];
        $birthday = $_REQUEST['birthday'];
        $description = $_REQUEST['description'];
        $email = $_REQUEST['email'];
        $pseudo = $_REQUEST['pseudo'];
        $password = sha1($_REQUEST['password']);

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

    function selectUser(){
        $tab = getConnection()->prepare('SELECT * FROM users;');
        $tab->execute();
        return $tabRequest = $tab->fetchAll(PDO::FETCH_ASSOC);

    }