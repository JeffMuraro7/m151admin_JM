<?php
    /**
     * Created by PhpStorm.
     * User: Muraro Jeff
     * Date: 26.08.2015
     * Time: 15:31
     */

    //Fonction pour la connection à la base de données.
    function connectDB($host, $dbname, $user, $pass){
        try {
            $dbh = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pass);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
        return $dbh;
    }