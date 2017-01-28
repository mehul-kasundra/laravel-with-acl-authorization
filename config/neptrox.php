<?php
return [
    'acl' => [
        'allow_acl_access' => env('ALLOW_ACL_ACCESS', false),
    ],

    'route' => [
        'admin-login' => 'admin-login',
        'admin-logout' => 'admin-logout'
    ],

    'route-prefix' => [
        'admin' => 'ggt-admin',
        'spark' => 'ggt-spark',
    ],

    /*
    |--------------------------------------------------------------------------
    | Asset Paths
    |--------------------------------------------------------------------------
    | All the assets path are to be used form here
    |
    */
    'asset_path' => [
        'admin' => [
            'image' => 'assets/admin/assets/images/',
            'css' => 'assets/admin/assets/css/',
            'tree_css' => 'assets/admin/examples/css/',
            'js' => 'assets/admin/assets/js/',
            'tree_js' => 'assets/admin/examples/js/',
            'vendor' => 'assets/admin/assets/vendor/',
            'asset_vendor' => 'assets/admin/vendor/',
            'compiled_js' => 'js/admin/',
        ],
        'frontend' => [
            'images' => 'images/',
            'css' => 'assets/frontend/css/',
            'fonts' => 'assets/frontend/fonts/',
            'js' => 'assets/frontend/js/',
        ],
        'bower' => 'bower_components/',
        'build' => 'build/',
        'jasny' => 'assets/jasny_file_upload/',
        'default_event_image' => 'img/default_image/event-icon.jpg',
        'default_male_image' => 'img/default_image/male.jpg',
        'default_female_image' => 'img/default_image/female.jpg',

        //temporary link for static frontend design
        //remove when frontdesign completes
        'design_path'   => 'website/assets/'
    ],
    'performer_path' => [
        'original' => '/images/performer_img/',
        'thumbnail' => '/images/performer_img/thumb/',
    ],
    'admin_user_path' => [
        'original' => '/images/admin_user/',
        'thumbnail' => '/images/admin_user/thumb/',
    ],
    
    'image_folders' => [
        'event' => 'images'.DIRECTORY_SEPARATOR.'events'
    ],

    'site-configuration-keys' => [
        'ADMIN-PAGINATION-LIMIT' => '20',
        'DOMAIN_NAME' => env('DOMAIN_NAME','http://greenguru.sethfinley.com'),
        'EMAIL_ADDRESS' => env('EMAIL_ADDRESS','info@greenguru.sethfinley.com'),
        'FB_LINK' => 'http://facebook.com',
        'PHONE' => '000-000-0000',
        'SENDING_EMAIL' => 'info@sendign-email.com',
        'RECEIVING_EMAIL' => 'info@receiving-email.com',
        'TWITTER_LINK' => 'https://twitter.com',
        'SEO_TITLE' => 'Laravel Quick Start',
        'SEO_DESCRIPTION' => 'Laravel Quick Start helps for quick start of Larvel project.',
        'SEO_KEYWORDS' => 'laravel, laravel 5.1',
        'COMPANY_NAME' => 'Green Guru Ticketing'
    ],

    //social links list

    'social-links'      =>  [
        'facebook'          => [
            'title'                 => 'Facebook',
            'icons'                 => 'fa fa-facebook-square',
        ],
        'twitter'          => [
            'title'                 => 'Twitter',
            'icons'                 => 'fa fa-twitter',
        ],
        'google-plus'          => [
            'title'                 => 'Google+',
            'icons'                 => 'fa fa-google-plus',
        ],
        'github'          => [
            'title'                 => 'Github',
            'icons'                 => 'fa fa-github',
        ],
        'dribble'          => [
            'title'                 => 'Dribble',
            'icons'                 => 'fa fa-dribbble',
        ],
        'behance'          => [
            'title'                 => 'Behance',
            'icons'                 => 'fa fa-behance',
        ],
    ],

    'social-share'         => [
        'facebook'              => 'Facebook',
        'twitter'              => 'Twitter',
    ],


    // these roles won't be considered in GG Application
    'excluded-roles' => ['admins', 'users'],
    //Users Role
    'admin-users-roles' => [
        'super-admin' => [
            'title' => 'Super Admin',
            'key' => 'super-admin',
            'redirect_after_login' => 'admin/dashboard',
        ],
        'support-admin' => [
            'title' => 'Support Admin',
            'key' => 'support-admin',
            'redirect_after_login' => 'admin/dashboard',
        ],
        'promoter-admin' => [
            'title' => 'Promoter Admin',
            'key' => 'promoter-admin',
            'redirect_after_login' => 'admin/dashboard',
        ],
        'promoter-editor' => [
            'title' => 'Promoter Editor',
            'key' => 'promoter-editor',
            'redirect_after_login' => 'admin/dashboard',
        ],
        'venue-admin' => [
            'title' => 'Venue Admin',
            'key' => 'venue-admin',
            'redirect_after_login' => '',
        ],
        'gate-admin' => [
            'title' => 'Gate Admin',
            'key' => 'gate-admin',
            'redirect_after_login' => 'admin/gate-admin',
        ],
        'ticket-user' => [
            'title' => 'Ticket User',
            'key' => 'ticket-user',
            'redirect_after_login' => 'admin/ticket-user',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Media Settings
    |--------------------------------------------------------------------------
    |
    */
    'media' => [
        'media_types' => [
            'image' => [
                'key' => 'image',
            ],
            'video' => [
                'key' => 'video',
            ],
            'document' => [
                'key' => 'document',
            ],
        ],
    ],

    // EVENT
    'fee-type'      => [
        'convenience_fee'    =>  'Convenience Fee',
        'custom_fee'    =>  'Custom Fee'
    ],
    'event_create_build_stage' => [
        'step-1' => 'Step 1',
        'step-2' => 'Step 2',
        'step-3' => 'Step 3',
        'step-4' => 'Step 4',
    ],
    'event_step' => [
        'routes' => [
            'step-1' => [
                'route' => 'admin.event.create.step-1',
                'next-step-route' => 'admin.event.create.step-2',
            ],
            'step-2' => [
                'route' => 'admin.event.create.step-2',
                'next-step-route' => 'admin.event.create.step-3',
            ],
            'step-3' => [
                'route' => 'admin.event.create.step-3',
                'next-step-route' => 'admin.event.create.step-4',
            ],
            'step-4' => [
                'route' => 'admin.event.create.step-4',
                'next-step-route' => '',
            ],
        ],
        'previous_step' => [
            'step-1' => '',
            'step-2' => 'step-1',
            'step-3' => 'step-2',
            'step-4' => 'step-3',
        ],
        'previous_steps' => [
            'step-1' => [],
            'step-2' => ['step-1'],
            'step-3' => ['step-1', 'step-2'],
            'step-4' => ['step-1', 'step-2', 'step-3'],
        ],
        'next_step' => [
            'step-1' => 'step-2',
            'step-2' => 'step-3',
            'step-3' => 'step-4',
            'step-4' => '',
        ],
        'next_steps' => [
            'step-1' => ['step-2', 'step-3', 'step-4'],
            'step-2' => ['step-3', 'step-4'],
            'step-3' => ['step-4'],
            'step-4' => [],
        ],
        // possible built stages to reverse back step
        'can_back_to' => [
            'step-1' => ['step-1', 'step-2', 'step-3'],
            'step-2' => ['step-2', 'step-3'],
            'step-3' => ['step-3'],
            'step-4' => [],
        ],
        'next_step_token_length' => 26,
    ],
    'event_next_step_token_lengthBKP' => 26,

    /*
     * ----------------------------------------------------------------------
     * Ticket Act Type
     * ----------------------------------------------------------------------
     * All performer act type is here
     */
    
    /*
     * ---------------------------------------------------------------------
     * Payment method
     * ----------------------------------------------------------------------
     */
    'payment_using'     =>  [
        'stripe'        =>  'Stripe',
    ],

    'performer_act_type'    =>  [
        'main'          =>  'Main',
        'secondary'     =>  'Secondary'
    ],

];