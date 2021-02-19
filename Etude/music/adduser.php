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
    <form action="core/adduser.php" method='POST'>
        <h1>Add user</h1>
        <div class="row">
            <input id='first' type="text" name='firstname'>
            <label for='first'>Fistname</label>
        </div>
        <div class="row">
            <input type="text" name='lastname'>
            <labelr>Lastname</label>
        </div>
        <div class="row">
            <input type="text" name='username' required>
            <label>Username</label>
        </div>
        <div class="row">
            <input type="password" name='password' required>
            <label>Password</label>
        </div>
        <div class="row">
            <input type="email" name='email'>
            <label>Email</label>
        </div>
        <div class="row">
            Birthday
            <input type="date" name='birthday'>
        </div>

        <input type="submit" value="Envoyer">
    </form>
    </main>

    <?php include "includes/footer.php" ?>
</body>
</html>