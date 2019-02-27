<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template</h1>
    <br>
</p>


To start project localy:

- Clone git repository
- add **127.0.0.1   api.testg.loc** to /etc/hosts (its for API)
- add **127.0.0.1   testg.loc** to /etc/hosts (its for Frontend)
- create **.env** file (use **.env.example** as example)
- in console in project folder run **docker-compose up -d**
- in console in project folder run **docker-compose exec php bash** (now you get php container)
- in container run **composer install**
- in container run **php init**
- in container run **./yii migrate**
- in container run **./yii rabbitmq/listen**

*Now your application ready to work*

All you need is to start send POST requests to *http://api.testg.loc:72/api/v1/clients/upload*
You can see loader clients on *http://testg.loc:72*

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
api
    config/              contains api configurations
    modules/             contains api-specific modules
    runtime/             contains files generated during runtime
    web/                 contains the entry script and Web resources
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
