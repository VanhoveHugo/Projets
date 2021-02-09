<div class="ariane"> 
    <?php
        $file = $_SERVER['PHP_SELF'];
        $t = explode('/', $file);
        $path = array_pop($t);

        switch($path) {
            case "blog.php":
                if(!empty($_GET)) {
                    if(!empty($_GET['filter'])) {
                        switch($_GET['filter']) {
                            case 'entrées':
                                echo '<a href="index.php">Acceuil</a> / <a href="blog.php">Blog</a> / <span>Entrées</span>';
                                break; 
                            case 'plats':
                                echo '<a href="index.php">Acceuil</a> / <a href="blog.php">Blog</a> / <span>Plats</span>';
                                break; 
                            case 'desserts':
                                echo '<a href="index.php">Acceuil</a> / <a href="blog.php">Blog</a> / <span>Desserts</span>';
                                break; 
                        }
                    }
                } else {
                    echo '<a href="index.php">Acceuil</a> / <span>Blog</span>';
                }
                break;

            case "about.php":
                echo '<a href="index.php">Acceuil</a> / <span>A propos</span>';
                break;
            case "FAQ.php":
                echo '<a href="index.php">Acceuil</a> / <a href=\'about.php\'>A propos</a> / <span>FAQ</span>';
                break;
            
            case "contact.php":
                echo '<a href="index.php">Acceuil</a> / <span>Contact</span>';
                break;

            case "register.php":
                echo '<a href="index.php">Acceuil</a> / <span>Inscription</span>';
                break;
            case "login.php":
                echo '<a href="index.php">Acceuil</a> / <span>Connexion</span>';
                break;
            case "edit.php":
                echo '<a href="index.php">Acceuil</a> / <span>Mon compte</span>';
                break;
        }
    ?>
</div>