<?php 

include('config/settings.php');

$search = $db->prepare('SELECT * FROM disks WHERE id = :id');

$search->execute([':id' => $_GET['id']]);

if($search->rowCount() == 0){
	flash_in('error', 'Album introuvable');
	header('Location: index.php');
	exit();
}



$d = $search->fetch(PDO::FETCH_ASSOC);


?><!DOCTYPE html>
<html>
<head>
	<?php include('includes/header.php'); ?>
	<title><?= $d['title'] ?> | Music</title>
</head>
<body>
	<?php include('includes/nav.php'); ?>

	<main>
		<article>
			
			<h1><?= $d['title'] ?></h1>

			<p><span class="label">Artiste :</span> <?= $d['author'] ?></p>
			<p><span class="label">Genre :</span>
				<?php
				if(!empty($d['style']))
					echo $d['style']; 
				else
					echo 'n.c.'; ?>
			</p>
			<p><span class="label">Année de sortie :</span> <?= $d['release_date'] ?></p>
			<p><span class="label">Nombre de piste :</span> <?= $d['tracks'] ?></p>
			<p><span class="label">Prix :</span> <?= $d['price']."€" ?></p>

			<footer>
				<br>
				<p>
					Album enregistré le <?= $d['created'] ?> 
					<?php if($d['created'] != $d['modified']) { ?>
					, modifié le <?= $d['modified'] ?>
					<?php } ?>
				</p>
				<br><br><br>
				<?php if(!empty($_SESSION['user'])) { ?>
					<p>
						<a href="edit.php?id=<?= $d['id'] ?>">Modified</a>
						<a href="core/delete.php?id=<?= $d['id'] ?>">Delete</a>
					</p>
				<?php } ?>
				<br><br>
			</footer>
		</article>
		<?php include('includes/footer.php'); ?>
	</main>
</body>
</html>