<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Конвертер URL в QR и короткую ссылку</h1>
    <br>
</p>

- Сервис коротких ссылок + QR

-  стек: Yii2  MySQL jQuery  Bootstrap 
 

-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      migrations/         contains migrations
      mail/               contains view files for e-mails
      services/           contains services class
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP mysql:8.0.


Запуск
------------

### Install via Composer


запустить компосер

~~~
composer update or install
~~~

### Install with Docker  
    
Start the container
---
    docker-compose up --build -d
    
You can then access the application through the following URL:

    http://localhost:8000


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=db;dbname=yii2basic',
    'username' => 'yii2',
    'password' => 'yii2',
    'charset' => 'utf8',
];
```

## Migration


```php
docker-compose exec php bash

php yii migrate --migrationPath=@yii/rbac/migrations
php yii migrate --migrationPath=@mdm/admin/migrations

```

```php
php yii migrate
```

