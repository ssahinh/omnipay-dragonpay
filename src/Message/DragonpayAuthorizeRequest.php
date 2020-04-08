<?php

namespace Omnipay\Dragonpay\Message;


use Omnipay\Common\Message\ResponseInterface;
use Omnipay\Dragonpay\Helper;

class DragonpayAuthorizeRequest extends DragonpayAbstractRequest
{

    /**
     * Get the raw data array for this message. The format of this varies from gateway to
     * gateway, but will usually be either an associative array, or a SimpleXMLElement.
     *
     * @return mixed
     */
    public function getData()
    {
        $data = array (
            'merchantId'    => $this->getMerchantId(),
            'txnid'         => $this->getTxnid(),   // TXNID => Transaction idenfitify
            'amount'        => number_format($this->getAmount(), '2', '.', ''),
            'ccy'           => $this->getCurrency() ?? '',
            'description'   => $this->getDescription() ?? '',
            'email'         => $this->getEmail() ?? '',
        );

        $data['digest'] = Helper::generateHash(
            $this->getMerchantId(),
            $this->getTxnid(),
            $this->getAmount(),
            $this->getCurrency(),
            $this->getDescription(),
            $this->getEmail(),
            $this->getPassword()
        );

        return $data;
    }


    private function validateData()
    {
        $this->validate(
            'merchantId',
            'txnid',
            'amount',
            'ccy',
            'description',
            'email',
            'digest'
        );
    }


    /**
     * Send the request with specified data
     *
     * @param mixed $data The data to send
     * @return ResponseInterface
     */
    public function sendData($data)
    {
        return $this->response = new DragonpayAuthorizeResponse($this, $data);
    }

    public function setTxnid($value)
    {
        return $this->setParameter('txnid', $value);
    }

    public function getTxnid()
    {
        return $this->getParameter('txnid');
    }

    public function setAmount($value)
    {
        return $this->setParameter('amount', $value);
    }

    public function getAmount()
    {
        return $this->getParameter('amount');
    }

    public function setEmail($value)
    {
        return $this->setParameter('email', $value);
    }

    public function getEmail()
    {
        return $this->getParameter('email');
    }


}