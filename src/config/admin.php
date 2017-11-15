<?php

$nav = [
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
                'style' => 'light',
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
            ]
        ]
    ]
];

return $nav;
