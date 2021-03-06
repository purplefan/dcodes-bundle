<?php
namespace GO\DCodesBundle\Generator\DigitsLettersGenerator;
use GO\DCodesBundle\Generator\EngineInterface;

/**
 * Class DigitsLettersEngine
 * @author Grzegorz Olejarz
 * @package GO\DCodesBundle\Generator\DigitsLettersGenerator
 */
class DigitsLettersEngine implements EngineInterface
{
    /**
     * Gets the code without similar looking letters and digits eg. 1 I l
     * 
     * @param $length of code
     * 
     * @return string code
     */
    public function getCode($length){
        return $this->getToken($length);
    }

    /**
     * Code from http://stackoverflow.com/a/13733588
     * and http://us1.php.net/manual/en/function.openssl-random-pseudo-bytes.php#104322
     *
     * @param $min
     * @param $max
     * @return mixed
     */
    private function crypto_rand_secure($min, $max)
    {
        $range = $max - $min;
        if ($range < 1) return $min; // not so random...
        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd >= $range);
        return $min + $rnd;
    }

    private function getToken($length)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHJKLMNPQRSTUVWXYZ";
        $codeAlphabet.= "23456789";
        $max = strlen($codeAlphabet) - 1;
        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[$this->crypto_rand_secure(0, $max)];
        }
        return $token;
    }
}