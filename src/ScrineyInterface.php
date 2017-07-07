<?php

namespace Drupal\maxpay;

use Drupal\maxpay\Lib\Component\ButtonBuilder;
use Drupal\maxpay\Lib\Component\RebillBuilder;
use Drupal\maxpay\Lib\Exception\GeneralMaxpayException;

/**
 * Interface ScrineyInterface
 * @package Maxpay
 */
interface ScrineyInterface
{
    /**
     * Method build integration code of pay button
     *
     * @param string $userId User Id in your system
     * @throws GeneralMaxpayException
     * @return ButtonBuilder
     */
    public function buildButton($userId);

    /**
     * Method will return builder which allow to create and send rebill request
     *
     * @param string $billToken
     * @param string $userId
     * @throws GeneralMaxpayException
     * @return RebillBuilder
     */
    public function createRebillRequest($billToken, $userId);

    /**
     * @param string $transactionId
     * @param string $userId
     * @throws GeneralMaxpayException
     * @return mixed[]
     */
    public function stopSubscription($transactionId, $userId);

    /**
     * @param string $transactionId
     * @throws GeneralMaxpayException
     * @return mixed[]
     */
    public function refund($transactionId);

    /**
     * Method for validate callback
     *
     * @param array $data callback data from Maxpay
     * @throws GeneralMaxpayException
     * @return bool
     */
    public function validateCallback(array $data);
}
