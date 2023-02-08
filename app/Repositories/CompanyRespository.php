<?php
namespace App\Repositories;

use App\DTOs\CompanyDTO;
use App\DTOs\CompanyUpdateDTO;
use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Log\Logger;

  class CompanyRespository {

    public function getAllCompanies(): ?Collection
    {
        ### use eloquent company model to get all record
        return Company::all()->sortByDesc('created_at');
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

  }
?>