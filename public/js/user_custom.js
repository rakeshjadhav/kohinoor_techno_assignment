  // onclick submit btn to open employee add form popup model 
  $(document).on("submit", "#addUserForm", function(e) {
    e.preventDefault(); 
    var showError = $("#addUserModal #showError");
    var $form = $(this).val();
    $('#addUserForm #showError').addClass('d-none');
    console.log($form);

     $.ajax({
                url: base_url+"/user/create-user",
                type: 'POST',
                contentType: false,
                processData: false,
                async: false,
                data: new FormData(this),
                success: function(result) {
                    $.toast({
                             heading: 'successfully',
                             text: 'User added successfully.',
                             position: 'top-right',
                             loaderBg: '#fff',
                             icon: 'warning',
                             hideAfter: 3500,
                             stack: 6
                         })
                         setTimeout(function() {
                            location.reload();
                        }, 1000);          
                },
                error: function ( xhr, status, error) {
                        
                    showError.removeClass('d-none');
                            if(xhr.responseText){
                                errortoshow = '';
                                $.each(JSON.parse(xhr.responseText).errors, function (i) {
                                    $.each(JSON.parse(xhr.responseText).errors[i], function (key, val) {
                                        errortoshow += val+'<br>';
                                    });
                                });
                                showError.html(errortoshow);
                            }
                        }
                });
    });

    $(document).ready(function(){
       
        let _token = $('meta[name="csrf-token"]').attr('content');
        $('[data-toggle="tooltip"]').tooltip();
 
 
        $('#dataTable tbody').on('click', 'tr td a.edit-user-btn',function () {
             
         var row_id = $(this).closest('tr').attr('user_id');
         $("#editUserForm").attr('user-id',row_id);
         $("#editUserForm #editUserSubmit").attr('user-id',row_id);
         $('#editUserForm #showError').addClass('d-none');
         var data = {
                 _token: _token
         }
         $.ajax({
                 url: base_url+"/user/get-user/"+row_id,
                 method: "GET",
                 data:data,
                 success: function(result){
                     // console.log(result);
                    $("#editUserForm #name").val('');
                    $("#editUserForm #birthdate1_picker").val('');
                    $("#editUserForm #email").val('');
                    console.log(result);
                    $("#editUserForm #name").val(result.name);
                    $("#editUserForm #birthdate1_picker").val(result.dob);
                    $("#editUserForm #email").val(result.email);
                    $("#editUserModal").modal('show');
                 }
             });
         });
 
         $('#dataTable tbody').on('click', 'tr td a.delete-btn',function () {
             var row_id = $(this).closest('tr').attr('user_id'); // table row id
             $.ajax({
                 url: base_url+"/user/delete-user/"+row_id,
                 method: "DELETE",
                 success: function(result){
                     
                     $("#dataTable #deleteMsg").removeClass('d-none');
                     console.log("success");
                     $.toast({
                        heading: 'Successfully',
                        text: 'User delete successfully.',
                        position: 'top-right',
                        loaderBg: '#fff',
                        icon: 'warning',
                        hideAfter: 3500,
                        stack: 6
                    })
                    setTimeout(function() {
                       location.reload();
                   }, 1000);  
                 }
             });
             });
     });
 
       // on submit open edit emplyee form with filed id wise details
       $(document).on("submit", "#editUserForm", function(e) {
             e.preventDefault(); 
             var showError = $("#editUserForm #showError");
             var $form = $(this).attr('user-id');
         
             $.ajax({
                     url: base_url+"/user/update-user/"+$form,
                     type: 'POST',
                     contentType: false,
                     processData: false,
                     async: false,
                     data: new FormData(this),
                     success: function(result) {
                        $.toast({
                            heading: 'Successfully',
                            text: 'User updated successfully.',
                            position: 'top-right',
                            loaderBg: '#fff',
                            icon: 'warning',
                            hideAfter: 3500,
                            stack: 6
                        })
                        setTimeout(function() {
                           location.reload();
                       }, 1000);            
                     },
                     error: function ( xhr, status, error) {
                             
                         showError.removeClass('d-none');
                             if(xhr.responseText){
                                 errortoshow = '';
                                 $.each(JSON.parse(xhr.responseText).errors, function (i) {
                                     $.each(JSON.parse(xhr.responseText).errors[i], function (key, val) {
                                         errortoshow += val+'<br>';
                                     });
                                 });
                                 showError.html(errortoshow);
                             }
                         }
                 });
     });