<!DOCTYPE html>
<head>
    <?php include 'includes/head.php' ?>
    <title>Admin - Blog Cuisine</title>
</head>
<?php 
    include 'config/settings.php';
    include 'includes/header.php'; 
    include 'includes/ariane.php'; 
?>

<?php include 'includes/nav.php' ?>

<form action="core/admin.php" method='POST'>
    <input type="text" name='item' placeholder='nom du plat'>
    <input type="text" name='description' placeholder='description'>
    <input type="file" name='img' multiple>
    <Select name='categorie'>
        <Option>entrée</Option>
        <Option>plat</Option>
        <Option>dessert</Option>
    </Select>
    <textarea name='markdown' cols="30" rows="10"></textarea>   
    <button type="submit">Envoyer</button>
</form>


<?php include 'includes/footer.php' ?>

</body>
</html>