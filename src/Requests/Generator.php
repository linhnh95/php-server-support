<?php


namespace Linhnh95\PhpServerSupport\Requests;


class Generator
{
    /**
     * @param $requestName
     */
    public function generateRequestId($requestName)
    {
        $requestValue = time() . uniqid();
        header($requestName . ': ' . $requestValue);
    }
}