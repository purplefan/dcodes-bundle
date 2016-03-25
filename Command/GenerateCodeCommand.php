<?php

namespace GO\DCodesBundle\Command;


use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class GenerateCodeCommand
 * @author Grzegorz Olejarz
 * @package GO\DCodesBundle\Command
 */
class GenerateCodeCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('code:generate')
            ->setDescription('Generates discount code')
            ->addArgument('length', InputArgument::REQUIRED, 'Length of discount code (4 - 1000)');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $length = $input->getArgument('length');
        $options = new ParameterBag(array('length'=>$length));
        $code = $this->getContainer()->get('god_codes.digitlettersgenerator')->generateDiscountCode($options);

        $output->writeln($code);
    }
}