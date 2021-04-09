<?php


namespace Urbox\XRequestId\Requests;


class Validator
{
    /**
     * @param $requestName
     *
     * @return bool
     */
    public function validateRequestName($requestName)
    {
        return is_string($requestName) && $requestName != '';
    }

    /**
     * @param $requestName
     *
     * @return bool
     */
    public function isRequestValid($requestName)
    {
        $headers = getallheaders();
        return isset($headers[$requestName]);
    }
}