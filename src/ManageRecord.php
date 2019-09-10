<?php

namespace Wumvi\DnsApi;

use LightweightCurl\Request;
use Wumvi\DnsApi\Model\CNameModal;
use Wumvi\DnsApi\Model\NsModal;
use Wumvi\DnsApi\Model\SoaModal;
use Wumvi\DnsApi\Model\TxtModal;
use Wumvi\DnsApi\Records\BatchUpdate;
use Wumvi\DnsApi\Records\IRecord;

class ManageRecord implements IManageRecord
{
    private $api;

    public function __construct(IDnsApi $api)
    {
        $this->api = $api;
    }

    /**
     * @param string|int $domain
     *
     * @return array
     */
    public function list($domain): array
    {
        return $this->api->call($domain . '/records/', Request::METHOD_GET);
    }

    /**
     * @param int $domainId
     * @param IRecord $record
     *
     * @return array
     */
    public function create(int $domainId, IRecord $record): array
    {
        return $this->api->call(
            $domainId . '/records/',
            Request::METHOD_POST,
            $record->getData()
        );
    }

    /**
     * @param int $domainId
     * @param IRecord $record
     *
     * @return array
     */
    public function update(int $domainId, IRecord $record): array
    {
        return $this->api->call(
            $domainId . '/records/' . $record->getId(),
            Request::METHOD_PUT,
            $record->getData()
        );
    }

    /**
     * @param int $domainId
     * @param string $recordId
     */
    public function delete(int $domainId, string $recordId): void
    {
        $this->api->call(
            $domainId . '/records/' . $recordId,
            Request::METHOD_DELETE,
            [],
            true,
            204
        );
    }

    public function multiUpdate(string $domain, BatchUpdate $batchUpdate): array
    {
        return $this->api->call(
            $domain . '/records/batch_update',
            'PATCH',
            $batchUpdate->getData()
        );
    }

    /**
     * @param array $raw
     * @return CNameModal|NsModal|SoaModal|TxtModal|null
     */
    public static function convertToModel(array $raw)
    {
        switch ($raw['type']) {
            case 'CNAME':
                return new CNameModal($raw);
            case 'SOA':
                return new SoaModal($raw);
            case 'NS':
                return new NsModal($raw);
            case 'TXT':
                return new TxtModal($raw);
            default:
                return null;
        }
    }
}
