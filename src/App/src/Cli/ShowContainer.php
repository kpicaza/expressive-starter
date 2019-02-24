<?php

declare(strict_types=1);

namespace App\Cli;

use App\Container\Config\AppConfig;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class ShowContainer extends Command
{
    public const NAME= 'config:show:container';
    private $config;

    public function __construct(AppConfig $config)
    {
        parent::__construct();
        $this->config = $config->config();
    }

    protected function configure()
    {
        $this->setName(self::NAME)
        ->setDescription('Show all available services inner container.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $table = new Table($output);

        $table->setHeaders(['service', 'implementation']);
        $table->addRow(['<info>Invokables</info>']);
        $table->addRow(new TableSeparator());
        foreach ($this->config['dependencies']['invokables'] as $invokable => $instance) {
            $table->addRow([$invokable, $instance]);
        }
        $table->addRow(new TableSeparator());
        $table->addRow(['<info>Factories</info>']);
        $table->addRow(new TableSeparator());
        foreach ($this->config['dependencies']['factories'] as $factories => $factory) {
            $table->addRow([$factories, is_array($factory) ? $factory[0] . '::' . $factory[1]: $factory]);
        }
        $table->addRow(new TableSeparator());
        $table->addRow(['<info>Aliases</info>']);
        $table->addRow(new TableSeparator());
        foreach ($this->config['dependencies']['aliases'] as $aliases => $alias) {
            $table->addRow([$aliases, $alias]);
        }
        $table->addRow(new TableSeparator());
        $table->addRow(['<info>Conditionals</info>']);
        $table->addRow(new TableSeparator());
        foreach ($this->config['dependencies']['conditionals'] as $conditionals => $conditional) {
            $table->addRow([$conditionals, $conditional['class']]);
            foreach ($conditional['arguments'] as $key => $argument) {
                $table->addRow(['', ' - ' . $key . '::' . $argument]);
            }
        }

        $table->render();
    }
}
