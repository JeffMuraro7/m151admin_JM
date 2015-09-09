<!DOCTYPE html>

<?php


$tab = selectUser();

foreach($tab as $value)
{
    echo $value['pseudo'];
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>m151admin</title>
    <link rel="stylesheet" type="text/css" href="myStyle.css" />
</head>
    <body>
        <div id="center">

        </div>
    </body>
</html>
