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

            <?php
            if (isset($_REQUEST['idDelete'])) {
                $idDelete = $_REQUEST['idDelete'];
                deleteUser($idDelete);
                header('location:affichageUsers.php');
            }
            if (!isset($_REQUEST['id'])) {
                $tabAllUser = buildAllTable();
                echo $tabAllUser;
            } else {
                $tabDetailUser = buildDetailTable();
                echo $tabDetailUser;
            }
            ?>
        </div>
    </body>
</html>
