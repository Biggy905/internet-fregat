<?php

namespace Applications\Services;

use Applications\Forms\FormInterface;
use Yiisoft\Validator\Result;
use Yiisoft\Validator\Validator;

final class ValidatorService
{
    private ?Result $result = null;

    public function setValidate(FormInterface $form): self
    {
        $this->result = (new Validator())->validate($form);

        return $this;
    }

    public function getIsValid(): bool
    {
        $status = false;
        if (!empty($this->result)) {
            $status = $this->result->isValid();
        }

        return $status;
    }

    public function getErrorMessages(): array
    {
        $data = [
            'validator' => 'Форма не загружена!'
        ];

        if (!empty($this->result)) {
            $data = $this->result->getErrorMessages();
        }

        return $data;
    }
}