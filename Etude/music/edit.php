<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include "includes/header.php";
        include 'config/settings.php';
    ?>
</head>
<?php
if(empty($_GET['id'])) {
    header('Location: index.php');
    exit();
} else {
    $search = $db->prepare('SELECT * FROM disks WHERE id = :id');
    $search->execute([
        ':id' => $_GET['id'],
    ]);
    $data = $search->fetch();
    $style = $data['style'];
} ?>

<body>
    <?php include "includes/nav.php" ?>

    <main>
    <form method='POST' action="core/modified.php">
        <h1>Edit song</h1>
        <input type="hidden" name='id' value='<?= $data['id'] ?>'>
        <div class="row">
            <input id='title' type="text" name='title' value="<?= $data['title'] ?>" required>
            <label for="title">Title</label>
        </div>

        <div class="row">
            <input id='author' type="text" name='author' value="<?= $data['author'] ?>" required>
            <label for="author">Author</label>
        </div>

        
        <select name="style">
            <option value="Null">Null</option>
            <option value="Drill" <?php if($style == "Drill") echo 'selected'; ?>>Drill</option>
            <option value="HipHop" <?php if($style == "HipHop") echo 'selected'; ?>>Hip Hop</option>
            <option value="Rap" <?php if($style == "Rap") echo 'selected'; ?>>Rap</option>
            <option value="Chill" <?php if($style == "Chill") echo 'selected'; ?>>Chill</option>
        </select>

        <input type="date" name='release_date' value="<?= $data['release_date'] ?>">


        <div class="row">
            <input id='tracks' type="number" name='tracks' value="<?= $data['tracks'] ?>">
            <label for="tracks">number fo tracks</label>

        </div>
        <div class="row">
            <input id='price' type="number" name='price' value="<?= $data['price'] ?>">
            <label for="price">Title</label>
        </div>

        
        <input type="submit">
    </form>
    </main>

    <?php include "includes/footer.php" ?>
</body>
</html>