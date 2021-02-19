<!DOCTYPE html>
<html lang="en" style='font-family: Verdana; text-align: center'>
<?php

try { $db = new PDO('mysql:dbname=media;charset=utf8;host:localhost', 'root', ''); }
catch(Exception $e){ die('Erreur :'.$e->getMessage()); }

$reqMovies = $db->prepare('SELECT * FROM consoles ORDER BY id ASC');
$reqMovies->execute();
$tMovies = $reqMovies->fetchAll();

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include "includes/nav.php" ?>

    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>created</th>
                <th>name</th>
                <th>editor</th>
                <th>digital</th>
                <th>color</th>
            </tr>
        </thead>
        <tbody>
            
                <?php foreach($tMovies as $table) {
                    $d = new DateTime($table['created']);
                    if($table['digital'] == 1)
                        $r = "oui";
                    else
                        $r = "-";
                    echo '<tr><td>#'.$table['id'].'</td><td>'.$d->format('l F, Y').'</td><td>'.$table['name'].'</td><td>'.$table['editor'].'</td><td>'.$r.'</td><td>'.$table['color'].'</td></tr>';
                } ?>
            

        </tbody>
    </table>
    
    <?php include "includes/footer.php" ?>
</body>
</html>