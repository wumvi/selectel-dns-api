<?php
declare(strict_types=1);

namespace Wumvi\DnsApi\Model;

class DomainInfo
{
    private $raw;

    public function __construct(array $raw)
    {
        $this->raw = $raw;
    }

    public function getId(): int
    {
        return $this->raw['id'];
    }

    public function getCreateDate(): int
    {
        return $this->raw['create_date'];
    }

    public function getChangeDate(): int
    {
        return $this->raw['change_date'];
    }

    public function getName(): string
    {
        return $this->raw['name'];
    }

    public function getUserId(): string
    {
        return $this->raw['user_id'];
    }

    /**
     * @return int[]
     */
    public function getTags(): array
    {
        return $this->raw['tags'];
    }
}