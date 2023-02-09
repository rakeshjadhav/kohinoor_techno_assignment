  
  // onclick submit btn to open  add form popup model 
  
  $(document).on("submit", "#addCompanyForm", function(e) {
    e.preventDefault(); 
    var showError = $("#addCompanyModal #showError");
    var $form = $(this).val();
    $('#addCompanyForm #showError').addClass('d-none');
    console.log($form);

     $.ajax({
                url: base_url+"/company/create-company",
                type: 'POST',
                contentType: false,
                processData: false,
                async: false,
                data: new FormData(this),
                success: function(result) {
                    $.toast({
                             heading: 'successfully',
                             text: 'Company added successfully.',
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
 
 
        $('#dataTable tbody').on('click', 'tr td a.edit-company-btn',function () {
             
         var row_id = $(this).closest('tr').attr('company_id');
         $("#editCompanyForm").attr('company-id',row_id);
         $("#editCompanyForm #editCompanySubmit").attr('company-id',row_id);
         $('#editCompanyForm #showError').addClass('d-none');
         var data = {
                 _token: _token
         }
         $.ajax({
                 url: base_url+"/company/get-company/"+row_id,
                 method: "GET",
                 data:data,
                 success: function(result){
                     // console.log(result);
                    $("#editCompanyForm #name").val('');
                    $("#editCompanyForm #address").val('');
                   
                    $("#editCompanyForm #name").val(result.name);
                    $("#editCompanyForm #address").val(result.address);
                    $("#editCompanyModal").modal('show');
                 }
             });
         });
 
         $('#dataTable tbody').on('click', 'tr td a.delete-company-btn',function () {
             var row_id = $(this).closest('tr').attr('company_id'); // table row id
             $.ajax({
                 url: base_url+"/company/delete-company/"+row_id,
                 method: "DELETE",
                 success: function(result){
                     
                     $("#dataTable #deleteMsg").removeClass('d-none');
                     console.log("success");
                     $.toast({
                        heading: 'Successfully',
                        text: 'Company delete successfully.',
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


             $('#dataTable tbody').on('click', 'tr td a.tag-user-company',function () {
             
                var row_id = $(this).closest('tr').attr('company_id');
                $("#tagUserForm").attr('company-id',row_id);
                $("#tagUserForm #tagUserSubmit").attr('company-id',row_id);
                $('#tagUserForm #showError').addClass('d-none');
                $('.search_box_result').html("");
                var data = {
                        _token: _token,
                }
                $.ajax({
                        url: base_url+"/company/searchUserByCompanyID/"+row_id,
                        method: "GEt",
                        data:data,
                        success: function(result){
                            console.log(result);
                          $('.search_box_result').html(result);
                           $("#tagUserModal").modal('show');
                        }
                    });
                });
     });
 
       // on submit open edit emplyee form with filed id wise details
       $(document).on("submit", "#editCompanyForm", function(e) {
             e.preventDefault(); 
             var showError = $("#editCompanyForm #showError");
             var $form = $(this).attr('company-id');
         
             $.ajax({
                     url: base_url+"/company/update-company/"+$form,
                     type: 'POST',
                     contentType: false,
                     processData: false,
                     async: false,
                     data: new FormData(this),
                     success: function(result) {
                        $.toast({
                            heading: 'Successfully',
                            text: 'Company updated successfully.',
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

      // on submit open edit emplyee form with filed id wise details
      $(document).on("submit", "#tagUserForm", function(e) {
        e.preventDefault(); 
        var showError = $("#tagUserForm #showError");
        var $form = $(this).attr('company-id');
        // alert("hiii");
        $.ajax({
                url: base_url+"/company/update-companyUser/"+$form,
                type: 'POST',
                contentType: false,
                processData: false,
                async: false,
                data: new FormData(this),
                success: function(result) {
                   $.toast({
                       heading: 'Successfully',
                       text: 'Company updated successfully.',
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