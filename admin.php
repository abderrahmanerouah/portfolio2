<?php
session_start();

if (isset($_SESSION['login']) and isset($_SESSION['password'])) {
    require_once 'includes/cnx.php';
    $reponse = $connexion->query('SELECT * FROM projects');
    $reponse->execute();
    $infos = $reponse->fetchALl();

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="admin.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <title>dashboerd</title>
    </head>

    <body>
        <section id="header">
            <div class="header">
                <div class="nav-bar">
                    <div class="brand">
                        <a class="button" href="index.php">
                            <h1><span>A</span> <span>R</span></h1>
                        </a>
                    </div>
                    <div class="nav-list">
                        <div class="hamburger">
                            <div class="bar"></div>
                        </div>
                        <ul>
                            <li><a class="button" href="admin.php" data-after="Home">View</a></li>
                            <li><a class="button" href="logout.php" data-after="Home">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="tableau container">
            <table class="table table-striped table-dark">
                <thead class="bg-info">
                    <tr>
                        <th>id</th>
                        <th>image</th>
                        <th>titre</th>   
                        <th>lien</th>
                        <th>description</th>
                        <th>Modiffier</th>
                        <th>Suprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($infos as $key => $info) { ?>
                        <tr>
                            <th scope="row"> <?= $key + 1 ?></th>
                            <th><img src="img/<?= $info['img'] ?>" alt=""></th>
                            <th><?= $info['titre'] ?></th>
                            <th><?= $info['lien'] ?></th>
                            <th><?= $info['discription'] ?></th>
                            <th><a href="update.php?id=<?= $info['id'] ?>">update</a> </th>
                            <th><a href="CRUD/delete.php?id=<?= $info['id'] ?>">delete</a> </th>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="Add.php">
                <div class="btn btn-info">Ajouter un projet</div>
            </a>
        </section>



        <script src="./app.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>

    </html>
<?php
} else {
    header('location:login.php');
}
?>