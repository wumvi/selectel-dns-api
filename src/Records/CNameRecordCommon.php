<?php
declare(strict_types=1);

namespace Wumvi\DnsApi\Records;

class CNameRecordCommon extends RecordCommon implements IRecord
{
    public function getData(): array
    {
        return array_merge(['type' => 'CNAME'], $this->getNameContent(), $this->additionalData);
    }
}