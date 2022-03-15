<?php
    if ( $loginStatus[0] == false ) {
        $redirect = "Location:".GetURL()."/index.php";
        header($redirect);
    }
?>