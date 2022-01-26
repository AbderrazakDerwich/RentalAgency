<?php
require '../vendor/autoload.php';
session_start();

use App\Validator\IdentifiedUser;
use App\Entitie\User;
use App\Repository\RepositoryUser;
use App\Validator\ValidatorAttribute;
use App\Utils\DB;

$db = DB::getInstace();
$managerUser = new RepositoryUser($db);
$item = $managerUser->selectByEmail($_POST['email']);
$_SESSION['name'] = $item->getFirstName() . " " . $item->getLastName();
if ($_GET['action'] === 'user') {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = ValidatorAttribute::checkEmail($_POST['email']);
        $password = ($_POST['password']);
        $user = $managerUser->checkAuthentication($email, $password);
        switch ($user['role']) {
            case 'Admin':
                header('location:../view/admin/listereservation.php');
                break;
            case 'User':
                header('location:../view/user/index.php');
                break;
            default:
                header('location:../view/login/index.php?error=error');
        }
    } else {
        header('location:../view/login/index.php?error=error');
    }
}
