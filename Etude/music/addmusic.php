<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include "includes/header.php";
        include 'config/settings.php';
    ?>
</head>
<body>
    <?php include "includes/nav.php" ?>

    <main>
    <form method='POST' action="core/addmusic.php">
        <h1>Add song</h1>

        <div class="row">
            <input id='title' type="text" name='title' required>
            <label for="title">Title</label>
        </div>

        <div class="row">
            <input id='author' type="text" name='author' required>
            <label for="author">Author</label>
        </div>

        
        <select name="style">
            <option value="Null">Null</option>
            <option value="Drill">Drill</option>
            <option value="HipHop">Hip Hop</option>
            <option value="Rap">Rap</option>
            <option value="Chill">Chill</option>
        </select>

        <input type="date" name='release_date'>


        <div class="row">
            <input id='tracks' type="number" name='tracks'>
            <label for="tracks">number fo tracks</label>

        </div>
        <div class="row">
            <input id='price' type="number" name='price'>
            <label for="price">Title</label>
        </div>

        
        <input type="submit">
    </form>
    </main>

    <?php include "includes/footer.php" ?>
</body>
</html>