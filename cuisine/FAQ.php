<!DOCTYPE html>
<head>
    <?php include 'includes/head.php' ?>
    <title>FAQ - Blog Cuisine</title>
</head>
<body>
<?php 
    include 'config/settings.php';
    include 'includes/header.php'; 
    include 'includes/ariane.php'; 
?>

<section class='FAQ'>
    <article>
        <div>
            <h2>Combien font 1+1?</h2>
            <button class="faq-toggle">
                <i id="open" class="fa fa-arrow-down fa-2x" aria-hidden="true"></i>
                <i id="close" class="fa fa-times fa-2x" aria-hidden="true"></i>
            </button>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus inventore quasi, expedita placeat reprehenderit ipsum quis consequuntur aliquam pariatur blanditiis eaque, rerum eos provident, saepe numquam! Veritatis sequi nobis voluptatum!</p>
    </article>
    <article>
        <div>
            <h2>Combien font 1+1?</h2>
            <button class="faq-toggle">
                <i id="open" class="fa fa-arrow-down fa-2x" aria-hidden="true"></i>
                <i id="close" class="fa fa-times fa-2x" aria-hidden="true"></i>
            </button>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus inventore quasi, expedita placeat reprehenderit ipsum quis consequuntur aliquam pariatur blanditiis eaque, rerum eos provident, saepe numquam! Veritatis sequi nobis voluptatum!</p>
    </article>
    <article>
        <div>
            <h2>Combien font 1+1?</h2>
            <button class="faq-toggle">
                <i id="open" class="fa fa-arrow-down fa-2x" aria-hidden="true"></i>
                <i id="close" class="fa fa-times fa-2x" aria-hidden="true"></i>
            </button>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus inventore quasi, expedita placeat reprehenderit ipsum quis consequuntur aliquam pariatur blanditiis eaque, rerum eos provident, saepe numquam! Veritatis sequi nobis voluptatum!</p>
    </article>
</section>




<?php include 'includes/footer.php' ?>
<script>
    const toggles = document.querySelectorAll('.faq-toggle');
    toggles.forEach(e => {
        e.addEventListener('click', () => {
            e.parentNode.parentNode.classList.toggle('active');
        })
    })
</script>
</body>
</html>