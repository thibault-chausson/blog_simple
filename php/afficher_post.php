<?php

function DisplayPostsPage($blogIDAffiche,$userPropri) //, $ownerName, $isMyBlog)
{
    global $conn;

    $query = "SELECT * FROM `post` WHERE `owner_login` = " . $blogIDAffiche . " ORDER BY `date_lastedit` DESC LIMIT 10";
    $result = $conn->query($query);
    if (mysqli_num_rows($result) != 0) {

        while ($row = $result->fetch_assoc()) {

            $timestamp = strtotime($row["date_lastedit"]);

            if ($blogIDAffiche==$userPropri){

                echo '
                <div>
                    <form action="index.php" method="GET">
                        <input type="hidden" name="postID" value="'.$row["ID_post"].'">
                        <button type="submit">Modifier/effacer</button>
                    </form>
                </div>';
            }


            echo '
                <h3>•' . $row["title"] . '</h3>
                <p>dernière modification le ' . date("d/m/y à h:i:s", $timestamp) . '
            
            ';


            echo '
            <p class="postContent">' . $row["content"] . '</p>
            
            ';
            include "php/modification_post.php";
        }
    } else {
        echo '
        <p>Il n\'y a pas de post dans ce blog.</p>';


    }
}

?>

