<?php

ConnectDatabase();
$loginStatus=CheckLogin();
$query30 = "SELECT `ID` FROM `connexion` WHERE logname = '" . $username . "' ";

$result30 = $conn->query($query30);
$userID = $result30->fetch_assoc()["ID"];


echo '<form action="./index.php?userID='.$userID.'" method="POST">
            <input type="hidden" name="newPost" value="1">
            <button type="submit">Ajouter un nouveau post!</button>
        </form>';

?>