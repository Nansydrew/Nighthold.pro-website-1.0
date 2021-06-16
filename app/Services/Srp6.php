<?php


namespace App\Services;


class Srp6
{
    /**
     * @throws \Exception
     */
    public static function getRegistrationData($email, $password)
    {
        $salt = random_bytes(32);
        $verifier = self::calculateSRP6Verifier($email, $password, $salt);
        $salt = strtoupper(bin2hex($salt));
        $verifier = strtoupper(bin2hex($verifier));
        return array($salt, $verifier);
    }

    public static function calculateSRP6Verifier($email, $password, $salt): string
    {
        $g = gmp_init(7);
        $N = gmp_init('894B645E89E1535BBDAD5B8B290650530801B18EBFBF5E8FAB3C82872A3E9BB7', 16);
        $h1 = sha1(strtoupper($email . ':' . $password), TRUE);
        $h2 = sha1(strrev($salt) . $h1, TRUE);  // From haukw
        $h2 = gmp_import($h2, 1, GMP_LSW_FIRST);
        $verifier = gmp_powm($g, $h2, $N);
        $verifier = gmp_export($verifier, 1, GMP_LSW_FIRST);
        $verifier = str_pad($verifier, 32, chr(0), STR_PAD_RIGHT);
        return strrev($verifier);
    }

    public static  function verifySRP6($user, $pass, $salt, $verifier)
    {
        $g = gmp_init(7);
        $N = gmp_init('894B645E89E1535BBDAD5B8B290650530801B18EBFBF5E8FAB3C82872A3E9BB7', 16);
        $x = gmp_import(
            sha1($salt . sha1(strtoupper($user . ':' . $pass), TRUE), TRUE),
            1,
            GMP_LSW_FIRST
        );
        $v = gmp_powm($g, $x, $N);
        return ($verifier === str_pad(gmp_export($v, 1, GMP_LSW_FIRST), 32, chr(0), STR_PAD_RIGHT));
    }
}
