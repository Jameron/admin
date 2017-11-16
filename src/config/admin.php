<?php

$nav = [
    'theme' => 'dark',
    'sign_in_view' => [
        'heading' => 'Sign In.',
        'logo' => [
            'image' => 'images/logo.svg',
            'class' => 'img-fluid',
            'route' => null,
            'alt' => 'Company logo'
        ]
    ],
    'nav' => [
        'logged_out' => [
            'logo' => [
                'image' => 'images/logo.svg',
                'class' => 'logo',
                'route' => '/',
                'alt' => 'Company logo'
            ],
            'style' => 'light',
            'left' => [
                'list' => []
            ],
            'right' => [
                'list' => [
                    [
                        'title' => 'Login',
                        'route'   =>  'login',
                    ],
                    [
                        'title' => 'Sign Up',
                        'route'   =>  'register',
                    ]
                ]
            ]
        ],
        'roles' => [
            'admin' => [
                'logo' => [
                    'image' => 'images/logo.svg',
                    'class' => 'logo',
                    'route' => 'admin'
                ],
                'style' => 'dark',
                'left' => [
                    'list' => [
                        [
                            'title' => 'Home',
                            'route'   =>  'admin',
                        ],
                    ]
                ],
                'right' => [
                    'list' => [
                        [
                            'title' => 'auth.name',
                            'list' => [
                                [
                                    'title' => 'Settings',
                                    'route' => 'admin/settings',
                                    'onclick' => ''
                                ],
                                [],
                                [
                                    'title' => 'Logout',
                                    'route' => 'logout',
                                    'onclick' => 'event.preventDefault();document.getElementById(\'logout-form\').submit();',
                                    'logoutForm' => true
                                ],
                            ]
                        ],
                    ]
                ]
            ],
            'user' => [
                'logo' => [
                    'image' => 'images/logo.svg',
                    'class' => 'logo',
                    'route' => 'dash'
                ],
                'style' => 'dark',
                'left' => [
                    'list' => [
                        [
                            'title' => 'Home',
                            'route'   =>  'dash',
                        ],
                    ]
                ],
                'right' => [
                    'list' => [
                        [
                            'title' => 'auth.name',
                            'list' => [
                                [
                                    'title' => 'Settings',
                                    'route' => 'admin/settings',
                                    'onclick' => ''
                                ],
                                [],
                                [
                                    'title' => 'Logout',
                                    'route' => 'logout',
                                    'onclick' => 'event.preventDefault();document.getElementById(\'logout-form\').submit();',
                                    'logoutForm' => true
                                ],
                            ]
                        ],
                    ]
                ]
            ]
        ]
    ],
    'side_nav' => [
        'roles' => [
            'admin' => [
                'theme' => 'dark',
                'show' => true,
                'buttons' => [
                   [
                       'title' => 'Dashboard',
                       'route' => 'dash',
                       'order' => 1 
                   ]
               ]
           ]
       ]
    ]
];

if(file_exists(base_path() . '/vendor/jameron/regulator/') && isset($nav['side_nav']['roles']['admin'])) { 
    array_push($nav['side_nav']['roles']['admin']['buttons'], ['title'=>'Users','route'=>'admin/users','order'=>2]);
    array_push($nav['side_nav']['roles']['admin']['buttons'], ['title'=>'Roles','route'=>'admin/roles','order'=>3]);
    array_push($nav['side_nav']['roles']['admin']['buttons'], ['title'=>'Permissions','route'=>'admin/permissions','order'=>4]);
}

if(file_exists(base_path() . '/vendor/jameron/invitations/') && isset($nav['side_nav']['roles']['admin'])) {
    array_push($nav['side_nav']['roles']['admin']['buttons'], ['title'=>'Invitations','route'=>'admin/invitations','order'=>5]);
}

function sortOrder($x,$y) {

    if ($x['order']>$y['order']){
        return true;
    } else if ($x['order']<$y['order']){
        return false;
    } else {
        return 0;
    }

}

usort($nav['side_nav']['roles']['admin']['buttons'], 'sortOrder');

return $nav;
