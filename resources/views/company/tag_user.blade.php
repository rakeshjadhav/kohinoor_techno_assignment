
<?php
 
    if (!empty($activeCompanyData)) {
        foreach ($activeCompanyData as $key => $companyUser) {  
           $checkbox_status = "";
        if (isset($companyUser->userID) && !empty($companyUser->userID)) {
            $checkbox_status = "checked";
      }?>
        
        <div class="form-group">
            <div class="form-check">
               <input class="form-check-input user_chk" type="checkbox" value="<?php echo $companyUser['id']; ?>" id="flexCheckDefault" name="user_id[]" <?php echo $checkbox_status; ?>>
               <label class="form-check-label" for="flexCheckDefault">
                 <?php echo $companyUser['name']; ?>
               </label>
             </div>
         </div>     
        <?php } } ?>