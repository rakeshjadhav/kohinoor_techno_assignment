  
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