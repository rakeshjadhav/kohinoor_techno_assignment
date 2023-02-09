<?php
namespace App\Repositories;

use App\DTOs\CompanyDTO;
use App\DTOs\CompanyUpdateDTO;
use App\DTOs\CompanyUserUpdateDTO;
use App\Models\Companies_users;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\DB;

  class CompanyRespository {

    public function getAllCompanies(): ?Collection
    {
        ### use eloquent company model to get all record
        return Company::with(['companyUser' => array('userDetails')])->orderBy('created_at', 'desc')->get(); 
    }

    public function getCompanyById($empID): ?Company
    {
        return Company::find($empID);
    }

    public function createCompany(CompanyDTO $addUserPayload): ?Company
    {
        $companyInsertPayload = array(
            'name' => $addUserPayload->name,
            'address' => $addUserPayload->address,
        );
        return Company::create($companyInsertPayload);
    }


    public function updateCompany(CompanyUpdateDTO $updateCompanyPayload, string $id): ?Company
    {
        $company = Company::where('id', $id)->first();
        if ($company) {
            $updatePayload = array(
                'name' => $updateCompanyPayload->name,
                'address' => $updateCompanyPayload->address,
            );
            $company->update($updatePayload);
     }
       return $company;
    }

    ### soft delete  company by id
    public function deleteCompany(string $companyId){
        return Company::where('id', '=', $companyId)->delete();
    }

    ### get company wise selectd user checkbox field
    public function getUserByCompanyID(string $id): ?Collection
    {
        $query = User::select('users.*',DB::raw("(SELECT cu.user_id FROM companies_users cu WHERE cu.company_id = $id AND cu.user_id = users.id AND cu.deleted_at IS NULl) as userID"));
      return $query->orderBy('created_at', 'desc')->get();
        // dd($query->toSql(), $query->getBindings());
    }

    public function updateCompanyUser($updateCompanyUserRequest, string $id): ?array
    {
        Companies_users::where('company_id', $id)->delete();
        if(isset($updateCompanyUserRequest)){
            foreach ($updateCompanyUserRequest->user_id as $user_id) {
                $updatePayload = array(
                    'user_id' => $user_id,
                    'company_id' => $id,
                );
             Companies_users::create($updatePayload);
            }
        }
        return array('status' => true);
    }
    
  }
?>