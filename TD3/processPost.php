<?php

include("./PageParts/databaseFunctions.php");
ConnectDatabase();
$loginStatus = CheckLogin();
include("./PageParts/noLoginRedirect.php");

//The forms that bring the user here have hidden fields to tell if we're here to add or edit...
if( isset($_POST["action"]) ){

    if ( $_POST["action"] == "edit"){

        if ( isset($_POST["title"]) && isset($_POST["content"])){
            $query = "UPDATE `post` SET 
                    `title` = '".SecurizeString_ForSQL($_POST["title"])."',  
                    `content` = '".SecurizeString_ForSQL($_POST["content"])."' 
                    WHERE `ID_post` = ".$_POST["postID"];
        }
    }
    elseif ( $_POST["action"] == "new"){

        if ( isset($_POST["title"]) && isset($_POST["content"])){
            $query = "INSERT INTO `post` (title, content, owner_login) VALUES            
                    ('".SecurizeString_ForSQL($_POST["title"])."', '".SecurizeString_ForSQL($_POST["content"])."', '".$userID."')";
        }
    }
    elseif ($_POST["action"] == "delete"){
        $query = "DELETE FROM `post` WHERE `ID_post` = ".$_POST["postID"];
    }

    if (isset($query)){
        echo $query;
        $result = $conn->query($query);
    }


    header( "Location:showBlog.php?userID=".$userID );

}

?>