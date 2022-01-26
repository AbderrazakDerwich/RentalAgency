<?php
require '../../vendor/autoload.php';

use App\Repository\RepositoryReservation;
use App\Repository\RepositoryVicule;
use App\Entitie\Vehicle;
use App\Utils\DB;

$db = DB::getInstace();
$satut=$_GET['statut'] ?? null ;
$indice=$_GET['indice'] ?? null ;
$repo = new RepositoryReservation($db);
$repoVicule = new RepositoryVicule($db);
$data = $repo->selectByJoin();
$count = (count($data));
$limit = 6;
$pages = ceil($count / $limit);
$page = $_GET['page'] ?? 1;
$offset = ($page - 1) * $limit;

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
                <th scope="col">#Num</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Débit réservation</th>
                <th scope="col">Fin réservation</th>
                <th scope="col">Voiture</th>
                <th scope="col">Approuver</th>
            </tr>
        </thead>
        <?php foreach ($data as $key => $item) : ?>
            <tbody>
                <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><?= $item['lastname'] ?></td>
                    <td><?= $item['firstname'] ?></td>
                    <td><?= $item['startOfReservation'] ?></td>
                    <td><?= $item['endOfReservation'] ?></td>
                    <td><?= $repoVicule->readByIdTable((int)$item['vehicle_id'])['model'] ?></td>
                    <td>
                        <?php if ($item['approve']==='oui') : ?>
                            <a  class="btn btn-success btn-sm" disabled>Approuver</a>
                        <?php else : ?>
                            <a href="../../Controller/ControlleurReservation.php?
                            id=<?= $item["id"] ?>" class="btn btn-warning btn-sm">En attente </a>
                        <?php  endif ?>
                        
                    </td>
                </tr>
            </tbody>
        <?php endforeach ?>
    </table>
</body>
<header>
    <?php require 'footer.html'; ?>
</header>

</html>