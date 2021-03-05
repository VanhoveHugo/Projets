<!DOCTYPE html>
<head>
    <?php include 'config/settings.php'; include 'includes/head.php' ?>
    <title>Inscription - Blog Cuisine</title>
</head>
<body>

<?php 
    include 'includes/header.php'; 
    include 'includes/ariane.php'; 
?>

<?php
    if(!empty($_SESSION['user'])) {
        header('Location: edit.php');
    }
?>

<?php include 'includes/nav.php' ?>

<form action="core/login.php" method='POST'>
    <div class="row">
        <label for="username">Username</label>
        <input id='username' name='username' type="text">
    </div>
    <div class="row">
        <label for="password">Password</label>
        <input id='password' name='password' type="password">
    </div>
    <input type="submit" value='Enregistrer'>
</form>

<?php include 'includes/footer.php' ?>

</body>
</html>