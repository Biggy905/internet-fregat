<?php

namespace Applications\Forms;

use Yiisoft\Validator\Rule\Date\Date;
use Yiisoft\Validator\Rule\FilledAtLeast;
use Yiisoft\Validator\Rule\Integer;
use Yiisoft\Validator\Rule\Length;
use Yiisoft\Validator\Rule\Required;

#[FilledAtLeast(
    [
        'id',
        'company_name',
        'company_address',
        'government_name',
        'government_address',
        'validated_start_at',
        'validated_end_at',
    ]
)]
final class UpdateScheduleValidateForm implements FormInterface
{
    public function __construct(
        #[Required]
        #[Integer]
        public ?int $id,

        #[Required]
        #[Length(min: 3)]
        public ?string $company_name,

        #[Required]
        #[Length(min: 3)]
        public ?string $company_address,

        #[Required]
        #[Length(min: 3)]
        public ?string $government_name,

        #[Required]
        #[Length(min: 3)]
        public ?string $government_address,

        #[Required]
        #[Date(format: 'Y-m-d')]
        public ?string $validated_start_at,

        #[Required]
        #[Date(format: 'Y-m-d')]
        public ?string $validated_end_at
    ) {

    }
}
