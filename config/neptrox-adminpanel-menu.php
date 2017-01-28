<?php
/*
 * Menu Schema
 * Copy Paste to create Menu
 * Remove Blank Indexes
 * [
    'ul' => [
        'li' => [

            'dashboard' => [
                'display_order' => 1, // Sorting Of Menus
                'need_administrative_access' => true, // 'true' means this menu is accessable only to Root User or User Having Admin Role
                'acl_auth' => ['admin_home'], // these routes must be accessable to current user
                'active_if_request_is' => ['admin/dashboard*'], // If current url matches any Url Patterns then set menu as Active
                'additional_attr' => [
                    'style' => '' // Inline css for Menu Li
                ],
                'a' => [
                    'route' => 'admin_home', // Route to point by the menu
                    'content' => '<i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span>',
                    'additional_attr' => [],
                ],
                'sub_menu' => []
            ],

        ],
    ]
];*/

/*
 * External Package / Plugins Additional Menu schema
 * It must follow this schema
 *
return [
    'product-basket' => [
        'level' => 1, // Menu Level Max 3 level
        'parent' => 0, // Prent Menu = 0, Child Menu = 'parent-menu-key'
        'menu' => [
            'product-basket' => [
                'key' => 'product-basket',
                'display_order' => 101,
                'acl_auth' => [],
                'active_if_request_is' => [],
                'additional_attr' => [],
                'a' => [
                    'route' => '#',
                    'content' => 'Product Basket',
                ]
            ],
        ],
    ]
];
*/

return [
    'ul' => [
        'li' => [



            /* ACL */
            'acl' => [
                'display_order' => 82,
                'need_administrative_access' => true,
                'additional_attr' => [
                    'class' => 'sidebar-menu-item',
                ],
                'a' => [
                    'route' => '#',
                    'additional_attr' => [
                        'class' => 'sidebar-menu-button'
                    ],
                    'content' => '<i class="sidebar-menu-icon material-icons">list</i> ACL',
                ],
                'sub_menu' => [
                    'ul' => [
                        'li' => [

                            'user' => [
                                'display_order' => 1,
                                'acl_auth' => ['admin.users.index:GET'],
                                'active_if_request_is' => ['admin/users*'],
                                'additional_attr' => [
                                    'class' => 'sidebar-menu-item',
                                ],
                                'a' => [
                                    'route' => 'admin.users.index',
                                    'additional_attr' => [
                                        'class' => 'sidebar-menu-button'
                                    ],
                                    'content' => 'Users',
                                ],
                            ],
                            'role' => [
                                'display_order' => 11,
                                'acl_auth' => ['admin.roles.index:GET'],
                                'active_if_request_is' => ['admin/roles*'],
                                'additional_attr' => [
                                    'class' => 'sidebar-menu-item',
                                ],
                                'a' => [
                                    'route' => 'admin.roles.index',
                                    'additional_attr' => [
                                        'class' => 'sidebar-menu-button'
                                    ],
                                    'content' => 'Roles',
                                ],
                            ],
                            'permission' => [
                                'display_order' => 21,
                                'acl_auth' => ['admin.permissions.index:GET'],
                                'active_if_request_is' => ['admin/permissions*'],
                                'additional_attr' => [
                                    'class' => 'sidebar-menu-item',
                                ],
                                'a' => [
                                    'route' => 'admin.permissions.index',
                                    'additional_attr' => [
                                        'class' => 'sidebar-menu-button'
                                    ],
                                    'content' => 'Permission',
                                ],
                            ],
                            'route' => [
                                'display_order' => 31,
                                'acl_auth' => ['admin.routes.index:GET'],
                                'active_if_request_is' => ['admin/routes*'],
                                'additional_attr' => [
                                    'class' => 'sidebar-menu-item',
                                ],
                                'a' => [
                                    'route' => 'admin.routes.index',
                                    'additional_attr' => [
                                        'class' => 'sidebar-menu-button'
                                    ],
                                    'content' => 'Route',
                                ],
                            ],

                        ],
                    ]
                ]
            ],
            /* End: ACL */

            /* Configuration */
            'site-configurations' => [
                'display_order' => 83,
                'acl_auth' => ['admin.configuration:GET'],
                'active_if_request_is' => ['admin/configure*'],
                'additional_attr' => [
                    'class' => 'sidebar-menu-item',
                ],
                'a' => [
                    'route' => 'admin.configuration',
                    'additional_attr' => [
                        'class' => 'sidebar-menu-button'
                    ],
                    'content' => '<i class="sidebar-menu-icon material-icons">settings</i> Configuration',
                ]
            ],
            /* End: Configuration */

            /* menu */
            'menu' => [
                'key' => 'menu',
                'display_order' => 84,
                'acl_auth' => ['admin.menu:GET'],
                'active_if_request_is' => ['admin/menu*'],
                'additional_attr' => [
                    'class' => 'sidebar-menu-item',
                ],
                'a' => [
                    'route' => 'admin.menu',
                    'additional_attr' => [
                        'class' => 'sidebar-menu-button'
                    ],
                    'content' => '<i class="sidebar-menu-icon material-icons">menu</i> Menus',
                ]
            ],
            /* End: menu */

            /* Pages */
            'page' => [
                'key' => 'page',
                'display_order' => 87,
                'acl_auth' => ['admin.page:GET'],
                'active_if_request_is' => ['admin/page*'],
                'additional_attr' => [
                    'class' => 'sidebar-menu-item',
                ],
                'a' => [
                    'route' => 'admin.page',
                    'additional_attr' => [
                        'class' => 'sidebar-menu-button'
                    ],
                    'content' => '<i class="sidebar-menu-icon material-icons">library_books</i> Pages',
                ]
            ],
            /* End: Pages */




            /* Sign Out */
            'sign-out' => [
                'display_order' => 92,
                'additional_attr' => [
                    'class' => 'sidebar-menu-item',
                ],
                'a' => [
                    'route' => 'admin.logout',
                    'additional_attr' => [
                        'class' => 'sidebar-menu-button'
                    ],
                    'content' => '<i class="sidebar-menu-icon material-icons md-18">lock</i> Sign Out'
                ],
            ],
            /* End: Sign Out */

        ],
    ],
];
