<!DOCTYPE html>
<head>
    <?php include 'config/settings.php'; include 'includes/head.php' ?>
    <title>Fanie - blog</title>
</head>
<body>
<?php 
    include 'includes/header.php'; 
    include 'includes/ariane.php'; 
    include 'includes/nav.php'; 

    if(!empty($_GET)) {
        if(!empty($_GET['filter'])) {
            $req = $db->prepare('SELECT * FROM items WHERE categorie = :c');
            $req->execute([
                ':c' => $_GET['filter']
            ]);
            $res = $req->fetchAll(PDO::FETCH_ASSOC);
        }
    } else {
        $req = $db->prepare('SELECT * FROM items ORDER BY id DESC');
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
    }
?>
<div class="section-blog">
    <?php foreach($res as $e) { ?>
        <article class="blog-article">
            <img src="data/<?= $e['header_img'] ?>" alt="An image of <?= $e['title'] ?>">
            <a class="categorie" href=<?= 'blog.php?filter='.$e['categorie'] ?>><?= $e['categorie'] ?></a>
            <br>
            <a class="name" href=<?= 'details.php?id='.$e['id'] ?>><?= $e['title'] ?></a>
            <br>
            <?php if(!empty($e['p_time'])) { ?>
                <p class="delay">
                    <?php 
                        if($e['p_time'] > 59) {
                            $t = $e['p_time'];
                            $h = 0;
                            while($t > 59) {
                                $t-=60;
                                $h++;
                            }
                            if($t != 0) 
                                echo $h.'h'.$t;
                            else
                                echo $h.'h';

                        } else {
                            echo $e['p_time'].' Minutes';
                        }
                    ?>
                </p>
            <?php } ?>
        </article>
    <?php } ?>
</div>


<?php include 'includes/footer.php' ?>
<script>
    $( "#search" ).autocomplete({
        source: ['dukan', 'puddind', 'beignet', 'caramel', 'fromage']
    });
</script>
</body>
</html>