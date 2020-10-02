<?php
include("includes/cnx.php");
session_start();


if (isset($_POST['login-submit'])) {
  $query = $connexion->prepare("SELECT * FROM users WHERE user_uid='" . $_POST['email'] . "' ");
  $query->execute();
  $fetch = $query->fetch();
  if ($fetch) {
    $_SESSION['login'] = $fetch['user_uid'];
    $_SESSION['password'] = $fetch['user_pwd'];
    if ($fetch['user_pwd'] == $_POST['pwd']) {
      header('location:admin.php');
    }
  }
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>login</title>
</head>

<body>
  <div class="login-page">

    <div class="login-brand">
      <h1><span>A</span>bderrahmane <span>R</span>ouah</h1>
    </div>
    <div class="form-login">
      <?php if (isset($_POST['login-submit'])) {
        if (!isset($_SESSION['login']) or !isset($_SESSION['psw'])) {
      ?>
          <p>login ou mdp invalid</p>
      <?php }
      } ?>
      <form action="" class="login-form" method="post">
        <input type="text" name="email" placeholder="email" />
        <input type="password" name="pwd" placeholder="password" />
        <button type="submit" name="login-submit">login</button>
      </form>
    </div>
  </div>
</body>

</html>