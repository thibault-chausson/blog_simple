<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="icon" href="ressources/menu/Notepad_Pencil_clip_art_hight.png">

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
    echo '<p>Connexion OK !</p>';
    echo '<form action="./connexion.php" method="POST">
        <div>
            <input type="hidden" value="logout" name="logout"></input>
            <button type="submit">Se déconnecter</button>
        </div>
    </form>';

    if (isset($_POST["logout"])){
        DestroyLoginCookie();
    }
}
else {
    include 'php/formulaire_connexion.php';
    echo '<a href="inscription.php">Créer un compte >></a>';
}

?>

<?php

include 'php/footer.php';

DisconnectDatabase();

?>

</body>
