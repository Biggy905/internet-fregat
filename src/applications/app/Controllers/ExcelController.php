<?php

namespace Applications\Controllers;

use Applications\Entities\ScheduleValidate;
use Applications\Repositories\ScheduleValidateRepository;
use Applications\Services\ExcelService;
use CodeIgniter\HTTP\DownloadResponse;

final class ExcelController extends BaseController
{
    private ExcelService $service;

    public function __construct(

    ) {
        $repository = new ScheduleValidateRepository(
            new ScheduleValidate()
        );

        $this->service = new ExcelService(
            $repository
        );
    }

    public function download(): DownloadResponse
    {
        return $this->response->download($this->service->download(), null);
    }
}
