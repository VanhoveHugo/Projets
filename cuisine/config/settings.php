<?php

session_start();    

define("BASE_URL", "http://localhost:8888/cuisine");

try { $db = new PDO('mysql:dbname=cuisine;charset=utf8;host:localhost', 'root', ''); }
catch(Exception $e){ die('Erreur :'.$e->getMessage()); }

function flash_in($type, $message) {
    if(empty( $_SESSION['message'])) 
        $_SESSION['message'] = [];
    array_push($_SESSION['message'], array($type, $message));
}
function flash_out() {
    if(!empty($_SESSION['message']))
        foreach($_SESSION['message'] as $v) 
            echo '<p class="alert visible alert-'.$v[0].'">'.$v[1].'</p>';
    $_SESSION['message'] = [];
}
function crypt_password($p) {
    return hash('sha512', 'trololol'.hash('sha512', $p));
}