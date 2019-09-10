<?php

namespace Wumvi\DnsApi;

interface IManagePtr
{
    public function list(): array;

    public function create(string $ip, string $content): array;

    public function get(int $ptrId): array;

    public function update(int $ptrId, string $ip, string $content): array;

    public function delete(int $ptrId): void;
}