<?php
    /**
     * Created by PhpStorm.
     * User: Muraro Jeff
     * Date: 26.08.2015
     * Time: 15:31
     */

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