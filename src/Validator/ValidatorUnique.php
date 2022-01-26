<?php

namespace App\Validator;

class ValidatorUnique
{

    private static $exist = 'false';
    public static function test($data, string $email): string
    {
        foreach ($data as $item) {
            if ($item->getEmail() === $email) {
                self::$exist = 'true';
            }
        }
        return self::$exist;
    }
}
