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
    ]
)]
final class DeleteScheduleValidateForm implements FormInterface
{
    public function __construct(
        #[Required]
        #[Integer]
        public ?int $id,
    ) {

    }
}
