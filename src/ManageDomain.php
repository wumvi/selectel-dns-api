<?php

namespace Wumvi\DnsApi;

use LightweightCurl\Request;

class ManageDomain implements IManageDomain
{
    private $api;

    public function __construct(IDnsApi $api)
    {
        $this->api = $api;
    }

    /**
     * @return array
     */
    public function list(): array
    {
        return $this->api->call('', Request::METHOD_GET);
    }

    /**
     * @param string $domain
     *
     * @return array
     */
    public function create(string $domain): array
    {
        return $this->api->call('', Request::METHOD_POST, ['name' => $domain]);
    }

    /**
     * @param string|int $domain
     *
     * @return array
     */
    public function get($domain): array
    {
        return $this->api->call($domain, Request::METHOD_GET);
    }

    /**
     * Экспортирует доменную зону
     *
     * @param int $domainId
     *
     * @return array
     */
    public function export(int $domainId): array
    {
        return $this->api->call($domainId . '/export', Request::METHOD_GET, [], true);
    }

    /**
     * @param int $domainId
     *
     * @return array
     */
    public function remove(int $domainId): array
    {
        return $this->api->call($domainId, Request::METHOD_DELETE, [], true, 204);
    }
}
