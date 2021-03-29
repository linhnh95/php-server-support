<?php


namespace Linhnh95\PhpServerSupport\Exceptions;


class InvalidRequestException extends \InvalidArgumentException
{
    protected $code;
    protected $message = '';

    /**
     * InvalidRequestException constructor.
     * @param null $message
     *
     * @param int $code
     */
    public function __construct($message = null, $code = 400)
    {
        $this->code = $code;
        $this->message = $message ?: 'Bad Request';

        parent::__construct($message, $code);
    }
}