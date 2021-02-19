<!DOCTYPE html>
<?php 
    include 'config/settings.php';
    $req = $db->prepare('SELECT origin FROM characters WHERE origin IS NOT NULL GROUP BY origin ORDER BY origin');
    $req->execute();
    $res = $req->fetchAll(PDO::FETCH_ASSOC);


    foreach($res as $i => $e) {
        $res[$i] = '"'.$e['origin'].'"';
    }
?>
<html>
<head>
    <?php include "includes/head.php" ?>    
    <script>
    $(function() {
       $('#origin').autocomplete({
           source: '';
       }) ;
    })
    </script>
</head>

<body>
    <?php include "includes/header.php" ?>

    <main>
        <form action="core/add.php" method="post">
            <h1>Add user</h1>

            <div class="row">
                <input type="text" name='firstname'>
                <label for='first'>Fistname</label>
            </div>

            <div class="row">
                <input type="text" name='lastname'>
                <label>Lastname</label>
            </div>

            <div class="row">
                <input type="text" name='origin' id='origin'>
                <label>Origin</label>
            </div>

            <div class="row">
                <label>Birthday</label>
                <input type="date" name='birthday' id='birthday'>
            </div>

            <div class="row">
                <label>Deathday</label>
                <input type="date" name='deathday' id='deathday'>
            </div>

            <textarea id="bio" name="bio"></textarea>

            <input type="submit" value="Envoyer">
        </form>
    </main>
</body>
</html>