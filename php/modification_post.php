
<?php

if ( isset($_POST["modifier"]) ){
    ConnectDatabase();
    $loginStatus=CheckLogin();

    $query = 'SELECT * FROM `post` WHERE `ID_post` ='.$_POST["modifier"];
    $result = $conn->query($query);





    $query40 = "SELECT `ID` FROM `connexion` WHERE logname = '" . $username . "' ";

    $result40 = $conn->query($query40);
    $userID = $result40->fetch_assoc()["ID"];



if ( $result->num_rows > 0 ){
    $data = $result->fetch_assoc();



    echo '<form action="./index.php?userID='.$userID.'" method="POST" class="centre">
        <div class="formbutton">Modification d\'un post passé</div>
        <div>
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="postID" value='.$data["ID_post"].'>
            <label class="nomModif" for="title">Titre :</label>
            <input class="ecrireModif" autofocus type="text" name="title" value='.$data["title"].'>
        </div>
        <div>
            <label class="nomModif" for="content">Message :</label>
            <textarea class="ecrireModif" name="content"> '.$data["content"].'</textarea>
        </div>
        <div class="formbutton">
            <button type="submit" class="bouton2">Modifier le post</button>
        </div>
    </form>
    <br>
    <form action="./index.php?userID='.$userID.'" method="POST" class="centre">
        <div class="formbutton">Cliquez le bouton ci-dessous pour effacer le post</div>
        <div>
            <input type="hidden" name="action" id="action"  value="delete" >
            <input type="hidden" name="postID" value='.$data["ID_post"].'>
        </div>
        <div class="formbutton">
            
           
            <button  type="submit"  class="bouton2">Supprimer le post</button>
        </div>
        
    </form>
    ';








}
else {
    echo "<h1>Erreur! Cette ID ne correspond à aucun post!</h1>";
}
}

?>