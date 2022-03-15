<?php

include("./PageParts/databaseFunctions.php");
ConnectDatabase();
$loginStatus = CheckLogin();
include("./PageParts/header.php");
include("./PageParts/IDzone.php");

//Try to get user for ID used as GET parameter
$blogOwnerName = "";
$isMyOwnBlog = false;
if ( isset($_GET["userID"]) ){

    if ( isset($userID) && $userID == $_GET["userID"] ){
        $isMyOwnBlog = true;
        $blogOwnerName = $username;
    }
    else {
        $query = 'SELECT `logname` FROM `login` WHERE `ID` ='.$_GET["userID"];
        $result = $conn->query($query);
        
        if ( mysqli_num_rows($result) != 0 ){ $blogOwnerName = $result->fetch_assoc()["logname"];}
    }
    
    if ($blogOwnerName != ""){
        if ($isMyOwnBlog){
            echo "<h1>Ceci est mon blog à moi, ".$blogOwnerName." !</h1>";
        }
        else {
            echo "<h1>Bienvenue sur le blog de ".$blogOwnerName."</h1>";
        }

        DisplayPostsPage( $_GET["userID"] , $blogOwnerName, $isMyOwnBlog);
    }
    else {
        echo "<h1>Erreur! Cette ID ne correspond à aucun utilisateur actif!</h1>";
    }
}

include("./PageParts/footer.php");
DisconnectDatabase();

?>