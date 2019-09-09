<?php
declare(strict_types=1);

namespace Wumvi\DnsApi\Exception;

use Throwable;

class DnsApiException extends \Exception
{
    public const WRONG_JSON = 1;

    private $error;

    public function __construct(string $error, $message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->error = $error;
    }

    public function getError(): string
    {

    }
}