@extends('layout.header')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Company</h4> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box" style="border-top:4px solid rgb(116 96 238);border-radius:5px">
                    <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
                        <a href="#addCompanyModal" data-toggle="modal" class="btn btn btn-rounded btn-success btn-outline m-r-5">
                            <i class="ti-check text-success m-r-5"></i>Add New Company
                        </a>
                    </div>
                    <h3 class="box-title">Company List</h3>
                    <div class="table-responsive">
                            <table id="dataTable" class="table table-striped table-hover" width="100%" cellspacing="0">
                            <div id="deleteMsg" class="font-medium text-red-600 alert alert-success d-none"></div>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Add User</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($activeCompanyData as $company)
                                    <tr company_id = <?php echo $company->id;?> >
                                    <td>{{$company->name}}</td>
                                    <td>{{$company->address}}</td>
                                    <td>
                                        <a href="#tagUserModal" data-toggle="modal" class="btn btn btn-rounded btn-success btn-outline m-r-5">
                                            <i class="ti-check text-success m-r-5"></i>Add User
                                        </a> 
                                    </td>
                                    
                                    <td>
                                        <a company_id = <?php echo $company->id;?> class="edit-company-btn btn btn-primary btn-icon-split" data-toggle="modal">Edit</a>

                                        <a company_id = <?php echo $company->id;?> class="delete-company-btn btn btn-danger btn-icon-split" data-toggle="modal">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
   

    {{-- Company add model popup bootstrap model  --}}
    <div class="modal fade bd-example-modal-xl" id="addCompanyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form id="addCompanyForm" enctype="multipart/form-data">
                    <div class="modal-header">						
                        <h4 class="modal-title">Add Company</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                    <div id="showError" class="font-medium text-red-600 alert alert-danger d-none"></div>					
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" id="name" name="name" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Company Address</label>
                            <textarea type="text" id="address" name="address" class="form-control" ></textarea>
                        </div>					
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" id="submitButton" class="btn btn-success" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- company edit model popup bootstrap model --}}
  <div id="editCompanyModal" class="modal fade bd-example-modal-xl">
    <div class="modal-dialog modal-dialog modal-xl">
        <div class="modal-content">
            <form id="editCompanyForm" company-id="">
                <div class="modal-header">						
                    <h4 class="modal-title">Edit Company</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                <div id="showError" class="font-medium text-red-600 alert alert-danger d-none"></div>					
                    <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" id="name" name="name" class="form-control" >
                    </div>
                    
                    <div class="form-group">
                        <label>Company Address</label>
                        <textarea type="text" id="address" name="address" class="form-control" ></textarea>
                    </div>
                    				
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" id="editCompanySubmit" emp-id="" class="btn btn-info" value="Update">
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection