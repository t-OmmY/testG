<?php
/**
 * Created by PhpStorm.
 * User: dkrasnykh
 * Date: 2/26/19
 * Time: 19:36
 */

namespace common\repositories;

use common\models\Client;

class ClientRepository
{
    /**
     * @param string $firstName
     * @param string $lastName
     * @return int
     */
    public function create(string $firstName, string $lastName) :int
    {
        $client = new Client();
        $client->firstName = $firstName;
        $client->lastName = $lastName;
        $client->save();
        return $client->id;
    }

    /**
     * @param $id
     * @return Client|null
     */
    public function findModel($id)
    {
        return $model = Client::findOne($id);
    }
}