<?php
if (isset($_GET['id'])) {
  $id_project = $_GET['id'];
  require_once 'includes/cnx.php';
  $reponse = $connexion->query("SELECT * FROM projects WHERE id=$id_project");
  $reponse->execute();
  $info = $reponse->fetch();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="admin.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <title>Update</title>
</head>

<body>
  <section id="header">
    <div class="header">
      <div class="nav-bar">
        <div class="brand">
          <a class="button" href="#hero">
            <h1><span>A</span> <span>R</span></h1>
          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a class="button" href="admin.php" data-after="Home">View</a></li>
            <li><a class="button" href="#hero" data-after="Home">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <section class="Form container">

    <form action="CRUD/update.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $info['id'] ?>">
      <p>
        <label for="titre">titre:</label>
        <input class="form-control" type="text" name="titre" id="titre" value="<?= $info['titre'] ?>" required>
      </p>
      <p>
        <label for="discription">discription:</label>
        <input class="form-control" type="text" name="discription" value="<?= $info['discription'] ?>" id="discription" required>
      </p>
      <p>
        <label for="image">image:</label>
        <input class="form-control-file" type="file" name="image" accept="image/png, image/jpeg" required>
      </p>
      <p>
        <label for="lien">lien:</label>
        <input class="form-control" type="text" value="<?= $info['lien'] ?>" name="lien" required>
      </p>
      <input type="submit" class="btn btn-info" name='update' value="modifier un projet">
    </form>
  </section>
  <script src="./app.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>