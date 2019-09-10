<?php

namespace Wumvi\DnsApi;

use LightweightCurl\Request;

class ManagePtr implements IManagePtr
{
    private $api;

    public function __construct(IDnsApi $api)
    {
        $this->api = $api;
    }

    /**
     *
     * @return array
     */
    public function list(): array
    {
        return $this->api->call('/ptr/', Request::METHOD_GET);
    }

    /**
     * @param string $ip
     * @param string $content
     *
     * @return array
     */
    public function create(string $ip, string $content): array
    {
        return $this->api->call(
            '/ptr/',
            Request::METHOD_POST,
            ['ip' => $ip, 'content' => $content]
        );
    }

    public function get(int $ptrId): array
    {
        return $this->api->call('/ptr/' . $ptrId, Request::METHOD_GET);
    }


    /**
     * @param int $ptrId
     * @param string $ip
     * @param string $content
     * @return array
     */
    public function update(int $ptrId, string $ip, string $content): array
    {
        return $this->api->call(
            '/ptr/' . $ptrId,
            Request::METHOD_PUT,
            ['ip' => $ip, 'content' => $content]
        );
    }

    /**
     * @param int $ptrId
     */
    public function delete(int $ptrId): void
    {
        $this->api->call(
            '/ptr/' . $ptrId,
            Request::METHOD_DELETE
        );
    }
}
