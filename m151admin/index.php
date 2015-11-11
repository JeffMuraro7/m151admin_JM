<!DOCTYPE html>

<?php
    session_start();

    $nom = isset($_REQUEST['nom']) ? $_REQUEST['nom'] : "";
    $prenom = isset($_REQUEST['prenom']) ? $_REQUEST['prenom'] : "";
    $birthday = isset($_REQUEST['birthday']) ? $_REQUEST['birthday'] : "";
    $description = isset($_REQUEST['description']) ? $_REQUEST['description'] : "";
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
    $pseudo = isset($_REQUEST['pseudo']) ? $_REQUEST['pseudo'] : "";
    $password = "Insérer un mot de passe!!";
    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
    
    $error = "";
    
    include 'function.php';

    if (isset($_REQUEST['Valider'])) {
      $insert = insertUser($nom, $prenom, $birthday, $description, $email, $pseudo, $password);
        
        if($insert == true) {
            header('location:affichageUsers.php');
        } else {
            $error = "Votre inscription n'a pas fonctionné. Le pseudo existe déjà!";
        }        
    }

    if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
        $idUserSearch = $_REQUEST['id'];

        $value = selectOneUser($idUserSearch);

        $id = $value['idUser'];
        $nom = $value['nom'];
        $prenom = $value['prenom'];
        $birthday = $value['dateNaissance'];
        $description = $value['description'];
        $email = $value['email'];
        $pseudo = $value['pseudo'];
        $placeholder = "Laissez vide si vous ne voulez pas le changer!";
    }

    if (isset($_REQUEST['Modifier'])) {
        $value = selectOneUser($idUserSearch);

        $nom = $_REQUEST['nom'];
        $prenom = $_REQUEST['prenom'];
        $birthday = $_REQUEST['birthday'];
        $description = $_REQUEST['description'];
        $email = $_REQUEST['email'];
        $pseudo = $_REQUEST['pseudo'];
        $admin = $_REQUEST['grpAdmin'];

        if (!isset($_REQUEST['password'])) {
            $password = $value['mdp'];
        } else {
            $password = $_REQUEST['password'];
        }

 

        updateUser($nom, $prenom, $birthday, $description, $email, $pseudo, $password, $id, $admin);
        header('location:affichageUsers.php');
    }


    if(isset($_SESSION['adminUser']) && $_SESSION['adminUser'] != 1) {
        header('location:affichageUsers.php');
    } else if(!isset($_SESSION['adminUser'])){
            
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
            <nav>
                <?php
                if (isset($_SESSION['idUser'])) {
                    echo '<a href="affichageUsers.php">Liste utilisateurs</a>';
                } else {
                    echo '<a href="affichageUsers.php">Liste utilisateurs</a>
                              <a href="login.php">Login</a>';
                }
                ?>
            </nav>


            <form id="formulaire" method="post" action="index.php">
                <fieldset>
                    <legend>Formulaire</legend>

                    <input type="hidden" id="id" name="id" value="<?php echo $id ?>" />

                    <label class="styleLabel" for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" class="styleInput" value= "<?php echo $nom ?>" required autofocus />

                    <label class="styleLabel" for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" class="styleInput" value="<?php echo $prenom ?>" required />

                    <label class="styleLabel" for="birthday">Date de naissance :</label>
                    <input type="date" id="birthday" name="birthday" class="styleInput" value="<?php echo $birthday ?>" required />

                    <label class="styleLabel" for="description">Description :</label>
                    <textarea id="description" name="description" class="styleInput" required><?php echo $description ?></textarea>

                    <label class="styleLabel" for="email">Email :</label>
                    <input type="email" id="email" name="email" class="styleInput" value="<?php echo $email ?>" required />

                    <label class="styleLabel" for="pseudo">Pseudo :</label>
                    <input type="text" id="pseudo" name="pseudo" class="styleInput" value="<?php echo $pseudo ?>" required />

                    <label class="styleLabel" for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" class="styleInput" placeholder="<?php echo $password ?>" /> </br>

                    <?php
                    if (isset($_SESSION['adminUser']) && $_SESSION['adminUser'] == 1) {
                        echo '<input type="radio" name="grpAdmin" value="1"> Admin <br>'
                        . '<input type="radio" name="grpAdmin" value="0" checked> User <br>';
                    }
                    
                    echo $error;
                    
                    if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
                        echo "<input type='submit' name='Modifier' value='Modifier' id='valider' /> ";
                    } else {
                        echo "<input type='submit' name='Valider' value='Envoyer' id='valider' /> <input type='reset' name='Reset' value=' Annuler ' id='reset' />";
                    }
                    ?>

                </fieldset>
            </form>
        </div>
    </body>
</html>

