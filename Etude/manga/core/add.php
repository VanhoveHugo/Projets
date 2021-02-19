<?php 
include '../config/settings.php';

$error = false;

if(!empty($_POST)) {
    $_POST = array_map('trim', $_POST);

    if(empty($_POST['firstname'])) {
        $error = true;
        flash_in('error', 'firstname not defined');
    
    }
    if(empty($_POST['lastname'])) {
        $error = true;
        flash_in('error', 'lastname not defined');
    }
    if(empty($_POST['origin'])) {
        $_POST['origin'] = null;
    }
    if(empty($_POST['birthday'])) {
        $_POST['birthday'] = null;
    }
    if(empty($_POST['deathday'])) {
        $_POST['deathday'] = null;
    }
    if(empty($_POST['bio'])) {
        $_POST['bio'] = null;
    }

    
    if($error) {
        header('Location: ../add.php');
        exit();
    } else {
        $add = $db->prepare('INSERT INTO characters (firstname, lastname, origin, birthday, deathday, bio) VALUES (:f, :l, :o, :b, :d, :bio)');
        $add->execute([
            ':f' => $_POST['firstname'],
            ':l' => $_POST['lastname'],
            ':o' => $_POST['origin'],
            ':b' => $_POST['birthday'],
            ':d' => $_POST['deathday'],
            ':bio' => $_POST['bio'],
        ]);
        flash_in('succes', 'ok, done');
        header('Location: ../index.php');
        exit();
    } 
} else {
    header('Location: ../index.php');
    exit();
}
