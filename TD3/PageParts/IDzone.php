<?php
if ( isset($username) && isset($userID) ) {
?>
<div class="IDzone">   
    <form action="./logout.php" method="POST">

        <div id="ID_name">
            <p> Bienvenue, <?php echo $username; ?> !</p>
        </div>
        <div id="ID_logout">
            <input type="hidden" value="logout" name="logout"></input>
            <button type="submit">Se déconnecter</button>
        </div>
        <div id="ID_myblog">
            <p><a href="./showBlog.php?userID=<?php echo $userID; ?>">Mon Blog Personnel</a></p>
        </div>
        <div style="clear:both"></div>
    </form>
</div>
<?php
}
?>