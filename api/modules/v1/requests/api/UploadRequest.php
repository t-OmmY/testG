<?php

namespace api\modules\v1\requests\api;

use yii\base\Model;

class UploadRequest extends Model
{
    /**
     * @var string
     */
    public $firstName;

    /**
     * @var string
     */
    public $lastName;

    /**
     * @var string[]
     */
    public $phoneNumbers;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['firstName', 'lastName', 'phoneNumbers'], 'required'],
            [['firstName', 'lastName'], 'string'],
            ['phoneNumbers', 'each', 'rule' => ['string']]
        ];
    }
}
