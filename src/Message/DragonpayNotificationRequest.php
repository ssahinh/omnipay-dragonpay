<?php

namespace Omnipay\Dragonpay\Message;

use Omnipay\Common\Message\ResponseInterface;

class DragonpayNotificationRequest extends DragonpayAbstractRequest
{

    /**
     * Get the raw data array for this message. The format of this varies from gateway to
     * gateway, but will usually be either an associative array, or a SimpleXMLElement.
     *
     * @return mixed
     */
    public function getData()
    {
        $data = array(
            'txnid'     => $this->getTxnid(),
            'refno'     => $this->getRefNo(),
            'status'    => $this->getStatus(),
            'message'   => $this->getMessage(),
            'digest'    => $this->getDigest()
        );

        return $data;
    }

    /**
     * Send the request with specified data
     *
     * @param mixed $data The data to send
     * @return ResponseInterface
     */
    public function sendData($data)
    {
        return new DragonpayNotificationResponse($this, $data);
    }

    public function setTxnid($value)
    {
        return $this->setParameter('txnid', $value);
    }

    public function getTxnid()
    {
        return $this->getParameter('txnid');
    }

    public function setRefNo($value)
    {
        return $this->setParameter('refno', $value);
    }

    public function getRefNo()
    {
        return $this->getParameter('refno');
    }

    public function setStatus($value)
    {
        return $this->setParameter('status', $value);
    }

    public function getStatus()
    {
        return $this->getParameter('status');
    }

    public function setMessage($value)
    {
        return $this->setParameter('message', $value);
    }

    public function getMessage()
    {
        return $this->getParameter('message');
    }

    public function setDigest($value)
    {
        return $this->setParameter('digest', $value);
    }

    public function getDigest()
    {
        return $this->getParameter('digest');
    }
}