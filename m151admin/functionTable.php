<?php


function buildAllTable($tab) {
    $tableauAll = "<table>";
//TODO éviter l'appel à selectAllUser ici et passer plutot $tab en param, ainsi que l'idUser connecté et le flag adminuser, comme ça votre fonction est entièrement indépendante
    //$tab = selectAllUser();

    foreach ($tab as $value) {
        if(isset($_SESSION['adminUser']) && $_SESSION['adminUser'] == 1) {
            $tableauAll .= "<tr><td>" . $value['nom'] . "</td><td>" . $value['prenom'] . "</td><td class='noBorder'><a href='affichageUsers.php?id=" . $value['idUser'] . "'>Détail</a></td><td class='noBorder'><a href='index.php?id=" . $value['idUser'] . "'>Modifier</a></td><td class='noBorder'><a href='affichageUsers.php?idDelete=" . $value['idUser'] . "'>Supprimer</a></td>";
        } else {
            if(isset($_SESSION['adminUser']) && $_SESSION['idUser'] == $value['idUser']) {
                $tableauAll .= "<tr><td>" . $value['nom'] . "</td><td>" . $value['prenom'] . "</td><td class='noBorder'><a href='affichageUsers.php?id=" . $value['idUser'] . "'>Détail</a></td><td class='noBorder'><a href='index.php?id=" . $_SESSION['idUser'] . "'>Modifier</a></td><td class='noBorder'><a href='affichageUsers.php?idDelete=" . $value['idUser'] . "'>Supprimer</a></td>";
            } else {
                $tableauAll .= "<tr><td>" . $value['nom'] . "</td><td>" . $value['prenom'] . "</td><td class='noBorder'><a href='affichageUsers.php?id=" . $value['idUser'] . "'>Détail</a></td>";
            }
        }
        $tableauAll .=  "</tr>";
    }

    $tableauAll .= "</table>";

    return $tableauAll;
}

function buildDetailTable() {
    $tableauDetail = "<table>";

    if (isset($_REQUEST['id'])) {
        $idUserSearch = $_REQUEST['id'];
    }

    $value = selectOneUser($idUserSearch);

    $tableauDetail .= "<tr><td> Nom </td><td> Prenom </td><td> Date de naissance </td><td> Description </td><td> Pseudo </td><td> Email </td></tr>";
    $tableauDetail .= "<tr><td>" . $value['nom'] . "</td><td>" . $value['prenom'] . "</td><td>" . $value['dateNaissance'] . "</td><td>" . $value['description'] . "</td><td>" . $value['pseudo'] . "</td><td>" . $value['email'] . "</td></tr>";
    $tableauDetail .= "<tr class='noBorder'><td class='noBorder'></td><td class='noBorder'></td><td class='noBorder'></td><td class='noBorder'></td><td class='noBorder'></td><td class='noBorder'><a href='affichageUsers.php'>Back</a></td></tr>";

    $tableauDetail .= "</table>";

    return $tableauDetail;
}

?>
