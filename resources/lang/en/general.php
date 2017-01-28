<?php

return [

    'page' => [
        'home' => 'Home',
    ],
    'button'              => [
        'add'               => 'Add',
        'cancel'            => 'Cancel',
        'close'             => 'Close',
        'back'              => 'Back',
        'create'            => 'Create',
        'delete'            => 'Delete',
        'edit'              => 'Edit',
        'ok'                => 'OK',
        'update'            => 'Update',
        'enable'            => 'Enable',
        'enabled'           => 'Enabled',
        'disable'           => 'Disable',
        'disabled'          => 'Disabled',
        'toggle-select'     => 'Toggle checkboxes',
        'remove-role'       => 'Remove role',
        'save'              => 'Save',
        'save-list'         => 'Save & List',
        'save-add'          => 'Save & Add New',
        'save-edit'         => 'Save & Continue Edit',
    ],

    'common'            =>  [
        'free'              =>  'Free',
    ],

    'status'              => [
        'enabled'           => 'Enabled',
    ],

    'tabs'              => [
        'details'           => 'Details',
        'options'           => 'Options',
        'perms'             => 'Permissions',
        'users'             => 'Users',
        'roles'             => 'Roles',
        'routes'            => 'Routes',
        'action'            => 'Action',
    ],

    'error'              => [
        'title-403'             => 'Error 403',
        'title-404'             => 'Error 404',
        'title-500'             => 'Error 500',
        'description-403'       => '',
        'description-404'       => '',
        'description-500'       => '',
        'forbidden-403'         => 'Forbidden',
        'page-not-found-404'    => 'Page not found',
        'internal-error-500'    => 'Internal error',
        'client-error'          => 'Client error: :error-code',
        'server-error'          => 'Server error: :error-code',
        'what-is-this'          => 'What does this mean?',
        '403-explanation'       => 'The page or function that you tried to access is forbidden. The authorities have been contacted!',
        '404-explanation'       => 'The page or function that you are looking for could not be located. Try to go back to the previous page or select a new one.',
        '500-explanation'       => 'A serious problem occurred on the server, we will look at it ASAP and rectify the situation.',
        'error-proc-command'    => 'Error processing command: :cmd',

        'EXCEPTION_EMAIL_SUBJECT'       => 'An unwanted exception occurred on the application.',
        'SITE_CONFIG_EMPTY'             => 'No any configuration data found. This may break application.',
        'SITE_CONFIG_KEY_NOT_EXIST'     => 'Requested configuration key: ":key" does not exist. This key must exist on Site Configuration, accessable on Admin Panel as Settings >> Configuration or URL: admin/configure',

        'WEIGHT_CLASS_NOT_EXIST_IN_PRODUCT' => 'Product with identity [ :key ] does not have weight class assigned to it. Please, add product class to this product.',

        'no-email-for-ticket-user'          => 'Please Enter Email and Username'
    ],

    'layout'            => [
        'left_sidebar'         => [
            'list'         => 'List',
            'add'         => 'Add',
        ]
    ],

];
