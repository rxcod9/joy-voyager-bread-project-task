<?php

namespace Joy\VoyagerBreadProjectTask\Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run($parentMenuId = null)
    {
        $menu = Menu::where('name', 'admin')->firstOrFail();

        $maxOrder = MenuItem::max('order') ?? 1;
    
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('joy-voyager-bread-project-task::seeders.menu_items.project_tasks'),
            'url'     => '',
            'route'   => 'voyager.project-tasks.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-bread voyager-bread-project-task voyager-star',
                'color'      => null,
                'parent_id'  => $parentMenuId,
                'order'      => ++$maxOrder,
            ])->save();
        }
    }
}
