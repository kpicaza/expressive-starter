<?php

declare(strict_types=1);

namespace App\Cli;

use App\Container\Config\AppConfig;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class ShowConfig extends Command
{
    public const NAME= 'config:show:config-key';
    private $config;

    public function __construct(AppConfig $config)
    {
        parent::__construct();
        $this->config = $config->config();
    }

    protected function configure()
    {
        $this->setName(self::NAME)
            ->setDescription('Show content off config for given key.')
            ->addArgument('key', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        dump($this->config[$input->getArgument('key')]);
    }
}
