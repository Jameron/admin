<?php

$theme = [
    'image' => [
        'width' => 1265,
        'height' => 550
    ],
    'nav' => [
        'logo' => 'images/logo.svg',
        'logo_link' => 'admin',
        'style' => 'light',
        'left' => [
            'loggedout' => [
                'list' => []
            ],
            'loggedin' => [
                'list' => [
                    [
                        'title' => 'Home',
                        'url'   =>  'admin',
                    ],
                ]
            ]
        ],
        'right' => [
            'loggedout' => [
                'list' => [
                    [
                        'title' => 'Login',
                        'url'   =>  'login',
                    ]
                ]
            ],
            'loggedin' => [
                'list' => [
                    [
                        'title' => 'auth.name',
                        'list' => [
                            [
                                'title' => 'Settings',
                                'href' => 'admin/settings',
                                'onclick' => ''
                            ],
                            [],
                            [
                                'title' => 'Logout',
                                'href' => 'logout',
                                'onclick' => 'event.preventDefault();document.getElementById(\'logout-form\').submit();',
                                'logoutForm' => true
                            ],
                        ]
                    ],
                ]
            ]
        ]
    ]
];

return $theme;
