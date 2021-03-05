<?php 
include '../config/settings.php';

if(!empty($_SESSION['user'])) {
    if($_SESSION['user']['access'] != 1)
        header('Location: ..');
} else 
    header('Location: ..');
?>
<!DOCTYPE html>
<head>
    <?php include '../includes/head.php' ?>
    <title>La cuisine de Fanie</title>
</head>
<body>

<?php 
    include '../includes/header.php'; 

    $users = $db->prepare('SELECT * FROM users');
    $users->execute();

    $items = $db->prepare('SELECT * FROM items');
    $items->execute();

    $comments = $db->prepare('SELECT * FROM comments');
    $comments->execute();

    $visitors = $db->prepare('SELECT * FROM visits');
    $visitors->execute();
?>
<div class="section-admin">
    <ul>
        <li><a href='add.php' class="btn">Ajouter une recette</a></li>
        <li><a href='logs.php' class="btn">Logs</a></li>
        <li>&nbsp;</li>
        <li><a href='../core/logout.php' class="btn">Déconnexion</a></li>
    </ul>
    <ul style='text-align: right'>
        <li><p><?= $visitors->rowCount() ?> Visites</p></li>
        <li><a href='../blog.php' class='btn'><?= $items->rowCount() ?> Recettes</a></li>
        <li><p><?= $users->rowCount() ?> Utilisateurs</p></li>
        <li><p><?= $comments->rowCount() ?> Commentaires</p></li>
    </ul>
</div>
<?= flash_out() ?>
</body>
</html>