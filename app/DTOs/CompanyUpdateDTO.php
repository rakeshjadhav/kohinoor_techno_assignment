<?php

namespace App\DTOs;

use App\Http\Requests\UpdateCompanyRequest;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

class CompanyUpdateDTO extends DataTransferObject
{
    public string $name;
    public string $address;

    public static function fromRequest(UpdateCompanyRequest $request): self
    {
        return new self([
            "name" => $request["name"],
            "address" => $request["address"],
            'id' => $request["id"]
        ]);
    }
}