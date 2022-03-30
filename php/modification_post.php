
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



    echo '<form action="./index.php?userID='.$userID.'" method="POST">
        <div class="formbutton">Modification d\'un post passé</div>
        <div>
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="postID" value='.$data["ID_post"].'>
            <label for="title">Titre :</label>
            <input autofocus type="text" name="title" value='.$data["title"].'>
        </div>
        <div>
            <label for="content">Message :</label>
            <textarea name="content"> '.$data["content"].'</textarea>
        </div>
        <div class="formbutton">
            <button type="submit">Modifier le post</button>
        </div>
    </form>
    <form action="./index.php?userID='.$userID.'" method="POST" >
        <div class="formbutton">Cliquez le bouton ci-dessous pour effacer le post</div>
        <div>
            <input type="hidden" name="action" id="action"  value="delete" >
            <input type="hidden" name="postID" value='.$data["ID_post"].'>
        </div>
        <div class="formbutton">
            
           
            <button  type="submit"  >Supprimer le post</button>
        </div>
        
    </form>
    ';








}
else {
    echo "<h1>Erreur! Cette ID ne correspond à aucun post!</h1>";
}
}

?>