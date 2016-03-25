<?php

namespace GO\DCodesBundle\Command;


use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

class GenerateCodesCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('codes:generate')
            ->setDescription('Generates discount code')
            ->addArgument('length', InputArgument::REQUIRED, 'Length of discount code (4 - 1000)')
            ->addArgument('count', InputArgument::REQUIRED, 'Count of discount code (1 - 1000000)');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $length = $input->getArgument('length');
        $count = $input->getArgument('count');
        $options = new ParameterBag(array('length'=>$length));
        $code = $this->getContainer()->get('god_codes.digitlettersgenerator')->generateDiscountCodes($count, $options);

        $output->writeln($code);
    }
}