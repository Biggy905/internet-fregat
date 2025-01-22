<?php

namespace Applications\Controllers;

use Applications\Entities\ScheduleValidate;
use Applications\Forms\CreateScheduleValidateForm;
use Applications\Forms\DeleteScheduleValidateForm;
use Applications\Forms\PageSlugForm;
use Applications\Forms\UpdateScheduleValidateForm;
use Applications\Repositories\ScheduleValidateRepository;
use Applications\Services\ScheduleValidateServices;
use Applications\Services\ValidatorService;
use CodeIgniter\HTTP\Exceptions\BadRequestException;

final class ScheduleValidateController extends BaseController
{
    private readonly ScheduleValidateServices $services;

    private readonly ValidatorService $validatorService;

    public function __construct(
    ) {
        $repository = new ScheduleValidateRepository(
            new ScheduleValidate()
        );

        $this->validatorService = new ValidatorService();

        $this->services = new ScheduleValidateServices($repository);
    }

    public function list(int $page = 1): string
    {
        $form = new PageSlugForm(
            $page,
        );

        $validator = $this->validatorService->setValidate($form);
        if ($validator->getIsValid() === false) {
            throw new BadRequestException('Bad Request!');
        }

        return view(
            'layout',
            [
                'content' => 'ScheduleValidate/list',
                'data' => $this->services->list($page),
                'count' => $this->services->countList(),
            ]
        );
    }

    public function create(): string
    {
        $requestData = json_decode($this->request->getBody(), true) ?? [];

        $form = new CreateScheduleValidateForm(
            $requestData['company_name'] ?? null,
            $requestData['company_address'] ?? null,
            $requestData['government_name'] ?? null,
            $requestData['government_address'] ?? null,
            $requestData['validated_start_at'] ?? null,
            $requestData['validated_end_at'] ?? null,
        );

        $validator = $this->validatorService->setValidate($form);
        $validator->getIsValid();

        return match ($validator->getIsValid()) {
            true => $this->response
                ->setJSON(
                    $this->services->create($form),
                    true
                )
                ->getJSON(),
            false => $this->response
                ->setJSON(
                    ['status' => 'failure', 'data' => $validator->getErrorMessages()],
                    true
                )
                ->getJSON()
        };
    }

    public function update(int $id): string
    {
        $requestData = json_decode($this->request->getBody(), true) ?? [];

        $form = new UpdateScheduleValidateForm(
            $requestData['id'] ?? null,
                $requestData['company_name'] ?? null,
                $requestData['company_address'] ?? null,
                $requestData['government_name'] ?? null,
                $requestData['government_address'] ?? null,
                $requestData['validated_start_at'] ?? null,
                $requestData['validated_end_at'] ?? null,
        );

        $validator = $this->validatorService->setValidate($form);

        return match ($validator->getIsValid()) {
            true => $this->response
                ->setJSON(
                    $this->services->update($form),
                    true
                )
                ->getJSON(),
            false => $this->response
                ->setJSON(
                    ['status' => 'failure', 'data' => $validator->getErrorMessages()],
                    true
                )
                ->getJSON()
        };
    }

    public function delete(int $id): string
    {
        $requestData = json_decode($this->request->getBody(), true) ?? [];

        $form = new DeleteScheduleValidateForm(
            $requestData['id'] ?? null,
        );

        $validator = $this->validatorService->setValidate($form);

        return match ($validator->getIsValid()) {
            true => $this->response
                ->setJSON(
                    $this->services->delete($form),
                    true
                )
                ->getJSON(),
            false => $this->response
                ->setJSON(
                    ['status' => 'failure', 'data' => $validator->getErrorMessages()],
                    true
                )
                ->getJSON()
        };
    }
}
