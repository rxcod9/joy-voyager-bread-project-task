<?php

namespace Joy\VoyagerBreadProjectTask\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class BreadProjectTask extends Command
{
    protected $name = 'joy-bread-project-task';

    protected $description = 'Joy VoyagerBreadProjectTask';

    public function handle()
    {
        $this->output->title('Starting bread-project-task');

        // Your magic here

        $this->output->success('BreadProjectTask successful');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['arguement1', InputArgument::REQUIRED, 'The argument1 description'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            [
                'option1',
                'o',
                InputOption::VALUE_OPTIONAL,
                'The option1 description',
                config('joy-voyager-bread-project-task.option1')
            ],
        ];
    }
}
