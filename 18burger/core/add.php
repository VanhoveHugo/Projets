<?php
include "../config/settings.php";

if(!empty($_POST)) {
    $_POST = array_map('trim', $_POST);
    $error = false;
    if(empty($_POST["name"]))
        $error = true;

    if(empty($_POST["tags"]))
        $error = true;

    if(empty($_POST["solo_price"]))
        $error = true;

    if(empty($_POST["menu_price"]))
        $_POST["menu_price"] = null;


    
    if($error == false) {
        $add = $db->prepare('INSERT INTO items (image_url, title, tags, price, menu_price) VALUES (:image_url, :title, :tags, :price, :menu_price)');
        $add->execute([
            ':image_url' => $_POST['filename'],
            ':title' => $_POST['name'],
            ':tags' => $_POST['tags'],
            ':price' => $_POST['solo_price'],
            ':menu_price' => $_POST['menu_price']
        ]);

        header('Location: ../');
        exit();
    }
}