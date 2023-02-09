<?php

namespace App\DTOs;


use App\Http\Requests\UpdateUserRequest;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

class UserUpdateDTO extends DataTransferObject
{
    public string $name;
    public string $email;
    public string $dob;
    public mixed $photo;

    public static function fromRequest(UpdateUserRequest $request): self
    {
        return new self([
            "name" => $request["name"],
            "email" => $request["email"],
            "dob" => $request["dob"],
            "photo" =>  $request["photo"] ? $request["photo"] : null,
            'id' => $request["id"]
        ]);
    }
}