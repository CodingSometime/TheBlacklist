<link rel="stylesheet" href="<?php echo base_url(); ?>public/datepicker/css/bootstrap-datepicker.min.css" />
<div class="d-flex justify-content-between align-items-center mt-2">
  <?php echo @$breadcrumbs; ?>
</div>

<div class="my-1 p-3">
  <?php echo form_open(base_url() . "page/person/save", array("id" => "formData", "class" => "row g-3")); ?>
  <input type="hidden" id="__RequestVerificationAction" name="__RequestVerificationAction"
    value="<?php echo @$__RequestVerificationAction; ?>" />
  <?php if (isset($__RequestVerificationAction) && $__RequestVerificationAction != "NEW") {?>
  <input type="hidden" id="__RequestVerificationId" name="__RequestVerificationId" value="<?php echo @$items->id; ?>" />
  <?php }?>
  <input type="hidden" id="dataSourceId" name="dataSourceId" value="1" />
  <input type="hidden" id="allegationStatus" name="allegationStatus" value="<?php echo @$items->allegationStatus; ?>" />

  <div class="my-1 p-4 rounded shadow bg-body">
    <h5 class="border-bottom pb-2 mb-0"><i class="ti ti-edit-circle icon"></i> <?php echo @lang("TITLE"); ?></h5>
    <div class="my-1 p-3 rounded">
      <span class="pt-1"></span>
      <div class="row">
        <div class="col">
          <div class="mb-2 row g-1">
            <label for="nationalId" class="col-md-2 col-form-label"><?php echo @lang('NATIONAL_ID'); ?><span
                class="text-danger">*</span></label>

            <div class="col-md-3 has-validation">
              <input type="text" class="form-control text-center" id="nationalId" name="nationalId"
                value="<?php echo @$items->nationalId; ?>" maxlength="13" onkeypress="return /[0-9]/i.test(event.key)"
                required>
            </div>
          </div>
          <div class="mb-2 row g-1">
            <label for="passportId" class="col-md-2 col-form-label"><?php echo @lang('PASSPORT_ID'); ?></label>
            <div class="col-md-3 has-validation">
              <input type="text" class="form-control text-center" id="passportId" name="passportId"
                value="<?php echo @$items->passportId; ?>">
            </div>
            <label for="referenceId" class="mx-2 col-auto col-form-label"><?php echo @lang('REFERENCE_ID'); ?></label>
            <div class="col-md-3 has-validation">
              <input type="text" class="form-control text-center" id="referenceId" name="referenceId"
                value="<?php echo @$items->referenceId; ?>">
            </div>
          </div>
          <div class="mb-2 row g-1">
            <label for="titleTh" class="col-md-2 col-form-label"><?php echo @lang('THAI_NAME'); ?><span
                class="text-danger">*</span></label>
            <div class="col-md-3 has-validation">
              <?php echo @$selectBoxTitleTh; ?>
            </div>
            <div class="mx-1 col-auto has-validation">
              <input type="text" class="form-control" id="firstNameTh" name="firstNameTh" title="first name (th)"
                value="<?php echo @$items->firstNameTh; ?>" required>
            </div>
            <div class="col-auto has-validation">
              <input type="text" class="form-control" id="lastNameTh" name="lastNameTh" title="last name (th)"
                value="<?php echo @$items->lastNameTh; ?>" required>
            </div>
          </div>
          <div class="mb-2 row g-1">
            <label for="titleEn" class="col-md-2 col-form-label"><?php echo @lang('ENGLISH_NAME'); ?><span
                class="text-danger">*</span></label>
            <div class="col-md-3 has-validation">
              <?php echo @$selectBoxTitleEn; ?>
            </div>
            <div class="mx-1 col-auto has-validation">
              <input type="text" class="form-control" id="firstNameEn" name="firstNameEn" title="first name (en)"
                value="<?php echo @$items->firstNameEn; ?>" required>
            </div>
            <div class="col-auto has-validation">
              <input type="text" class="form-control" id="lastNameEn" name="lastNameEn" title="last name (en)"
                value="<?php echo @$items->lastNameEn; ?>" required>
            </div>
          </div>
          <div class="mb-2 row g-1">
            <label for="gender" class="col-md-2 col-form-label"><?php echo @lang('GENDER'); ?><span
                class="text-danger">*</span></label>
            <div class="col-md-3 has-validation">
              <?php echo @$selectBoxGender; ?>
            </div>
          </div>

        </div>
        <div class="col-2 text-center">
          <div class="w-100 h-100">
            <div class="border border-secondary mb-1">
              <img src="<?php echo base_url(); ?>public/img/avatar/user.png" style="width: 100%; height:100%" alt="" />
            </div>
            <button type="button" class="btn btn-sm btn-secondary">อับโหลดรูปภาพ</button>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="mt-4 p-4 rounded shadow bg-body">
    <h5 class="border-bottom pb-2 mb-0"><i class="ti ti-edit-circle icon"></i>
      <?php echo @lang("TITLE_PERSONAL_LIST"); ?>
    </h5>
    <div class="mt-2 p-2">
      <div class="row mt-2">
        <div class="col ps-4">
          <div class="row mb-2">
            <div class="col has-validation d-flex">
              <label for="sequenceNo" class="col-md-4 col-form-label"><?php echo @lang('SEQUENCE_NO'); ?></label>
              <div class="col-md-2">
                <input type="text" class="form-control text-center fw-bold" id="sequenceNo" name="sequenceNo"
                  value="1<?php echo @$items->sequenceNumber; ?>" readonly />
              </div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col has-validation d-flex">
              <label for="employeeNumber" class="col-md-4 col-form-label"><?php echo @lang('EMPLOYEE_NUMBER'); ?><span
                  class="text-danger">*</span></label>
              <div class="col-md-4">
                <input type="text" class="form-control text-center" id="employeeNumber" name="employeeNumber"
                  placeholder="" value="<?php echo @$items->employeeNumber; ?>" maxlength="8"
                  onkeypress="return /[0-9]/i.test(event.key)" required />
              </div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col has-validation d-flex">
              <label for="personTypeId" class="col-md-4 col-form-label"><?php echo @lang('PERSON_TYPE_ID'); ?><span
                  class="text-danger">*</span></label>
              <div class="col-md-4">
                <?php echo @$selectBoxPersonType; ?>
              </div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col has-validation d-flex">
              <label for="companyOrVendor"
                class="col-md-4 col-form-label"><?php echo @lang('COMPANY_OR_VENDOR'); ?><span
                  class="text-danger">*</span></label>
              <div class="col-md-7">
                <input type="text" class="form-control" id="companyOrVendor" name="companyOrVendor"
                  value="<?php echo @$items->companyOrVendor; ?>" required />
              </div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col has-validation d-flex">
              <label for="organizationName"
                class="col-md-4 col-form-label"><?php echo @lang('ORGANIZATION_NAME'); ?><span
                  class="text-danger">*</span></label>
              <div class="col-md-7">
                <input type="text" class="form-control" id="organizationName" name="organizationName"
                  value="<?php echo @$items->organizationName; ?>" required />
              </div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col has-validation d-flex">
              <label for="positionName" class="col-md-4 col-form-label"><?php echo @lang('POSITION_NAME'); ?><span
                  class="text-danger">*</span></label>
              <div class="col-md-7">
                <input type="text" class="form-control" id="positionName" name="positionName"
                  value="<?php echo @$items->positionName; ?>" required />
              </div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col has-validation">
              <div class="d-flex">
                <label for="companyCode" class="col-md-4 col-form-label"><?php echo @lang('COMPANY_CODE'); ?><span
                    class="text-danger">*</span></label>
                <div class="col-md-7">
                  <input type="text" class="form-control" id="companyCode" name="companyCode"
                    value="<?php echo @$items->companyCode; ?>" required />
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col has-validation d-flex">
              <label for="branchCode" class="col-md-4 col-form-label"><?php echo @lang('BRANCH_CODE'); ?><span
                  class="text-danger">*</span></label>
              <div class="col-md-7">
                <input type="text" class="form-control" id="branchCode" name="branchCode"
                  value="<?php echo @$items->branchCode; ?>" required />
              </div>
            </div>
          </div>
        </div>

        <div class="col ps-4 border-start">
          <div class="row mb-2">
            <div class="col">&nbsp;</div>
          </div>
          <div class="row mb-2">
            <div class="col has-validation d-flex">
              <label for="misbehaviorDate" class="col-md-4 col-form-label"><?php echo @lang('MISBEHAVIOR_DATE'); ?><span
                  class="text-danger">*</span></label>
              <div class="col-md-3">
                <input type="text" class="form-control text-center" id="misbehaviorDate" name="misbehaviorDate"
                  placeholder="dd/mm/yyyy" value="<?php echo @$items->misbehaviorDate; ?>" required />
              </div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col has-validation d-flex">
              <label for="misbehaviorTime" class="col-md-4 col-form-label"><?php echo @lang('MISBEHAVIOR_TIME'); ?><span
                  class="text-danger">*</span></label>
              <div class="col-md-7"><?php echo @$selectBoxMisbehaviorTime; ?></div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col has-validation d-flex">
              <label for="allegationTypeId"
                class="col-md-4 col-form-label"><?php echo @lang('ALLEGATION_TYPE_ID'); ?><span
                  class="text-danger">*</span></label>
              <div class="col-md-7"><?php echo @$selectBoxAllegationType; ?></div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col has-validation d-flex">
              <label for="detailOfCase" class="col-md-4 col-form-label"><?php echo @lang('DETAIL_OF_CASE'); ?><span
                  class="text-danger">*</span></label>
              <div class="col-md-7"><textarea type="text" class="form-control" id="detailOfCase" name="detailOfCase"
                  row="5" required><?php echo @$items->detailOfCase; ?></textarea></div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col has-validation d-flex">
              <label for="totalAmount" class="col-md-4 col-form-label"><?php echo @lang('TOTAL_AMOUNT'); ?><span
                  class="text-danger">*</span></label>
              <div class="col-md-4">
                <input type="number" class="form-control text-center" id="totalAmount" name="totalAmount"
                  value="<?php echo @$items->totalAmount; ?>" required />
              </div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col has-validation d-flex">
              <label for="decision" class="col-md-4 col-form-label"><?php echo @lang('DECISION'); ?><span
                  class="text-danger">*</span></label>
              <div class="col-md-7">
                <input type="text" class="form-control" id="decision" name="decision"
                  value="<?php echo @$items->decision; ?>" required />
              </div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col has-validation d-flex">
              <label for="_isAllegationStatus"
                class="col-md-4 form-check-label"><?php echo @lang('ALLEGATION_STATUS'); ?></label>
              <div class="col-md-7"><input type="checkbox" class="form-check-input" id="_isAllegationStatus"
                  name="_isAllegationStatus"></div>
            </div>
          </div>
          <div class="row mb-2 invisible" id="_AllegationReason">
            <div class="col has-validation d-flex">
              <label for="allegationReason"
                class="col-md-4 col-form-label"><?php echo @lang("ALLEGATION_REASON"); ?></label>
              <div class="col-md-7"><textarea type="text" class="form-control" id="allegationReason"
                  name="allegationReason" row="5" required><?php echo @$items->allegationReason; ?></textarea></div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-end">
    <button class="btn btn-primary px-4 me-2" type="button"
      id="buttonSubmit"><?php echo @lang('BUTTON_SAVE'); ?></button>
    <button class="btn btn-secondary px-4" type="button"
      id="buttonCancel"><?php echo @lang('BUTTON_CANCEL'); ?></button>
  </div>
  </form>
</div>

<!-- Modal Confirmation -->
<div class="modal fade" data-bs-keyboard="false" data-bs-backdrop="static" id="modalConfirmation" tabindex="-1"
  role="dialog" aria-labelledby="modalConfirmationTitle" aria-hidden="true">
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
        <button type="button" id="btnClose" class="btn btn-secondary"
          data-bs-dismiss="modal"><?php echo @lang('CONFIRM_BUTTON_NO'); ?>
        </button>
        <button type="button" id="btnSave" class="btn btn-primary"><?php echo @lang('CONFIRM_BUTTON_YES'); ?></button>
      </div>
    </div>
  </div>
</div>


<script>
$(document).ready(function() {
  var baseUrl = "<?php echo base_url(); ?>page/person";
  var formId = $("#__RequestVerificationId").val();
  if (formId == undefined) formId = 0;

  // datepicker
  $('#misbehaviorDate').datepicker({
    format: "dd/mm/yyyy",
    clearBtn: true,
    // language: "th",
    todayHighlight: true
  });

  // require input elements
  var inputs = ["nationalId", "employeeNumber", "titleThId", "firstNameTh", "lastNameTh",
    "titleEnId", "firstNameEn", "lastNameEn", "gender", "employeeNumber", "personTypeId",
    "companyOrVendor", "organizationName", "positionName", "companyCode", "branchCode",
    "misbehaviorDate", "misbehaviorTime", "allegationTypeId", "detailOfCase", "totalAmount",
    "decision"
  ];

  function InputRequireValidator() {
    if (!inputs) return false;
    let counter = 0;
    let result = true;

    inputs.forEach(id => {
      let obj = document.getElementById(id);
      if (!obj) return false;

      let value = obj.value;

      obj.classList.remove("is-invalid");

      if (value == "" || value == undefined) {
        counter++;
        obj.title = "Value cannot be null";
        obj.classList.add("is-invalid");
      }
    });

    if (counter > 0) return false;
    return true;
  }


  // **************************************************************************
  // Input validation
  // **************************************************************************
  $("#nationalId").blur(function() {
    // validate national identifier first!
    let currentNationalId = this.value;

    if (currentNationalId.length != 13) return false;
    if (validateNationalIdentifier(currentNationalId) == false) {
      $("#modalAlertMessage").html(`เลขที่บัตรประจำตัวประชาชน ${currentNationalId} ไม่ถูกต้อง`);
      $("#modalAlert").modal("show");
      $("#modalAlert").on("hidden.bs.modal", function() {
        $("#nationalId").focus();
      });
    }

    // check if person exists in database via national identifier
    $("#error-message").text("");
    $("#buttonSubmit").attr("disabled", false);
    let nationalId = encodeURIComponent(currentNationalId);
    let validateUrl = `${baseUrl}/validate/${formId}/${nationalId}`;

    // use jquery for call api
    $.get(validateUrl, function(data) {
      let result = JSON.parse(data);
      if (!result.duplicate) {
        $("#buttonSubmit").attr("disabled", false);
        return false;
      }

      $("#modalAlertMessage").html(`เลขที่บัตรประจำตัวประชาชน ${nationalId} นี้มีอยู่แล้วในระบบ`);
      $("#modalAlert").modal("show");
      $("#modalAlert").on("hidden.bs.modal", function() {
        $("#nationalId").focus();
      });
      $("#buttonSubmit").attr("disabled", true);
    });
  });


  $("#employeeNumber").blur(function() {
    if (this.value == "") return false;
    if (this.value != "" && this.value.length != 8) {
      $("#modalAlertMessage").html("รหัสพนักงานไม่ถูกต้อง");
      $("#modalAlert").modal("show");
      $("#modalAlert").on("hidden.bs.modal", function() {
        $("#employeeNumber").addClass("is-invalid");
        $('#employeeNumber').prop('title', 'your new title');
        $("#employeeNumber").focus();
      });
    } else {
      $("#employeeNumber").removeClass("is-invalid");
    }
  });

  // toggle allegation status, if yes show reason form
  $("#_isAllegationStatus").change(function() {
    if (this.checked) {
      $("#_AllegationReason").toggleClass("invisible");
    } else {
      $("#_AllegationReason").toggleClass("invisible");
    }
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
    var isValidated = InputRequireValidator();
    if (!isValidated) return false;
    if ($("#error-message").text() !== "") return false;

    let formData = document.querySelector("#formData");
    let message = `
                      <?php echo @lang("CONFIRM_MESSAGE_CREATE"); ?> `;


    $("#modalConfirmation").modal("show");
    if ($("#__RequestVerificationAction").val() === "EDIT") message =
      `
                      <?php echo @lang("CONFIRM_MESSAGE_UPDATE"); ?> `;

    $("#modalMessage").html(message);
    $("#btnSave").on("click", function() {
      $("#modalLoading").modal("show");
      $("#modalConfirmation").modal("hide");
      $("#formData").submit();
    });

    return false;

  });


  function validateNationalIdentifier(nationalId) {
    if (nationalId.length != 13)
      return false;

    var sum = 0;

    for (i = 0, sum = 0; i < 12; i++) {
      sum += parseFloat(nationalId.charAt(i)) * (13 - i);
    }

    if ((11 - sum % 11) % 10 != parseFloat(nationalId.charAt(12)))
      return false;

    return true;
  }

});
</script>
<script src="<?php echo base_url(); ?>public/datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>public/datepicker/locales/bootstrap-datepicker.th.min.js" charset="UTF-8">
</script>