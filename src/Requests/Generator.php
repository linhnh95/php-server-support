<?php


namespace Linhnh95\PhpServerSupport\Requests;


class Generator
{
    /**
     * @param $requestName
     */
    public static function generateRequestId($requestName)
    {
        $requestValue = time() . uniqid();
        header($requestName . ': ' . $requestValue);
    }

    /**
     * @param $requestName
     * @param $value
     */
    public function assignRequestId($requestName, $value)
    {
        header($requestName . ': ' . $value);
    }
}