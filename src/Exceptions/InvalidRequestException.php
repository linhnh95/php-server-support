<?php


namespace Linhnh95\PhpServerSupport\Exceptions;


class InvalidRequestException
{
    /**
     * InvalidRequestException constructor.
     *
     * @param null $message
     * @param int $code
     */
    public function __construct($message = null, $code = 400)
    {
        $msg = $message !== null ? $message : 'Bad Request';
        if (class_exists('Artisan')) {
            abort($code, $msg);
        }else{
            throw new \InvalidArgumentException($msg, $code);
        }
    }
}