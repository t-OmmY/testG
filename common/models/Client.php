<?php

namespace common\models;

use \yii\db\ActiveRecord;

/**
 * Client Model
 */
class Client extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['id'];
    }

    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
            [['firstName', 'lastName'], 'required']
        ];
    }

    public function getPhones()
    {
        return $this->hasMany(Phone::className(), ['client_id' => 'id']);
    }
}
