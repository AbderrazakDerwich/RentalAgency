<?php
require '../vendor/autoload.php';

use App\Validator\ValidatorDate;
use App\Repository\RepositoryReservation;
use App\Entitie\Reservation;
use App\Utils\DB;

$db = DB::getInstace();
$manager = new RepositoryReservation($db);
$data = $manager->selectAllById($_GET['id']);
if ($_GET['action'] === 'save') {
    $dateValidation = ValidatorDate::dateValidation($_GET['id'], $_POST['startOfReservation'], $_POST['endOfReservation'], $data);
    if ((is_array($_POST)) && (is_array($_GET))) {
        if (($dateValidation !== 'error1') && ($dateValidation !== 'error2')) {
            $reserve = new Reservation();
            $reserve->setVehicleId((int)$_GET['id']);
            $reserve->setUserId(3);
            $reserve->setStartOfReservation($_POST['startOfReservation']);
            $reserve->setEndOfReservation($_POST['endOfReservation']);
            $reserve->setApprove('non');
            $manager->insert($reserve->getVehicleId(), $reserve->getUserId(), $reserve->getStartOfReservation(), $reserve->getEndOfReservation(), $reserve->getApprove());
        }
    }
    header('location:../view/user/rent.php?error=' . $dateValidation . '&&brand=' . $_GET['brand'] . '&&id=' . $_GET['id']);
}
