<?php

namespace App\Command;

use Couchbase\UserManager;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:create-user',
    description: 'Creates a new user.',
    aliases: ['app:add-user'],
    hidden: false
)]
class CreateUserCommand extends Command
{
    public function __construct()
    {
//        private UserManager $userManager
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('email', InputArgument::REQUIRED, 'email')
            ->addArgument('password', InputArgument::REQUIRED, 'User password')
        ;
    }

    // ...
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // outputs multiple lines to the console (adding "\n" at the end of each line)
        $output->writeln([
            'User Creator',
            '============',
            '',
        ]);

        $output->writeln('Username: ' . $input->getArgument('email'));
        $output->writeln('Username: ' . $input->getArgument('password'));

//        $this->userManager->create($input->getArgument('username'));

        $output->writeln('User successfully generated!');

        return Command::SUCCESS;
    }
}