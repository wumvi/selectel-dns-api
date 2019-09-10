<?php

namespace Wumvi\DnsApi;

use Wumvi\DnsApi\Records\BatchUpdate;
use Wumvi\DnsApi\Records\IRecord;

interface IManageRecord
{
    public function list($domain): array;

    public function create(int $domainId, IRecord $record): array;

    public function update(int $domainId, IRecord $record): array;

    public function delete(int $domainId, string $recordId): void;

    public function multiUpdate(string $domain, BatchUpdate $batchUpdate): array;
}