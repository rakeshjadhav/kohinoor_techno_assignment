<?php

namespace App\DTOs;

use App\Http\Requests\UpdateCompanyUserRequest;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

class CompanyUserUpdateDTO extends DataTransferObject
{
    public $user_id;

    public static function fromRequest(UpdateCompanyUserRequest $request): self
    {
        return new self([

        ]);
    }
}