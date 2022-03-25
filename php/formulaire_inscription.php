<form action="./inscription.php" method="post">

    <div>Créer vous un compte</div>
    <div>
        <label for="name">Nouveau Login :</label>
        <input autofocus type="text" id="name" name="name">
    </div>
    <div>
        <label for="password">Définir Password :</label>
        <input type="password" id="password" name="password">
        <input type="checkbox" onclick="Afficher_password('password')"> Afficher le mot de passe

    </div>
    <div>
        <label for="confirm">Confirmer Password :</label>
        <input type="password" id="confirm" name="confirm">
        <input type="checkbox" onclick="Afficher_password('confirm')"> Afficher le mot de passe
    </div>
    <div>
        <button type="submit">Créer le compte</button>
    </div>
</form>




<script type="text/javascript" src="./js/password.js"></script>

