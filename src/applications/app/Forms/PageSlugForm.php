<?php

namespace Applications\Forms;

use Yiisoft\Validator\Rule\Integer;
use Yiisoft\Validator\Rule\Required;
use Yiisoft\Validator\Rule\FilledAtLeast;

#[FilledAtLeast(
    [
        'page',
    ]
)]
final class PageSlugForm implements FormInterface
{
    public function __construct(
        #[Required]
        #[Integer]
        public ?int $page
    ) {

    }
}
