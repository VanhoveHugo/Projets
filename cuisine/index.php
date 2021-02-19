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

<div class="hero">
    <article>
        <figure>
            <img src="https://guten-blog.cmsmasters.net/wp-content/uploads/2019/01/slide2-1.jpg" alt="">
        </figure>
        <div class="text_hero">
            <div class="box">Fast Food</div>
            <h1>La recette du meilleur tacos</h1>
            <div class="desc"></div>
            <a href="#MDr"><button class='white'>Découvrir</button></a>                
        </div>
    </article>
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
            <button class='white'>Entrées</button>
        </article>
    </a>
    <a href="blog.php?filter=plats">
        <article class='yBox plat'>
            <button class='white'>Plats</button>
        </article>
    </a>
    <a href="blog.php?filter=desserts">
        <article class='yBox dessert'>
            <button class='white'>Desserts</button>
        </article>
    </a>
</div>





<?php include 'includes/footer.php' ?>

</body>
</html>