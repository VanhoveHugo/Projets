<?php

include '../config/settings.php';

$error = false;

if(empty($_POST)){
	$error = true;
	flash_in('error', 'Non !');
}else {
	$search = $db->prepare('SELECT * FROM users WHERE username = :u AND password = :p');
	$search->execute([
		':u' => $_POST['username'],
		':p' => crypt_password($_POST['password'])
	]);
	
	if($search->rowCount() == 0){
		flash_in('error', 'Les identifiants ne correspondent pas');
		$error = true;
	}else{
		$data = $search->fetch(PDO::FETCH_ASSOC);
		$_SESSION['user'] = $data;
		flash_in('success', 'Welcome back '.$_SESSION['user']['username']);
	}

}

if($error)
	header('Location: ../login.php');
else
	header('Location: ../index.php');

exit();
