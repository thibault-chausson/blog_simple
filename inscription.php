<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="styles/inscription.css">
    <link rel="stylesheet" href="styles/styles.css">

    <link rel="icon" href="ressources/menu/Notepad_Pencil_clip_art_hight.png">
</head>

<body>


<?php
include("php/sql.php");
ConnectDatabase();
$newAccountStatus = CheckNewAccountForm();


include 'php/menu.php';




if($newAccountStatus[1]){
    echo '<h3 class="centre">Nouveau compte crée avec succès !</h3>';




}
elseif ($newAccountStatus[0]){
    echo '<h3 id="colorAnim" class="centre">'.$newAccountStatus[2].'</h3>';
}


include 'php/formulaire_inscription.php';



include 'php/footer.php';


DisconnectDatabase();

?>


</body>

<script type="text/javascript" src="./js/messageErreur.js"></script>

