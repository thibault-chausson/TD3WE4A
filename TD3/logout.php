<?php
include("./PageParts/databaseFunctions.php");

if (isset($_POST["logout"])){
    DestroyLoginCookie();
}

unset($_POST);
$redirect = "Location:".GetURL()."/index.php";
header($redirect);

?>