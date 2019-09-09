<?php

namespace Wumvi\DnsApi;

interface IManageDomain
{
    public function list(): array;

    public function add(string $domain): array;

    public function get($domain): array;

    public function export(int $domainId): array;

    public function remove(int $domainId): array;
}