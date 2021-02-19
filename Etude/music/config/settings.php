<?php

session_start();    

try { $db = new PDO('mysql:dbname=music;charset=utf8;host:localhost', 'root', ''); }
catch(Exception $e){ die('Erreur :'.$e->getMessage()); }

$req_disks = $db->prepare('SELECT * FROM disks ORDER BY id ASC');
$req_users = $db->prepare('SELECT * FROM users ORDER BY id ASC');

$req_disks->execute();
$req_users->execute();

$resD = $req_disks->fetchAll();
$resU = $req_users->fetchAll();


function flash_in($type, $message) {
    if(empty( $_SESSION['message'])) 
        $_SESSION['message'] = [];
    array_push($_SESSION['message'], array($type, $message));
}
function flash_out() {
    if(!empty($_SESSION['message']))
        foreach($_SESSION['message'] as $v) 
            echo '<p class="alert alert-'.$v[0].'">'.$v[1].'</p>';
    $_SESSION['message'] = [];
}
function crypt_password($p) {
    return hash('sha512', 'trololol'.hash('sha512', $p));
}