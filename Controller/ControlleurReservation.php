<?php

require '../vendor/autoload.php';

use App\Utils\DB;
use App\Entitie\User;
use App\mailer\ServiceMail;
use App\Repository\RepositoryReservation;
use App\Repository\RepositoryUser;
use App\Repository\RepositoryVicule;


$db = DB::getInstace();
$repoReservation = new RepositoryReservation($db);
$repoUser = new RepositoryUser($db);
$repoVicule = new RepositoryVicule($db);

$id = $_GET["id"];
$indice = $_GET['indice'];

$repoReservation->update($id);
$itemReservation = $repoReservation->selectById($id);
$itemVicule = $repoVicule->readById($itemReservation['vehicle_id']);
$itemUser = $repoUser->readById($itemReservation['user_id']);

$nameUser = strtoupper($itemUser->getLastName()) . " " . $itemUser->getFirstName();
$nameCar = $itemVicule->getBrand() . " " . $itemVicule->getmodel();
$dataStart = $itemReservation["startOfReservation"];
$dateEnd = $itemReservation["endOfReservation"];

$msg = <<<HTML
        <h1 style='color:red;'> Agence de location voiture KARHABTI</h1>
        <p> bienvenue chez nous Monsieur  $nameUser : </p>
        <p> Agence de location voiture KARHABTI votre informer que votre réservation 
        de la voiture  $nameCar  était confirmée pour la date $dataStart jusqu à  $dateEnd  </p>
        <p>Bon journée</p>
        HTML;
ServiceMail::send($itemUser->getEmail(), $msg);
header('location:../view/admin/listereservation.php');
