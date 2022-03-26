<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="icon" href="ressources/menu/Notepad_Pencil_clip_art_hight.png">
    <link rel="stylesheet" href="styles/connexion.css">
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>


<?php
include("php/sql.php");
ConnectDatabase();
$loginStatus = CheckLogin();
?>


<?php
include 'php/menu.php';


if ($loginStatus[1]) {
    echo '<h3 class="errorMessage">' . $loginStatus[2] . '</h3>';
}

if ($loginStatus[0]) {

    echo '<form action="./connexion.php" method="POST">
        <div class="centre">
            <input type="hidden" value="logout" name="logout"></input>
            <button type="submit" class="bouton_co">Se déconnecter</button>
        </div>
    </form>';

    if (isset($_POST["logout"])){
        DestroyLoginCookie();
    }
}
else {
    include 'php/formulaire_connexion.php';
    echo '
            </br>
            <div class="centre">
            <a  href="inscription.php">Créer un compte >></a>
            </div>';
}

?>

<?php

include 'php/footer.php';

DisconnectDatabase();

?>

</body>
