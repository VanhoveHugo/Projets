<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include 'config/settings.php'; include 'includes/head.php' ?>
    <title>Blog cuisine</title>

</head>
<body>
<?php 
    include 'includes/header.php'; 
    include 'includes/ariane.php'; 
?>
<?php 
if(!empty($_GET)) {
    var_dump('not empty');
} else {
    header('Location: index.php');
}
    

$item = $db->prepare('SELECT * FROM items WHERE id=:id');
$item->execute([':id'=>$_GET['id']]);
$item = $item->fetch(PDO::FETCH_ASSOC);
?>

<section class="section-details">
    <h1><?= $item['title'] ?></h1>
    <h2><?php $date = new DateTime($item['created']); echo $date->format('d F Y') ?></h2>
    <div class="flex">
        <div class="text">
            <h2>Ingrédients</h2>
            <p><?= $item['ingredients'] ?></p>
        </div>
        <img src="data/<?= $item['header_img'] ?>" alt="">
    </div>
    <div class="text">
        <h2>Préparation</h2>
        <p><?= $item['preparation'] ?></p>
    </div>

</section>
<?php include 'includes/footer.php' ?>
<script>    
    /*if(typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", "http://localhost/cuisine/details.php");
    }*/
    </script>
</body>
</html>