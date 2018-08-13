1. Copy package on project
    - app
    - ...
    - packages
    - ...
2. Update model App/User

<?php

namespace App;

use DavidBase\UserTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    use UserTrait;

    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'active', 'last_login',
    ];

    protected $dates = [
        'last_login'
    ];
}

3. Run php artisan make:auth

4. Open file composer.json add line

    "autoload": {
        "classmap": [
            "database/seeds",
            "database/factories"
        ],
        "psr-4": {
            "App\\": "app/",
            "DavidBase\\": "packages/tungdavid/base/src/"
        }
    },
    
5. Run composer dump-autoload

6. Add config provider to config/app.php

    'providers' => [
        DavidBase\ServiceProvider::class,
    ]
    
7. Run php artisan config:clear

8. Run php artisan davidbase:install
