<?php
/**
 * Created by PhpStorm.
 * User: dkrasnykh
 * Date: 2/26/19
 * Time: 08:32
 */

namespace api\modules\v1\jobs\api;

use api\modules\v1\dto\api\UploadDTO;
use yii\base\BaseObject;
use yii\queue\JobInterface;

class UploadJob extends BaseObject implements JobInterface
{
    /**
     * @var UploadDTO
     */
    private $uploadDTO;

    public function __construct(UploadDTO $uploadDTO, $config = [])
    {
        $this->uploadDTO = $uploadDTO;
        parent::__construct($config);
    }

    /**
     * @param \yii\queue\Queue $queue
     */
    public function execute($queue): void
    {
        echo 'Upload client job...';

        try {
            $clientId = \Yii::$app->uploadService->processQueue($this->uploadDTO);
            echo('client_id ' . $clientId . PHP_EOL);
        } catch (\Exception $e) {
            echo $e->getMessage() . PHP_EOL;
            \Yii::critical($e->getMessage());
            return;
        }
    }
}
