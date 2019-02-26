<?php

namespace api\modules\v1\controllers;

use api\modules\v1\actions\api\UploadAction;
use yii\rest\Controller;

/**
 * Client Controller API
 */
class ClientController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'upload'           => [
                'class' => UploadAction::class,
            ],
        ];
    }
}
