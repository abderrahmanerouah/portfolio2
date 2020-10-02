<?php
require_once '../includes/cnx.php';
$id_project = $_GET['id'];
$req = $connexion->prepare("DELETE FROM projects WHERE id= $id_project");
$reqExec = $req->execute();

if ($reqExec) {
  header('location:../admin.php');
}
