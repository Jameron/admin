<?php

$nav = [
    'theme' => 'dark',
    'nav' => [
        'logged_out' => [
            'logo' => [
                'image' => 'images/logo.svg',
                'class' => 'logo',
                'route' => '/'
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
                'show' => true,
                'buttons' => [
                   [
                       'title' => 'Dashboard',
                       'route' => 'dash' 
                   ]
               ]
           ]
       ]
    ]
];

if(file_exists(base_path() . '/vendor/jameron/regulator/') && isset($nav['side_nav']['roles']['admin'])) { 
    array_push($nav['side_nav']['roles']['admin']['buttons'], ['title'=>'Users','route'=>'admin/users']);
    array_push($nav['side_nav']['roles']['admin']['buttons'], ['title'=>'Roles','route'=>'admin/roles']);
    array_push($nav['side_nav']['roles']['admin']['buttons'], ['title'=>'Permissions','route'=>'admin/permissions']);
}

if(file_exists(base_path() . '/vendor/jameron/invitations/') && isset($nav['side_nav']['roles']['admin'])) {
    array_push($nav['side_nav']['roles']['admin']['buttons'], ['title'=>'Invitations','route'=>'admin/invitations']);
}

return $nav;
