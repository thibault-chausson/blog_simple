<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rock Note</title>
    <link rel="stylesheet" href="styles/grid.css">
    <link rel="icon" href="ressources/menu/Notepad_Pencil_clip_art_hight.png">
</head>

<body>

<?php
include 'php/menu.php';
include 'php/sql.php';

ConnectDatabase();

$loginStatus=CheckLogin();


?>

<div class="parent">
<div class="titre">
    <?php
        if (isset($username)){
            echo "<p>Bienvenu $username.</p> <p> Quoi de neuf aujourd'hui ?</p>";
        }
        else{
            echo '<p>Vous n\'êtes pas connecté il me semble !!</p>';
        }
    ?>
</div>
<div class="m_user">
    <p>Visitez d'autres pages Rock Note : </p>
    <?php
        include ("php/sql_affichage_user.php");
    ?>
</div>
<div class="s_menu">
    <?php
    if (isset($username)){
        echo "<p>Bienvenu $username.</p> <p> Quoi de neuf aujourd'hui ?</p>";
    }
    else{
        echo '<a><a href="connexion.php">Connectez-vous >></a></a>';
    }
    ?>
</div>
<div class="corps">
    <p>eeee</p>
</div>
</div>



<?php


include 'php/footer.php';
DisconnectDatabase();
?>

</body>
