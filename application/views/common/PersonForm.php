<div class="d-flex justify-content-between align-items-center mt-2">
  <?php echo @$breadcrumbs; ?>
</div>
<div class="my-1 p-3 rounded shadow bg-body">
  <h5 class="border-bottom pb-2 mb-0"><i class="ti ti-edit-circle icon"></i> <?php echo @lang("TITLE"); ?></h5>
  <div class="my-1 p-3 rounded">
    <?php echo form_open(base_url() . "page/person/save", array("id" => "formData", "class" => "row g-3 needs-validation")); ?>
    <input type="hidden" id="__RequestVerificationAction" name="__RequestVerificationAction" value="<?php echo @$__RequestVerificationAction; ?>" />
    <?php if (isset($__RequestVerificationAction) && $__RequestVerificationAction != "NEW") { ?>
      <input type="hidden" id="__RequestVerificationId" name="__RequestVerificationId" value="<?php echo @$items->id; ?>" />
    <?php } ?>
    <span class="pt-1"></span>

    <div class="mb-3 row">
    <label for="validNationalId" class="col-sm-3 col-form-label"><?php echo @lang('NATIONAL_ID');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validNationalId" name="nationalId" value="<?php echo @$items->nationalId; ?>" >
      <div class="invalid-feedback"><?php echo @lang('NATIONAL_ID');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validPassportId" class="col-sm-3 col-form-label"><?php echo @lang('PASSPORT_ID');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validPassportId" name="passportId" value="<?php echo @$items->passportId; ?>" >
      <div class="invalid-feedback"><?php echo @lang('PASSPORT_ID');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validTitleTh" class="col-sm-3 col-form-label"><?php echo @lang('TITLE_TH');?></label>
    <div class="col-sm-4 has-validation">
    <?php echo @$selectBoxTitleTh;?>
      <div class="invalid-feedback"><?php echo @lang('TITLE_TH');?> <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validFirstNameTh" class="col-sm-3 col-form-label"><?php echo @lang('FIRST_NAME_TH');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validFirstNameTh" name="firstNameTh" value="<?php echo @$items->firstNameTh; ?>" required>
      <div class="invalid-feedback"><?php echo @lang('FIRST_NAME_TH');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validLastNameTh" class="col-sm-3 col-form-label"><?php echo @lang('LAST_NAME_TH');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validLastNameTh" name="lastNameTh" value="<?php echo @$items->lastNameTh; ?>" required>
      <div class="invalid-feedback"><?php echo @lang('LAST_NAME_TH');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validTitleEn" class="col-sm-3 col-form-label"><?php echo @lang('TITLE_EN');?></label>
    <div class="col-sm-4 has-validation">
    <?php echo @$selectBoxTitleEn;?>
      <div class="invalid-feedback"><?php echo @lang('TITLE_EN');?> <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validFirstNameEn" class="col-sm-3 col-form-label"><?php echo @lang('FIRST_NAME_EN');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validFirstNameEn" name="firstNameEn" value="<?php echo @$items->firstNameEn; ?>" >
      <div class="invalid-feedback"><?php echo @lang('FIRST_NAME_EN');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validLastNameEn" class="col-sm-3 col-form-label"><?php echo @lang('LAST_NAME_EN');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validLastNameEn" name="lastNameEn" value="<?php echo @$items->lastNameEn; ?>" >
      <div class="invalid-feedback"><?php echo @lang('LAST_NAME_EN');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validPicture" class="col-sm-3 col-form-label"><?php echo @lang('PICTURE');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validPicture" name="picture" value="<?php echo @$items->picture; ?>" >
      <div class="invalid-feedback"><?php echo @lang('PICTURE');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validCountryCode" class="col-sm-3 col-form-label"><?php echo @lang('COUNTRY_CODE');?></label>
    <div class="col-sm-4 has-validation">
    <?php echo @$selectBoxCountryCode;?>
      <div class="invalid-feedback"><?php echo @lang('COUNTRY_CODE');?> <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validReferenceId" class="col-sm-3 col-form-label"><?php echo @lang('REFERENCE_ID');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validReferenceId" name="referenceId" value="<?php echo @$items->referenceId; ?>" >
      <div class="invalid-feedback"><?php echo @lang('REFERENCE_ID');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validGender" class="col-sm-3 col-form-label"><?php echo @lang('GENDER');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validGender" name="gender" value="<?php echo @$items->gender; ?>" >
      <div class="invalid-feedback"><?php echo @lang('GENDER');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validDataSourceId" class="col-sm-3 col-form-label"><?php echo @lang('DATA_SOURCE_ID');?></label>
    <div class="col-sm-4 has-validation">
    <?php echo @$selectBoxDataSourceId;?>
      <div class="invalid-feedback"><?php echo @lang('DATA_SOURCE_ID');?> <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validStatusId" class="col-sm-3 col-form-label"><?php echo @lang('STATUS_ID');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validStatusId" name="statusId" value="<?php echo @$items->statusId; ?>" required>
      <div class="invalid-feedback"><?php echo @lang('STATUS_ID');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div>


    <div class="row pt-3 pb-0">
      <div class="col-12">
        <div class="d-flex justify-content-end">
          <button class="btn btn-primary me-2" type="button" id="buttonSubmit" onClick="btnSaveClick(this.form)"><?php echo @lang('BUTTON_SAVE'); ?></button>
          <button class="btn btn-secondary" type="button" onClick="btnCancelClick(this.form)"><?php echo @lang('BUTTON_CANCEL'); ?></button>
        </div>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Modal Confirmation -->
<div class="modal fade" data-bs-keyboard="false" data-bs-backdrop="static" id="modalConfirmation" tabindex="-1" role="dialog" aria-labelledby="modalConfirmationTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalConfirmationTitle">CONFIRMATION</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </button>
      </div>
      <div class="modal-body">
        <label type="text" id="modalMessage" name="modalMessage" class="h5" /></label>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnClose" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo @lang('CONFIRM_BUTTON_NO'); ?>
        </button>
        <button type="button" id="btnSave" class="btn btn-primary"><?php echo @lang('CONFIRM_BUTTON_YES'); ?></button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Loading-->
<div class="modal fade" id="modalLoading" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="modalLoadingTitle">PLEASE WAIT</h6>
      </div>
      <div class="modal-body">
        <div class="d-flex align-items-center">
          <div id="loading" class="spinner-border spinner-border-lg text-secondary me-2" role="status">
          </div>
          <span class="align-middle h5"> Operations are in progress, please wait... </span>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  function btnCancelClick(myForm) {
    $('#modalLoading').modal('show');
    window.location= "<?php echo base_url(); ?>page/person";
  }

  function btnSaveClick(myForm) {
    $(document).ready(function() {
      var message = `<?php echo @lang('CONFIRM_MESSAGE_CREATE'); ?>`;

      if (!myForm.checkValidity()) {
        myForm.classList.add("was-validated");
      }

      if (myForm.checkValidity()) {
        $('#modalConfirmation').modal('show');
        if ($("#__RequestVerificationAction").val() == "EDIT") 
          message = "<?php echo @lang('CONFIRM_MESSAGE_UPDATE'); ?>";
        $("#modalMessage").html(message);

        $("#btnSave").on("click", function() {
          $('#modalLoading').modal('show');
          $("#modalConfirmation").modal('hide');
          $("#formData").submit();
        });
      }
      return false;
    });
  }
</script>