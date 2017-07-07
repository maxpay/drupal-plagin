<?php

namespace Drupal\maxpay\Lib\Util;

use Drupal\maxpay\Lib\Exception\GeneralMaxpayException;

/**
 * Interface ClientInterface
 * @package Maxpay\Lib\Util
 */
interface ClientInterface
{
    /**
     * @param mixed[] $data
     * @throws GeneralMaxpayException
     * @return mixed[]
     */
    public function send(array $data);
}
