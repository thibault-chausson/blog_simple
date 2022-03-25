<form action="./index.php" method="post">

    <div>
        <label for="name">Login :</label>
        <input autofocus type="text" id="name" name="name">
    </div>
    <div>
        <label for="password">Password :</label>
        <input type="password" id="password" name="password">

        <input type="checkbox" onclick="Afficher_password('password')"> Afficher le mot de passe
    </div>
    <div>
        <button type="submit">Se Connecter</button>
    </div>
</form>


<script type="text/javascript" src="./js/password.js"></script>


