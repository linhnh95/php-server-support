<?php


namespace Linhnh95\PhpServerSupport;


use Linhnh95\PhpServerSupport\Exceptions\InvalidRequestException;
use Linhnh95\PhpServerSupport\Requests\Generator;
use Linhnh95\PhpServerSupport\Requests\Validator;

class SupportProvider
{

    /**
     * SupportProvider constructor.
     * @param string $requestName
     * @throws InvalidRequestException
     */
    public function __construct($requestName = 'X-Request-Id')
    {
        $generator = new Generator();
        $validator = new Validator();
        if (!$validator->validateRequestName($requestName)) {
            if (class_exists('Artisan')) {
                if (function_exists('env')) {
                    $requestName = env('REQUEST_HEADER_ID', 'X-Request-Id');
                } else {
                    $requestName = 'X-Request-Id';
                }
            } else {
                new InvalidRequestException('Request Id không hợp lệ', 400);
            }
        }
        if (!$validator->isRequestValid($requestName)) {
            new InvalidRequestException('Request Id không hợp lệ', 400);
        }
        $generator->generateRequestId($requestName);
        $generator->generateRequestId($requestName);
    }
}