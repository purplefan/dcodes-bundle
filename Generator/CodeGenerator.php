<?php
namespace GO\DCodesBundle\Generator;

use GO\DCodesBundle\Generator\GeneratorInterface;
use GO\DCodesBundle\Generator\EngineInterface;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\Security\Core\Exception\InvalidArgumentException;

/**
 * Class DigitsLettersGenerator
 * @author Grzegorz Olejarz
 *
 * @package GO\DCodesBundle\Generator
 */
class CodeGenerator implements GeneratorInterface
{

    private $engine;

    const MAX_LENGTH = 1001;
    const MAX_COUNT = 1000001;

    /**
     * DigitsLettersGenerator constructor.
     *
     * @param EngineInterface $engine
     */
    public function __construct(EngineInterface $engine)
    {
        $this->engine = $engine;
    }

    public function generateDiscountCode(ParameterBag $options)
    {
        $length = $options->get('length');
        if (0 > $length || self::MAX_LENGTH < $length) {
            throw new InvalidArgumentException("Wrong number of codes");
        }

        return $this->engine->getCode($length);
    }

    public function generateDiscountCodes($count, ParameterBag $options)
    {
        if (0 > $count || self::MAX_COUNT < $count) {
            throw new InvalidArgumentException("Wrong number of codes");
        }
        $codes = array();
        for ($i=0; $i<$count; $i++) {
            $codes[] = $this->generateDiscountCode($options);
        }

        return array_values(array_unique($codes));
    }
}