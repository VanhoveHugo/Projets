<!DOCTYPE html>
<head>
    <?php include 'includes/head.php' ?>
    <title>Blog Cuisine</title>
</head>
<?php 
    include 'config/settings.php';
    include 'includes/header.php'; 
    include 'includes/ariane.php'; 

    $data = $db->prepare('SELECT * FROM users WHERE id = :id');
    $data->execute([
        ':id' => $_SESSION['user']['id'],
    ]);
    foreach($data as $d) {
?>

<?php include 'includes/nav.php' ?>

<div class="edit">
    <div class="username"><?= $d['username'] ?></div>
    <div class="stats">
        <div class="messages"><i class="far fa-paper-plane" style='color: #f1c40f'></i> <?= $d['messages'] ?></div>
        <div class="love"><i class="fas fa-heart" style='color: #e74c3c'></i> <?= $d['loves'] ?></div>
    </div>
    <div class="email">Email: <?= $d['email'] ?></div>
    <div class="rank">
        <?php
        if($d['access'] == 1) {
            echo 'Administrateur';
        } else {
            echo 'User';
        }
        ?>
    </div>
</div>

<?php }; include 'includes/footer.php' ?>

</body>
</html>