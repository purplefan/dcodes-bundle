<?php
namespace GO\DCodesBundle\Tests\Command;


use GO\DCodesBundle\Command\GenerateCodeCommand;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * Class ListCommandTest
 * @package GO\DCodesBundle\Tests\Command
 * @author Grzegorz Olejarz
 */
class GenerateCodeCommandTest extends WebTestCase
{
    // ...

    public function testOutput()
    {
        $kernel = $this->createKernel();
        $kernel->boot();
        $application = new Application($kernel);
        $application->add(new GenerateCodeCommand());

        $command = $application->find('code:generate');
        $commandTester = new CommandTester($command);
        $commandTester->execute(array(
            'command'      => $command->getName(),
            'length'         => '10'
        ));

        $this->assertRegExp('/.../', $commandTester->getDisplay());
    }
}