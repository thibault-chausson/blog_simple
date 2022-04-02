<?php


//Le code qui permet d'ajouter un poste dans une base de données

/*Pour avoir le userID*/
$query10 = "SELECT `ID` FROM `connexion` WHERE logname = '".$username."' ";

$result10 = $conn->query($query10);
$userID=$result10->fetch_assoc()["ID"];

if( isset($_POST["action"]) ){

    if ( $_POST["action"] == "edit"){

        if ( isset($_POST["title"]) && isset($_POST["content"])){
            $query = "UPDATE `post` SET
    `title` = '".SecurizeString_ForSQL($_POST["title"])."',
    `content` = '".SecurizeString_ForSQL($_POST["content"])."'
    WHERE `ID_post` = ".$_POST["postID"];
        }
    }
    elseif ( $_POST["action"] == "new"){

        if ( isset($_POST["title"]) && isset($_POST["content"])){
            $query = "INSERT INTO `post` (title, content, owner_login) VALUES
    ('".SecurizeString_ForSQL($_POST["title"])."', '".SecurizeString_ForSQL($_POST["content"])."', '".$userID."')";
        }
    }
    elseif ($_POST["action"] == "delete"){
        $query = "DELETE FROM `post` WHERE `ID_post` = ".$_POST["postID"];
    }

    if (isset($query)){

        $result = $conn->query($query);
    }

}
?>