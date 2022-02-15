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
    <input type="hidden" id="dataSourceId" name="dataSourceId" value="<?php echo @$items->dataSourceId; ?>" />

    <span class="pt-1"></span>

    <div class="row">
      <div class="col">
        <div class="mb-2 row">
          <label for="_NationalId" class="col-sm-2 col-form-label"><?php echo @lang('NATIONAL_ID'); ?></label>
          <div class="col-sm-3 has-validation">
            <input type="text" class="form-control" id="_NationalId" name="nationalId" value="<?php echo @$items->nationalId; ?>">
            <div class="invalid-feedback"><?php echo @lang('NATIONAL_ID'); ?> <?php echo @lang('FORM_VALIDATE_REQUIRE'); ?></div>
          </div>
        </div>
        <div class="mb-2 row">
          <label for="_TitleTh" class="col-sm-2 col-form-label"><?php echo @lang('THAI_NAME'); ?></label>
          <div class="col-sm-2 has-validation">
            <?php echo @$selectBoxTitleTh; ?>
          </div>
          <div class="col-auto has-validation">
            <input type="text" class="form-control" id="_FirstNameTh" name="firstNameTh" value="<?php echo @$items->firstNameTh; ?>" required>
          </div>
          <div class="col-auto has-validation">
            <input type="text" class="form-control" id="_LastNameTh" name="lastNameTh" value="<?php echo @$items->lastNameTh; ?>" required>
          </div>
        </div>
        <div class="mb-2 row">
          <label for="_TitleEn" class="col-sm-2 col-form-label"><?php echo @lang('ENGLISH_NAME'); ?></label>
          <div class="col-sm-2 has-validation">
            <?php echo @$selectBoxTitleEn; ?>
          </div>
          <div class="col-auto has-validation">
            <input type="text" class="form-control" id="_FirstNameEn" name="firstNameEn" value="<?php echo @$items->firstNameEn; ?>">
          </div>
          <div class="col-auto has-validation">
            <input type="text" class="form-control" id="_LastNameEn" name="lastNameEn" value="<?php echo @$items->lastNameEn; ?>">
          </div>
        </div>
        <div class="mb-2 row">
          <label for="_PassportId" class="col-sm-2 col-form-label"><?php echo @lang('PASSPORT_ID'); ?></label>
          <div class="col-sm-3 has-validation">
            <input type="text" class="form-control" id="_PassportId" name="passportId" value="<?php echo @$items->passportId; ?>">
          </div>
          <label for="_ReferenceId" class="col-auto col-form-label"><?php echo @lang('REFERENCE_ID'); ?></label>
          <div class="col-sm-2 has-validation">
            <input type="text" class="form-control" id="_ReferenceId" name="referenceId" value="<?php echo @$items->referenceId; ?>">
          </div>
          <label for="_Gender" class="col-auto col-form-label"><?php echo @lang('GENDER'); ?></label>
          <div class="col-sm-2 has-validation">
            <input type="text" class="form-control" id="_Gender" name="gender" value="<?php echo @$items->gender; ?>">
          </div>
        </div>
      </div>
      <div class="col-2 text-center">
        <div class="w-100 h-100">
          <div class="border border-secondary mb-1">
            <img src="<?php echo base_url(); ?>public/img/avatar/user.png" style="width: 100%; height:100%" alt="" />
          </div>
          <button type="button" class="btn btn-sm btn-secondary">Upload Picture</button>
        </div>
      </div>
    </div>
    <div class="row pt-3 pb-0">
      <div class="col-sm-3"></div>
      <div class="col-sm-5"><span class="text-danger" id="error-message"></span></div>
      <div class="col-sm-4">
        <div class="d-flex justify-content-end">
          <button class="btn btn-primary me-2" type="button" id="buttonSubmit"><?php echo @lang('BUTTON_SAVE'); ?></button>
          <button class="btn btn-secondary" type="button" id="buttonCancel"><?php echo @lang('BUTTON_CANCEL'); ?></button>
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
    var baseUrl = "<?php echo base_url(); ?>page/person";
    var formId = $("#__RequestVerificationId").val();

    // **************************************************************************
    // !validate data ! allegation type code
    // **************************************************************************
    $("#_NationalId").keyup(function() {
      $("#error-message").text("");
      $("#buttonSubmit").attr("disabled", false);
      let nationalId = encodeURIComponent(this.value);
      let validateUrl = `${baseUrl}/validate/${formId}/${nationalId}`;

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