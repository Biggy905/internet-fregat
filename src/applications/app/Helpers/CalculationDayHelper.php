<?php

namespace Applications\Helpers;

use DateTimeInterface;

final class CalculationDayHelper
{
    public static function toResult(
        DateTimeInterface $startDate,
        DateTimeInterface $endDate
    ): int {
        return $endDate->diff($startDate)->days ?? 0;
    }
}
