<?php

namespace frontend\controllers;

use common\models\Client;
use common\repositories\ClientRepository;
use frontend\models\Search;
use Yii;
use yii\base\Module;
use yii\web\{Controller, NotFoundHttpException};

/**
 * ClientController
 */
class ClientController extends Controller
{
    /**
     * @var ClientRepository
     */
    private $clientRepository;

    /**
     * ClientController constructor.
     * @param string $id
     * @param Module $module
     * @param ClientRepository $clientRepository
     * @param array $config
     */
    public function __construct(string $id, Module $module, ClientRepository $clientRepository, array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->clientRepository = $clientRepository;
    }

    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel    = new Search();
        $dataProvider   = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'   => $searchModel,
            'dataProvider'  => $dataProvider,
        ]);
    }

    /**
     * Finds the Client model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Client the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = $this->clientRepository->findModel($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
