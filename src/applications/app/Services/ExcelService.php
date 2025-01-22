<?php

namespace Applications\Services;

use Applications\Entities\ScheduleValidate;
use Applications\Repositories\ScheduleValidateRepository;
use CodeIgniter\Exceptions\PageNotFoundException;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Document\Properties;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

final readonly class ExcelService
{
    private ScheduleValidateRepository $scheduleValidateRepository;
    private ScheduleValidateServices $scheduleValidateServices;

    public function __construct(
        $scheduleValidateRepository,
    ) {
        $this->scheduleValidateRepository = $scheduleValidateRepository;
        $this->scheduleValidateServices = new ScheduleValidateServices(
            $this->scheduleValidateRepository
        );
    }

    public function download(): string
    {
        $scheduleValidate = $this->scheduleValidateServices->fullList();
        if (empty($scheduleValidate)) {
            throw new PageNotFoundException('Нечего экспортировать!');
        }

        $fields = ExcelService::getScheduleValidate()->getFields();
        array_unshift($scheduleValidate, $fields);

        $properties = new Properties();
        $properties->setCreator('Internet-Fregat')
            ->setLastModifiedBy('Internet-Freget')
            ->setTitle('Перечень плановых проверок')
            ->setSubject('');

        $spreadsheet = new Spreadsheet();
        $spreadsheet->setProperties($properties);

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->fromArray($scheduleValidate);

        $excel = new Xlsx($spreadsheet);

        $path = __DIR__ . '/../../public/excel.xlsx';
        $excel->save($path);

        return 'excel.xlsx';
    }

    private function letters(): array
    {
        $letters = [];
        for ($x = 'A'; $x <= 'I'; $x++) {
            $letters[] = $x;
        }

        return $letters;
    }

    private static function getScheduleValidate(): ScheduleValidate
    {
        return new ScheduleValidate();
    }
}
