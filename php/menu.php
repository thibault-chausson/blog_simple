<link rel="stylesheet" href="styles/menu.css">

<?php

//Le menu

    ConnectDatabase();
    $loginStatus=CheckLogin();
    if (isset($username)) {
        $query20 = "SELECT `ID` FROM `connexion` WHERE logname = '" . $username . "' ";



            $result20 = $conn->query($query20);
            $userID = $result20->fetch_assoc()["ID"];
        if (strlen($userID) !=0) {
            echo '<nav>
                <ul>
                    <li><a href="./index.php?userID=' . $userID . '" class="menu">Rock Note</a></li>
                    <li><a href="deconnexion.php" class="menu">Déconexion</a></li>
                </ul>
              </nav>';
        }
        else {
            echo '<nav>
              <ul>
                <li><a href="index.php" class="menu">Rock Note</a></li>
                <li><a href="connexion.php" class="menu">Connexion</a></li>
              </ul>
            </nav>';
        }
    }
    else {
        echo '<nav>
              <ul>
                <li><a href="index.php" class="menu">Rock Note</a></li>
                <li><a href="connexion.php" class="menu">Connexion</a></li>
              </ul>
            </nav>';
    }

    DisconnectDatabase();

?>





