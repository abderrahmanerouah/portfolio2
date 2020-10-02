<?php
require_once '../includes/cnx.php';
if (isset($_POST['add'])) {
    $titre = addslashes($_POST['titre']);
    $discription = addslashes($_POST['discription']);
    $image_name = $_FILES['image']['name'];
    $image_path = '../img/' . $image_name;
    $image_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp, $image_path);
    $lien = addslashes($_POST['lien']);
    $req = $connexion->prepare("INSERT INTO  projects (titre,discription,img,lien) VALUE (:titre,:discription,:img,:lien)");
    $req->bindValue(':titre', $titre);
    $req->bindValue(':discription', $discription);
    $req->bindValue(':img', $image_name);
    $req->bindValue(':lien', $lien);
    $reqExec = $req->execute();
    if ($reqExec) {
        header('location:../admin.php');
    }
};
