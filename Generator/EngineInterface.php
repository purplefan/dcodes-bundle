<?php
/**
 * Created by PhpStorm.
 * User: Grzegorz
 * Date: 2016-03-25
 * Time: 17:29
 */

namespace GO\DCodesBundle\Generator;


interface EngineInterface
{
    /**
     * @param int $length
     *
     * @return string
     */
    public function getCode($length);
}