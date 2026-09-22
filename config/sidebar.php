<?php

/*
|--------------------------------------------------------------------------
| Sidebar parents
|--------------------------------------------------------------------------
|
| Two levels only: a parent is a business area, a page sits directly under it.
| Each module declares its pages in its config/menu.php, naming the parent; this
| file fixes the order and look of the parents. A parent flagged `single` is a
| plain link to its one page rather than a submenu. A disabled module contributes
| nothing, and a page whose route or permission is missing is not rendered.
| See Mrj\Foundation\Support\SidebarMenu.
|
*/

return [
    'groups' => [
        'reports' => ['label' => 'Reports', 'icon' => 'ph-chart-bar'],
        'communications' => ['label' => 'Communications', 'icon' => 'ph-bell'],
        'administration' => ['label' => 'Administration', 'icon' => 'ph-shield'],
        'settings' => ['label' => 'Settings', 'icon' => 'ph-gear'],
        'imports' => ['label' => 'Import / Download Manager', 'icon' => 'ph-download', 'single' => true],
    ],
];
