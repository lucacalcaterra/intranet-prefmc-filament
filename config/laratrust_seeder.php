<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadministrator' => [
            'roles' => 'c,r,u,d',
            'permissions' => 'c,r,u,d',
            'qualifiche' => 'c,r,u,d',
            'permissions' => 'c,r,u,d',
            'reports' => 'c,r,u,d',
            'teams' => 'c,r,u,d',
            'uffici' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'dirigente' => [
            'reports' => 'c,r,u,d,v',
        ],
        'dipendente' => [
            'reports' => 'c,r,u',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        'v' => 'validate'
    ]
];
