<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/',                                                                 ['as'=>'home',                                                  'uses' => 'Front_End\FrontEndController@index']);

//login
Route::get('admin-login',                                                        ['as' => 'admin.login',                                        'uses'  =>  'Auth\LoginController@showLoginForm']);
Route::post('admin-login',                                                       ['as' => 'admin.login',                                        'uses'  =>  'Auth\LoginController@login']);
Route::get('admin-logout',                                                       ['as' => 'admin.logout',                                       'uses'  =>  'Auth\LoginController@logout']);


// Routes in this group must be authorized.
Route::group(['middleware' => 'authorize'], function () {

    // Site administration section
    // TODO: change it
    // AppHelper::getConfigValue(config('neptrox.route-prefix'), 'admin')
    Route::group(['prefix' => 'admin'], function () {

        // Application routes...
        Route::get('dashboard',                                             ['as' => 'admin_home',                                      'uses' => 'Admin\DashboardController@index']);


        //UserController routes
        Route::get('users',                                                 ['as' => 'admin.users.index',                                'uses' => 'Admin\Acl\UsersController@index']);
        Route::get('users/create',                                          ['as' => 'admin.users.create',                               'uses' => 'Admin\Acl\UsersController@create']);
        Route::post('users/store',                                          ['as' => 'admin.users.store',                                'uses' => 'Admin\Acl\UsersController@store']);
        Route::get('users/show/{userId}',                                   ['as' => 'admin.users.show',                                 'uses' => 'Admin\Acl\UsersController@show']);
        Route::get('users/{userId}/edit',                                   ['as' => 'admin.users.edit',                                 'uses' => 'Admin\Acl\UsersController@edit']);
        Route::post('users/{userId}/update',                                ['as' => 'admin.users.update',                               'uses' => 'Admin\Acl\UsersController@update']);

        Route::post('users/enableSelected',                                 ['as' => 'admin.users.enable-selected',                     'uses' => 'Admin\Acl\UsersController@enableSelected']);
        Route::post('users/disableSelected',                                ['as' => 'admin.users.disable-selected',                    'uses' => 'Admin\Acl\UsersController@disableSelected']);
        // Route::resource('users', 'Admin\Acl\UsersController');
        Route::get('users/{userId}/confirm-delete',                         ['as' => 'admin.users.confirm-delete',                      'uses' => 'Admin\Acl\UsersController@getModalDelete']);
        Route::get('users/{userId}/delete',                                 ['as' => 'admin.users.delete',                              'uses' => 'Admin\Acl\UsersController@destroy']);
        Route::get('users/{userId}/enable',                                 ['as' => 'admin.users.enable',                              'uses' => 'Admin\Acl\UsersController@enable']);
        Route::get('users/{userId}/disable',                                ['as' => 'admin.users.disable',                             'uses' => 'Admin\Acl\UsersController@disable']);

        //RoleController routes
        Route::get('roles',                                                 ['as' => 'admin.roles.index',                                'uses' => 'Admin\Acl\RolesController@index']);
        Route::get('roles/create',                                          ['as' => 'admin.roles.create',                               'uses' => 'Admin\Acl\RolesController@create']);
        Route::post('roles/store',                                          ['as' => 'admin.roles.store',                                'uses' => 'Admin\Acl\RolesController@store']);
        Route::get('roles/show/{roleId}',                                   ['as' => 'admin.roles.show',                                 'uses' => 'Admin\Acl\RolesController@show']);
        Route::get('roles/{roleId}/edit',                                   ['as' => 'admin.roles.edit',                                 'uses' => 'Admin\Acl\RolesController@edit']);
        Route::post('roles/{roleId}/update',                                ['as' => 'admin.roles.update',                               'uses' => 'Admin\Acl\RolesController@update']);

        Route::post('roles/enableSelected',                                 ['as' => 'admin.roles.enable-selected',                     'uses' => 'Admin\Acl\RolesController@enableSelected']);
        Route::post('roles/disableSelected',                                ['as' => 'admin.roles.disable-selected',                    'uses' => 'Admin\Acl\RolesController@disableSelected']);
        Route::get('roles/search',                                          ['as' => 'admin.roles.search',                              'uses' => 'Admin\Acl\RolesController@searchByName']);
        Route::post('roles/getInfo',                                        ['as' => 'admin.roles.get-info',                            'uses' => 'Admin\Acl\RolesController@getInfo']);
        //Route::resource('roles', 'Admin\Acl\RolesController');
        Route::get('roles/users/search',                                    ['as' => 'admin.users.search',                              'uses' => 'Admin\Acl\UsersController@searchByName']);
        /*Route::get('users/list',                                          ['as' => 'admin.users.search',                              'uses' => 'Admin\Acl\UsersController@listByPage']);*/
        Route::post('users/getInfo',                                        ['as' => 'admin.users.get-info',                            'uses' => 'Admin\Acl\UsersController@getInfo']);
        Route::get('roles/{roleId}/confirm-delete',                         ['as' => 'admin.roles.confirm-delete',                      'uses' => 'Admin\Acl\RolesController@getModalDelete']);
        Route::get('roles/{roleId}/delete',                                 ['as' => 'admin.roles.delete',                              'uses' => 'Admin\Acl\RolesController@destroy']);
        Route::get('roles/{roleId}/enable',                                 ['as' => 'admin.roles.enable',                              'uses' => 'Admin\Acl\RolesController@enable']);
        Route::get('roles/{roleId}/disable',                                ['as' => 'admin.roles.disable',                             'uses' => 'Admin\Acl\RolesController@disable']);


        //PermissionController routes
        Route::get('permissions',                                           ['as' => 'admin.permissions.index',                         'uses' => 'Admin\Acl\PermissionsController@index']);
        Route::get('permissions/create',                                    ['as' => 'admin.permissions.create',                        'uses' => 'Admin\Acl\PermissionsController@create']);
        Route::post('permissions/store',                                    ['as' => 'admin.permissions.store',                         'uses' => 'Admin\Acl\PermissionsController@store']);
        Route::get('permissions/show/{permissionId}',                       ['as' => 'admin.permissions.show',                          'uses' => 'Admin\Acl\PermissionsController@show']);
        Route::get('permissions/{permissionId}/edit',                       ['as' => 'admin.permissions.edit',                          'uses' => 'Admin\Acl\PermissionsController@edit']);
        Route::post('permissions/{permissionId}/update',                    ['as' => 'admin.permissions.update',                        'uses' => 'Admin\Acl\PermissionsController@update']);

        Route::get('permissions/generate',                                  ['as' => 'admin.permissions.generate',                      'uses' => 'Admin\Acl\PermissionsController@generate']);
        Route::post('permissions/enableSelected',                           ['as' => 'admin.permissions.enable-selected',               'uses' => 'Admin\Acl\PermissionsController@enableSelected']);
        Route::post('permissions/disableSelected',                          ['as' => 'admin.permissions.disable-selected',              'uses' => 'Admin\Acl\PermissionsController@disableSelected']);
        //Route::resource('permissions', 'Admin\Acl\PermissionsController');
        Route::post('routes/savePerms',                                     ['as' => 'admin.routes.save-perms',                         'uses' => 'Admin\Acl\RoutesController@savePerms']);
        Route::get('routes/search',                                         ['as' => 'admin.routes.search',                             'uses' => 'Admin\Acl\RoutesController@searchByName']);
        Route::post('routes/getInfo',                                       ['as' => 'admin.routes.get-info',                           'uses' => 'Admin\Acl\RoutesController@getInfo']);
        Route::get('permissions/{permissionId}/confirm-delete',             ['as' => 'admin.permissions.confirm-delete',                'uses' => 'Admin\Acl\PermissionsController@getModalDelete']);
        Route::get('permissions/{permissionId}/delete',                     ['as' => 'admin.permissions.delete',                        'uses' => 'Admin\Acl\PermissionsController@destroy']);
        Route::get('permissions/{permissionId}/enable',                     ['as' => 'admin.permissions.enable',                        'uses' => 'Admin\Acl\PermissionsController@enable']);
        Route::get('permissions/{permissionId}/disable',                    ['as' => 'admin.permissions.disable',                       'uses' => 'Admin\Acl\PermissionsController@disable']);

        //RouteController routes
        Route::get('routes',                                                ['as' => 'admin.routes.index',                              'uses' => 'Admin\Acl\RoutesController@index']);
        Route::get('routes/create',                                         ['as' => 'admin.routes.create',                             'uses' => 'Admin\Acl\RoutesController@create']);
        Route::post('routes/store',                                         ['as' => 'admin.routes.store',                              'uses' => 'Admin\Acl\RoutesController@store']);
        Route::get('routes/show/{routeId}',                                 ['as' => 'admin.routes.show',                               'uses' => 'Admin\Acl\RoutesController@show']);
        Route::get('routes/{routeId}/edit',                                 ['as' => 'admin.routes.edit',                               'uses' => 'Admin\Acl\RoutesController@edit']);
        Route::post('routes/{routeId}/update',                              ['as' => 'admin.routes.update',                             'uses' => 'Admin\Acl\RoutesController@update']);

        Route::get('routes/load',                                           ['as' => 'admin.routes.load',                               'uses' => 'Admin\Acl\RoutesController@load']);
        Route::post('routes/enableSelected',                                ['as' => 'admin.routes.enable-selected',                    'uses' => 'Admin\Acl\RoutesController@enableSelected']);
        Route::post('routes/disableSelected',                               ['as' => 'admin.routes.disable-selected',                   'uses' => 'Admin\Acl\RoutesController@disableSelected']);
        //Route::resource('routes', 'Admin\Acl\RoutesController');
        Route::get('routes/{routeId}/confirm-delete',                       ['as' => 'admin.routes.confirm-delete',                     'uses' => 'Admin\Acl\RoutesController@getModalDelete']);
        Route::get('routes/{routeId}/delete',                               ['as' => 'admin.routes.delete',                             'uses' => 'Admin\Acl\RoutesController@destroy']);
        Route::get('routes/{routeId}/enable',                               ['as' => 'admin.routes.enable',                             'uses' => 'Admin\Acl\RoutesController@enable']);
        Route::get('routes/{routeId}/disable',                              ['as' => 'admin.routes.disable',                            'uses' => 'Admin\Acl\RoutesController@disable']);

        // Configuration Section
        Route::get('configure/',                                            ['as' => 'admin.configuration',                              'uses' => 'Admin\ConfigurationController@index']);
        Route::get('configure/create',                                      ['as' => 'admin.configuration.create',                       'uses' => 'Admin\ConfigurationController@create']);
        Route::post('configure/store',                                      ['as' => 'admin.configuration.store',                        'uses' => 'Admin\ConfigurationController@store']);
        Route::get('configure/{id}/edit',                                   ['as' => 'admin.configuration.edit',                         'uses' => 'Admin\ConfigurationController@edit']);
        Route::post('configure/{id}/update',                                ['as' => 'admin.configuration.update',                       'uses' => 'Admin\ConfigurationController@update']);
        Route::get('configure/{id}/confirm-delete',                         ['as' => 'admin.configuration.confirm-delete',               'uses' => 'Admin\ConfigurationController@getModalDelete']);
        //Route::get('configure/{id}/delete',                               ['as' => 'admin.configuration.delete',                       'uses' => 'Admin\ConfigurationController@destroy']);

        Route::post('configure/search',                                     ['as' => 'admin.configuration.search',                       'uses' => 'Admin\ConfigurationController@search']);
        Route::post('configure/delete',                                     ['as' => 'admin.configuration.delete',                       'uses' => 'Admin\ConfigurationController@destroy']);
        Route::post('configure/enable',                                     ['as' => 'admin.configuration.enableAll',                    'uses' => 'Admin\ConfigurationController@enableAll']);
        Route::post('configure/disable',                                    ['as' => 'admin.configuration.disableAll',                   'uses' => 'Admin\ConfigurationController@disableAll']);
        Route::get('configure/{id}/enable',                                 ['as' => 'admin.configuration.enable',                       'uses' => 'Admin\ConfigurationController@enable']);
        Route::get('configure/{id}/disable',                                ['as' => 'admin.configuration.disable',                      'uses' => 'Admin\ConfigurationController@disable']);

        //Routes for menus and pages
        //page Section
        Route::get('page',                                                        ['as' => 'admin.page',                                      'uses' => 'Admin\Pages\PageController@index']);
        Route::get('page/create',                                                 ['as' => 'admin.page.create',                               'uses' => 'Admin\Pages\PageController@create']);
        Route::post('page/store',                                                 ['as' => 'admin.page.store',                                'uses' => 'Admin\Pages\PageController@store']);
        Route::get('page/{id}/edit',                                              ['as' => 'admin.page.edit',                                 'uses' => 'Admin\Pages\PageController@edit']);
        Route::post('page/{id}/update',                                           ['as' => 'admin.page.update',                               'uses' => 'Admin\Pages\PageController@update']);
        Route::get('page/{id}/confirm-delete',                                    ['as' => 'admin.page.confirm-delete',                       'uses' => 'Admin\Pages\PageController@getModalDelete']);
        // Route::get('page/{id}/delete',                                            ['as' => 'admin.page.delete',                               'uses' => 'Admin\Pages\PageController@destroy']);
        Route::post('page/delete',                                                ['as' => 'admin.page.delete',                               'uses' => 'Admin\Pages\PageController@destroy']);
        Route::post('page/enable',                                                ['as' => 'admin.page.enable-page',                          'uses' => 'Admin\Pages\PageController@enable']);
        Route::post('page/check',                                                 ['as' => 'admin.page.check-slug',                           'uses' => 'Admin\Pages\PageController@checkSlug']);

        Route::get('page/{id}/getDescriptionViewModal',                           ['as' => 'admin.page.getDescriptionViewModal',              'uses' => 'Admin\Pages\PageController@getDescriptionViewModal']);
        Route::get('page/{id}/enable',                                            ['as' => 'admin.page.enable',                               'uses' => 'Admin\Pages\PageController@enable']);
        Route::get('page/{id}/disable',                                           ['as' => 'admin.page.disable',                              'uses' => 'Admin\Pages\PageController@disable']);
        Route::post('page/enable',                                                ['as' => 'admin.page.enableAll',                            'uses' => 'Admin\Pages\PageController@enableAll']);
        Route::post('page/disable',                                               ['as' => 'admin.page.disableAll',                           'uses' => 'Admin\Pages\PageController@disableAll']);
        Route::post('page/search',                                                ['as' => 'admin.page.search',                               'uses' => 'Admin\Pages\PageController@search']);

        //Menu Section
        Route::get('menu',                                                        ['as' => 'admin.menu',                                      'uses' => 'Admin\Menu\MenuController@index']);
        Route::get('menu/create',                                                 ['as' => 'admin.menu.create',                               'uses' => 'Admin\Menu\MenuController@create']);
        Route::post('menu/store',                                                 ['as' => 'admin.menu.store',                                'uses' => 'Admin\Menu\MenuController@store']);
        Route::get('menu/{id}/edit',                                              ['as' => 'admin.menu.edit',                                 'uses' => 'Admin\Menu\MenuController@edit']);
        Route::post('menu/{id}/update',                                           ['as' => 'admin.menu.update',                               'uses' => 'Admin\Menu\MenuController@update']);
        Route::get('menu/{id}/confirm-delete',                                    ['as' => 'admin.menu.confirm-delete',                       'uses' => 'Admin\Menu\MenuController@getModalDelete']);
        Route::get('menu/{id}/delete',                                            ['as' => 'admin.menu.delete',                               'uses' => 'Admin\Menu\MenuController@destroy']);
        Route::post('menu/enable-page',                                           ['as' => 'admin.menu.enable-page',                          'uses' => 'Admin\Menu\MenuController@enable']);
        Route::post('menu/check',                                                 ['as' => 'admin.menu.check-slug',                           'uses' => 'Admin\Menu\MenuController@checkSlug']);

        Route::get('menu/confirm-bulk-delete',                                    ['as' => 'admin.menu.confirm-bulk-delete',                    'uses' => 'Admin\Menu\MenuController@getBulkModalDelete']);
        Route::post('menu/bulk-delete',                                           ['as' => 'admin.menu.delete-all',                             'uses' => 'Admin\Menu\MenuController@destroyAll']);
        Route::get('menu/{id}/enable',                                            ['as' => 'admin.menu.enable',                                 'uses' => 'Admin\Menu\MenuController@enable']);
        Route::get('menu/{id}/disable',                                           ['as' => 'admin.menu.disable',                                'uses' => 'Admin\Menu\MenuController@disable']);
        Route::post('menu/enable',                                                ['as' => 'admin.menu.enableAll',                              'uses' => 'Admin\Menu\MenuController@enableAll']);
        Route::post('menu/disable',                                               ['as' => 'admin.menu.disableAll',                             'uses' => 'Admin\Menu\MenuController@disableAll']);

        //routes for drag and drop update through angularjs
        Route::get('api/page/{id}',                                               ['as' => 'admin.api.page.show',                              'uses' => 'Admin\Pages\PageApiController@show']);
        Route::post('api/page/{id}',                                              ['as' => 'admin.api.page.update',                            'uses' => 'Admin\Pages\PageApiController@update']);
        Route::post('api/page/updatePageDetails/{id}',                            ['as' => 'admin.api.page.updatePageDetails',                 'uses' => 'Admin\Pages\PageApiController@updatePageDetails']);
        Route::post('api/page/enableOrDisablePage/{id}',                          ['as' => 'admin.api.page.enableOrDisablePage',               'uses' => 'Admin\Pages\PageApiController@enableOrDisablePage']);


    });


});


