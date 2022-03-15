<?php
include("./PageParts/databaseFunctions.php");
ConnectDatabase();
$newAccountStatus = CheckNewAccountForm();
include("./PageParts/header.php");

?>

<h1>Création d'un nouveau compte</h1>
<?php
    if($newAccountStatus[1]){
        echo '<h3 class="successMessage">Nouveau compte crée avec succès!</h3>';
    }
    elseif ($newAccountStatus[0]){
        echo '<h3 class="errorMessage">'.$newAccountStatus[2].'</h3>';
    }
?>
<p>Ici, un utilisateur peut librement créer un nouveau compte, qui sera ajouté à la BDD.</p>
<p>Bien sûr, il manque encore des choses pour que ce soit totalement professionnel : l'envoi de mail de confirmation où le verrouillage "en direct" de certaines touches
    du claver avec Javascript, par exemple (pour éviter le spam et les noms comprenant des caractères spéciaux, par exemple)</p>
</p>
<hr>
<?php include("./PageParts/newLoginForm.php"); ?>
<hr>
<p><a href="./index.php" class="backlink"><< Revenir à l'acceuil</a><br><br></p>

<?php
	include("./PageParts/footer.php");
	DisconnectDatabase();
?> 