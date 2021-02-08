<?php
include '../config/settings.php';

$error = false;
if(empty(trim($_POST['item']))) {
    $error = true;
    flash_in('error', 'Title invalid');
}
if(empty(trim($_POST['markdown']))) {
    $error = true;
    flash_in('error', 'markdown invalid');
}


$file = fopen("../categories/".$_POST['item'].".txt", "a+");

fwrite($file, $_POST['markdown']);

if($error)
	header('Location: ../admin.php');
else
    $add = $db->prepare('INSERT INTO items (title, description, categorie, img) VALUES (:t, :d, :c, :i)');
    $add->execute([
        ':t' => $_POST['item'],
        ':d' => $_POST['description'],
        ':c' => $_POST['categorie'],
        ':i' => $_POST['img'],
    ]);

    $messages = $_SESSION['user']['messages'] + 1;
    $profil = $db->prepare("UPDATE users SET messages = $messages WHERE id = :id");
    $profil->execute([
        ':id' => $_SESSION['user']['id'],
    ]);

    flash_in('succes', 'Your accout will be created');
    header('Location: ../login.php');
    exit();
	header('Location: ../index.php');
exit();
