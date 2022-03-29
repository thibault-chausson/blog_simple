


<form action="./inscription.php" method="post" class="centre">


    <div>
        <label for="name">Nouveau Login :</label>
        <input autofocus type="text" id="name" name="name">
    </div>
    <div>
        <label for="password">Définir Password :</label>
        <input type="password" id="password" name="password">

    </div>
    <div>
        <label for="confirm">Confirmer Password :</label>
        <input type="password" id="confirm" name="confirm">
        </div>
    <div>
        <button type="submit" class="bouton_co">Créer le compte</button>
    </div>

</form>


<div class="pass">
    <input type="checkbox" onclick="afficherPassword('password')" > Afficher le mot de passe
</div>

<div class="conf">
    <input type="checkbox" onclick="afficherPassword('confirm')" > Afficher le mot de passe
</div>






<script type="text/javascript" src="./js/password.js"></script>

