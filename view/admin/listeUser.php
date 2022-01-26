<?php
require '../../vendor/autoload.php';

use App\Entitie\User;
use App\Repository\RepositoryUser;
use App\Utils\DB;

$db = DB::getInstace();
$repo = new RepositoryUser($db);
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
                <th scope="col">FirstName</th>
                <th scope="col">LastName</th>
                <th scope="col">Email</th>
                <th scope="col">Sex</th>
                
            </tr>
        </thead>
        <?php foreach ($data as $key => $item) : ?>
            <tbody>
                <tr>
                    <th scope="row"><?= $item->getid() ; ?></th>
                    <td><?= $item->getFirstName() ; ?></td>
                    <td><?= $item->getLastName() ?></td>
                    <td><?= $item->getEmail() ?></td>
                    <td><?= $item->getSex() ?></td>
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