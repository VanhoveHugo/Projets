<?php
define('NAME', '18 burger');
define('ADMIN_NAME', 'tarek');
define('ADMIN_PASSWORD', 'root');
session_start();  

try { $db = new PDO('mysql:dbname=18burger;charset=utf8;host:localhost', 'root', ''); }
catch(Exception $e){ die('Erreur :'.$e->getMessage()); }

function crypt_password($v) {
    return hash('sha512', '&LNR7q+?};A{$dev'.hash('sha512', $v).']US[5~L}K!za=Rgn');
}

$now = new DateTime();
$nowDate = $now->format('l');
$nowHour = $now->format('H:i');
$horaires = [
    "Monday" => [
        $minC = "16:30",
        $minH = "20:00",
        $maxC = "18:30",
        $maxH = "10:00"
    ],
    "Tuesday" => [
        $minC = "16:30",
        $minH = "17:00",
        $maxC = "19:30",
        $maxH = "20:00"
    ],
    "Wednesday" => [
        $minC = "09:30",
        $minH = "10:00",
        $maxC = "17:30",
        $maxH = "18:00"
    ]
];

if(!empty($horaires[$nowDate])) {
    if($nowHour > $horaires[$nowDate][1] && $nowHour < $horaires[$nowDate][2]) {
        $result = "Ouvert";
    } elseif($nowHour > $horaires[$nowDate][0] && $nowHour < $horaires[$nowDate][1]) {
        $result = "Ouvre bientôt - ".$horaires[$nowDate][0];
    } elseif($nowHour > $horaires[$nowDate][2] && $nowHour < $horaires[$nowDate][3]) {
        $result = "Ferme bientôt - ".$horaires[$nowDate][3];
    } else {
        $result = "Fermé à".$minH;
    }
} else {
    $result = "Ferm ded";
}

$result;