<?php 
include '../config/settings.php';

$error = false;

if(empty($_POST['title'])) {
    $error = true;
}
if(empty($_POST['author'])) {
    $error = true;
}
if($error) {
    header('Location: ../addmusic.php');
    exit();
} else {

    $add = $db->prepare('INSERT INTO disks (title, author, style, release_date, tracks, price) VALUES (:t, :a, :s, :r, :ts, :p)');
    $add->execute([
        ':t' => $_POST['title'],
        ':a' => $_POST['author'],
        ':s' => $_POST['style'],
        ':r' => $_POST['release_date'],
        ':ts' => $_POST['tracks'],
        ':p' => $_POST['price'],
    ]);
    flash_in('succes', 'ok, done');
    header('Location: ../index.php');
    exit();
}
