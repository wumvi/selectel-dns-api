<?php
declare(strict_types=1);

namespace Wumvi\DnsApi\Model;

class SoaModal extends RecordCommonModel
{
    public function getRetry(): int
    {
        return $this->raw['retry'];
    }

    public function getMinimum(): int
    {
        return $this->raw['minimum'];
    }

    public function getRefresh(): int
    {
        return $this->raw['refresh'];
    }

    public function getExpire(): int
    {
        return $this->raw['expire'];
    }

    public function getChangeDate(): int
    {
        return $this->raw['change_date'];
    }

    public function getNs(): string
    {
        return $this->raw['ns'];
    }

    public function getEmail(): string
    {
        return $this->raw['email'];
    }
}
