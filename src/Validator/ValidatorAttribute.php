<?php

namespace App\Validator;

use  Exception;

class ValidatorAttribute
{

    /**
     * checkstring
     */


    public static function checkstring(string $string)
    {
        if (filter_var($string, FILTER_SANITIZE_STRING) === $string) {
            return $string;
        } else {
            throw new Exception('Invalid string type ');
        }
    }

    /**
     * checkMaxMileage
     */

    public static function checkMaxMileage(int $maxMileage)
    {
        if (($maxMileage >= 0) && ($maxMileage < 300)) {
            return $maxMileage;
        } else {
            throw new Exception('Invalid kilometrage ');
        }
    }

    /**
     * checkInt
     */

    public static function checkInt(int $int)
    {
        if (is_int($int)) {
            return $int;
        } else {
            throw new Exception('Invalid prix ');
        }
    }

    /**
     * checkavAilability
     */

    public static function checkavAilability(string $availability)
    {
        if (in_array($availability, ['oui', 'non'])) {
            return $availability;
        } else {
            throw new Exception('Invalid');
        }
    }

    /**
     * checkEmail
     */

    public static function checkEmail(string $email)
    {
        if (!empty(filter_var($email, FILTER_VALIDATE_EMAIL))) {
            return $email;
        } else {
            throw new Exception('Invalid Email ');
        }
    }

    /**
     * checkPassword
     */

    public static  function checkPassword(string $password)
    {
        if (strlen($password) >= 8) {
            return password_hash($password, PASSWORD_DEFAULT);
        } else {
            throw new Exception('Invalid password ');
        }
    }

    /**
     * checkSex
     */

    public static function checkSex(string $sex)
    {
        if (in_array($sex, ['male', 'feminine'])) {
            return $sex;
        } else {
            throw new Exception('Invalid sex ');
        }
    }

    /**
     * checkRole
     */

    public static function checkRole(string $role)
    {
        if (in_array($role, ['User', 'Admin'])) {
            return $role;
        } else {
            throw new Exception('Invalid role ');
        }
    }

    /**
     * checkId
     */

    public static function checkId(int $id)
    {
        if (is_int($id)) {
            return $id;
        } else {
            throw new Exception('Invalid id ');
        }
    }

    /**
     * checkStartOfReservation
     */

    public static function checkStartOfReservation(string $startOfReservation)
    {

        if (checkdate((int)substr($startOfReservation, 5, 2), (int)substr($startOfReservation, 8, 2), (int)substr($startOfReservation, 0, 4))) {

            return $startOfReservation;
        } else {
            throw new Exception('Invalid date de reservation ');
        }
    }

    /**
     * checkEndOfReservation
     */

    public static function checkEndOfReservation(string $endOfReservation)
    {
        if (checkdate((int)substr($endOfReservation, 5, 2), (int)substr($endOfReservation, 8, 2), (int)substr($endOfReservation, 0, 4))) {

            return $endOfReservation;
        } else {
            throw new Exception('Invalid date fin de reservation ');
        }
    }

    /**
     * checkApprove
     */

    public static function checkApprove(string $approve)
    {
        if (in_array($approve, ['oui', 'non'])) {
            return $approve;
        } else {
            throw new Exception('Invalid approve ');
        }
    }
}
