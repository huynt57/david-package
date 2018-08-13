1. Update file composer.json

    "repositories": [
        {
            "type": "git",
            "url": "https://github.com/huynt57/david-package"
        }
    ],

2. Run composer require huynt57/david-package:dev-master

3. Update App/User.php use UserTrait

    <?php

    namespace App;

    use DavidBase\UserTrait;
    ...

    class User extends Authenticatable
    {
        use Notifiable;
        use UserTrait;
        
        ...
    }
   

4. Run php artisan davidbase:install

5. Run php artisan make:auth
