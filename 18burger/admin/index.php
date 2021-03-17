<!DOCTYPE html>
<?php include "../config/settings.php";

if($_SESSION['admin'] == true) {
    header('Location: ..');
    exit();
}

$_GET = array_map('trim', $_GET);
if(!empty($_GET)) {
    if($_GET['name'] == ADMIN_NAME && $_GET['passord'] == ADMIN_PASSWORD) {
        $_SESSION['admin'] = true;
        header('Location: ..');
        exit();
    }
}
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= NAME ?> - Espace admin</title>
    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/all.min.css">
    <link rel="stylesheet" href="../styles/index.css">
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
                <li><a href="#home">Accueil</a></li>
                <li><a href="#menu">Menu</a></li>
            </ul>
            <ul class="right">
                <li class=<?= $result == "Ouvert" ? "" : "hidden" ?>><a href="https://deliveroo.fr/fr/menu/paris/villiers/pour-ma-part" target="_blank">Commander</a></li>
                <li><?= $result ?></li>
            </ul>
        </nav>
    </header>
    <main>
        <form class="admin" action="">
            <table>
                <tr>
                    <td><label for="name">Nom:</label></td>
                    <td><input name="name" id="name" type="text"></td>
                </tr>
                <tr>
                    <td><label for="passord">Mot de passe:</label></td>
                    <td><input name="passord" id="passord" type="password"></td>
                </tr>
                <tr>
                    <td colspan=2><input type="submit"></td>
                </tr>
            </table>
        </form>
    </main>
    <?php include "../includes/footer.php" ?>
</body>
</html>