<?php
// Admin Home
Breadcrumbs::register('admin_home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('admin_home'));
//    $breadcrumbs->push('Dashboard', route('admin.users.index'));
});

// Users
Breadcrumbs::register('admin.users.index', function($breadcrumbs)
{
    $breadcrumbs->parent('admin_home', route('admin_home'));
    $breadcrumbs->push('Users', route('admin.users.index'));
});

Breadcrumbs::register('admin.users.create', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.users.index');
    $breadcrumbs->push('Add', route('admin.users.index'));
});

Breadcrumbs::register('admin.users.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.users.index');
    $breadcrumbs->push('Edit');
});

// Roles
Breadcrumbs::register('admin.roles.index', function($breadcrumbs)
{
    $breadcrumbs->parent('admin_home', route('admin_home'));
    $breadcrumbs->push('Roles', route('admin.roles.index'));
});

Breadcrumbs::register('admin.roles.create', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.roles.index');
    $breadcrumbs->push('Add');
});

Breadcrumbs::register('admin.roles.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.roles.index');
    $breadcrumbs->push('Edit');
});

// Permissions
Breadcrumbs::register('admin.permissions.index', function($breadcrumbs)
{
    $breadcrumbs->parent('admin_home', route('admin_home'));
    $breadcrumbs->push('Permissions', route('admin.permissions.index'));
});

Breadcrumbs::register('admin.permissions.create', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.permissions.index');
    $breadcrumbs->push('Add');
});

Breadcrumbs::register('admin.permissions.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.permissions.index');
    $breadcrumbs->push('Edit');
});

// Routes
Breadcrumbs::register('admin.routes.index', function($breadcrumbs)
{
    $breadcrumbs->parent('admin_home', route('admin_home'));
    $breadcrumbs->push('Routes', route('admin.routes.index'));
});

Breadcrumbs::register('admin.routes.create', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.routes.index');
    $breadcrumbs->push('Add');
});

Breadcrumbs::register('admin.routes.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.routes.index');
    $breadcrumbs->push('Edit');
});

// Configuration
Breadcrumbs::register('admin.configuration', function($breadcrumbs)
{
    $breadcrumbs->parent('admin_home', route('admin_home'));
    $breadcrumbs->push('Configuration', route('admin.configuration'));
});

Breadcrumbs::register('admin.configuration.create', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.configuration', route('admin.configuration'));
    $breadcrumbs->push('Create');
});

Breadcrumbs::register('admin.configuration.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.configuration', route('admin.configuration'));
    $breadcrumbs->push('Edit');
});

//Menus
Breadcrumbs::register('admin.menu', function($breadcrumbs)
{
    $breadcrumbs->parent('admin_home', route('admin_home'));
    $breadcrumbs->push('Menu', route('admin.menu'));
});

Breadcrumbs::register('admin.menu.create', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.menu', route('admin.menu'));
    $breadcrumbs->push('Create');
});

Breadcrumbs::register('admin.menu.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.menu', route('admin.menu'));
    $breadcrumbs->push('Edit');
});

//Pages
Breadcrumbs::register('admin.page', function($breadcrumbs)
{
    $breadcrumbs->parent('admin_home', route('admin_home'));
    $breadcrumbs->push('Page', route('admin.page'));
});

Breadcrumbs::register('admin.page.create', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.page', route('admin.page'));
    $breadcrumbs->push('Create');
});

Breadcrumbs::register('admin.page.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.page', route('admin.page'));
    $breadcrumbs->push('Edit');
});

//Performers
Breadcrumbs::register('admin.performers', function($breadcrumbs)
{
    $breadcrumbs->parent('admin_home', route('admin_home'));
    $breadcrumbs->push('Performer', route('admin.performers'));
});

Breadcrumbs::register('admin.performers.create', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.performers', route('admin.performers'));
    $breadcrumbs->push('Create');
});

Breadcrumbs::register('admin.performers.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('admin.performers', route('admin.performers'));
    $breadcrumbs->push('Edit');
});