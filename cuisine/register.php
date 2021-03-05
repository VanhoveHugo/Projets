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

<?php include 'includes/nav.php' ?>

<form action="core/register.php" method='POST'>
    <div class="row">
        <label for="username">Username</label>
        <input id='username' name='username' type="text">
    </div>
    <div class="row">
        <label for="password">Password</label>
        <input id='password' name='password' type="password">
    </div>
    <div class="row">
        <label for="check_password">Confirm Password</label>
        <input id='check_password' name='check_password' type="password">
    </div>
    <div class="row">
        <label for="check_password">Email</label>
        <input id='email' name='email' type="email">
    </div>
    <input type="submit" value='Enregistrer'>
</form>

<?php include 'includes/footer.php' ?>

</body>
</html>