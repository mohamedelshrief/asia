<?php

namespace Modules\Notification\Sidebar;

use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Group;
use Modules\Admin\Sidebar\BaseSidebarExtender;

class SidebarExtender extends BaseSidebarExtender
{
    public function extend(Menu $menu)
    {
        $menu->group(trans('admin::sidebar.content'), function (Group $group) {
            $group->item(__("My Notifications"), function (Item $item) {
                $item->icon('fa fa-bell');
                $item->weight(25);
                $item->route('admin.notification.index');
                $item->authorize(
                    $this->auth->hasAccess('admin.pages.index')
                );
            });
        });
    }
}
