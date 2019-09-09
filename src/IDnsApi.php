<?php

namespace Wumvi\DnsApi;

interface IDnsApi
{
    public function call(
        string $path,
        string $method = 'GET',
        array $requestData = [],
        bool $isRawResponse = false,
        int $successResponse = 200
    ): array;
}