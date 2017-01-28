<?php

return [

    'status'              => [
        'created'                           => 'Page successfully created',
        'updated'                           => 'Page successfully updated',
        'deleted'                           => 'Page successfully deleted',
        'invalid'                           => 'Invalid Requests',
        'delete'                            => 'Deleted!',
        'enabled'                           => 'Page enabled.',
        'disabled'                          => 'Page disabled.',
    ],

    'error'               => [
        'cant-delete-this-page'             => 'This Page cannot be deleted',
        'cant-delete-perm-in-use'           => 'This Page is in use',
        'cant-edit-this-page'               => 'This Page cannot be edited',
        'no-data-found'                     => 'Sorry, Data not found.',
    ],

    'page'              => [
        'list'               =>                'Pages List',
        'index'              => [
            'title'                         => 'Admin | Menus | Lists',
            'description'                   => 'List of Page',
            'table-title'                   => 'Page list',
        ],
        'show'              => [
            'title'                         => 'Admin | Menus | Show',
            'description'                   => 'Displaying Page: :title',
            'section-title'                 => 'Page details',
        ],
        'create'            => [
            'title'                         => 'Admin | Menus | Create',
            'description'                   => 'Creating a new Page',
            'section-title'                 => 'New Menus',
            'page-name'                     => 'Page Name',
            'page-value-name'               => 'Page Value Name',

        ],
        'edit'              => [
            'title'                         => 'Admin | Menus | Edit',
            'description'                   => 'Editing Page: :name',
            'section-title'                 => 'Edit Page',
        ],
    ],

    'columns'           => [
        'id'                                =>  'ID',
        'created'                           =>  'Created',
        'updated'                           =>  'Updated',
        'actions'                           =>  'Actions',
        'name'                              =>  'Name',
        'description'                       =>  'Description',
        'view'                              =>  'View',
        'locale'                            =>  'Locale',
        'flag'                              =>  'Flag',
        'existing-image'                    =>  'Existing Flag',
        'add-new-image'                     =>  'Add New Image',
        'image'                             =>  'Image',
        'sort_order'                        =>  'Sort Order',
        'option_value_name'                 =>  'Page Value Name',
        'slug'                              =>  'Slug',
        'status'                            =>  'Status'
    ],

    'action'               => [
        'create'                            => 'Create New Page',
        'generate'                          => 'Generate Page',
        'note'                              => 'General Notes',
        'edit'                              => 'Edit Page',
    ],
    'content' => [
        'page'          => 'Page',
        'page-manager'  => 'Page Manager',
        'list'          => 'Page List',
        'show'          => 'Page Detail',
        'add'           => 'Page Add Form',
        'update'        => 'Update Form'
    ],
    'delete'            =>  [
        'sure'                          =>  'Are you sure?',
        'message'                       =>  'You will not be able to recover!',
        'confirmButtonColor'            =>  '#039BE5',
    ],

];
