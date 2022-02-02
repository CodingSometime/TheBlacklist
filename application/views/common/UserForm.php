<div class="d-flex justify-content-between align-items-center mt-2">
  <?php echo @$breadcrumbs; ?>
</div>
<div class="my-1 p-3 rounded shadow bg-body">
  <h5 class="border-bottom pb-2 mb-0"><i class="ti ti-edit-circle icon"></i> <?php echo @lang("TITLE"); ?></h5>
  <div class="my-1 p-3 rounded">
    <?php echo form_open(base_url() . "page/user/save", array("id" => "formData", "class" => "row g-3 needs-validation")); ?>
    <input type="hidden" id="__RequestVerificationAction" name="__RequestVerificationAction" value="<?php echo @$__RequestVerificationAction; ?>" />
    <?php if (isset($__RequestVerificationAction) && $__RequestVerificationAction != "NEW") { ?>
      <input type="hidden" id="__RequestVerificationId" name="__RequestVerificationId" value="<?php echo @$items->id; ?>" />
    <?php } ?>
    <span class="pt-1"></span>

    <div class="mb-3 row">
    <label for="validUserName" class="col-sm-3 col-form-label"><?php echo @lang('USER_NAME');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validUserName" name="userName" value="<?php echo @$items->userName; ?>" required>
      <div class="invalid-feedback"><?php echo @lang('USER_NAME');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validFirstName" class="col-sm-3 col-form-label"><?php echo @lang('FIRST_NAME');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validFirstName" name="firstName" value="<?php echo @$items->firstName; ?>" required>
      <div class="invalid-feedback"><?php echo @lang('FIRST_NAME');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validLastName" class="col-sm-3 col-form-label"><?php echo @lang('LAST_NAME');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validLastName" name="lastName" value="<?php echo @$items->lastName; ?>" required>
      <div class="invalid-feedback"><?php echo @lang('LAST_NAME');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validRoleCode" class="col-sm-3 col-form-label"><?php echo @lang('ROLE_CODE');?></label>
    <div class="col-sm-4 has-validation">
    <?php echo @$selectBoxRoleCode;?>
      <div class="invalid-feedback"><?php echo @lang('ROLE_CODE');?> <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validEffectiveStartDate" class="col-sm-3 col-form-label"><?php echo @lang('EFFECTIVE_START_DATE');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validEffectiveStartDate" name="effectiveStartDate" value="<?php echo @$items->effectiveStartDate; ?>" required>
      <div class="invalid-feedback"><?php echo @lang('EFFECTIVE_START_DATE');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validEffectiveEndDate" class="col-sm-3 col-form-label"><?php echo @lang('EFFECTIVE_END_DATE');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validEffectiveEndDate" name="effectiveEndDate" value="<?php echo @$items->effectiveEndDate; ?>" required>
      <div class="invalid-feedback"><?php echo @lang('EFFECTIVE_END_DATE');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validStatusId" class="col-sm-3 col-form-label"><?php echo @lang('STATUS_ID');?></label>
    <div class="col-sm-4 has-validation">
    <?php echo @$selectBoxStatusId;?>
      <div class="invalid-feedback"><?php echo @lang('STATUS_ID');?> <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
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
    window.location= "<?php echo base_url(); ?>page/user";
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