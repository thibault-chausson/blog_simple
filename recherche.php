<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="styles/boutons.css">

</head>

<body>




<?php



if( isset($_POST["action"]) ){

    if ( $_POST["action"] == "recherche") {
        if(isset($_POST["re"])) {



            include "php/sql.php";
            ConnectDatabase();



            $query70 = "SELECT `ID` FROM `connexion` WHERE logname= '".SecurizeString_ForSQL($_POST["re"])."'   ";



            $result70 = $conn->query($query70);
            $row70 = $result70->fetch_assoc()[ID];

            DisconnectDatabase();



                echo "<script type='text/javascript'>document.location.replace('./index.php?userID=$row70');</script>";


        }
    }
    }





?>


<form action="./recherche.php" method="Post">

    <div class="champ">
        <input type="hidden" name="action" value="recherche" >
        <input autofocus type="text" name="re"  >
    </div>
    <div >
        <button type="submit" class="bouton" >Rechercher</button>
    </div>
</form>


<?php



?>

</body>
