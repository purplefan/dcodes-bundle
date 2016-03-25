<?php
namespace GO\DCodesBundle\Tests\Command;


use GO\DCodesBundle\Command\GenerateCodesCommand;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * Class ListCommandTest
 * @package GO\DCodesBundle\Tests\Command
 * @author Grzegorz Olejarz
 */
class GenerateCodesCommandTest extends WebTestCase
{
    // ...

    public function testOutput()
    {
        $kernel = $this->createKernel();
        $kernel->boot();
        $application = new Application($kernel);
        $application->add(new GenerateCodesCommand());

        $command = $application->find('codes:generate');
        $commandTester = new CommandTester($command);
        $commandTester->execute(array(
            'command'      => $command->getName(),
            'length'         => '10',
            'count'         => '10'
        ));

        $this->assertRegExp('/.../', $commandTester->getDisplay());
    }
}