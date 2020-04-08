<?php

namespace Omnipay\Dragonpay\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\NotificationInterface;

class DragonpayNotificationResponse extends AbstractResponse implements NotificationInterface
{

    /**
     * Was the transaction successful?
     *
     * @return string Transaction status, one of {@see STATUS_COMPLETED}, {@see #STATUS_PENDING},
     * or {@see #STATUS_FAILED}.
     */
    public function getTransactionStatus()
    {
        return false;
    }

    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        if($this->getData()['status'] == 000) {
            return true;
        }

        return false;
    }

    public function getTransactionReference()
    {
        return $this->getData();
    }


    public function getData()
    {
        return $this->data;
    }

    public function getTransactionId()
    {
        return $this->getData()['refno'];
    }
}