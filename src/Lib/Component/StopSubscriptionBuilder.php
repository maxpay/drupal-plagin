<?php

namespace Drupal\maxpay\Lib\Component;

use Drupal\maxpay\Lib\Exception\GeneralMaxpayException;
use Drupal\maxpay\Lib\Model\IdentityInterface;
use Drupal\maxpay\Lib\Util\ClientInterface;
use Drupal\maxpay\Lib\Util\CurlClient;
use Drupal\maxpay\Lib\Util\SignatureHelper;
use Drupal\maxpay\Lib\Util\Validator;
use Drupal\maxpay\Lib\Util\ValidatorInterface;
use Drupal\maxpay\Psr\Log\LoggerInterface;

/**
 * Class StopSubscriptionBuilder
 * @package Maxpay\Lib\Component
 */
class StopSubscriptionBuilder extends BaseBuilder
{
    /** @var string */
    private $action = 'api/cancel';

    /** @var IdentityInterface */
    private $identity;

    /** @var ValidatorInterface */
    private $validator;

    /** @var LoggerInterface */
    private $logger;

    /** @var string */
    private $baseHost;

    /** @var string */
    private $userId;

    /** @var string */
    private $transactionId;

    /** @var ClientInterface */
    private $client;

    /** @var SignatureHelper */
    private $signatureHelper;

    /**
     * @param IdentityInterface $identity
     * @param string $userId
     * @param string $transactionId
     * @param LoggerInterface $logger
     * @param string $baseHost
     */
    public function __construct(
        IdentityInterface $identity,
        $userId,
        $transactionId,
        LoggerInterface $logger,
        $baseHost
    ) {
        parent::__construct($logger);

        $this->validator = new Validator();
        $this->identity = $identity;
        $this->logger = $logger;
        $this->userId = $this->validator->validateString('userId', $userId);
        $this->transactionId = $this->validator->validateString('transactionId', $transactionId);
        $this->baseHost = $baseHost;
        $this->client = new CurlClient($this->baseHost . $this->action, $logger);
        $this->signatureHelper  = new SignatureHelper();

        $this->logger->info('Stop subscription builder successfully initialized');
    }

    /**
     * @return array
     * @throws GeneralMaxpayException
     */
    public function send()
    {
        $data = [
            'uniqueUserId' => $this->userId,
            'transactionId' => $this->transactionId,
            'publicKey' => $this->identity->getPublicKey()
        ];

        $data['signature'] = $this->signatureHelper->generate(
            $data,
            $this->identity->getPrivateKey(),
            true
        );

        return $this->prepareAnswer($this->client->send($data));
    }
}
