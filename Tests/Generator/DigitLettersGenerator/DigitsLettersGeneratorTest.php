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
class DigitsLettersGeneratorTest extends ContainerTestCase
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
     * Testing generateDiscountCode()
     */
    public function testGenerateDiscountCode()
    {
        $options = new ParameterBag(array('length' => 10));
        $code = $this->generator->generateDiscountCode($options);

        $this->assertEquals(10, strlen($code));

    }

    /**
     * Testing generateDiscountCodes($count)
     */
    public function testGenerateDiscountCodes()
    {
        $count = 100; //limit 1000000*10
        $options = new ParameterBag(array('length' => 10));
        $codes = $this->generator->generateDiscountCodes($count,$options);

        $this->assertCount($count,$codes);
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
