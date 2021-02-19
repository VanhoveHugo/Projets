<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include "includes/nav.php" ?>

<?php
    if(isset($_POST)) {
        echo "Bonjour, ".$_POST['name']."<br><br>";
        if(isset($_POST['fruit'])) {
            echo "vous aimez les";
            foreach($_POST['fruit'] as $p) {
                echo " $p";
            }
        }
        if(isset($_POST['planete'])) {
            echo "<br><br>vous aimez la planete ".$_POST['planete'];
        }        
    }

?>


<?php include "includes/footer.php" ?>
</body>
</html>