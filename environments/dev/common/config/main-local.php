<?php

use common\repositories\ClientRepository;
use common\repositories\PhoneRepository;
use api\modules\v1\services\api\UploadService;

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=db;dbname=testg',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
