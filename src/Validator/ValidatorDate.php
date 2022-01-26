<?php
declare(strict_types=1);
namespace App\Validator;
use App\Repository\RepositoryReservation;

class ValidatorDate // DateValidator
{

    private static $error = true;
    public static function dateValidation($id, $dateClientMin, $dateClientMax, $data)
    {
        if ($dateClientMin > $dateClientMax) {
            return self::$error = 'error1';
        }

        foreach ($data as $item) {
            if (((($dateClientMin >= $item->getStartOfReservation()) && ($dateClientMin <= $item->getEndOfReservation()))
                || ($dateClientMax <= $item->getEndOfReservation())) && ($id == $item->getVehicleId())) {
                return self::$error = 'error2';
            }
        }

        return self::$error;
    }
}
