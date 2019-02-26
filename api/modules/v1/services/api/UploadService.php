<?php
/**
 * Created by PhpStorm.
 * User: dkrasnykh
 * Date: 2/26/19
 * Time: 18:49
 */
namespace api\modules\v1\services\api;

use api\modules\v1\dto\api\UploadDTO;
use api\modules\v1\jobs\api\UploadJob;
use api\modules\v1\requests\api\UploadRequest;
use Throwable;
use yii\web\BadRequestHttpException;

class UploadService
{
    /**
     * @param UploadRequest $uploadRequest
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function processRequest(UploadRequest $uploadRequest)
    {
        try {
            return \Yii::$app->rabbitmq->push(new UploadJob($this->createUploadDTO($uploadRequest)));
        } catch (\Exception $e) {
            throw new BadRequestHttpException($e->getMessage(), 0, $e);
        }
    }

    /**
     * @param UploadDTO $uploadDTO
     * @return null|int
     * @throws Throwable
     */
    public function processQueue(UploadDTO $uploadDTO): int
    {
        $transaction = \Yii::$app->db->beginTransaction();
        try {
            $clientId = \Yii::$app->clientRepository->create($uploadDTO->getFirstName(), $uploadDTO->getLastName());
            foreach ($uploadDTO->getPhoneNumbers() as $phoneNumber) {
                \Yii::$app->phoneRepository->create($phoneNumber, $clientId);
            }
            //todo here I need to index data to elastic search service
            $transaction->commit();
        } catch (\Exception $e) {
            $transaction->rollBack();
            throw $e;
        } catch (Throwable $e) {
            $transaction->rollBack();
            throw $e;
        }
        return $clientId;
    }

    /**
     * @param UploadRequest $uploadRequest
     * @return UploadDTO
     */
    private function createUploadDTO (UploadRequest $uploadRequest): UploadDTO
    {
        return new UploadDTO($uploadRequest->firstName, $uploadRequest->lastName, $uploadRequest->phoneNumbers);
    }
}
