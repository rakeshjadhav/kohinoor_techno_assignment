<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix("user")->group(function () {

    ### get all users 
    Route::get('/get-users',[UserController::class,'getListOfUsers']);
    ### create new user
    Route::post('/create-user',[UserController::class,'createUser']);
    ### get user id wise data
    Route::get('/get-user/{id}',[UserController::class,'getUser']);
    ### update user id wise data
    Route::post('/update-user/{id}',[UserController::class,'updateUser']);
    ### soft delete user 
    Route::delete('/delete-user/{id}',[UserController::class,'deleteUser']);

});

Route::prefix("company")->group(function () {
    ### get all companies 
    Route::get('/get-companies',[CompanyController::class,'getListOfCompanies']);
    ### create new company
    Route::post('/create-company',[CompanyController::class,'createCompany']);
    ### get company id wise data
    Route::get('/get-company/{id}',[CompanyController::class,'getCompanyIdWise']);
    ### update company id wise data
    Route::post('/update-company/{id}',[CompanyController::class,'updateCompanyIdWise']);
    ### soft delete company 
    Route::delete('/delete-company/{id}',[CompanyController::class,'deleteCompanyIdWise']);
});

