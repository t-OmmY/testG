<?php

namespace frontend\models;

use common\models\Client;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Search
 */
class Search extends Client
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstName', 'lastName'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Client::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        $query->joinWith('phones');

        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere(['like', 'firstName', $this->firstName])
              ->andFilterWhere(['like', 'lastName', $this->lastName]);

        return $dataProvider;
    }
}
