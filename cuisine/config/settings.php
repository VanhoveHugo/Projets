<?php

session_start();    

define("BASE_URL", "http://localhost/cuisine/");
try { $db = new PDO('mysql:dbname=cuisine;charset=utf8;host:localhost', 'root', ''); }
catch(Exception $e){ die('Erreur :'.$e->getMessage()); }

$cip = $_SERVER['REMOTE_ADDR'];
$query = $db->prepare("SELECT * FROM visits WHERE ip_address=:cip");
$query->execute([
    ':cip' => $cip
]);
$query = $query->fetch(PDO::FETCH_ASSOC);

if(empty($query)) {
    $add = $db->prepare("INSERT INTO visits (ip_address) VALUES (:cip)");
    $add->execute([
        ':cip' => $cip
    ]);
};

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