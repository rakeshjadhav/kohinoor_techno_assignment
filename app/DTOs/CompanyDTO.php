<?php

namespace App\DTOs;

use App\Http\Requests\AddCompanyRequest;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

class CompanyDTO extends DataTransferObject
{
    public string $name;
    public string $address;

    public static function fromRequest(AddCompanyRequest $addCompanyRequest): self
    {
        return new self([
            "name" => $addCompanyRequest["name"],
            "address" => $addCompanyRequest["address"],
        ]);
    }
}