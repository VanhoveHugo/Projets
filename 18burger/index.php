<!DOCTYPE html>
<?php include "config/settings.php";
$req = $db->prepare('SELECT * FROM items');
$req->execute();
$req = $req->fetchAll(PDO::FETCH_ASSOC);
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= NAME ?></title>
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/all.min.css">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="shortcut icon" href="img/fav.png" type="image/x-icon">
    <script src="js/jquery.js"></script>
</head>
<body>
    <header>
        <div class="top-line">
            <div class="left">
                <p><a href="tel:+33171289594"><i class="fas fa-mobile-alt"></i> Appeler le: 01.71.28.95.94</a></p>
                <p><a href="https://www.google.fr/maps/dir//61+Rue+de+Saussure,+75017+Paris/@48.9058189,2.3823589,15z/data=!4m9!4m8!1m0!1m5!1m1!1s0x47e66fb06b308685:0xb82db6dffe84ed26!2m2!1d2.3144166!2d48.8857923!3e1" target="_blank"><i class="fas fa-map-marker-alt"></i> 61 rue de saussure 75017, Paris</a></p>
            </div>
            <div class="right">
                <a href="https://instagram.com/eighteenburger_batignolles/"><i class="fab fa-instagram"></i></a>
                <a href="https://vm.tiktok.com/ZMeB41Dqd/"><i class="fab fa-tiktok"></i></a>
            </div>
        </div>
        <nav>
            <ul class="left">
                <img src="img/logo.png" alt="">
                <li><a href=".">Accueil</a></li>
                <li><a href="#menu">Menu</a></li>
            <?php if(!empty($_SESSION['admin'] && $_SESSION['admin'] == true)) { ?> 
                <li><a href="admin/add.php">Ajouter un burger</a></li> 
                <li><a href="admin/logout.php">Déconnexion</a></li> 
            <?php }?>
            </ul>
            <ul class="right">
                <li><a href="https://deliveroo.fr/fr/menu/paris/villiers/pour-ma-part" target="_blank">Commander</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="hero_container">
            <div class="left">
                <div class="title">
                    <h1>Eighteen<span>BURGER</span></h1>
                </div>
                <div class="sub-title">
                    <h2>Best Burger</h2>
                    <h3>Salade, Tomate sans oignon</h3>
                </div>
                <div class="infos">
                    <button class="btn">Commander</button>
                    <div class="burger-price">9.50 €</div>
                    <div class="menu-price">14.00 €</div>
                </div>
            </div>
            <div class="right">
                <img src="/" alt="">
            </div>
        </div>
        <div class="flex" id='menu'>
            <div class="toolbar">
                <div class="categorie">Burgers</div>
                <button class="more">Voir plus <span><i class="fas fa-chevron-right"></i></span></button>
            </div>
            <div class="flex_container">
            <?php foreach($req as $d) { ?>
                <div class="el">
                    <figure>
                        <img src=<?= "data/".$d['image_url'] ?> alt="Une image du sandwish <?= $d['title'] ?>">
                    </figure>
                    <figcaption><?= $d['title'] ?></figcaption>
                    <legend><?= $d['tags'] ?></legend>
                    <div class="price"><?= $d['price']." €" ?></div>
                </div>
            <?php } ?>
            </div>
        </div>
        <div class="deliver">
            <div class="left">
                <h2>Choisissez parmi notre large gamme de burger</h2>
                <p>Integer iaculis ligula lectus, a fringilla ligula facilisis eget. Curabitur eleifend urna enim, sit amet pharetra leo ultrices eget. Donec mollis mauris in eros sodales mattis.</p>
                <a href="https://deliveroo.fr/fr/menu/paris/villiers/pour-ma-part" target='_blank'><button class="btn">Commander</button></a>
            </div>
            <div class="right">
                <h2>Nous livrons dans tous Paris !</h2>
                <p>Integer iaculis ligula lectus, a fringilla ligula facilisis eget. Curabitur eleifend urna enim, sit amet pharetra leo ultrices eget. Donec mollis mauris in eros sodales mattis.</p>
            </div>
        </div>
    </main>
    <?php include "includes/footer.php" ?>
    <script>
        $(() => {
            $('.el').slice(0,4).show(); 
            $('.more').on("click", function() {
                $('.el:hidden').slice(0,$('.el:hidden').length).show();
                if($('.el:hidden').length == 0) {
                    $('.more').fadeOut();
                }
            });
        })
    </script>
    <script>
        nav = document.querySelector('nav');
        window.addEventListener('scroll', (e) => {
            db = false;
            if(window.scrollY > 300 && db == false) {
                nav.classList.add('small')
                db = true;
            } else {
                nav.classList.remove('small')
                db = true;
            }
        })
    </script>
</body>
</html>