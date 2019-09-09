<?php

namespace Wumvi\DnsApi\Records;

abstract class RecordCommon implements IRecord
{
    protected $name;
    protected $content;
    protected $id;
    protected $additionalData;

    public function __construct(string $name, string $content, ?int $id = null, array $additionalData = [])
    {
        $this->name = $name;
        $this->content = $content;
        $this->id = $id;
        $this->setAdditionalData($additionalData);
    }

    protected function getNameContent(): array
    {
        return [
            'name' => $this->name,
            'content' => $this->content
        ];
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setAdditionalData(array $data)
    {
        $this->additionalData = $data;
    }
}
