<?php 
include '../config/settings.php';

$error = false;

if(!empty($_POST)) {
    if(empty(trim($_POST['username']))) {
        $error = true;
        flash_in('error', 'username not defined');
    
    }
    if(empty(trim($_POST['password']))) {
        $error = true;
        flash_in('error', 'password not defined');
    }
    if($error) {
        header('Location: ../adduser.php');
        exit();
    } else {
        $add = $db->prepare('INSERT INTO users (firstname, lastname, username, password, email, birthday) VALUES (:f, :l, :u, :p, :e, :b)');
        $add->execute([
            ':f' => $_POST['firstname'],
            ':l' => $_POST['lastname'],
            ':u' => $_POST['username'],
            ':p' => crypt_password($_POST['password']),
            ':e' => $_POST['email'],
            ':b' => $_POST['birthday'],
        ]);
        flash_in('succes', 'ok, done');
        header('Location: ../index.php');
        exit();
    } 
} else {
    flash_in('error', 'tu na pas post jeune margoulain');
    header('Location: ../index.php');
    exit();
}
