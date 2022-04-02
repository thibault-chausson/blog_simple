
<?php

//Le formulaire pour modifier un post

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

?>
        <br>

<form action="./index.php?userID=<?php echo $userID?>" method="POST" class="centre" >

        <div>
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="postID" value="<?php echo $data["ID_post"]?>">
            <label class="nomModif" for="title">Titre :</label>
            <input class="ecrireModif" autofocus type="text" name="title" value="<?php echo $data["title"]?>">
        </div>
    <br>
        <div>
            <label class="nomModif" for="content">Message :</label>
            <textarea class="ecrireModif" name="content"> <?php echo $data["content"]?></textarea>
        </div>
        <div class="formbutton">
            <button type="submit" class="bouton2">Modifier le post</button>
        </div>
    </form>
    <br>
    <form action="./index.php?userID=<?php echo $userID?>" method="POST" class="centre" onsubmit="return confirm('Voulez-vous supprimer ce post ?');" >
        <div class="formbutton">Cliquez le bouton ci-dessous pour effacer le post</div>
        <div>
            <input type="hidden" name="action" id="action"  value="delete" >
            <input type="hidden" name="postID" value="<?php echo $data["ID_post"]?>">
        </div>
        <div class="formbutton">
            
           
            <button  type="submit"  class="bouton2">Supprimer le post</button>
        </div>
        
    </form>


<?php






}
else {
    echo "<h1>Erreur! Cette ID ne correspond à aucun post!</h1>";
}
}

?>