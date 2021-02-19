<?php 
    $file = $_SERVER['PHP_SELF'];
    $t = explode('/', $file);
    $path = array_pop($t);
    flash_out();
?>
    <nav>
        <a href="index.php" <?php if($path=='index.php') echo 'class="active"'; ?>>Accueil</a>
        <?php if(!empty($_SESSION["user"]["username"])) { ?> 
            <a href="addmusic.php" <?php if($path=='addmusic.php') echo 'class="active"'; ?>>Disks</a>
            <a href="core/logout.php">Log out</a>
        <?php } else { ?>
            <a href="adduser.php" <?php if($path=='adduser.php') echo 'class="active"'; ?>>Register</a>
            <a href="login.php" <?php if($path=='login.php') echo 'class="active"'; ?>>Log in</a>        
        <?php } ?>
        
        
    </nav>
