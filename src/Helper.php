<?php

namespace Omnipay\Dragonpay;

/**
 * Class Helper
 * @package Omnipay\Dragonpay
 */
class Helper
{
    public static function generateHash($merchantId, $txnId, $amount, $currency, $description, $email, $secretKey)
    {
        $parts = array(
            $merchantId,
            $txnId,
            number_format($amount, 2, '.', ''),
            $currency,
            $description ?? '',
            $email ?? '',
            $secretKey
        );

        $buffer = implode(':', $parts);

        return sha1($buffer);
    }
}