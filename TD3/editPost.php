<?php

include("./PageParts/databaseFunctions.php");
ConnectDatabase();
$loginStatus = CheckLogin();
include("./PageParts/noLoginRedirect.php");

include("./PageParts/header.php");
include("./PageParts/IDzone.php");

//First, try to see if there is POST data. This allows us to identify
//if we are in the "create new post" case
if ( isset($_POST["newPost"]) && $_POST["newPost"] == 1 ){
?>

    <form action="./processPost.php" method="POST">
        <div class="formbutton">Création d'un nouveau post</div>
		<div>
            <input type="hidden" name="action" value="new">
            <label for="title">Titre :</label>
            <input autofocus type="text" name="title">
        </div>
        <div>
            <label for="content">Message :</label>
            <textarea name="content">Tapez votre texte ici...</textarea>
        </div>
        <div class="formbutton">
            <button type="submit">Ajouter ce post à mon blog</button>
        </div>
    </form>

<?php
}
//Otherwise, we are in "edit" mode. Then, try to get post for ID used as GET parameter
elseif ( isset($_GET["postID"]) ){

    $query = 'SELECT * FROM `post` WHERE `ID_post` ='.$_GET["postID"];
    $result = $conn->query($query);
        
    if ( $result->num_rows > 0 ){ 
        $data = $result->fetch_assoc();
    ?>

    <form action="./processPost.php" method="POST">
        <div class="formbutton">Modification d'un post passé</div>
        <div>
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="postID" value="<?php echo $data["ID_post"];?>">
            <label for="title">Titre :</label>
            <input autofocus type="text" name="title" value="<?php echo $data["title"];?>">
        </div>
        <div>
            <label for="content">Message :</label>
            <textarea name="content"><?php echo $data["content"];?></textarea>
        </div>
        <div class="formbutton">
            <button type="submit">Modifier le post</button>
        </div>
    </form>
    <form action="./processPost.php" method="POST">
        <div class="formbutton">Cliquez le bouton ci-dessous pour effacer le post</div>
        <div>
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="postID" value="<?php echo $data["ID_post"];?>">
        </div>
        <div class="formbutton">
            <button type="submit">Supprimer le post</button>
        </div>
    </form>

    <?php
    }
    else {
        echo "<h1>Erreur! Cette ID ne correspond à aucun post!</h1>";
    }
}

include("./PageParts/footer.php");
DisconnectDatabase();

?>