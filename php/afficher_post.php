<link rel="stylesheet" href="styles/post.css">

<?php

//Fonction pour afficher à l'écran les posts


function DisplayPostsPage($blogIDAffiche,$userPropri) //, $ownerName, $isMyBlog)
{
    global $conn;



    $query = "SELECT * FROM `post` WHERE `owner_login` = " . $blogIDAffiche . " ORDER BY `date_lastedit` DESC LIMIT 10";
    $result = $conn->query($query);
    if (mysqli_num_rows($result) != 0) {

        while ($row = $result->fetch_assoc()) {

            $timestamp = strtotime($row["date_lastedit"]);

            echo '<div class="blogPost">
                    <div class="postTitle">';

            if ($blogIDAffiche==$userPropri){

                ConnectDatabase();
                $loginStatus=CheckLogin();
                $query50 = "SELECT `ID` FROM `connexion` WHERE logname = '" . $username . "' ";

                $result50 = $conn->query($query50);
                $userID = $result50->fetch_assoc()["ID"];



                echo '
                
                <div class="postModify">
                    <form action="./index.php?userID='.$userID.'" method="POST">
                        <input type="hidden" name="modifier" value="'.$row["ID_post"].'">
                        <button class="modifbutton" type="submit">Modifier/effacer</button>
                    </form>
                </div>';
            }
            else{
                $avoir_mon = "SELECT logname FROM `connexion` WHERE `ID` = " . $blogIDAffiche . "";
                $resultat_nom = $conn->query($avoir_mon);
                $nom = $resultat_nom->fetch_assoc()[logname];
                echo '
                <div class="postAuthor">par '.$nom.'</div>
                ';
            }


            echo '
                
                <h3>' . $row["title"] . '</h3>
                <p>dernière modification le ' . date("d/m/y à H:i:s", $timestamp) . '</p>
                </div>
            
            ';


            echo '
            <p class="postContent">' . $row["content"] . '</p>
            </div>
            ';

        }
    } else {
        echo '
        <p>Il n\'y a pas de post à afficher.</p>';


    }
}

?>

