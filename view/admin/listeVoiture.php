<?php
require '../../vendor/autoload.php';

use App\Repository\RepositoryVicule;
use App\Entitie\Vehicle;
use App\Utils\DB;

$db = DB::getInstace();
$repo = new RepositoryVicule($db);
$count = ($repo->count())[0];
$limit = 6;
$pages = ceil($count / $limit);
$page = $_GET['page'] ?? 1;
$offset = ($page - 1) * $limit;
$data = $repo->select($limit, $offset);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require '../link.html'; ?>
    <title>Liste de voitures</title>
</head>
<header>
    <?php require 'header.php'; ?>
</header>

<body>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Voiture</th>
                <th scope="col">Model</th>
                <th scope="col">kilométrage</th>
                <th scope="col">prix par jour DT</th>
                <th scope="col">    Edit</th>
            </tr>
        </thead>
        <?php foreach ($data as $key => $item) : ?>
            <tbody>
                <tr>
                    <th scope="row"><?= $item->getid() ?></th>
                    <td><?= $item->getmodel() ?></td>
                    <td><?= $item->getbrand() ?></td>
                    <td><?= $item->getMaxMileage() ?></td>
                    <td><?= $item->getPrice() ?></td>
                    <td>
                        <form action="" method="POST">
                            <a href="ajouteVoiture.php?id=<?= $item->getid() ?>" class="btn btn-primary btn-sm">Modier</a><span style="color:red;">&#124;</style>
                            <a href="../../Controller/ControllerEditUser.php?id=<?= $item->getid()?>" class="btn btn-primary btn-sm">Supprimer</a>
                        </form>
                    </td>
                </tr>
            </tbody>
        <?php endforeach ?>
    </table>
    <?php if ($page > 1) : ?>
        <a href="?page=<?= $page - 1 ?>" class="previous">&laquo; Previous</a>
    <?php endif ?>
    <?php if ($page < $pages) : ?>
        <a href="?page=<?= $page + 1 ?>" class="next">Next &raquo;</a>
    <?php endif ?>
</body>
<header>
    <?php require 'footer.html' ;?>
</header>
</html>