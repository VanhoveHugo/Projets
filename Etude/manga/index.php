<?php 
    include 'config/settings.php';

    $req = $db->prepare('SELECT * FROM characters ORDER BY lastname, firstname');
    $req->execute();
    $res = $req->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include "includes/head.php" ?>
</head>

<body>
    <?php include "includes/header.php" ?>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Origine</th>
                    <th>Date de naissance</th>
                    <th>Date de mort</th>
                    <th>Biographie</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($res as $e) {
                ?>
                    <tr>
                    <td><?= $e['lastname'] ?></td>
                    <td><?= $e['firstname'] ?></td>
                    <td><?= $e['origin'] ?></td>
                    <td><?= $e['birthday'] ?></td>
                    <td><?= $e['deathday'] ?></td>
                    <td><?= $e['bio'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>
</html>