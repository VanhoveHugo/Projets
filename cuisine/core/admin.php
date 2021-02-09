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

$img = '';
if(!empty($_POST['img1'])) { $img.=$_POST['img1'].';'; };
if(!empty($_POST['img2'])) { $img.=$_POST['img2'].';'; };
if(!empty($_POST['img3'])) { $img.=$_POST['img3'].';'; };
if(!empty($_POST['img4'])) { $img.=$_POST['img4'].';'; };
if(!empty($_POST['img5'])) { $img.=$_POST['img5'].';'; };


if($error)
	header('Location: ../admin.php');
else
    $add = $db->prepare('INSERT INTO items (title, description, categorie, img) VALUES (:t, :d, :c, :i)');
    $add->execute([
        ':t' => $_POST['item'],
        ':d' => $_POST['description'],
        ':c' => $_POST['categorie'],
        ':i' => $img,
    ]);

    $messages = $_SESSION['user']['messages'] + 1;
    $profil = $db->prepare("UPDATE users SET messages = $messages WHERE id = :id");
    $profil->execute([
        ':id' => $_SESSION['user']['id'],
    ]);

    flash_in('succes', 'Your item will be created');
    header('Location: ../index.php');
    exit();