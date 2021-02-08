<!DOCTYPE html>
<head>
    <?php include 'includes/head.php' ?>
    <title>Cuisine</title>

</head>
<body>
<?php 
    include 'config/settings.php';
    include 'includes/header.php'; 
    include 'includes/ariane.php'; 

    if(!empty($_GET)) {
        if(!empty($_GET['filter']))
            echo $_GET['filter'];
    }
?>


<div id="hero">

</div>

<div class="social">
    <a href="facebook.com"><i class="fab fa-facebook-f"></i></a>
    <a href="facebook.com"><i class="fab fa-pinterest-p"></i></a>
    <a href="facebook.com"><i class="fab fa-instagram"></i></a>
</div>

<?php include 'includes/nav.php' ?>

<?php
    require_once 'Libs/parsedown.php';
    $Parse = new Parsedown();
    //echo $Parse->text();
?>

<?php include 'includes/footer.php' ?>

</body>
</html>