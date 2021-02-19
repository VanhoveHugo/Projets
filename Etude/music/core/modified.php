<?php 
include '../config/settings.php';

$error = false;

if(!empty($_POST)) {
    if(empty(trim($_POST['title']))) {
        $error = true;
        flash_in('error', 'error espected: title');
    }
    if(empty(trim($_POST['author']))) {
        $error = true;
        flash_in('error', 'error espected: author');
    }
} else {
    flash_in('error', 'vide');
    $error = true;
}

if($error) {
    header('Location: ../edit.php?id='.$_POST['id']);
    exit();
} else {
    $add = $db->prepare('UPDATE disks SET title = :t, author = :a, style = :s, release_date =:r, tracks =:ts, price =:p WHERE id = :id');
    $add->execute([
        ':t' => trim($_POST['title']),
        ':a' => trim($_POST['author']),
        ':s' => trim($_POST['style']),
        ':r' => trim($_POST['release_date']),
        ':ts' => trim($_POST['tracks']),
        ':p' => $_POST['price'],
        'id' => $_POST['id'],
    ]);
    flash_in('succes', 'Modified');
    header('Location: ../index.php');
    exit();
}
