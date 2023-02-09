<?php

namespace App\DTOs;

use App\Http\Requests\AddUserRequest;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

class UserDTO extends DataTransferObject
{
    public string $name;
    public string $email;
    public string $dob;
    public mixed $photo;

    public static function fromRequest(AddUserRequest $addUserRequest): self
    {
        return new self([
            "name" => $addUserRequest["name"],
            "email" => $addUserRequest["email"],
            "dob" => $addUserRequest["dob"],
            "photo" =>  $addUserRequest["photo"] ? $addUserRequest["photo"] : null,
        ]);
    }
}