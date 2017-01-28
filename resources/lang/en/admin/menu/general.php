<?php

return [

    'status'              => [
        'created'                           => 'Menu successfully created',
        'updated'                           => 'Menu successfully updated',
        'deleted'                           => 'Menu successfully deleted',
    ],

    'error'               => [
        'cant-delete-this-menu'             => 'This Menu cannot be deleted',
        'cant-delete-perm-in-use'           => 'This Menu is in use',
        'cant-edit-this-menu'               => 'This Menu cannot be edited',
        'no-data-found'                     => 'Sorry, Data not found.',
    ],

    'page'              => [
        'list'                              => 'Menu list',
        'index'              => [
            'title'                         => 'Admin | Menus | Lists',
            'description'                   => 'List of Menu',
            'table-title'                   => 'Menu list',
        ],
        'show'              => [
            'title'                         => 'Admin | Menus | Show',
            'description'                   => 'Displaying Menu: :title',
            'section-title'                 => 'Menu details',
        ],
        'create'            => [
            'title'                         => 'Admin | Menus | Create',
            'description'                   => 'Creating a new Menu',
            'section-title'                 => 'New Menus',
            'menu-name'                     => 'Menu Name',
            'menu-value-name'           => 'Menu Value Name',

        ],
        'edit'              => [
            'title'                         => 'Admin | Menus | Edit',
            'description'                   => 'Editing Menu: :name',
            'section-title'                 => 'Edit Menu',
        ],
    ],

    'columns'           => [
        'id'                                =>  'ID',
        'created'                           =>  'Created',
        'updated'                           =>  'Updated',
        'actions'                           =>  'Actions',
        'name'                              =>  'Name',
        'description'                       =>  'Description',
        'locale'                            =>  'Locale',
        'flag'                              =>  'Flag',
        'existing-image'                    =>  'Existing Flag',
        'add-new-image'                     =>  'Add New Image',
        'status'                            =>  'Status',
        'sort_order'                        =>  'Sort Order',
        'option_value_name'                 =>  'Menu Value Name',
        'slug'                              =>  'Slug'
    ],

    'action'               => [
        'create'                            => 'Create New Menu',
        'generate'                          => 'Generate Menu',
        'note'                              => 'General Notes',
        'edit'                              => 'Edit Menu',
    ],
    'content' => [
        'page'          => 'Menu',
        'page-manager'  => 'Menu Manager',
        'list'          => 'Menu List',
        'show'          => 'Menu Detail',
        'add'           => 'Menu Add Form',
        'update'        => 'Update Form'
    ],

    'delete'            =>  [
        'sure'                          =>  'Are you sure?',
        'message'                       =>  'You will not be able to recover!',
        'confirmButtonColor'            =>  '#039BE5',
    ],

];
