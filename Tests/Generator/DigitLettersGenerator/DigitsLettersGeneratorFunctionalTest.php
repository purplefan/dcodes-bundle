<?php
namespace GO\DCodesBundle\Generator\DigitsLettersGenerator;

use GO\DCodesBundle\Lib\ContainerTestCase;
use GO\DCodesBundle\Generator\GeneratorInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class DigitsLettersGeneratorTest
 * @author Grzegorz Olejarz
 * @package GO\DCodesBundle\Test\Generator\DigitsLettersGenerator
 */
class DigitsLettersGeneratorFunctionalTest extends ContainerTestCase
{
    /**
     * @var GeneratorInterface
     */
    private $generator;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->generator = $this->getContainer()->get('god_codes.digitlettersgenerator');
    }

    /**
     * Tests if codes are unique
     *
     * @dataProvider getDiscountCodes
     */
    public function testIfDiscountCodesUnique($codes)
    {
        $unique = array_unique($codes); //default is SORT_STRING - ok

        $this->assertEquals(count($codes), count($unique));
    }

    /**
     * Data provider DiscountCodes
     */
    public function getDiscountCodes()
    {
        $count = 1000;
        $options = new ParameterBag(array('length' => 10));
        $codes = $this->getContainer()->get('god_codes.digitlettersgenerator')->generateDiscountCodes($count,$options);

        return array(array($codes));
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        parent::tearDown();
        unset($this->generator);
    }

}
