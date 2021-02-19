<!DOCTYPE html>
<html lang="fr">
<head>
    <?php 
        include "includes/header.php";
        include 'config/settings.php';
    ?>
</head>
<body>
    <?php include "includes/nav.php" ?>
    
    <main>
        <h1 class='banner'>Disks</h1>
        <?php
            $idx = 1;
            foreach($resD as $e) { ?>

                <article>
                    <div class="legend"><?= $idx?></div>
                    <h1><?= $e['title'] ?></h1>
                    <h2><?= $e['author'] ?></h2>
                    <h3><?= $e['style'] ?></h3>
                    <h4>Release in 
                        <?php 
                            $date = new DateTime($e['release_date']); 
                            echo $date->format('F Y'); 
                        ?>
                    </h4>
                    <br>
                    <a href="items.php?id=<?= $e['id'] ?>">View more...</a>
                </article>

        <?php $idx+=1;}?>   
        <h1 class='banner'>Users</h1>
        <?php
            $idx = 1;
            foreach($resU as $e) { ?>

                <article>
                    <div class="legend"><?= $idx?></div>
                    <h1><?= $e['username'] ?></h1>
                </article>

        <?php $idx+=1;}?>  
    </main>
    <?php include "includes/footer.php" ?>
</body>
</html>