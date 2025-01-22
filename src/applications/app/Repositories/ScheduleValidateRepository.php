<?php

namespace Applications\Repositories;

use Applications\Entities\ScheduleValidate;
use Applications\Repositories\Interfaces\ScheduleValidateRepositoryInterface;
use LogicException;

final readonly class ScheduleValidateRepository implements ScheduleValidateRepositoryInterface
{
    public function __construct(
        private ScheduleValidate $scheduleValidate,
    ) {

    }

    public function findAll(): array
    {
        return $this->scheduleValidate->byDeletedNull()->findAll();
    }

    public function findByPage(?int $page): array
    {
        return $this->scheduleValidate->byPage($page)->byDeletedNull()->find();
    }

    public function findAllCount(): int|string
    {
        return $this->scheduleValidate->byDeletedNull()->countAllResults();
    }

    public function save(ScheduleValidate $scheduleValidate): void
    {
        if ($scheduleValidate->insert() === false) {
            throw new LogicException();
        };
    }

    public function update(ScheduleValidate $scheduleValidate): void
    {
        $scheduleValidate->byId($scheduleValidate->tempData['data']['id']);
        if ($scheduleValidate->update() === false) {
            throw new LogicException();
        };
    }
}
