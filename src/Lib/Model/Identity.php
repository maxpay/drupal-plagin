<?php

namespace Drupal\maxpay\Lib\Model;

use Drupal\maxpay\Lib\Exception\GeneralMaxpayException;
use Drupal\maxpay\Lib\Util\Validator;

/**
 * Class Identity
 * @package Maxpay\Lib\Model
 */
class Identity implements IdentityInterface
{
    /** @var string */
    private $publicKey;

    /** @var string */
    private $privateKey;

    /**
     * @param $publicKey
     * @param $privateKey
     * @throws GeneralMaxpayException
     */
    public function __construct($publicKey, $privateKey)
    {
        $validator = new Validator();
        $this->publicKey = $validator->validateString('publicKey', $publicKey);
        $this->privateKey = $validator->validateString('privateKey', $privateKey);
    }

    /** @return string */
    public function getPublicKey()
    {
        return $this->publicKey;
    }

    /** @return string */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }
}
