<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\Question;

class WhoYouAre extends Command
{
    protected static $defaultName = 'app:quest';

    protected function configure()
    {
        $this
            // имя команды (часть после "bin/console")
            ->setName('app:quest')
            // краткое описание, отображающееся при запуске "php bin/console list"
            ->setDescription('Ask a new user data.')
            // полное описание команды, отображающееся при запуске команды
            // с опцией "--help"
            ->setHelp('This command allows you to get date from user');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {

        $helper = $this->getHelper('question');
        $question = new Question('Please enter your name ', 'AcmeDemoBundle');
        $userName = $helper->ask($input, $output, $question);
        $question = new Question('Please enter your age ', 'AcmeDemoBundle');
        $userAge = $helper->ask($input, $output, $question);
        $question = new ChoiceQuestion(
            'Please select your favorite color (defaults to red)',
            ['male', 'female'],
            0
        );
        $question->setErrorMessage('Sex %s is invalid.');

        $userSex = $helper->ask($input, $output, $question);

        $output->writeln('Your name is: ' . $userName);
        $output->writeln('Your age is: ' . $userAge);
        $output->writeln('Your sex is: ' . $userSex);

        return Command::SUCCESS;

    }

}

