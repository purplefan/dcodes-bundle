<?php
/**
 * Created by PhpStorm.
 * User: Grzegorz
 * Date: 2016-03-25
 * Time: 10:21
 */

namespace GO\DCodesBundle\Generator;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Interface GeneratorInterface
 *
 * @package GO\DCodesBundle\Generator
 */
interface GeneratorInterface
{
    /**
     * Generates single code
     *
     * @param ParameterBag $options Generating options
     *
     * @return string
     */
    public function generateDiscountCode(ParameterBag $options);

    /**
     * Generates coded by count
     *
     * @param int          $count   Count of codes to generate
     * @param ParameterBag $options Generating options
     *
     * @return array
     */
    public function generateDiscountCodes($count, ParameterBag $options);
}