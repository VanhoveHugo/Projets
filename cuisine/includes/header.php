<?php 
    $file = $_SERVER['PHP_SELF'];
    $t = explode('/', $file);
    $path = array_pop($t);

    $e = $db->prepare("SELECT * FROM items WHERE categorie = 'Entrées'");
    $e->execute();
    
    $p = $db->prepare("SELECT * FROM items WHERE categorie = 'Plats'");
    $p->execute();

    $d = $db->prepare("SELECT * FROM items WHERE categorie = 'Desserts'");
    $d->execute();
?>
<div class='title'>La cuisine pour tous</div>

<ul class='header sticky'>
    <div class="landscape">
        <li>
            <a href=<?= BASE_URL."index.php" ?> class="btn <?php if($path=='index.php') echo 'active'; ?>">Accueil</a>
        </li>
        <li>
            <a href=<?= BASE_URL."blog.php" ?> class="btn <?php if($path=='blog.php' || $path=='details.php') echo 'active'; ?>">blog</a>
            <div class="list">
                <a href=<?= BASE_URL.'blog.php?filter=Entrées' ?> class="list-item">Entrées <?= $e->rowCount() ?></a>
                <a href=<?= BASE_URL.'blog.php?filter=Plats' ?> class="list-item">Plats <?= $p->rowCount() ?></a>
                <a href=<?= BASE_URL.'blog.php?filter=Desserts' ?> class="list-item">Desserts <?= $d->rowCount() ?></a>
            </div>
        </li>
        <li>
            <a href=<?= BASE_URL."about.php" ?> class="btn <?php if($path=='about.php' || $path=='FAQ.php') echo 'active'; ?>">A propos</a>
            <div class="list">
                <a href=<?= BASE_URL."FAQ.php" ?> class="list-item">FAQ</a>
            </div>
        </li>
        <li>
            <a href=<?= BASE_URL."contact.php" ?> class="btn <?php if($path=='contact.php') echo 'active'; ?>">contact</a>
        </li>
        <li>
            <a href=<?= BASE_URL."login.php" ?> class="btn <?php if($path=='register.php' || $path=='signin.php' || $path=='edit.php') echo 'active'; ?>">mon compte</a>
            <div class="list">
            <?php if(empty($_SESSION['user'])) { ?>
                <a href=<?= BASE_URL."register.php" ?> class="list-item <?php if($path=='register.php') echo 'active'; ?>">S'inscrire</a>
                <a href=<?= BASE_URL."login.php" ?> class="list-item <?php if($path=='signin.php') echo 'active'; ?>">Se connecter</a>
            <?php } else { ?>
                <a href=<?= BASE_URL."profil.php" ?> class="list-item <?php if($path=='register.php') echo 'active'; ?>"><?= $_SESSION['user']['username'] ?></a>
                <a href=<?= BASE_URL."core/logout.php" ?> class="list-item <?php if($path=='signin.php') echo 'active'; ?>">Deconnexion</a>
            <?php } ?>
            </div>
        </li>
        <li>
            <a href='#search' class='btn-icon btn-search'>
                <i class="fas fa-search" aria-hidden="true"></i>
            </a>
        </li>
    </div>
    <div class="portrait">
        <li>
            <button class='btn-icon'><i class="fas fa-bars"></i></button>            
            <div class="list">
                <a href=<?= BASE_URL.'blog.php?filter=Entrées' ?> class="list-item">Entrées <?= $e->rowCount() ?></a>
                <a href=<?= BASE_URL.'blog.php?filter=Plats' ?> class="list-item">Plats <?= $p->rowCount() ?></a>
                <a href=<?= BASE_URL.'blog.php?filter=Desserts' ?> class="list-item">Desserts <?= $d->rowCount() ?></a>
            </div>
        </li>
        <li>
            <button class='btn-icon'><i class="far fa-user-circle"></i></button>            
        </li>
    
    </div>
</ul>    
<div class="social">
    <a href="facebook.com" class='btn-icon btn-soc'><i class="fab fa-facebook-f"></i></a>
    <a href="facebook.com" class='btn-icon btn-soc'><i class="fab fa-pinterest-p"></i></a>
    <a href="facebook.com" class='btn-icon btn-soc'><i class="fab fa-instagram"></i></a>
</div>
<div class="notif">
    <?php flash_out(); ?>
</div>
<div id='scroll' class="btn-icon btn-absolute">
    <i class="fas fa-chevron-up"></i>
</div>

<?php if(!empty($_SESSION['user'])) {
        if($_SESSION['user']['access'] == 1) { ?>
    <a href=<?= BASE_URL."admin/" ?> class="admin">Administration</a>
<?php }}; ?>

<script>
    btns = document.querySelectorAll('.list');
    btns.forEach(e => {
        e.addEventListener('mouseenter', () => {
            e.parentNode.classList.add('display')
        })
        e.addEventListener('mouseleave', () => {
            e.parentNode.classList.remove('display')
        })
    });
    scrolltop = document.querySelector('#scroll');

    visible = false;
    window.addEventListener('scroll', (e) => {
        Y = window.scrollY;
        if(Y > 400 && visible == false) {
            visible = true;
            scrolltop.classList.add('show');
        } else if(Y <= 400 && visible == true) {
            visible = false;
            scrolltop.classList.remove('show');
        }
    })

    scrolltop = document.querySelector('#scroll');
    scrolltop.addEventListener('click', () => {
        window.scroll(0, 0)
    })
</script>