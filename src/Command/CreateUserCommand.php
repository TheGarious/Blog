<?php

namespace App\Command;

use App\Manager\UserManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class CreateUserCommand extends Command
{
    protected static $defaultName = 'app:create-admin';

    private $requirePassword;

    private $userManager;

    public function __construct( UserManager $userManager, bool $requirePassword = true)
    {
        // best practices recommend to call the parent constructor first and
        // then set your own properties. That wouldn't work in this case
        // because configure() needs the properties set in this constructor
        $this->requirePassword = $requirePassword;
        $this->userManager = $userManager;

        parent::__construct();
    }


    protected function configure()
    {
        $this
            ->setDescription('Create an Admin User')
            ->addArgument('email', InputArgument::REQUIRED, 'The email of the user.')
            ->addArgument('password', $this->requirePassword ? InputArgument::REQUIRED : InputArgument::OPTIONAL, 'User password')

        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Creation an Admin User',
            '',
        ]);

        $this->userManager->createAdmin($input->getArgument('email'), $input->getArgument('password'));

        $output->writeln("Well done, you created the user : " . $input->getArgument('email'));

    }
}
