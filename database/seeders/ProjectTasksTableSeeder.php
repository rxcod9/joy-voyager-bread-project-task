<?php

namespace Joy\VoyagerBreadProjectTask\Database\Seeders;

use Joy\VoyagerBreadProjectTask\Models\ProjectTask;
use Illuminate\Database\Seeder;

class ProjectTasksTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        if (ProjectTask::query()->count() > 0) {
            return false;
        }

        $count = 100;
        ProjectTask::factory()
            ->count($count)
            ->state(function (array $attributes) use ($count) {
                return [
                    'name' => 'ProjectTask ' . time()
                        . ' ' . rand(1, $count)
                        . ' ' . rand(1, $count)
                        . ' ' . rand(1, $count),
                    'description' => 'ProjectTask Description ' . time()
                        . ' ' . rand(1, $count)
                        . ' ' . rand(1, $count)
                        . ' ' . rand(1, $count)
                ];
            })
            ->create();
    }
}
