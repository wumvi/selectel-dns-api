<?php

namespace Wumvi\DnsApi\Model;

class RecordCommonModel
{
    protected $raw;

    public function __construct(array $raw)
    {
        $this->raw = $raw;
    }

    public function getContent(): string
    {
        return $this->raw['content'];
    }

    public function getTtl(): int
    {
        return $this->raw['ttl'];
    }

    public function getType(): string
    {
        return $this->raw['type'];
    }

    public function getId(): int
    {
        return $this->raw['id'];
    }

    public function getName(): string
    {
        return $this->raw['name'];
    }
}
