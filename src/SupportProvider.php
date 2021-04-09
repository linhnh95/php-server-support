<?php


namespace Urbox\XRequestId;


use Urbox\XRequestId\Exceptions\InvalidRequestException;
use Urbox\XRequestId\Requests\Generator;
use Urbox\XRequestId\Requests\Validator;

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
                throw new InvalidRequestException('Request Id không hợp lệ', 400);
            }
        }
        if (!$validator->isRequestValid($requestName)) {
            throw new InvalidRequestException('Request Id không hợp lệ', 400);
        }
        $allHeaders = getallheaders();
        $value = $allHeaders[$requestName];
        $generator->assignRequestId($requestName, $value);
    }
}