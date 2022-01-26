<?php 
session_start();
require '../../vendor/autoload.php';
use App\Utils\DB;
use App\Entitie\Vehicle;
use App\Repository\RepositoryReservation;
use App\Repository\RepositoryVicule;
use App\Entitie\Reservation;
use App\Utils\Tools;

$db=DB::getInstace();
$brand=$_GET['brand'];
$manager= new RepositoryVicule($db);
$data=$manager->readByBrand($brand);
 
?>
<?php require '../link.html' ?>
<?php if (!empty($_GET['error']) && ($_GET['error']==='error1'))  : ?>
    <div class="alert alert-warning">
        <strong>Warning ! </strong> Choisir une bonne date .
    </div>
<?php endif ; ?>

<?php if (!empty($_GET['error']) && ($_GET['error']==='error2'))  : ?>
    <div class="alert alert-warning">
        <strong>Warning ! </strong> Désolé la voiture est réservé pendant cet date .
    </div>
<?php endif ; ?>

<h5 style="margin-top:2%;margin-left:2%;margin-bottom:2%;">Le voiture <?= $_GET['brand'] ?> disponible</h5>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#id</th>
            <th scope="col">kilométrage(km)</th>
            <th scope="col">prix par jours </th>
            <th scope="col">Début de reservation</th>
            <th scope="col">Fin de reservation</th>
            <th scope="col">Reserver</th>
        </tr>
  </thead>
  <tbody>
        <?php foreach($data as $i=>$given) : ?>
            <tr>
                <form  action="..\..\Controller\ControllerRent.php?action=save&brand=<?=$brand ?>&id=<?= $given->getid() ?>" method="post" >
                    <td><?=  $given->getid(); ?></td>
                    <td><?= $given->getprice(); ?></td>
                    <td><?= $given->getMaxMileage(); ?></td>
                    <td name="startOfReservation"><input type="date"   min='<?= Tools::thisyear() ?>' max='2050-01-01' id="birthday" name="startOfReservation"></td>
                    <td name="endOfReservation"><input type="date"   min='<?= Tools::thisyear() ?>' max='2050-01-01' id="birthday" name="endOfReservation"></td>
                    <td ><button type="submit" class="btn btn-primary btn-sm" >Reserver</button></td>
                </form>
            </tr>
        <?php endforeach ?>
  </tbody>
</table>
<a href="index.php">Retour</a>

