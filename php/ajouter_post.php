<link rel="stylesheet" href="styles/boutons.css">

<?php

//Bouton pour aller sur le formulaire d'ajout de posts


ConnectDatabase();
$loginStatus=CheckLogin();
$query30 = "SELECT `ID` FROM `connexion` WHERE logname = '" . $username . "' ";

$result30 = $conn->query($query30);
$userID = $result30->fetch_assoc()["ID"];


echo '<form action="./index.php?userID='.$userID.'" method="POST" class="centre">
            <input type="hidden" name="newPost" value="1">
            <div>
            <button type="submit" class="bouton2">Ajouter un nouveau post!</button>
            </div>
        </form>';

?>