<!DOCTYPE html>
<head>
    <?php include 'config/settings.php'; include 'includes/head.php' ?>
    <title>FAQ - Blog Cuisine</title>
</head>
<body>
<?php 
    include 'includes/header.php'; 
    include 'includes/ariane.php'; 
?>

<section class='section-faq'>
    <article>
        <div>
            <h2>C'est quoi un Troll ?</h2>
            <button class="btn-icon btn-faq">
                <i class="fa fa-arrow-down fa-2x" aria-hidden="true"></i>
            </button>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus inventore quasi, expedita placeat reprehenderit ipsum quis consequuntur aliquam pariatur blanditiis eaque, rerum eos provident, saepe numquam! Veritatis sequi nobis voluptatum!</p>
    </article>
    <article>
        <div>
            <h2>Comment je configure mon thermomix ?</h2>
            <button class="btn-icon btn-faq">
                <i class="fa fa-arrow-down fa-2x" aria-hidden="true"></i>
            </button>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus inventore quasi, expedita placeat reprehenderit ipsum quis consequuntur aliquam pariatur blanditiis eaque, rerum eos provident, saepe numquam! Veritatis sequi nobis voluptatum!</p>
    </article>
    <article>
        <div>
            <h2>Quelle est mon parcour ?</h2>
            <button class="btn-icon btn-faq">
                <i class="fa fa-arrow-down fa-2x" aria-hidden="true"></i>
            </button>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus inventore quasi, expedita placeat reprehenderit ipsum quis consequuntur aliquam pariatur blanditiis eaque, rerum eos provident, saepe numquam! Veritatis sequi nobis voluptatum!</p>
    </article>
</section>




<?php include 'includes/footer.php' ?>
<script>
    const toggles = document.querySelectorAll('.btn-faq');
    toggles.forEach(e => {
        e.addEventListener('click', () => {
            e.parentNode.parentNode.classList.toggle('active') ? (e.children[0].classList.remove('fa-arrow-down'),e.children[0].classList.add('fa-arrow-up')) : (e.children[0].classList.remove('fa-arrow-up'),e.children[0].classList.add('fa-arrow-down'));;
        })
    })
</script>
</body>
</html>