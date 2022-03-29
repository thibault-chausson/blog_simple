<link rel="stylesheet" href="styles/boutons.css">
<link rel="stylesheet" href="styles/style.css">

<?php
if ( isset($_POST["newPost"]) && $_POST["newPost"] == 1 ){


    ConnectDatabase();
    $loginStatus=CheckLogin();
    $query30 = "SELECT `ID` FROM `connexion` WHERE logname = '" . $username . "' ";

    $result30 = $conn->query($query30);
    $userID = $result30->fetch_assoc()["ID"];



echo '<form action="./index.php?userID='.$userID.'" method="POST" >
    <h3 class="centre">Exprimez vous !</h3>
    </br>
    <div>
        <input type="hidden" name="action" value="new">
        <div class="nom"><label for="title">Titre :</label></div>
        <div class="ecrire"> <input autofocus type="text" name="title"></div>
    </div>
    <div>
        <div class="nom"><label for="content">Message :</label></div>
        <div class="ecrire"><textarea name="content">Tapez votre texte ici...</textarea></div>
    </div>
    <div>
        <div class="centre"><button type="submit" class="bouton2">Ajouter ce post à mon blog</button></div>
    </div>
</form>';


}
?>