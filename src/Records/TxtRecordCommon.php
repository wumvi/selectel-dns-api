<?php
declare(strict_types=1);

namespace Wumvi\DnsApi\Records;

class TxtRecordCommon extends RecordCommon implements IRecord
{
    public function getData(): array
    {
        return array_merge(['type' => 'TXT'], $this->getNameContent(), $this->additionalData);
    }
}