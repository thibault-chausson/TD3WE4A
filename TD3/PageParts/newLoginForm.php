<form action="./newAccount.php" method="post">
	
    <div class="formbutton">Formulaire de création de compte</div>
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
    <div class="formbutton">
        <button type="submit">Créer le compte</button>
    </div>
</form>