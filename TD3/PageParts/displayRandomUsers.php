<?php
    $query = 
    "SELECT `ID`,`logname` FROM `login`
    ORDER BY RAND()
    LIMIT 3
    ";
    $result = $conn->query($query);

    if( mysqli_num_rows($result) != 0 ){
        echo "<ul>";
        while( $row = $result->fetch_assoc() ) {
            echo '<li>Découvrir <a href="./showBlog.php?userID='.$row["ID"].'">le blog de '.$row["logname"].'</a></li>';
        }
        echo "</ul>";
    }
    else {
        echo '<p class="warning"> Aucun utilisateur/blog n\'existe dans le système pour l\'instant!</p>';
    }
?>
    