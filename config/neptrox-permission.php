<?php
$permission_tree = [

    /*
    |--------------------------------------------------------------------------
    | Route Group
    |--------------------------------------------------------------------------
    | Group Routes so Permissions can be shown Grouped in Role ADD and UPDATE
    | Form
    | 
    | Every routes MUST be listed here
    |
    */
    'route-groups' => [

        'admin' => [
            'section' => [
                'name' => 'Admin Section',
                'description' => '',
            ],
            'groups' => [
                /* User Manager */
                'users' => [
                    /*
                    |--------------------------------------------------------------------------
                    | Section Name
                    |--------------------------------------------------------------------------
                    | Used to show section name in Role Permission Manager page
                    |
                    */
                    'section' => [
                        'name' => 'User Manager',
                        'description' => '',
                        'routes' => [
                            'list' => 'List Users',
                            'view' => 'View Users',
                            'store' => 'Create Users',
                            'update' => 'Update Users',
                            'destroy' => 'Remove Users',
                        ],
                    ],
                    'routes' => [
                        'list' => [
                            'admin.users.index:GET',
                        ],
                        'view' => [
                            'admin.users.show:GET'
                        ],
                        'store' => [
                            'admin.users.create:GET',
                            'admin.users.store:POST',
                        ],
                        'update' => [
                            'admin.users.edit:GET',
                            'admin.users.update:POST',
                            'admin.users.enable-selected:POST',
                            'admin.users.disable-selected:POST',
                            'admin.users.enable:GET',
                            'admin.users.disable:GET'
                        ],
                        'destroy' => [
                            'admin.users.confirm-delete:GET',
                            'admin.users.delete:GET',
                        ],
                    ],
                ],

                /* Role Manager */
                'roles' => [
                    'section' => [
                        'name' => 'Role Manager',
                        'routes' => [
                            'list' => 'List Role',
                            'view' => 'View Role',
                            'store' => 'Create Role',
                            'update' => 'Update Role',
                            'destroy' => 'Remove Role',
                        ],
                    ],
                    'routes' => [
                        'list' => [
                            'admin.roles.index:GET',
                        ],
                        'view' => [
                            'admin.roles.show:GET'
                        ],
                        'store' => [
                            'admin.roles.create:GET',
                            'admin.users.search:POST',
                            'admin.users.get-info:POST',
                            'admin.roles.store:POST',
                        ],
                        'update' => [
                            'admin.roles.edit:GET',
                            'admin.users.search:POST',
                            'admin.users.get-info:POST',
                            'admin.roles.update:POST',
                            'admin.roles.enable-selected:POST',
                            'admin.roles.disable-selected:POST',
                            'admin.roles.enable:GET',
                            'admin.roles.disable:GET'
                        ],
                        'destroy' => [
                            'admin.roles.confirm-delete:GET',
                            'admin.roles.delete:GET',
                        ],
                    ],
                ],

                /* Permission Manager */
                'permissions' => [
                    'section' => [
                        'name' => 'Permission Manager',
                        'routes' => [
                            'list' => 'List Permission',
                            'view' => 'View Permission',
                            'store' => 'Create Permission',
                            'update' => 'Update Permission',
                            'destroy' => 'Remove Permission',
                        ],
                    ],
                    'routes' => [
                        'list' => [
                            'admin.permissions.index:GET',
                            'admin.permissions.generate:GET',
                        ],
                        'view' => [
                            'admin.permissions.show:GET'
                        ],
                        'store' => [
                            'admin.permissions.create:GET',
                            'admin.routes.save-perms:POST',
                            'admin.routes.search:GET',
                            'admin.routes.get-info:POST',
                            'admin.permissions.store:POST',
                        ],
                        'update' => [
                            'admin.permissions.edit:GET',
                            'admin.routes.save-perms:POST',
                            'admin.routes.search:GET',
                            'admin.routes.get-info:POST',
                            'admin.permissions.update:POST',
                            'admin.permissions.enable-selected:POST',
                            'admin.permissions.disable-selected:POST',
                            'admin.permissions.enable:GET',
                            'admin.permissions.disable:GET'
                        ],
                        'destroy' => [
                            'admin.permissions.confirm-delete:GET',
                            'admin.permissions.delete:GET',
                        ],
                    ],
                ],

                /* Route Manager */
                'routes' => [
                    'section' => [
                        'name' => 'Route Manager',
                        'routes' => [
                            'list' => 'List Route',
                            'view' => 'View Route',
                            'store' => 'Create Route',
                            'update' => 'Update Route',
                            'destroy' => 'Remove Route',
                        ],
                    ],
                    'routes' => [
                        'list' => [
                            'admin.routes.index:GET',
                            'admin.routes.load:GET',
                        ],
                        'view' => [
                            'admin.routes.show:GET'
                        ],
                        'store' => [
                            'admin.routes.create:GET',
                            'admin.routes.store:POST',
                        ],
                        'update' => [
                            'admin.routes.edit:GET',
                            'admin.routes.update:POST',
                            'admin.routes.enable-selected:POST',
                            'admin.routes.disable-selected:POST',
                            'admin.routes.enable:GET',
                            'admin.routes.disable:GET'
                        ],
                        'destroy' => [
                            'admin.routes.confirm-delete:GET',
                            'admin.routes.delete:GET',
                        ],
                    ],
                ],

                /* Configuration Manager */
                'configuration' => [
                    'section' => [
                        'name' => 'Config Manager',
                        'routes' => [
                            'list' => 'List Config',
                            'store' => 'Create Config',
                            'update' => 'Update Config',
                            'destroy' => 'Remove Config',
                        ],
                    ],
                    'routes' => [
                        'list' => [
                            'admin.configuration:GET',
                            'admin.configuration.search:POST',
                        ],
                        'store' => [
                            'admin.configuration.create:GET',
                            'admin.configuration.store:POST',
                        ],
                        'update' => [
                            'admin.configuration.edit:GET',
                            'admin.configuration.update:POST',
                            'admin.configuration.enableAll:POST',
                            'admin.configuration.disableAll:POST',
                            'admin.configuration.enable:GET',
                            'admin.configuration.disable:GET'
                        ],
                        'destroy' => [
                            'admin.configuration.confirm-delete:GET',
                            'admin.configuration.delete:POST',
                        ],
                    ],
                ],


                /* Page Manager */
                'page' => [
                    'section' => [
                        'name' => 'Page Manager',
                        'routes' => [
                            'list' => 'List Pages',
                            'store' => 'Create Pages',
                            'update' => 'Update Pages',
                            'destroy' => 'Remove Pages',
                        ],
                    ],
                    'routes' => [
                        'list' => [
                            'admin.page:GET',
                            'admin.page.search:POST',
                        ],
                        'store' => [
                            'admin.page.create:GET',
                            'admin.page.store:POST',
                        ],
                        'update' => [
                            'admin.page.edit:GET',
                            'admin.page.update:POST',
                            'admin.page.enable-page:POST',
                            'admin.page.check-slug:POST',
                            'admin.page.getDescriptionViewModal:GET',
                            'admin.page.enable:GET',
                            'admin.page.disable:GET',
                            'admin.page.enableAll:POST',
                            'admin.page.disableAll:POST',
                        ],
                        'destroy' => [
                            'admin.page.confirm-delete:GET',
                            'admin.page.delete:POST',
                        ],
                    ],
                ],
                
                /* Menu Manager */
                'menu' => [
                    'section' => [
                        'name' => 'Menu Manager',
                        'routes' => [
                            'list' => 'List Menus',
                            'store' => 'Create Menu',
                            'update' => 'Update Menus',
                            'destroy' => 'Remove Menus',
                            'pagesManage' => 'Manage Pages For Menu',
                        ],
                    ],
                    'routes' => [
                        'list' => [
                            'admin.menu:GET',
                        ],
                        'store' => [
                            'admin.menu.create:GET',
                            'admin.menu.store:POST',
                        ],
                        'update' => [
                            'admin.menu.edit:GET',
                            'admin.menu.update:POST',
                            'admin.menu.enable-page:POST',
                            'admin.menu.check-slug:POST',
                            'admin.menu.enable:GET',
                            'admin.menu.disable:GET',
                            'admin.menu.enableAll:POST',
                            'admin.menu.disableAll:POST',
                        ],
                        'destroy' => [
                            'admin.menu.confirm-delete:GET',
                            'admin.menu.delete:GET',
                            'admin.menu.confirm-bulk-delete:GET',
                            'admin.menu.delete-all:POST',
                        ],
                        'pagesManage' => [
                            'admin.api.page.show:GET',
                            'admin.api.page.update:POST',
                            'admin.api.page.updatePageDetails:POST'.
                            'admin.api.page.enableOrDisablePage:POST',
                        ],
                    ],
                ],




            ],
        ],

    ],


];

return $permission_tree;