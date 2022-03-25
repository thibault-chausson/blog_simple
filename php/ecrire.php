<?php
if ( isset($_POST["newPost"]) && $_POST["newPost"] == 1 ){


    ConnectDatabase();
    $loginStatus=CheckLogin();
    $query30 = "SELECT `ID` FROM `connexion` WHERE logname = '" . $username . "' ";

    $result30 = $conn->query($query30);
    $userID = $result30->fetch_assoc()["ID"];



echo '<form action="./index.php?userID='.$userID.'" method="POST">
    <div >Création d\'un nouveau post</div>
    <div>
        <input type="hidden" name="action" value="new">
        <label for="title">Titre :</label>
        <input autofocus type="text" name="title">
    </div>
    <div>
        <label for="content">Message :</label>
        <textarea name="content">Tapez votre texte ici...</textarea>
    </div>
    <div>
        <button type="submit">Ajouter ce post à mon blog</button>
    </div>
</form>';


}
?>