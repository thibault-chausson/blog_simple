<link rel="stylesheet" href="styles/connexion.css">
<link rel="stylesheet" href="styles/styles.css">


<form action="./connexion.php" method="post">

    <div class="centre">
        <label for="name" >Login :</label>
        <input autofocus type="text" id="name" name="name">
    </div>
    <br>
    <div class="centre">
        <label for="password" >Password :</label>
        <input  type="password" id="password" name="password" class="champ_co">
    </div>
    <div class="centre">
        <button type="submit" class="bouton_co">Se Connecter</button>
    </div>
</form>

<input  type="checkbox" onclick="Afficher_password('password')"> Afficher le mot de passe


<script type="text/javascript" src="./js/password.js"></script>


