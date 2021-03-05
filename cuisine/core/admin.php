<?php
include '../config/settings.php';

$error = false;

if(!empty($_POST)) {
    if(!empty($_POST['body_imgs'])) {
        $imgs = $_POST['body_imgs'];
        $_POST['body_imgs'] = "";
    }
    $_POST = array_map('trim', $_POST);

    if(empty($_POST['title'])) {
        $error = true;
        flash_in('error', 'Title invalid');
    }
    if(empty($_POST['tags'])) {
        $error = true;
        flash_in('error', 'Tags invalid');
    }
    if(empty($_POST['ingredients'])) {
        $error = true;
        flash_in('error', 'ingredients invalid');
    }
    if(empty($_POST['preparation'])) {
        $error = true;
        flash_in('error', 'ingredients invalid');
    }
    if(empty($_POST['montage'])) {
        $_POST['montage']=null;
    }
    if(empty($_POST['finition'])) {
        $_POST['finition']=null;
    }
    $extAuto = ['jpg', 'jpeg', 'png'];
    $tFilename = explode('.', $_FILES['header_img']['name']);
    $extFile = array_pop($tFilename);
    if(!in_array($extFile, $extAuto)){
        $error = true;
        flash_in('error', 'File extension not allow: '.$extAuto);
    }
    if($error)
        header('Location: ../admin.php');
    else {
        $header_img = 'pic-header_img_'.time().'.'.$extFile;
	    move_uploaded_file($_FILES['header_img']['tmp_name'], '../data/'.$header_img);

        $add = $db->prepare('INSERT INTO items (title,categorie,tags,ingredients,preparation,montage,finition,header_img,body_imgs) VALUES (:title,:categorie,:tags,:ingredients,:preparation,:montage,:finition,:header_img,:body_imgs)');
        $add->execute([
            ':title' => $_POST['title'],
            ':categorie' => $_POST['categorie'],
            ':tags' => $_POST['tags'],
            ':ingredients' => $_POST['ingredients'],
            ':preparation' => $_POST['preparation'],
            ':montage' => $_POST['montage'],
            ':finition' => $_POST['finition'],
            ':header_img' => $header_img,
            ':body_imgs' => "",
        ]); 

        flash_in('succes', 'Your item will be created');
        header('Location: ..');
        exit();
    } 
}
else {
    header('Location: ..');
    exit();
}