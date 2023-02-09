<?php
namespace App\Repositories;

use App\DTOs\UserDTO;
use App\Http\Requests\AddUserRequest;
use Illuminate\Support\Carbon;
use App\Models\EmployeeModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Log\Logger;

  class UserRespository {

    public function getAllUsers(): ?Collection
    {
        ### use eloquent user model to get all record
        return User::all()->sortByDesc('created_at');
    }

    public function getUserById($empID): ? User
    {
        return User::find($empID);
    }

    public function createUser(UserDTO $addUserPayload): ?User
    {
        $userInsertPayload = array(
            'name' => $addUserPayload->name,
            'email' => $addUserPayload->email,
            'dob' => Carbon::parse($addUserPayload->dob)->format('Y-m-d'),
            'photo' => (isset($addUserPayload->photo) ) ? $addUserPayload->photo : NUll,
        );
        return User::create($userInsertPayload);
    }


    public function updateUser($updateUserPayload, string $id): ?User
    {
        $user = User::where('id', $id)->first();
        if ($user) {
            $updatePayload = array(
                'name' => $updateUserPayload->name,
                'email' => $updateUserPayload->email,
                'dob' => Carbon::parse($updateUserPayload->dob)->format('Y-m-d'),
                'photo' => ( isset($updateUserPayload->photo) ) ? $updateUserPayload->photo : $user->photo,
            );
            $user->update($updatePayload);
     }
      return $user;
    }

    ### soft delete  employee
    public function deleteUser(string $userId)
    {
        return User::where('id', '=', $userId)->delete();
    }

  }
?>