<?php 
include 'config/settings.php';

if(!empty($_SESSION['user'])) {
    if($_SESSION['user']['access'] != 1)
        header('Location: .');
} else 
    header('Location: .');

?>

<!DOCTYPE html>
<head>
    <?php include 'includes/head.php' ?>
    <title>Admin - Blog Cuisine</title>
    <script>
    $(function(){
        $( ".tooltip" ).tooltip();
        $( ".selectmenu" ).selectmenu();

        $('textarea').trumbowyg({
            lang: 'fr',
            svgPath: 'img/icons.svg',
            btns: [
                ['undo', 'redo'],
                ['bold', 'underline'],
                ['unorderedList'],
                ['removeformat'],
                ['fullscreen']
            ]
        });

    })
    </script>
</head>
<body>


<?php 
    include 'includes/header.php'; 
    include 'includes/ariane.php'; 
?>

<?php include 'includes/nav.php' ?>

<form class='admin-form' action="core/admin.php" method='POST' enctype="multipart/form-data">

    <div class="row">
        <label for=name>Nom du plat</label>
        <input type="text" id='name' name=title placeholder='A long name'>
    </div>

    <div class="row">
        <label for=ui-id-1>Catégorie</label>
        <Select class='selectmenu' name='categorie'>
            <Option>Entrées</Option>
            <Option>Plats</Option>
            <Option>Desserts</Option>
        </Select>
    </div>
    
    <div class="row">
        <div class=tags-container><span class=main-tag>Tags:</span><ul id='liste'></ul></div>
        <input type="text" name='tags' id=tags>
    </div>

    <div class="row">
        <label for="ingredients">Ingredients</label>
        <textarea name='ingredients' id=ingredients></textarea>   
    </div>
    <div class="row">
        <label for="préparation">Préparation</label>
        <textarea name='preparation' id=préparation></textarea>   
    </div>
    <div class="row">
        <label for="montage">Montage</label>
        <textarea name='montage' id=montage></textarea>   
    </div>
    <div class="row">
        <label for="finition">Finition</label>
        <textarea name='finition' id=finition></textarea>   
    </div>

    <div class="row">
        <label for="head_img">Image de couverture</label>
        <input type="file" name='header_img' id="head_img">
    </div>
    <div class="row">
        <label for="body_imgs">Toutes les autres images</label>
        <input type="file" name='body_imgs[]' id="body_imgs" multiple>
    </div>

    <div class="row">
        <button type="submit">Valider</button>
    </div>
</form>
<script src='js/split-tags.js'></script>
<?php include 'includes/footer.php' ?>

</body>
</html>