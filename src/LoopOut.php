<?php
namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class LoopOut extends Command
{
    protected function configure()
    {
        $this
            // имя команды (часть после "bin/console")
            ->setName('app:say-hello')

            // краткое описание, отображающееся при запуске "php bin/console list"
            ->setDescription('Says hello to php.')

            // полное описание команды, отображающееся при запуске команды
            // с опцией "--help"
            ->setHelp('This command allows you to print you greeting to php')
            ->addArgument('toWhom', InputArgument::REQUIRED, 'The username of the user.')
            ->addOption(
                'loop',
                2,
                InputOption::VALUE_REQUIRED,
                'How much to repeat output',
                null
            )

        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $loop =  $input->getOption('loop');
        if(!is_numeric($loop) && intval($loop) == 0){
            $loop = 2;
        } else {
            $loop = intval($loop);
        }
        $toWhom = $input->getArgument('toWhom');
        for($i = 0; $i < $loop; $i++){
            $output->writeln('say hello: '.$toWhom);
        }

        return Command::SUCCESS;
    }

}
