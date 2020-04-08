<?php

namespace Omnipay\Dragonpay\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

class DragonpayAuthorizeResponse extends AbstractResponse implements RedirectResponseInterface
{
    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        return false;
    }

    public function isRedirect()
    {
        return true;
    }


    public function getRedirectMethod()
    {
        return 'GET';
    }


    public function getRedirectData()
    {
        return $this->data;
    }

    public function getRedirectUrl()
    {
        return 'https://test.dragonpay.ph/Pay.aspx'. '?' .http_build_query($this->getRedirectData(), '', '&');
    }
}