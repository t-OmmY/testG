<?php
/**
 * Created by PhpStorm.
 * User: dkrasnykh
 * Date: 2/26/19
 * Time: 19:36
 */

namespace common\repositories;

use common\models\Phone;

class PhoneRepository
{
    /**
     * @param string $value
     * @param int $user_id
     * @return integer
     */
    public function create(string $value, int $user_id) :int
    {
        $phone = new Phone();
        $phone->value = $value;
        $phone->client_id = $user_id;
        $phone->save();
        return $phone->id;
    }
}
