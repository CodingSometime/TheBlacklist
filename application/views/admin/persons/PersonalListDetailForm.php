<div class="d-flex justify-content-between align-items-center mt-2">
  <?php echo @$breadcrumbs; ?>
</div>
<div class="my-1 p-3 rounded shadow bg-body">
  <div class="d-flex justify-content-between align-items-center border-bottom ">
    <h5 class="pb-2 mb-0"><i class="ti ti-edit-circle icon"></i> <?php echo @lang("TITLE"); ?></h5>
    <span class="text-muted"><?php if(isset($items->id)) echo @$items->lastUpdateLabel; ?></span>
  </div>
  <div class="my-1 p-3 rounded">
    <?php echo form_open(base_url() . "page/personal-list-detail/save", array("id" => "formData", "class" => "row g-3 needs-validation")); ?>
    <input type="hidden" id="__RequestVerificationAction" name="__RequestVerificationAction" value="<?php echo @$__RequestVerificationAction; ?>" />
    <?php if (isset($__RequestVerificationAction) && $__RequestVerificationAction != "NEW") { ?>
      <input type="hidden" id="__RequestVerificationId" name="__RequestVerificationId" value="<?php echo @$items->id; ?>" />
    <?php } ?>
    <span class="pt-1"></span>

    <div class="mb-2 row">
      <label for="_PersonId" class="col-md-3 col-form-label"><?php echo @lang('PERSON_ID'); ?></label>
      <div class="col-md-4 has-validation">
        <input type="text" class="form-control" id="_PersonId" name="personId" value="<?php echo @$items->personId; ?>">
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_SequenceNo" class="col-md-3 col-form-label"><?php echo @lang('SEQUENCE_NO'); ?></label>
      <div class="col-md-4 has-validation">
        <input type="text" class="form-control" id="_SequenceNo" name="sequenceNo" value="<?php echo @$items->sequenceNo; ?>">
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_EmployeeNumber" class="col-md-3 col-form-label"><?php echo @lang('EMPLOYEE_NUMBER'); ?></label>
      <div class="col-md-4 has-validation">
        <input type="text" class="form-control" id="_EmployeeNumber" name="employeeNumber" value="<?php echo @$items->employeeNumber; ?>">
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_BusinessUnitCode" class="col-md-3 col-form-label"><?php echo @lang('BUSINESS_UNIT_CODE'); ?></label>
      <div class="col-md-4 has-validation">
        <?php echo @$selectBoxBusinessUnitCode; ?>
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_CompanyCode" class="col-md-3 col-form-label"><?php echo @lang('COMPANY_CODE'); ?></label>
      <div class="col-md-4 has-validation">
        <?php echo @$selectBoxCompanyCode; ?>
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_BranchCode" class="col-md-3 col-form-label"><?php echo @lang('BRANCH_CODE'); ?></label>
      <div class="col-md-4 has-validation">
        <?php echo @$selectBoxBranchCode; ?>
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_CompanyOrVendor" class="col-md-3 col-form-label"><?php echo @lang('COMPANY_OR_VENDOR'); ?></label>
      <div class="col-md-4 has-validation">
        <input type="text" class="form-control" id="_CompanyOrVendor" name="companyOrVendor" value="<?php echo @$items->companyOrVendor; ?>">
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_OrganizationName" class="col-md-3 col-form-label"><?php echo @lang('ORGANIZATION_NAME'); ?></label>
      <div class="col-md-4 has-validation">
        <input type="text" class="form-control" id="_OrganizationName" name="organizationName" value="<?php echo @$items->organizationName; ?>">
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_PositionName" class="col-md-3 col-form-label"><?php echo @lang('POSITION_NAME'); ?></label>
      <div class="col-md-4 has-validation">
        <input type="text" class="form-control" id="_PositionName" name="positionName" value="<?php echo @$items->positionName; ?>">
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_PersonTypeCode" class="col-md-3 col-form-label"><?php echo @lang('PERSON_TYPE_CODE'); ?></label>
      <div class="col-md-4 has-validation">
        <?php echo @$selectBoxPersonTypeCode; ?>
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_Age" class="col-md-3 col-form-label"><?php echo @lang('AGE'); ?></label>
      <div class="col-md-4 has-validation">
        <input type="text" class="form-control" id="_Age" name="age" value="<?php echo @$items->age; ?>">
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_ServiceYear" class="col-md-3 col-form-label"><?php echo @lang('SERVICE_YEAR'); ?></label>
      <div class="col-md-4 has-validation">
        <input type="text" class="form-control" id="_ServiceYear" name="serviceYear" value="<?php echo @$items->serviceYear; ?>">
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_Mental" class="col-md-3 col-form-label"><?php echo @lang('MENTAL'); ?></label>
      <div class="col-md-4 has-validation">
        <input type="text" class="form-control" id="_Mental" name="mental" value="<?php echo @$items->mental; ?>">
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_Occupation" class="col-md-3 col-form-label"><?php echo @lang('OCCUPATION'); ?></label>
      <div class="col-md-4 has-validation">
        <input type="text" class="form-control" id="_Occupation" name="occupation" value="<?php echo @$items->occupation; ?>">
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_MisbehaviorDate" class="col-md-3 col-form-label"><?php echo @lang('MISBEHAVIOR_DATE'); ?></label>
      <div class="col-md-4 has-validation">
        <input type="text" class="form-control" id="_MisbehaviorDate" name="misbehaviorDate" value="<?php echo @$items->misbehaviorDate; ?>" required>
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_MisbehaviorTime" class="col-md-3 col-form-label"><?php echo @lang('MISBEHAVIOR_TIME'); ?></label>
      <div class="col-md-4 has-validation">
        <?php echo @$selectBoxMisbehaviorTime; ?>
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_MisbehaviorPlace" class="col-md-3 col-form-label"><?php echo @lang('MISBEHAVIOR_PLACE'); ?></label>
      <div class="col-md-4 has-validation">
        <input type="text" class="form-control" id="_MisbehaviorPlace" name="misbehaviorPlace" value="<?php echo @$items->misbehaviorPlace; ?>">
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_ProvinceId" class="col-md-3 col-form-label"><?php echo @lang('PROVINCE_ID'); ?></label>
      <div class="col-md-4 has-validation">
        <?php echo @$selectBoxProvinceId; ?>
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_DistrictId" class="col-md-3 col-form-label"><?php echo @lang('DISTRICT_ID'); ?></label>
      <div class="col-md-4 has-validation">
        <?php echo @$selectBoxDistrictId; ?>
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_AllegationTypeId" class="col-md-3 col-form-label"><?php echo @lang('ALLEGATION_TYPE_ID'); ?></label>
      <div class="col-md-4 has-validation">
        <?php echo @$selectBoxAllegationTypeId; ?>
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_Decision" class="col-md-3 col-form-label"><?php echo @lang('DECISION'); ?></label>
      <div class="col-md-4 has-validation">
        <input type="text" class="form-control" id="_Decision" name="decision" value="<?php echo @$items->decision; ?>">
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_DetailOfCase" class="col-md-3 col-form-label"><?php echo @lang('DETAIL_OF_CASE'); ?></label>
      <div class="col-md-4 has-validation">
        <input type="text" class="form-control" id="_DetailOfCase" name="detailOfCase" value="<?php echo @$items->detailOfCase; ?>">
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_TerminateDate" class="col-md-3 col-form-label"><?php echo @lang('TERMINATE_DATE'); ?></label>
      <div class="col-md-4 has-validation">
        <input type="text" class="form-control" id="_TerminateDate" name="terminateDate" value="<?php echo @$items->terminateDate; ?>">
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_TerminateReason" class="col-md-3 col-form-label"><?php echo @lang('TERMINATE_REASON'); ?></label>
      <div class="col-md-4 has-validation">
        <input type="text" class="form-control" id="_TerminateReason" name="terminateReason" value="<?php echo @$items->terminateReason; ?>">
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_TotalAmount" class="col-md-3 col-form-label"><?php echo @lang('TOTAL_AMOUNT'); ?></label>
      <div class="col-md-4 has-validation">
        <input type="text" class="form-control" id="_TotalAmount" name="totalAmount" value="<?php echo @$items->totalAmount; ?>">
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_AllegationStatus" class="col-md-3 col-form-label"><?php echo @lang('ALLEGATION_STATUS'); ?></label>
      <div class="col-md-4 has-validation">
        <?php echo @$selectBoxAllegationStatus; ?>
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_AllegationReason" class="col-md-3 col-form-label"><?php echo @lang('ALLEGATION_REASON'); ?></label>
      <div class="col-md-4 has-validation">
        <input type="text" class="form-control" id="_AllegationReason" name="allegationReason" value="<?php echo @$items->allegationReason; ?>">
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_DeleteReason" class="col-md-3 col-form-label"><?php echo @lang('DELETE_REASON'); ?></label>
      <div class="col-md-4 has-validation">
        <input type="text" class="form-control" id="_DeleteReason" name="deleteReason" value="<?php echo @$items->deleteReason; ?>">
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_CreatedBy" class="col-md-3 col-form-label"><?php echo @lang('CREATED_BY'); ?></label>
      <div class="col-md-4 has-validation">
        <input type="text" class="form-control" id="_CreatedBy" name="createdBy" value="<?php echo @$items->createdBy; ?>">
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_CreatedDate" class="col-md-3 col-form-label"><?php echo @lang('CREATED_DATE'); ?></label>
      <div class="col-md-4 has-validation">
        <input type="text" class="form-control" id="_CreatedDate" name="createdDate" value="<?php echo @$items->createdDate; ?>" required>
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_LastedUpdateBy" class="col-md-3 col-form-label"><?php echo @lang('LASTED_UPDATE_BY_'); ?></label>
      <div class="col-md-4 has-validation">
        <input type="text" class="form-control" id="_LastedUpdateBy" name="lastedUpdateBy" value="<?php echo @$items->lastedUpdateBy; ?>" required>
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_LastedUpdateDate" class="col-md-3 col-form-label"><?php echo @lang('LASTED_UPDATE_DATE'); ?></label>
      <div class="col-md-4 has-validation">
        <input type="text" class="form-control" id="_LastedUpdateDate" name="lastedUpdateDate" value="<?php echo @$items->lastedUpdateDate; ?>" required>
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_DataSourceId" class="col-md-3 col-form-label"><?php echo @lang('DATA_SOURCE_ID'); ?></label>
      <div class="col-md-4 has-validation">
        <?php echo @$selectBoxDataSourceId; ?>
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_StatusId" class="col-md-3 col-form-label"><?php echo @lang('STATUS_ID'); ?></label>
      <div class="col-md-2 has-validation">
        <?php echo @$selectBoxStatusId; ?>
      </div>
    </div>
    <div class="row pt-3 pb-0">
      <div class="col-md-3"></div>
      <div class="col-md-5"><span class="text-danger" id="error-message"></span></div>
      <div class="col-md-4">
        <div class="d-flex justify-content-end">
          <button class="btn btn-primary px-4 me-2" type="button" id="buttonSubmit"><?php echo @lang('BUTTON_SAVE'); ?></button>
          <button class="btn btn-secondary px-4" type="button" id="buttonCancel"><?php echo @lang('BUTTON_CANCEL'); ?></button>
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
  $(document).ready(function() {
    var baseUrl = "<?php echo base_url(); ?>page/personal-list-detail";
    var formId = $("#__RequestVerificationId").val();

    // **************************************************************************
    // !validate data ! allegation type code
    // **************************************************************************
    $("#_PersonId").keyup(function() {
      $("#error-message").text("");
      $("#buttonSubmit").attr("disabled", false);
      let personId = encodeURIComponent(this.value);
      let validateUrl = `${baseUrl}/validate/${formId}/${personId}`;

      $.get(validateUrl, function(data) {
        let result = JSON.parse(data);
        if (!result.duplicate) {
          $("#buttonSubmit").attr("disabled", false);
          return false;
        }

        $("#buttonSubmit").attr("disabled", true);
        $("#error-message").text(result.message);

      });
    });

    // **************************************************************************
    // !button cancel handler
    // **************************************************************************
    $("#buttonCancel").on("click", function() {
      $("#modalLoading").modal('show');
      window.location = baseUrl;
    });

    // **************************************************************************
    // !button save handler
    // **************************************************************************
    $("#buttonSubmit").on("click", function() {

      if ($("#error-message").text() !== "") return false;

      let formData = document.querySelector("#formData");
      let message = `<?php echo @lang("CONFIRM_MESSAGE_CREATE"); ?>`;

      if (!formData.checkValidity()) {
        formData.classList.add("was-validated");
      } else {
        $("#modalConfirmation").modal("show");
        if ($("#__RequestVerificationAction").val() === "EDIT") message = `<?php echo @lang("CONFIRM_MESSAGE_UPDATE"); ?>`;

        $("#modalMessage").html(message);
        $("#btnSave").on("click", function() {
          $("#modalLoading").modal("show");
          $("#modalConfirmation").modal("hide");
          $("#formData").submit();
        });
      }

      return false;

    });
  });
</script>