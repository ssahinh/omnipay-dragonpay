<?php

namespace Omnipay\Dragonpay\Message;

use Omnipay\Common\Message\AbstractRequest;

abstract class DragonpayAbstractRequest extends AbstractRequest
{
    public function setMerchantId($value)
    {
        return $this->setParameter('merchantId', $value);
    }


    public function getMerchantId()
    {
        return $this->getParameter('merchantId');
    }

    public function setPassword($value)
    {
        return $this->setParameter('password', $value);
    }

    public function getPassword()
    {
        return $this->getParameter('password');
    }
}
