<?php

namespace Omnipay\Dragonpay;

use Omnipay\Common\AbstractGateway;

/**
 * @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface capture(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface completePurchase(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface refund(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface void(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface createCard(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface updateCard(array $options = array())
 * @method \Omnipay\Common\Message\RequestInterface deleteCard(array $options = array())
 */
class ClientGateway extends AbstractGateway
{

    /**
     * Get gateway display name
     *
     * This can be used by carts to get the display name for each gateway.
     * @return string
     */
    public function getName()
    {
        return 'Dragonpay';
    }

    public function getDefaultParameters()
    {
        return array (
            'currency'      => 'USD',
        );
    }

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

    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Dragonpay\Message\DragonpayAuthorizeRequest', $parameters);
    }

    public function acceptNotification(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Dragonpay\Message\DragonpayNotificationRequest', $parameters);
    }

    public function purchase(array $parameters = array())
    {
        return $this->authorize($parameters);
    }

}