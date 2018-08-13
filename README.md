# User Role Permission

[![N|Solid](http://ishopgo.com/isg/img/logo.png)](http://ishopgo.com/)

### Installation

Update file composer.json

```sh
"repositories": [
    {
        "type": "git",
        "url": "https://github.com/huynt57/david-package"
    }
],
```

Run composer require

```sh
composer require huynt57/david-package:dev-master
```

Add UserTrait.php to App/User.php
```sh
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
```

Run artisan

```sh
php artisan davidbase:install
php artisan make:auth
```



License
----

IshopGo Dev Team 2018


**IshopGo VietNam**
