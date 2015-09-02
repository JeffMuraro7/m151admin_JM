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
            if($dbh == null) {
                $dbh = new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER,PASS);
            }
        } catch (PDOException $e) {
            echo "Erreur !: " . $e->getMessage() . "<br/>";
            echo 'N° : ' . $e->getCode();
            die('Could not connect to MySQL');
        }

        return $dbh;
    }

    if(isset($_POST['valider'])) {
        insertUser();
    }

    function insertUser(){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $birthday = $_POST['birthday'];
        $description = $_POST['description'];
        $email = $_POST['email'];
        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];

        $dbh = getConnection();

        if((!isset($nom) == "") && (!isset($prenom) == "") && (!isset($birthday) == "") && (!isset($description) == "") && (!isset($email) == "") && (!isset($pseudo) == "") && (!isset($password) == "")) {
            $user = getConnection()->prepare('INSERT INTO users VALUES("":nom, :prenom, :birthday, :description, :email, :pseudo, :password)');

            $user->bindParam(':nom', $nom, PDO::PARAM_STR);
            $user->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $user->bindParam(':birthday', $birthday, PDO::PARAM_STR);
            $user->bindParam(':description', $description, PDO::PARAM_STR);
            $user->bindParam(':email', $email, PDO::PARAM_STR);
            $user->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
            $user->bindParam(':password', $password, PDO::PARAM_STR);
            return $user;
        }
        else {

        }
    }