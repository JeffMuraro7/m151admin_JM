<!DOCTYPE html>

<?php
session_start();

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
                <?php
                    if(isset($_SESSION['login_user'])) {
                        echo '<a href="logout.php">Logout</a>';
                    } else {
                        echo '<a href="index.php">Inscription</a>
                              <a href="login.php">Login</a>';
                    }
                ?>
                
                
            </nav>

            <?php
            if (isset($_REQUEST['idDelete'])) {
                $idDelete = $_REQUEST['idDelete'];
                deleteUser($idDelete);
                header('location:affichageUsers.php');
            }
            if (!isset($_REQUEST['id'])) {
                $tab = selectAllUser();
                $tabAllUser = buildAllTable($tab);
                echo $tabAllUser;
            } else {
                $tabDetailUser = buildDetailTable();
                echo $tabDetailUser;
            }
            ?>
        </div>
    </body>
</html>
