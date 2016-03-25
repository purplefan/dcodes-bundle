<?php
namespace GO\DCodesBundle\Lib;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class ContainerTestCase
 * @author Grzegorz Olejarz
 *
 * @package GO\DCodesBundle\Lib
 */
class ContainerTestCase extends WebTestCase
{
    /**
     * @var boolean
     */
    private $kernelBooted = false;

    /**
     * @return ContainerInterface
     */
    protected function getContainer()
    {
        if (!$this->kernelBooted) {
            static::$kernel = static::createKernel();
            static::$kernel->boot();

            $this->kernelBooted = true;
        }

        return static::$kernel->getContainer();
    }
}