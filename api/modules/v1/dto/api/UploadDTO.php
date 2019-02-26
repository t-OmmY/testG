<?php
/**
 * Created by PhpStorm.
 * User: dkrasnykh
 * Date: 2/26/19
 * Time: 18:34
 */

namespace api\modules\v1\dto\api;

class UploadDTO
{
    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var string[]
     */
    protected $phoneNumbers;

    /**
     * UploadDTO constructor.
     * @param string $firstName
     * @param string $lastName
     * @param array $phoneNumbers
     */
    public function __construct(string $firstName, string $lastName, array $phoneNumbers)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phoneNumbers = $phoneNumbers;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string[]
     */
    public function getPhoneNumbers(): array
    {
        return $this->phoneNumbers;
    }
}
