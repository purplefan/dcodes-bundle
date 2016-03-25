<?php
namespace GO\DCodesBundle\Generator\DigitsLettersGenerator;


use GO\DCodesBundle\Generator\count;
use GO\DCodesBundle\Generator\GeneratorInterface;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\Security\Core\Exception\InvalidArgumentException;

/**
 * Class DigitsLettersGenerator
 * @author Grzegorz Olejarz
 *
 * @package GO\DCodesBundle\Generator\DigitsLettersGenerator
 */
class DigitsLettersGenerator implements GeneratorInterface
{

    private $engine;

    /**
     * DigitsLettersGenerator constructor.
     *
     * @param DigitsLettersEngine $engine
     */
    public function __construct(DigitsLettersEngine $engine)
    {
        $this->engine = $engine;
    }

    public function generateDiscountCode(ParameterBag $options)
    {
        $length = $options->get('length');

        return $this->engine->getCode($length);
    }

    public function generateDiscountCodes($count, ParameterBag $options)
    {
        if (0 > $count || 1000000 < $count) {
            throw new InvalidArgumentException("Wrong number of codes");
        }
        $codes = array();
        for ($i=0; $i<$count; $i++) {
            $codes[] = $this->generateDiscountCode($options);
        }

        return $codes;
    }
}