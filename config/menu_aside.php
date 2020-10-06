<?php
// Aside menu
return [

    'admin' => [
        // Home
        [
            'title' => 'Home',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg',
            'page' => '/admin/home',
            'new-tab' => false,
        ],

        [
            'section' => 'Master',
        ],
        [
            'title' => 'Admin',
            'root' => true,
            'icon' => 'media/svg/icons/Communication/Shield-user.svg',
            'page' => 'admin/admins',
            'new-tab' => false,
        ],
        [
            'title' => 'User',
            'root' => true,
            'icon' => 'media/svg/icons/General/User.svg',
            'page' => 'admin/users',
            'new-tab' => false,
        ],
    ],

    'user' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg',
            'page' => '/home',
            'new-tab' => false,
        ],

        // Other
        [
            'section' => 'Action',
        ],
        [
            'title' => 'Register',
            'root' => true,
            'icon' => 'media/svg/icons/Shopping/Ticket.svg',
            'page' => '/data',
            'new-tab' => false,
        ],
        [
            'title' => 'Download File',
            'root' => true,
            'icon' => 'media/svg/icons/Text/Bullet-list.svg',
            'page' => '/file',
            'new-tab' => false,
        ],
    ]

];
