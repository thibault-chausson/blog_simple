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

    <div>
        <input type="hidden" name="action" value="recherche">
        <label for="title">Recherche :</label>
        <input autofocus type="text" name="re">
    </div>
    <div>
        <button type="submit">Rechercher</button>
    </div>
</form>


<?php



?>