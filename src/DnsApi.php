<?php

namespace Wumvi\DnsApi;

use LightweightCurl\Curl;
use LightweightCurl\Request;

class DnsApi
{
    public const SELECTEL_API = 'https://api.selectel.ru/domains/v1/';
    private $token;
    private $apiUrl;
    private $curl;

    public function __construct(string $token, string $url = self::SELECTEL_API)
    {
        $this->token = $token;
        $this->apiUrl = $url;
        $this->curl = new Curl();
    }

    public function call(string $part, string $method = Request::METHOD_GET, array $requestData = []): array
    {
        $request = new Request();
        $request->setUrl($this->apiUrl . $part);
        $request->setContentType('application/json');
        $request->addHeader('X-Token', $this->token);
        $request->setMethod($method);

        if ($requestData) {
            $request->setData($requestData);
        }

        $rawResponse = $this->curl->call($request);
        if ($rawResponse->getHttpCode() !== 200) {
            throw new DnsApiException('Wrong code of response: ' . $rawResponse->getHttpCode());
        }

        $json = json_decode($rawResponse->getData(), true);
        if (empty($json)) {
            throw new DnsApiException(json_last_error_msg());
        }

        return $json;
    }

    public function getList(): array
    {
        return $this->call('');
    }

    public function addNewDomain(string $name): array
    {
        return $this->call('', Request::METHOD_POST, ['name' => $name]);
    }

    public function removeDomain()
    {

    }
}
