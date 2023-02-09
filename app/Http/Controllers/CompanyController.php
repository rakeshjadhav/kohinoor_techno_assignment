<?php

namespace App\Http\Controllers;

use App\DTOs\CompanyDTO;
use App\DTOs\CompanyUpdateDTO;
use App\DTOs\CompanyUserUpdateDTO;
use App\Http\Requests\AddCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Requests\UpdateCompanyUserRequest;
use App\Models\Companies_users;
use Illuminate\Http\Request;
use App\Repositories\CompanyRespository;
use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

class CompanyController extends Controller
{

    public function __construct(protected CompanyRespository $companyRespository)
    {      

    }

    ### get list of all companies
    public function getListOfCompanies(): ?Collection
    {
        return $this->companyRespository->getAllCompanies();
    }

    ### get company by id
    public function getCompanyIdWise(Request $request): ?Company
    {
        return $this->companyRespository->getCompanyById($request->id);
    }

    ### create new company
    public function createCompany(AddCompanyRequest $addCompanyRequest): ?Company
    {
        $addCompanyPayload = CompanyDTO::fromRequest($addCompanyRequest);
        return $this->companyRespository->createCompany($addCompanyPayload);
    }

    ### update company data using id
    public function updateCompanyIdWise(UpdateCompanyRequest $updateCompanyRequest,string $id): ?Company
    {
        $updateCompanyPayload = CompanyUpdateDTO::fromRequest($updateCompanyRequest);
        return $this->companyRespository->updateCompany($updateCompanyPayload, $id);        
    }

    ## soft Delete company
    public function deleteCompanyIdWise(Request $request)
    {
        $isDeleted = $this->companyRespository->deleteCompany($request->id);
        if($isDeleted){
            return response()->json(['status'=>'Successfully deleted']);
        }else{
            return response()->json(['status'=>'Something went wrong']);
        }
    }

    
    public function Page_getListOfCompanies()
    {
        $activeCompanyData = $this->getListOfCompanies();
        return view('company.list')->with('activeCompanyData', json_decode($activeCompanyData));
    }

    public function getUserByCompanyID(string $companyId)
    {
        return $this->companyRespository->getUserByCompanyID($companyId); 
        
    }
    public function searchUserByCompanyID(Request $request, string $id)
    {
        
        $activeCompanyData = $this->getUserByCompanyID($id);
        $returnHTML = view('company.tag_user')->with('activeCompanyData', $activeCompanyData)->render();
        echo $returnHTML;
    }

     ### update company data using id
     public function updateCompanyUser(UpdateCompanyUserRequest $updateCompanyUserRequest,string $id): ?array
     {
         return $this->companyRespository->updateCompanyUser($updateCompanyUserRequest, $id);        
     }
}
