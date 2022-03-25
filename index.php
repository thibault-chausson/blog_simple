<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rock Note</title>
    <link rel="stylesheet" href="styles/grid.css">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="icon" href="ressources/menu/Notepad_Pencil_clip_art_hight.png">
</head>

<body>

<?php
include 'php/sql.php';
include 'php/menu.php';


ConnectDatabase();

$loginStatus=CheckLogin();


?>

<div class="parent">
<div class="titre">
    <?php


        if (isset($username)){

            echo "<p>Bienvenu $username.</p> <p> Quoi de neuf aujourd'hui ?</p>";

        }
        else{
            echo '<p>Vous n\'êtes pas connecté il me semble !!</p>';
        }
    ?>
</div>
<div class="m_user">
    <p>Visitez d'autres pages Rock Note : </p>
    <?php
        include ("php/sql_affichage_user.php");
    ?>
</div>
<div class="s_menu">
    <?php
    if (isset($username)){
        if ( ! isset($_POST["newPost"]) && $_POST["newPost"] != 1 ) {
            include('php/ajouter_post.php');
        }
        include "php/ecrire.php";
        include "php/mettre_post_BDD.php";
    }
    else{
        echo '<a><a href="connexion.php">Connectez-vous >></a></a>';
    }

    ?>


</div>
<div class="corps">
    <?php
    /*Pour avoir le userID*/
    if (isset($username)) {

        $query10 = "SELECT `ID` FROM `connexion` WHERE logname = '" . $username . "' ";

        $result10 = $conn->query($query10);
        $userID = $result10->fetch_assoc()["ID"];

        /*userAffiche la c'est egale à userID pour le test*/
        $userAffiche = $_GET["userID"];

        include "php/afficher_post.php";

        if (!isset($_POST["modifier"])) {
            DisplayPostsPage($userAffiche, $userID);
        }

        if (isset($_POST["modifier"])){
            include "php/modification_post.php";
            include "php/mettre_post_BDD.php";
        }
    }

    else{
        $query60 =
            "SELECT `ID`,`logname` FROM `connexion`
    ORDER BY RAND()
    LIMIT 1
    ";

        $result60 = $conn->query($query60);
        $row60 = $result60->fetch_assoc();





        echo '<h2>Découvrez le blog de : '.$row60[logname].'</h2>';

        include "php/afficher_post.php";
        DisplayPostsPage($row60[ID],-1);
    }











    ?>
</div>
</div>



<?php


include 'php/footer.php';
DisconnectDatabase();
?>

</body>
