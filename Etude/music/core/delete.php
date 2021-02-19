<?php 

include('../config/settings.php');

if(!empty($_SESSION["user"])) {
	$search = $db->prepare('DELETE FROM disks WHERE id = :id');

	$search->execute([':id' => $_GET['id']]);

	flash_in('succes', 'Album supprimer');
	header('Location: ../index.php');
	exit();
} else {
	flash_in('error', 'don\' be connected');
	header('Location: ../index.php');
	exit();
}
