@extends('layout.header')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Users</h4> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box" style="border-top:4px solid rgb(116 96 238);border-radius:5px">
                    <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
                        <a href="#addUserModal" data-toggle="modal" class="btn btn btn-rounded btn-success btn-outline m-r-5">
                            <i class="ti-check text-success m-r-5"></i>Add New User
                        </a>
                    </div>
                    <h3 class="box-title">Users List</h3>
                    <div class="table-responsive">
                            <table id="dataTable" class="table table-striped table-hover" width="100%" cellspacing="0">
                            <div id="deleteMsg" class="font-medium text-red-600 alert alert-success d-none"></div>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date of Birth</th>
                                    <th>Photo</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($activeUserData as $user)
                                    <tr user_id = <?php echo $user->id;?> >
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->dob}}</td>
                                    <td><?php if(isset($user->photo)){ ?>
                                        <img src="{{ env('APP_URL') }}/{{$user->photo}}" alt="" width="50" height="50"> 
                                        <?php }else {
                                        echo 'Not Uploaded'; 
                                      }?>
                                    </td>
                                    <td>
                                        <a user_id = <?php echo $user->id;?> class="edit-user-btn btn btn-primary btn-icon-split" data-toggle="modal">Edit</a>

                                        <a user_id = <?php echo $user->id;?> class="delete-btn btn btn-danger btn-icon-split" data-toggle="modal">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
   

    {{-- User add model popup bootstrap model  --}}
    <div class="modal fade bd-example-modal-xl" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form id="addUserForm" enctype="multipart/form-data">
                    <div class="modal-header">						
                        <h4 class="modal-title">Add User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                    <div id="showError" class="font-medium text-red-600 alert alert-danger d-none"></div>					
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" id="name" name="name" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>User Email</label>
                            <input type="email" id="email" name="email" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>User Date of Birth</label>
                            <div class="form-control date-wrapper">
                            <input type="text"  id="birthdate_picker" name="dob" autocomplete="off" style="border: none;">
                        </div>
                        </div>
                        <div class="form-group">
                            <label>Photo</label>
                            <input type="file" id="photo" name="photo" class="form-control" />
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

    {{-- user edit model popup bootstrap model --}}
  <div id="editUserModal" class="modal fade bd-example-modal-xl">
    <div class="modal-dialog modal-dialog modal-xl">
        <div class="modal-content">
            <form id="editUserForm" emp-id="">
                <div class="modal-header">						
                    <h4 class="modal-title">Edit User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                <div id="showError" class="font-medium text-red-600 alert alert-danger d-none"></div>					
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" id="name" name="name" class="form-control" >
                    </div>
                    
                    <div class="form-group">
                        <label>User Email</label>
                        <input type="email" id="email" name="email" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>User Date of Birth</label>
                        <div class="form-control date-wrapper">
                        <input type="text"  id="birthdate1_picker" name="dob" autocomplete="off" style="border: none;">
                    </div>
                    </div>
                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" id="photo" name="photo" class="form-control" />
                    </div>					
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" id="editUserSubmit" emp-id="" class="btn btn-info" value="Update">
                </div>
            </form>
        </div>
    </div>
</div>


</div>



@endsection