<?php
declare(strict_types=1);

namespace Wumvi\DnsApi\Records;

interface IRecord
{
    public function getData(): array;

    public function getId(): ?int;
}