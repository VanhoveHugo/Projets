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

<div class="selector">
    <a href="blog.php?filter=entrées">
        <article class='yBox entrée'>
            <legend>Entrées</legend>
        </article>
    </a>
    <a href="blog.php?filter=plats">
        <article class='yBox plat'>
            <legend>Plats</legend>
        </article>
    </a>
    <a href="blog.php?filter=desserts">
        <article class='yBox dessert'>
            <legend>Desserts</legend>
        </article>
    </a>
</div>





<?php include 'includes/footer.php' ?>

</body>
</html>