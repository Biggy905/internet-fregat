<?php

namespace Applications\Services;

use Applications\Entities\ScheduleValidate;
use Applications\Forms\CreateScheduleValidateForm;
use Applications\Forms\DeleteScheduleValidateForm;
use Applications\Forms\UpdateScheduleValidateForm;
use Applications\Helpers\CalculationDayHelper;
use Applications\Repositories\ScheduleValidateRepository;
use CodeIgniter\Database\RawSql;
use CodeIgniter\Exceptions\PageNotFoundException;
use DateTimeImmutable;

final readonly class ScheduleValidateServices
{
    public function __construct(
        private ScheduleValidateRepository $scheduleValidateRepository
    ) {

    }

    public function list(?int $page = 1): array
    {
        $scheduleValidate = $this->scheduleValidateRepository->findByPage($page);
        if ($page > 1 && empty($scheduleValidate)) {
            throw new PageNotFoundException('Страница не найдена');
        }

        return $scheduleValidate;
    }

    public function fullList(): array
    {
        return $this->scheduleValidateRepository->findAll();
    }

    public function countList(): int|string
    {
        return $this->scheduleValidateRepository->findAllCount();
    }

    public function create(CreateScheduleValidateForm $form): array
    {
        $caclulateDay = CalculationDayHelper::toResult(
            new DateTimeImmutable($form->validated_start_at),
            new DateTimeImmutable($form->validated_end_at)
        );

        $scheduleValidate = new ScheduleValidate();
        $scheduleValidate->set('company_name', $form->company_name);
        $scheduleValidate->set('company_address', $form->company_address);
        $scheduleValidate->set('government_name', $form->government_name);
        $scheduleValidate->set('government_address', $form->government_address);
        $scheduleValidate->set('duration_validate', $caclulateDay);
        $scheduleValidate->set('validated_start_at', $form->validated_start_at);
        $scheduleValidate->set('validated_end_at', $form->validated_end_at);
        $scheduleValidate->set('created_at', (new DateTimeImmutable())->format('Y-m-d H:i:s'));

        $this->scheduleValidateRepository->save($scheduleValidate);

        return [
            'data' => [
                'status' => 'success',
                'url' => route_to('schedule-validate-list', 1)
            ],
        ];
    }

    public function update(UpdateScheduleValidateForm $form): array
    {
        $caclulateDay = CalculationDayHelper::toResult(
            new DateTimeImmutable($form->validated_start_at),
            new DateTimeImmutable($form->validated_end_at)
        );

        $scheduleValidate = new ScheduleValidate();
        $scheduleValidate->set('id', $form->id);
        $scheduleValidate->set('company_name', $form->company_name);
        $scheduleValidate->set('company_address', $form->company_address);
        $scheduleValidate->set('government_name', $form->government_name);
        $scheduleValidate->set('government_address', $form->government_address);
        $scheduleValidate->set('duration_validate', $caclulateDay);
        $scheduleValidate->set('validated_start_at', $form->validated_start_at);
        $scheduleValidate->set('validated_end_at', $form->validated_end_at);
        $scheduleValidate->set('updated_at', (new DateTimeImmutable())->format('Y-m-d H:i:s'));

        $this->scheduleValidateRepository->update($scheduleValidate);

        return [
            'data' => [
                'status' => 'success',
                'url' => route_to('schedule-validate-list', 1)
            ],
        ];
    }

    public function delete(DeleteScheduleValidateForm $form): array
    {
        $scheduleValidate = new ScheduleValidate();
        $scheduleValidate->set('id', $form->id);
        $scheduleValidate->set('deleted_at', (new DateTimeImmutable())->format('Y-m-d H:i:s'));

        $this->scheduleValidateRepository->update($scheduleValidate);

        return [
            'data' => [
                'status' => 'success',
                'url' => route_to('schedule-validate-list', 1)
            ],
        ];
    }
}
