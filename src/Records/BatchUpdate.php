<?php

namespace Wumvi\DnsApi\Records;

class BatchUpdate
{
    /** @var IRecord[] */
    private $create = [];

    /** @var IRecord[] */
    private $update = [];

    /** @var IRecord[] */
    private $delete = [];

    /**
     * @return IRecord[]
     */
    public function getCreate(): array
    {
        return $this->create;
    }

    /**
     * @param IRecord[] $create
     */
    public function setCreate(array $create): void
    {
        $this->create = $create;
    }

    /**
     * @return IRecord[]
     */
    public function getUpdate(): array
    {
        return $this->update;
    }

    /**
     * @param IRecord[] $update
     */
    public function setUpdate(array $update): void
    {
        $this->update = $update;
    }

    /**
     * @return IRecord[]
     */
    public function getDelete(): array
    {
        return $this->delete;
    }

    /**
     * @param IRecord[] $delete
     */
    public function setDelete(array $delete): void
    {
        $this->delete = $delete;
    }

    public function getData(): array
    {
        $result = [];
        if (!empty($this->create)) {
            $result['create'] = array_map(function ($item) {
                /** @var IRecord $item */
                return $item->getData();
            }, $this->create);
        }

        if (!empty($this->update)) {
            $result['update'] = array_map(function ($item) {
                /** @var IRecord $item */
                $updateData = $item->getData();
                $updateData['id'] = $item->getId();
                return $updateData;
            }, $this->update);
        }

        if (!empty($this->delete)) {
            $result['delete'] = array_map(function ($item) {
                /** @var IRecord $item */
                return ['id' => $item->getId()];
            }, $this->delete);
        }

        return $result;
    }
}
