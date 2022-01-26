<?php
// filename : InscriptionController.php
require '../vendor/autoload.php';

use App\Entitie\User;
use App\Validator\ValidatorAttribute;
use App\Repository\RepositoryUser;
use App\Validator\ValidatorUnique;
use App\Utils\DB;

$db = DB::getInstace();
$manager = new RepositoryUser($db);
$data = $manager->read();
$user = new User();
if ($_GET['user'] === 'user') {
    if ((is_array($_POST)) && ((ValidatorUnique::test($data, $_POST['email'])) === 'false')) {
        $user->setFirstName(ValidatorAttribute::checkstring($_POST['firstname']));
        $user->setLastName(ValidatorAttribute::checkstring($_POST['lastname']));
        $user->setEmail(ValidatorAttribute::checkEmail($_POST['email']));
        $user->setPassword(ValidatorAttribute::checkPassword($_POST['password']));
        $user->setSex(ValidatorAttribute::checkSex($_POST['inlineRadioOptions']));
        $user->setRole(ValidatorAttribute::checkRole('Admin'));
        $manager->insert(
            $user->getFirstName(),
            $user->getLastName(),
            $user->getEmail(),
            $user->getPassword(),
            $user->getSex(),
            $user->getRole()
        );
    }
    header('Location:../view/inscription/index.php?action=' . ValidatorUnique::test($data, $_POST['email']));
}
