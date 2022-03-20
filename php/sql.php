<?php

// Function to open connection to database
//--------------------------------------------------------------------------------
function ConnectDatabase(){
    // Create connection
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "blog_simple";
    global $conn;

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}

//Function to clean up an user input for safety reasons
//--------------------------------------------------------------------------------
function SecurizeString_ForSQL($string) {
    $string = trim($string);
    $string = stripcslashes($string);
    $string = addslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}


// Function to check a new account form
//--------------------------------------------------------------------------------
function CheckNewAccountForm(){
    global $conn;

    $creationAttempted = false;
    $creationSuccessful = false;
    $error = NULL;

    //Données reçues via formulaire?
    if(isset($_POST["name"]) && isset($_POST["password"]) && isset($_POST["confirm"])){

        $creationAttempted = true;

        //Form is only valid if password == confirm, and username is at least 4 char long
        if ( strlen($_POST["name"]) < 4 ){
            $error = "Un nom utilisateur doit avoir une longueur d'au moins 4 lettres";
        }
        elseif ( $_POST["password"] != $_POST["confirm"] ){
            $error = "Le mot de passe et sa confirmation sont différents";
        }
        else {
            $username = SecurizeString_ForSQL($_POST["name"]);
            $password = md5($_POST["password"]);

            $double="SELECT logname FROM connexion WHERE logname='$username'";
            $double_exec = $conn->query($double);
            $double_name = $double_exec->fetch_assoc()["logname"];

            if ($username==$double_name){
                $error="Deja pris";
            }
            else {


                $query = "INSERT INTO `connexion` VALUES (NULL, '$username', '$password' )";
                echo $query . "<br>";
                $result = $conn->query($query);

                if (mysqli_affected_rows($conn) == 0) {
                    $error = "Erreur lors de l'insertion SQL. Essayez un nom/password sans caractères spéciaux";
                } else {
                    $creationSuccessful = true;
                }
            }

        }

    }

    return array($creationAttempted, $creationSuccessful, $error);
}




// Function to close connection to database
//--------------------------------------------------------------------------------
function DisconnectDatabase(){
    global $conn;
    $conn->close();
}

//Méthode pour créer/mettre à jour le cookie de Login
//--------------------------------------------------------------------------------
function CreateLoginCookie($username, $encryptedPasswd){
    setcookie("name", $username, time() + 24*3600 );
    setcookie("password", $encryptedPasswd, time() + 24*3600);
}

//Méthode pour détruire les cookies de Login
//--------------------------------------------------------------------------------
function DestroyLoginCookie(){
    setcookie("name", NULL, -1 );
    setcookie("password", NULL, -1);
}

// Function to check login. returns an array with 2 booleans
// Boolean 1 = is login successful, Boolean 2 = was login attempted
//--------------------------------------------------------------------------------
function CheckLogin(){
    global $conn, $username, $userID;

    $error = NULL;
    $loginSuccessful = false;

    //Données reçues via formulaire?
    if(isset($_POST["name"]) && isset($_POST["password"])){
        $username = SecurizeString_ForSQL($_POST["name"]);
        $password = md5($_POST["password"]);
        $loginAttempted = true;
    }
    //Données via le cookie?
    elseif ( isset( $_COOKIE["name"] ) && isset( $_COOKIE["password"] ) ) {
        $username = $_COOKIE["name"];
        $password = $_COOKIE["password"];
        $loginAttempted = true;

    }
    else {
        $loginAttempted = false;
    }


    //Si un login a été tenté, on interroge la BDD
    if ($loginAttempted){

        $query = "SELECT logname FROM `connexion` WHERE logname = '".$username."' AND password ='".$password."'";

        $result = $conn->query($query);

        $result2=$result->fetch_assoc()["logname"];



        if ( isset($result2) ){
            $row = $result->fetch_assoc();
            $userID = $row["ID"];
            CreateLoginCookie($username, $password);
            $loginSuccessful = true;

        }
        else {
            $error = "Mauvais login ou password !";
        }
    }

    return array($loginSuccessful, $loginAttempted, $error, $userID);
}





?>