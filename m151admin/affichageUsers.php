<!DOCTYPE html>

<?php
    include 'function.php';

    $tab = assocToHtml();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>m151admin</title>
    <link rel="stylesheet" type="text/css" href="myStyle.css" />
</head>
    <body>
        <div id="center">
            <?php
                echo $tab;
            ?>
        </div>
    </body>
</html>
