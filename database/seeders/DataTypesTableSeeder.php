<?php

namespace Joy\VoyagerBreadProjectTask\Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class DataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = $this->dataType('slug', 'project-tasks');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'project_tasks',
                'display_name_singular' => __('joy-voyager-bread-project-task::seeders.data_types.project_task.singular'),
                'display_name_plural'   => __('joy-voyager-bread-project-task::seeders.data_types.project_task.plural'),
                'icon'                  => 'voyager-bread voyager-bread-project-task voyager-star',
                'model_name'            => 'Joy\\VoyagerBreadProjectTask\\Models\\ProjectTask',
                // 'policy_name'           => 'Joy\\VoyagerBreadProjectTask\\Policies\\ProjectTaskPolicy',
                // 'controller'            => 'Joy\\VoyagerBreadProjectTask\\Http\\Controllers\\VoyagerBreadProjectTaskController',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }
    }

    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}
