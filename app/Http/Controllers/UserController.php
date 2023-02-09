<?php

namespace App\Http\Controllers;

use App\DTOs\UserDTO;
use App\DTOs\UserUpdateDTO;
use App\Http\Requests\AddUserRequest;
use Illuminate\Http\Request;
use App\Repositories\UserRespository;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

class UserController extends Controller
{

    public function __construct(protected UserRespository $userRespository)
    {      

    }

    ### get list of all users
    public function getListOfUsers(): ?Collection
    {
        return $this->userRespository->getAllUsers();
    }

    ### get user by user id
    public function getUser(Request $request): ? User
    {
        return $this->userRespository->getUserById($request->id);
    }

    ### create new employee
    public function createUser(AddUserRequest $addUserRequest): ?User
    {
        $addUserPayload = UserDTO::fromRequest($addUserRequest);

        if(isset($addUserPayload->photo) && $addUserPayload->photo->isValid()){
            $folderPath = 'uploads/user';
            // move an photo using ::move() laravel function
            $addUserPayload->photo->move($folderPath,$addUserPayload->photo->getClientOriginalName());
             //get path for uplaod 
            $addUserPayload->photo = $folderPath.'/'.$addUserPayload->photo->getClientOriginalName();
        }
        return $this->userRespository->createUser($addUserPayload);
    }

    ### update employee data using id
    public function updateUser(UpdateUserRequest $updateUserRequest,string $id): ?User
    {
        $updateUserPayload = UserUpdateDTO::fromRequest($updateUserRequest);
         if(isset($updateUserPayload->photo) && $updateUserPayload->photo->isValid()){
            $folderPath = 'uploads/user';
            // move an photo using ::move() laravel function
            $updateUserPayload->photo->move($folderPath,$updateUserPayload->photo->getClientOriginalName());
            $updateUserPayload->photo = $folderPath.'/'.$updateUserPayload->photo->getClientOriginalName();
        }
        return $this->userRespository->updateUser($updateUserPayload, $id);        
    }

    ## soft Delete user
    public function deleteUser(Request $request)
    {
        $isDeleted = $this->userRespository->deleteUser($request->id);
        if($isDeleted){
            return response()->json(['status'=>'Successfully deleted']);
        }else{
            return response()->json(['status'=>'Something went wrong']);
        }
    }

    
    public function Page_getListOfUsers()
    {
        $activeUserData = $this->getListOfUsers();
        return view('user.list')->with('activeUserData', json_decode($activeUserData));
    }
}
