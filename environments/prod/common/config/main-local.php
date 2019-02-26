<?php

use common\repositories\ClientRepository;
use common\repositories\PhoneRepository;
use api\modules\v1\services\api\UploadService;

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=yii2advanced',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
        ],
        'rabbitmq' => [
            'class'        => \yii\queue\amqp_interop\Queue::class,
            'as log'       => \yii\queue\LogBehavior::class,
            'driver'       => \yii\queue\amqp_interop\Queue::ENQUEUE_AMQP_LIB,
            'host'         => 'rabbitmq',
            'port'         => 5672,
            'user'         => 'user',
            'password'     => 'user',
            'queueName'    => 'upload',
            'exchangeName' => 'upload',
        ],
        'uploadService' => [
            'class' => UploadService::class,
        ],
        'clientRepository' => [
            'class' => ClientRepository::class,
        ],
        'phoneRepository' => [
            'class' => PhoneRepository::class,
        ],
    ],
];
