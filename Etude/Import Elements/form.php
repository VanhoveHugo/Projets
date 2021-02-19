<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    section{
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 50px 0;
    }
    input[type='submit'] {
        position: absolute;
        width: 100px;
        left: calc(50% - 50px);        
    }
</style>
<body>
<?php include "includes/nav.php" ?>

    <form action="action.php" method='POST' >
        <section>
            <h1>Quel est votre nom ?</h1>
            <input type="text" name="name" placeholder="Entrer votre nom" required>
        </section>
        
        <section>
            <h1>Quels fruits aimes-tu ?</h1>
            <?php
                $fruits = ["Banane", "Pomme", "Cerise", "Pastèque", "Myrtille"];
                foreach($fruits as $i => $f) {
                    echo "<article name=$f class='fruit'><label for=$f>$f</label> <input name='fruit[$i]' type='radio' value=$f></article>";
                }
            ?>
        </section>

        <section>
            <h1>Quel planète préfère tu ?</h1>
            <select name='planete'>
                <option value="null"  class="invisible" disabled selected>Selectionner votre planète</option>
                <?php
                    $planete = ["Mercure", "Vénuse", "Terre", "Mars", "Jupiter", "Saturne", "Uranus", "Neptune"];
                    foreach($planete as $p) {
                        echo "<option value=$p>$p</option>";
                    }
                ?>
            </select>
        </section>
        <input type="submit">
    </form>
    <?php include "includes/footer.php" ?>
</body>
</html>