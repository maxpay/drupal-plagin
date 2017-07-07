<?php

namespace Drupal\maxpay\Lib\Model;

/**
 * Interface ProductInterface
 * @package Maxpay\Lib\Model
 */
interface ProductInterface
{
    /** @return array */
    public function toHashMap();
}
