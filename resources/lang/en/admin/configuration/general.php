<?php

return [

    'status'              => [
        'created'                   => 'Configuration successfully created',
        'updated'                   => 'Configuration successfully updated',
        'invalid'                   => 'Invalid Requests',
        'deleted'                   => 'Configuration successfully deleted',
        'generated'                 => 'Successfully generated :number Configurations from routes.',
        'global-enabled'            => 'Selected Configurations enabled.',
        'global-disabled'           => 'Selected Configurations disabled.',
        'enabled'                   => 'Configuration enabled.',
        'disabled'                  => 'Configuration disabled.',
        'no-perm-selected'          => 'No Configuration selected.',
    ],

    'error'               => [
        'cant-delete-this-Configuration' => 'This Configuration cannot be deleted',
        'cant-delete-perm-in-use'     => 'This Configuration is in use',
        'cant-edit-this-Configuration'   => 'This Configuration cannot be edited',
    ],

    'page'              => [
        'index'              => [
            'title'             => 'Admin | Configurations | Lists',
            'description'       => 'List of Configurations',
        ],
        'show'              => [
            'title'             => 'Admin | Configuration | Show',
            'description'       => 'Displaying Configuration: :name',
        ],
        'create'            => [
            'title'            => 'Admin | Configuration | Create',
            'description'      => 'Creating a new Configuration',
        ],
        'edit'              => [
            'title'            => 'Admin | Configuration | Edit',
            'description'      => 'Editing Configuration',
        ],
    ],

    'columns'           => [
        'id'                        =>  'ID',
        'name'                      =>  'Name',
        'display_name'              =>  'Display name',
        'description'               =>  'Description',
        'routes'                    =>  'Routes',
        'roles'                     =>  'Roles',
        'created'                   =>  'Created',
        'updated'                   =>  'Updated',
        'actions'                   =>  'Actions',
        'key'                       =>  'Option Name',
        'value'                     =>  'Option Value',
        'remarks'                   =>  'Remarks',
        'status'                    =>  'Status',
    ],

    'action'               => [
        'create'                => 'Create new Configuration',
        'generate'              => 'Generate Configurations',
        'note'                  => 'General Notes',
        'edit'                  => 'Edit Configuration',
        'remarks'               => 'Additional Information',
    ],

    'radio'              =>   [
        'active'                => 'Active',
        'inactive'              => 'Inactive',
    ],

    'content' => [
        'page'          => 'Configuration',
        'page-manager'  => 'Configuration Manager',
        'list'          => 'Configuration List',
        'show'          => 'Configuration Detail',
        'add'           => 'Configuration Add Form',
        'update'        => 'Update Form'
    ],

    'delete'            =>  [
        'sure'                          =>  'Are you sure?',
        'message'                       =>  'You will not be able to recover!',
        'confirmButtonColor'            =>  '#039BE5',
    ],

];
