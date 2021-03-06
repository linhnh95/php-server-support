<?php


namespace Urbox\XRequestId\Requests;


class Generator
{
    /**
     * @return string
     */
    public static function generateRequestId()
    {
        return time() . uniqid();
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