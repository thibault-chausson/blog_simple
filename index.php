<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rock Note</title>
    <link rel="stylesheet" href="styles/grid.css">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="icon" href="ressources/menu/Notepad_Pencil_clip_art_hight.png">



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@100&display=swap" rel="stylesheet">


</head>

<body>

<?php
include 'php/sql.php';
include 'php/menu.php';


ConnectDatabase();

$loginStatus=CheckLogin();


?>




<div class="parenttitre">


    <div class="titre">
        <?php


        if (isset($username)){

            echo "<h1 class='centre'>Bienvenue $username.</h1> <h2 class='centre'> Quoi de neuf aujourd'hui ?</h2>";

        }
        else{
            echo '<h1 class="centre">Bienvenu sur Rock Note</h1>';
        }
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
            echo '<div class="centre"><a href="connexion.php">Connectez-vous >></a></div>';
        }



        ?>


    </div>





    <div class="recherche">

        <?php

        include "recherche.php";
        echo $message_recherche;

        ?>
    </div>

</div>







<div class="parentcorps">

<div class="m_user">
    <h3>Visitez d'autres pages Rock Note : </h3>
    <?php
        include ("php/sql_affichage_user.php");
    ?>
</div>




<div class="corps">

    <?php
    /*Pour avoir le userID*/
    if (isset($username) ) {

        $query10 = "SELECT `ID`  FROM `connexion` WHERE logname = '" . $username . "' ";

        $result10 = $conn->query($query10);
        $userID = $result10->fetch_assoc()["ID"];

        /*userAffiche la c'est egale à userID pour le test*/
        $userAffiche = $_GET["userID"];





        if ($userAffiche!="") {

            $demande_nom = "SELECT `logname`  FROM `connexion` WHERE ID = '" . $userAffiche . "' ";

            $reponse_demande_nom = $conn->query($demande_nom);
            $userAfficheNom = $reponse_demande_nom->fetch_assoc()["logname"];

            echo "<h3 class='centre'>Vous regarder le bog de $userAfficheNom.</h3>";
        }
        else{
            if(!isset($_POST["modifier"])){
                echo "<h3 class='centre'>Cette utilisateur est inexistant donc :</h3>";
            }
        }

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

        $userAffiche = $_GET["userID"];
        if ($userAffiche!="") {
            $demande_nom = "SELECT `logname`  FROM `connexion` WHERE ID = '" . $userAffiche . "' ";

            $reponse_demande_nom = $conn->query($demande_nom);
            $userAfficheNom = $reponse_demande_nom->fetch_assoc()["logname"];
            echo "<h3 class='centre'>Vous regarder le bog de $userAfficheNom.</h3>";


            include "php/afficher_post.php";
            DisplayPostsPage($_GET["userID"], -1);
        }
        else{
            echo '<h3 class="centre">Recherchez vos amis !!</h3>';
        }

    }

    ?>



</div>



</div>





<?php


include 'php/footer.php';
DisconnectDatabase();
?>

</body>
