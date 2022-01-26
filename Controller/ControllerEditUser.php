<?php
require '../vendor/autoload.php';

use App\Repository\RepositoryVicule;
use App\Validator\ValidatorAttribute;
use App\Utils\DB;

$db = DB::getInstace();
$idDelete = $_GET['id'] ?? null;
$idUpdate = $_GET['idUpdate'];
$action = $_GET['action'];
$manager = new RepositoryVicule($db);
if ($idDelete !== null) {
    $manager->delete($$idDelete);
} else {
    $brand = ValidatorAttribute::checkstring($_POST['brand']);
    $model = ValidatorAttribute::checkstring($_POST['model']);
    $maxMileage = ValidatorAttribute::checkMaxMileage($_POST['maxMileage']);
    $price = ValidatorAttribute::checkInt($_POST['price']);
    if (is_int($idUpdate)) {
        $action = 'Upadate';
        $manager->update((int)$idUpdate, $brand , $model , $maxMileage , $price);
    } else {
        $action = 'Ajouter';
        $manager->insert($brand, $model , $maxMileage, $price);
    }
    header('Location:../view/admin/ajouteVoiture.php?act=' . $action);
}
header('Location:../view/admin/listeVoiture.php');
