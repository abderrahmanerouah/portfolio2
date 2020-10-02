<?php
require_once '../includes/cnx.php';
if (isset($_POST['update'])) {
  $titre = addslashes($_POST['titre']);
  $discription = addslashes($_POST['discription']);
  $image_name = $_FILES['image']['name'];
  $image_path = '../img/' . $image_name;
  $image_tmp = $_FILES['image']['tmp_name'];
  move_uploaded_file($image_tmp, $image_path);
  // var_dump($image_tmp);
  $lien = addslashes($_POST['lien']);
  $id = $_POST['id'];
  $req = $connexion->prepare("UPDATE projects SET titre=:titre,discription=:discription,img=:img,lien=:lien WHERE id=$id");
  $req->bindValue(':titre', $titre);
  $req->bindValue(':discription', $discription);
  $req->bindValue(':img', $image_name);
  $req->bindValue(':lien', $lien);
  $reqExec = $req->execute();
  if ($reqExec) {
    header('location:../admin.php');
  }
};
