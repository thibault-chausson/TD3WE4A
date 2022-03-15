<?php
include("./PageParts/databaseFunctions.php");
ConnectDatabase();
$loginStatus = CheckLogin();
if ( $loginStatus[0] ) {
	$redirect = "Location:".GetURL()."/showBlog.php?userID=".$userID;
	header($redirect);
}

include("./PageParts/header.php");
?>

<h1>Fondations d'un système de Blog</h1>
<?php
	if ( $loginStatus[1] ){
		echo '<h3 class="errorMessage">'.$loginStatus[2].'</h3>';
	}
?>
<p>Voici une démo d'un système de blog primitif.</p>
<p>Pour que vous ne puissiez pas "copier-coller votre chemin jusqu'à la victoire", il manque des fonctionnalités par rapport à ce
	qui vous est demandé. Mais les notions les plus importantes (login, affichage d'une liste de posts...) existent ici</p>
<p class="warning"> En l'état, ces scripts ne fonctionneront pas sur votre machine. Vous devez aussi copier la BDD!</p>
<p>D'ailleurs, lorsque vous rendrez le projet, n'oubliez pas de fournir un export SQL de votre BDD (c'est facile avec PHP my admin)</p>
<hr>
<h2>Connectez vous pour écrire votre blog :</h2>
<?php include("./PageParts/loginForm.php"); ?>
<p><a href="./newAccount.php" class="endlink">Créer un nouveau compte >></a><br><br></p>
<hr>
<h2>Ou alors, découvrez un blog crée par un autre utilisateur!</h2>

<?php
	include("./PageParts/displayRandomUsers.php");
	include("./PageParts/footer.php");
	DisconnectDatabase();
?> 