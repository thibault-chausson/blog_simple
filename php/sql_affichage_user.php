<link rel="stylesheet" href="styles/style.css">

<?php
$query =
    "SELECT `ID`,`logname` FROM `connexion`
    ORDER BY RAND()
    LIMIT 10
    ";
$result = $conn->query($query);

if( mysqli_num_rows($result) != 0 ){
    echo "<ul>";
    while( $row = $result->fetch_assoc() ) {
        echo '<li class="liste"><a href="./index.php?userID='.$row["ID"].'">'.$row["logname"].'</a></li>';

    }
    echo "</ul>";
}
else {
    echo '<p class="warning"> Aucun utilisateur/blog n\'existe dans le système pour l\'instant!</p>';
}
?>
