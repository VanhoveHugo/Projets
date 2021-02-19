<?php
include '../config/settings.php';

$error = false;

if(!empty($_POST)) {
    if(!empty($_POST['imgs'])) {
        $imgs = $_POST['imgs'];
        $_POST['imgs'] = "";
    } else {
        $error = true;
        flash_in('error', 'Images was not successfull upload');  
    };
    $_POST = array_map('trim', $_POST);

    if(empty($_POST['item'])) {
        $error = true;
        flash_in('error', 'Title invalid');
    }
    if(empty($_POST['markdown'])) {
        $error = true;
        flash_in('error', 'markdown invalid');
    }
    if(empty($_POST['img'])) {
        $error = true;
        flash_in('error', 'Header Image');
    }

    if($error)
        header('Location: ../admin.php');
    else {
        $add = $db->prepare('INSERT INTO items (title, description, categorie, img) VALUES (:t, :d, :c, :i)');
        $add->execute([
            ':t' => $_POST['item'],
            ':d' => $_POST['description'],
            ':c' => $_POST['categorie'],
            ':i' => $img,
        ]);

        $file = fopen("../categories/".$_POST['item'].".txt", "a+");

        fwrite($file, $_POST['markdown']);

        $img = '';
        if(!empty($_POST['img'])) { $img.=$_POST['img'].';'; };
        if(!empty($_POST['imgs'])) { $img.=$_POST['imgs'].';'; };

        $messages = $_SESSION['user']['messages'] + 1;
        $profil = $db->prepare("UPDATE users SET messages = $messages WHERE id = :id");
        $profil->execute([
            ':id' => $_SESSION['user']['id'],
        ]);

        flash_in('succes', 'Your item will be created');
        header('Location: ../index.php');
        exit();
    } 
}
else {
    header('Location: ../index.php');
    exit();
}