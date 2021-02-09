<?php 
    $file = $_SERVER['PHP_SELF'];
    $t = explode('/', $file);
    $path = array_pop($t);

    $e = $db->prepare("SELECT * FROM items WHERE categorie = 'entrée'");
    $e->execute();
    
    $p = $db->prepare("SELECT * FROM items WHERE categorie = 'plat'");
    $p->execute();

    $d = $db->prepare("SELECT * FROM items WHERE categorie = 'dessert'");
    $d->execute();
?>
<h1 class='title'>La cuisine pour tous</h1>

<ul class='header sticky'>
    <li>
        <a href="index.php" class="btn <?php if($path=='index.php') echo 'active'; ?>">Accueil</a>
    </li>
    <li>
        <a href="blog.php" class="btn <?php if($path=='blog.php') echo 'active'; ?>">blog</a>
        <div class="list">
            <a href='blog.php?filter=entrées' class="list-item">Entrées <?= $e->rowCount() ?></a>
            <a href='blog.php?filter=plats' class="list-item">Plats <?= $p->rowCount() ?></a>
            <a href='blog.php?filter=desserts' class="list-item">Desserts <?= $d->rowCount() ?></a>
        </div>
    </li>
    <li>
        <a href="about.php" class="btn <?php if($path=='about.php' || $path=='FAQ.php') echo 'active'; ?>">A propos</a>
        <div class="list">
            <a href="FAQ.php" class="list-item">FAQ</a>
        </div>
    </li>
    <li>
        <a href="contact.php" class="btn <?php if($path=='contact.php') echo 'active'; ?>">contact</a>
    </li>
    <li>
        <a href="login.php" class="btn <?php if($path=='register.php' || $path=='signin.php' || $path=='edit.php') echo 'active'; ?>">mon compte</a>
        <div class="list">
        <?php if(empty($_SESSION['user'])) { ?>
            <a href="register.php" class="list-item <?php if($path=='register.php') echo 'active'; ?>">S'inscrire</a>
            <a href="login.php" class="list-item <?php if($path=='signin.php') echo 'active'; ?>">Se connecter</a>
        <?php } else { ?>
            <a href="edit.php" class="list-item <?php if($path=='register.php') echo 'active'; ?>"><?= $_SESSION['user']['username'] ?></a>
            <a href="core/logout.php" class="list-item <?php if($path=='signin.php') echo 'active'; ?>">Deconnexion</a>
        <?php } ?>
        </div>
    </li>
    <li>
        <a href='#search'>
            <button class='loupe'>
                <i class="fas fa-search"></i>
            </button>
        </a>
    </li>
</ul>    

<div class="notif">
    <?php flash_out(); ?>
</div>

<?php if(!empty($_SESSION['user'])) {
        if($_SESSION['user']['access'] == 1) { ?>
    <a href="admin.php" class="admin <?php if($path=='admin.php') echo 'active'; ?>">Administration</a>
<?php }} ?>