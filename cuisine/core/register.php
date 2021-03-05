<?php 
include '../config/settings.php';

$error = false;

var_dump($_POST);

if(!empty($_POST)) {
    if(empty(trim($_POST['username']) OR !preg_match('/^[a-z0-9]+$/',$_POST['username']))) {
        $error = true;
        flash_in('error', 'username');
    }
    if(empty(trim($_POST['password']))) {
        $error = true;
        flash_in('error', 'password not defined');
    }
    if(empty(trim($_POST['check_password']))) {
        $error = true;
        flash_in('error', 'confirm your password password');
    }
    if($_POST['password'] != $_POST['check_password']) {
        $error = true;
        flash_in('error', 'that not same password');
    }

    if($error) {
        header('Location: ../register.php');
        exit();
    } else {
        $add = $db->prepare('INSERT INTO users (username, password, email) VALUES (:u, :p, :e)');
        $add->execute([
            ':u' => $_POST['username'],
            ':p' => crypt_password($_POST['password']),
            ':e' => $_POST['email'],
        ]);
        flash_in('succes', 'Your accout will be created');
        header('Location: ../login.php');
        exit();
    } 
} else {
    flash_in('error', 'tu na pas post jeune margoulain');
    header('Location: ../index.php');
    exit();
}
