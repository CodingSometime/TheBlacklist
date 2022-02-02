<div class="d-flex justify-content-between align-items-center mt-2">
  <?php echo @$breadcrumbs; ?>
</div>
<div class="my-1 p-3 rounded shadow bg-body">
  <h5 class="border-bottom pb-2 mb-0"><i class="ti ti-edit-circle icon"></i> <?php echo @lang("TITLE"); ?></h5>
  <div class="my-1 p-3 rounded">
    <?php echo form_open(base_url() . "page/personal-list-detail/save", array("id" => "formData", "class" => "row g-3 needs-validation")); ?>
    <input type="hidden" id="__RequestVerificationAction" name="__RequestVerificationAction" value="<?php echo @$__RequestVerificationAction; ?>" />
    <?php if (isset($__RequestVerificationAction) && $__RequestVerificationAction != "NEW") { ?>
      <input type="hidden" id="__RequestVerificationId" name="__RequestVerificationId" value="<?php echo @$items->id; ?>" />
    <?php } ?>
    <span class="pt-1"></span>

    <div class="mb-3 row">
    <label for="validPersonId" class="col-sm-3 col-form-label"><?php echo @lang('PERSON_ID');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validPersonId" name="personId" value="<?php echo @$items->personId; ?>" >
      <div class="invalid-feedback"><?php echo @lang('PERSON_ID');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validSequenceNo" class="col-sm-3 col-form-label"><?php echo @lang('SEQUENCE_NO');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validSequenceNo" name="sequenceNo" value="<?php echo @$items->sequenceNo; ?>" >
      <div class="invalid-feedback"><?php echo @lang('SEQUENCE_NO');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validEmployeeNumber" class="col-sm-3 col-form-label"><?php echo @lang('EMPLOYEE_NUMBER');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validEmployeeNumber" name="employeeNumber" value="<?php echo @$items->employeeNumber; ?>" >
      <div class="invalid-feedback"><?php echo @lang('EMPLOYEE_NUMBER');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validBusinessUnitCode" class="col-sm-3 col-form-label"><?php echo @lang('BUSINESS_UNIT_CODE');?></label>
    <div class="col-sm-4 has-validation">
    <?php echo @$selectBoxBusinessUnitCode;?>
      <div class="invalid-feedback"><?php echo @lang('BUSINESS_UNIT_CODE');?> <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validCompanyCode" class="col-sm-3 col-form-label"><?php echo @lang('COMPANY_CODE');?></label>
    <div class="col-sm-4 has-validation">
    <?php echo @$selectBoxCompanyCode;?>
      <div class="invalid-feedback"><?php echo @lang('COMPANY_CODE');?> <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validBranchCode" class="col-sm-3 col-form-label"><?php echo @lang('BRANCH_CODE');?></label>
    <div class="col-sm-4 has-validation">
    <?php echo @$selectBoxBranchCode;?>
      <div class="invalid-feedback"><?php echo @lang('BRANCH_CODE');?> <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validCompanyOrVendor" class="col-sm-3 col-form-label"><?php echo @lang('COMPANY_OR_VENDOR');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validCompanyOrVendor" name="companyOrVendor" value="<?php echo @$items->companyOrVendor; ?>" >
      <div class="invalid-feedback"><?php echo @lang('COMPANY_OR_VENDOR');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validOrganizationName" class="col-sm-3 col-form-label"><?php echo @lang('ORGANIZATION_NAME');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validOrganizationName" name="organizationName" value="<?php echo @$items->organizationName; ?>" >
      <div class="invalid-feedback"><?php echo @lang('ORGANIZATION_NAME');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validPositionName" class="col-sm-3 col-form-label"><?php echo @lang('POSITION_NAME');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validPositionName" name="positionName" value="<?php echo @$items->positionName; ?>" >
      <div class="invalid-feedback"><?php echo @lang('POSITION_NAME');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validPersonTypeCode" class="col-sm-3 col-form-label"><?php echo @lang('PERSON_TYPE_CODE');?></label>
    <div class="col-sm-4 has-validation">
    <?php echo @$selectBoxPersonTypeCode;?>
      <div class="invalid-feedback"><?php echo @lang('PERSON_TYPE_CODE');?> <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validAge" class="col-sm-3 col-form-label"><?php echo @lang('AGE');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validAge" name="age" value="<?php echo @$items->age; ?>" >
      <div class="invalid-feedback"><?php echo @lang('AGE');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validServiceYear" class="col-sm-3 col-form-label"><?php echo @lang('SERVICE_YEAR');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validServiceYear" name="serviceYear" value="<?php echo @$items->serviceYear; ?>" >
      <div class="invalid-feedback"><?php echo @lang('SERVICE_YEAR');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validMental" class="col-sm-3 col-form-label"><?php echo @lang('MENTAL');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validMental" name="mental" value="<?php echo @$items->mental; ?>" >
      <div class="invalid-feedback"><?php echo @lang('MENTAL');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validOccupation" class="col-sm-3 col-form-label"><?php echo @lang('OCCUPATION');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validOccupation" name="occupation" value="<?php echo @$items->occupation; ?>" >
      <div class="invalid-feedback"><?php echo @lang('OCCUPATION');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validMisbehaviorDate" class="col-sm-3 col-form-label"><?php echo @lang('MISBEHAVIOR_DATE');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validMisbehaviorDate" name="misbehaviorDate" value="<?php echo @$items->misbehaviorDate; ?>" required>
      <div class="invalid-feedback"><?php echo @lang('MISBEHAVIOR_DATE');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validMisbehaviorTime" class="col-sm-3 col-form-label"><?php echo @lang('MISBEHAVIOR_TIME');?></label>
    <div class="col-sm-4 has-validation">
    <?php echo @$selectBoxMisbehaviorTime;?>
      <div class="invalid-feedback"><?php echo @lang('MISBEHAVIOR_TIME');?> <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validMisbehaviorPlace" class="col-sm-3 col-form-label"><?php echo @lang('MISBEHAVIOR_PLACE');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validMisbehaviorPlace" name="misbehaviorPlace" value="<?php echo @$items->misbehaviorPlace; ?>" >
      <div class="invalid-feedback"><?php echo @lang('MISBEHAVIOR_PLACE');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validProvinceId" class="col-sm-3 col-form-label"><?php echo @lang('PROVINCE_ID');?></label>
    <div class="col-sm-4 has-validation">
    <?php echo @$selectBoxProvinceId;?>
      <div class="invalid-feedback"><?php echo @lang('PROVINCE_ID');?> <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validDistrictId" class="col-sm-3 col-form-label"><?php echo @lang('DISTRICT_ID');?></label>
    <div class="col-sm-4 has-validation">
    <?php echo @$selectBoxDistrictId;?>
      <div class="invalid-feedback"><?php echo @lang('DISTRICT_ID');?> <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validAllegationTypeId" class="col-sm-3 col-form-label"><?php echo @lang('ALLEGATION_TYPE_ID');?></label>
    <div class="col-sm-4 has-validation">
    <?php echo @$selectBoxAllegationTypeId;?>
      <div class="invalid-feedback"><?php echo @lang('ALLEGATION_TYPE_ID');?> <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validDecision" class="col-sm-3 col-form-label"><?php echo @lang('DECISION');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validDecision" name="decision" value="<?php echo @$items->decision; ?>" >
      <div class="invalid-feedback"><?php echo @lang('DECISION');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validDetailOfCase" class="col-sm-3 col-form-label"><?php echo @lang('DETAIL_OF_CASE');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validDetailOfCase" name="detailOfCase" value="<?php echo @$items->detailOfCase; ?>" >
      <div class="invalid-feedback"><?php echo @lang('DETAIL_OF_CASE');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validTerminateDate" class="col-sm-3 col-form-label"><?php echo @lang('TERMINATE_DATE');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validTerminateDate" name="terminateDate" value="<?php echo @$items->terminateDate; ?>" >
      <div class="invalid-feedback"><?php echo @lang('TERMINATE_DATE');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validTerminateReason" class="col-sm-3 col-form-label"><?php echo @lang('TERMINATE_REASON');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validTerminateReason" name="terminateReason" value="<?php echo @$items->terminateReason; ?>" >
      <div class="invalid-feedback"><?php echo @lang('TERMINATE_REASON');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validTotalAmount" class="col-sm-3 col-form-label"><?php echo @lang('TOTAL_AMOUNT');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validTotalAmount" name="totalAmount" value="<?php echo @$items->totalAmount; ?>" >
      <div class="invalid-feedback"><?php echo @lang('TOTAL_AMOUNT');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validAllegationStatus" class="col-sm-3 col-form-label"><?php echo @lang('ALLEGATION_STATUS');?></label>
    <div class="col-sm-4 has-validation">
    <?php echo @$selectBoxAllegationStatus;?>
      <div class="invalid-feedback"><?php echo @lang('ALLEGATION_STATUS');?> <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validAllegationReason" class="col-sm-3 col-form-label"><?php echo @lang('ALLEGATION_REASON');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validAllegationReason" name="allegationReason" value="<?php echo @$items->allegationReason; ?>" >
      <div class="invalid-feedback"><?php echo @lang('ALLEGATION_REASON');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validDeleteReason" class="col-sm-3 col-form-label"><?php echo @lang('DELETE_REASON');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validDeleteReason" name="deleteReason" value="<?php echo @$items->deleteReason; ?>" >
      <div class="invalid-feedback"><?php echo @lang('DELETE_REASON');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validCreatedBy" class="col-sm-3 col-form-label"><?php echo @lang('CREATED_BY');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validCreatedBy" name="createdBy" value="<?php echo @$items->createdBy; ?>" >
      <div class="invalid-feedback"><?php echo @lang('CREATED_BY');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validCreatedDate" class="col-sm-3 col-form-label"><?php echo @lang('CREATED_DATE');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validCreatedDate" name="createdDate" value="<?php echo @$items->createdDate; ?>" required>
      <div class="invalid-feedback"><?php echo @lang('CREATED_DATE');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validLastedUpdateBy" class="col-sm-3 col-form-label"><?php echo @lang('LASTED_UPDATE_BY_');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validLastedUpdateBy" name="lastedUpdateBy" value="<?php echo @$items->lastedUpdateBy; ?>" required>
      <div class="invalid-feedback"><?php echo @lang('LASTED_UPDATE_BY_');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
    </div>
</div><div class="mb-3 row">
    <label for="validLastedUpdateDate" class="col-sm-3 col-form-label"><?php echo @lang('LASTED_UPDATE_DATE');?></label>
    <div class="col-sm-4 has-validation">
      <input type="text" class="form-control" id="validLastedUpdateDate" name="lastedUpdateDate" value="<?php echo @$items->lastedUpdateDate; ?>" required>
      <div class="invalid-feedback"><?php echo @lang('LASTED_UPDATE_DATE');?>  <?php echo @lang('FORM_VALIDATE_REQUIRE');?></div>
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
    window.location= "<?php echo base_url(); ?>page/personal-list-detail";
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