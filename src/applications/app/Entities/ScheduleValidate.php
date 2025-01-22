<?php

namespace Applications\Entities;

use CodeIgniter\Model;

final class ScheduleValidate extends Model
{
    public const TABLE_NAME = 'schedule_validate';

    protected $allowedFields = [
        'id',
        'company_name',
        'company_address',
        'government_name',
        'government_address',
        'duration_validate',
        'validated_start_at',
        'validated_end_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function initialize(): void
    {
        parent::initialize();
        $this->setTable(ScheduleValidate::TABLE_NAME);
    }

    public function getFields(): array
    {
        return $this->allowedFields;
    }

    public function byDeletedNull(): self
    {
        return $this->where('deleted_at', null);
    }

    public function byId(int $id): self
    {
        return $this->where('id', $id);
    }

    public function byPage(?int $page = 1): self
    {
        if ($page < 1) {
            $page = 1;
        }

        return $this->limit(20)->offset($page * 20 - 20);
    }
}
