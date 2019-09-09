<?php
declare(strict_types=1);

namespace Wumvi\DnsApi\Records;

class ARecordCommon extends RecordCommon implements IRecord
{
    public function getData(): array
    {
        return array_merge(['type' => 'A'], $this->getNameContent(), $this->additionalData);
    }
}