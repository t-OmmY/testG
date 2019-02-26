<?php

namespace api\modules\v1\actions\api;

use api\modules\v1\requests\api\UploadRequest;
use api\modules\v1\services\api\UploadService;
use yii\base\Action;
use yii\base\Controller;
use Yii;
use yii\helpers\Json;
use yii\web\BadRequestHttpException;

class UploadAction extends Action
{
    /**
     * @var UploadRequest
     */
    private $request;

    /**
     * @var UploadService
     */
    private $uploadService;

    /**
     * UploadAction constructor.
     * @param $id
     * @param Controller $controller
     * @param UploadRequest $request
     * @param UploadService $uploadService
     * @param array $config
     */
    public function __construct($id, Controller $controller, UploadRequest $request, UploadService $uploadService, array $config = [])
    {
        $this->request = $request;
        $this->uploadService = $uploadService;
        parent::__construct($id, $controller, $config);
    }

    /**
     * @inheritdoc
     * @return UploadRequest|string
     * @throws BadRequestHttpException
     * @throws \yii\base\InvalidConfigException
     */
    public function run()
    {
        $this->request->load(Json::decode(Yii::$app->getRequest()->getRawBody()), '');

        if (!$this->request->validate()) {
            return $this->request;
        }

        return $this->uploadService->processRequest($this->request);
    }
}
