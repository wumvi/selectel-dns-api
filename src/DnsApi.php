<?php
declare(strict_types=1);

namespace Wumvi\DnsApi;

use LightweightCurl\ContentType;
use LightweightCurl\Curl;
use LightweightCurl\Request;
use Wumvi\DnsApi\Exception\DnsApiException;

class DnsApi implements IDnsApi
{
    public const RESPONSE_SUCCESS_CODE = 200;
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

    public function call(
        string $path,
        string $method = Request::METHOD_GET,
        array $requestData = [],
        bool $isRawResponse = false,
        int $successResponse = self::RESPONSE_SUCCESS_CODE
    ): array {
        $request = new Request();
        $request->setUrl($this->apiUrl . $path);
        $request->setContentType(ContentType::JSON);
        $request->addHeader('X-Token', $this->token);
        $request->addHeader('Expect', '');
        $request->setMethod($method);
        // $request->setFlagVerbose(true);

        if (!empty($requestData)) {
            $request->setData(json_encode($requestData));
        }

        $response = $this->curl->call($request);
        if ($response->getHttpCode() !== $successResponse) {
            throw new DnsApiException($response->getData(), 'Wrong code of response: ' . $response->getHttpCode());
        }

        if ($isRawResponse) {
            return ['raw' => $response->getData()];
        }

        $json = json_decode($response->getData(), true);
        if (empty($json)) {
            throw new DnsApiException('', json_last_error_msg(), DnsApiException::WRONG_JSON);
        }

        return $json;
    }
}
