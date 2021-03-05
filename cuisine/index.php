<!DOCTYPE html>
<head>
    <?php include 'config/settings.php'; include 'includes/head.php' ?>
    <title>La cuisine de Fanie</title>

</head>
<body>
<?php 
    include 'includes/header.php'; 
    include 'includes/ariane.php'; 
?>

<div class="hero">
    <figure>
        <img src="https://guten-blog.cmsmasters.net/wp-content/uploads/2019/01/slide2-1.jpg" alt="">
    </figure>
    <div class="text_hero">
        <a href="" id=categorie class="btn btn-border">Fast Food</a>
        <h1 id=title>La recette du meilleur tacos</h1>
        <div id=desc class="desc">Discover your way to effortless weight loss,<br>vibrant health, and boundless energy.</div>
        <a href="#MDr" id=button class='btn'>Découvrir</a>                
    </div>
</div>

<script>
$('#categorie').text('Desserts')
$('#title').text('Gateau au peanut')
$('#desc').text('Sur une base de beurre de cacahuette, speculos et gateau au beurre enrober au chocolat.')
$('#button').text('en moins de 10 minutes')
</script>

<?php include 'includes/footer.php' ?>

</body>
</html>