<div class="d-flex justify-content-between align-items-center mt-2">
  <?php echo @$breadcrumbs; ?>
</div>
<div class="my-1 p-3 rounded shadow bg-body">
  <div class="row py-2 border-bottom">
    <div class="col-md-6 pb-2 mb-0 h5"><i class="ti ti-edit-circle icon"></i> <?php echo @lang("TITLE"); ?></div>
    <div class="col-md-6 text-muted text-end"><span class="fs-8"><?php if(isset($items->id)) echo @$items->lastUpdateLabel; ?></span></div>
  </div>
  <div class="my-1 p-3 rounded">
    <?php echo form_open(base_url() . "page/security-profile/save", array("id" => "formData", "class" => "row g-3 needs-validation")); ?>
    <input type="hidden" id="__RequestVerificationAction" name="__RequestVerificationAction" value="<?php echo @$__RequestVerificationAction; ?>" />
    <?php if (isset($__RequestVerificationAction) && $__RequestVerificationAction != "NEW") { ?>
      <input type="hidden" id="__RequestVerificationId" name="__RequestVerificationId" value="<?php echo @$items->id; ?>" />
    <?php } ?>

      <input type="hidden" id="isCreate" name="isCreate" value="<?php echo @$items->isCreate; ?>" />
      <input type="hidden" id="isUpdate" name="isUpdate" value="<?php echo @$items->isUpdate; ?>" />
      <input type="hidden" id="isView" name="isView" value="<?php echo @$items->isView; ?>" />
      <input type="hidden" id="isDeleteL1" name="isDeleteL1" value="<?php echo @$items->isDeleteL1; ?>" />
      <input type="hidden" id="isDeleteL2" name="isDeleteL2" value="<?php echo @$items->isDeleteL2; ?>" />
      <input type="hidden" id="isDeleteL3" name="isDeleteL3" value="<?php echo @$items->isDeleteL3; ?>" />

    <span class="pt-1"></span>

    <div class="mb-2 row">
      <label for="roleId" class="col-md-3 col-form-label"><?php echo @lang('ROLE_ID'); ?></label>
      <div class="col-md-4 has-validation">
        <?php echo @$selectBoxRoleCode; ?>
      </div>
    </div>

    <h6 class="border-bottom px-2 pb-2"><i class="ti ti-chevron-right icon"></i><?php echo @lang("TITLE_RESPONSE"); ?></h6>

    <div class="mb-2 row">
      <label for="personTypeId" class="col-md-3 col-form-label"><?php echo @lang('PERSON_TYPE_ID'); ?></label>
      <div class="col-md-4 has-validation">
        <?php echo @$selectBoxPersonTypeCode; ?>
      </div>
    </div>
    <div class="mb-2 row">
      <label for="businessUnitCode" class="col-md-3 col-form-label"><?php echo @lang('BUSINESS_UNIT_CODE'); ?></label>
      <div class="col-md-4 has-validation">
        <?php echo @$selectBoxBusinessUnitCode; ?>
      </div>
    </div>
    <div class="mb-2 row">
      <label for="groupCompanyId" class="col-md-3 col-form-label"><?php echo @lang('GROUP_COMPANY_ID'); ?></label>
      <div class="col-md-4 has-validation">
        <?php echo @$selectBoxGroupCompanyCode; ?>
      </div>
    </div>
    <div class="mb-2 row">
      <label for="companyCode" class="col-md-3 col-form-label"><?php echo @lang('COMPANY_CODE'); ?></label>
      <div class="col-md-4 has-validation">
        <?php echo @$selectBoxCompanyCode; ?>
      </div>
    </div>
    <div class="mb-2 row">
      <label for="branchCode" class="col-md-3 col-form-label"><?php echo @lang('BRANCH_CODE'); ?></label>
      <div class="col-md-4 has-validation">
        <?php echo @$selectBoxBranchCode; ?>
      </div>
    </div>

    <h6 class="border-bottom px-2 py-2 mb-2"><i class="ti ti-chevron-right icon"></i><?php echo @lang("TITLE_PRIVILEGE"); ?></h6>
    <?php
    $isCreate = @$items->isCreate == "Y" ? "checked" : "";
    $isUpdate = @$items->isUpdate == "Y" ? "checked" : "";
    $isView = @$items->isView == "Y" ? "checked" : "";
    $isDeleteL1 = @$items->isDeleteL1 == "Y" ? "checked" : "";
    $isDeleteL2 = @$items->isDeleteL2 == "Y" ? "checked" : "";
    $isDeleteL3 = @$items->isDeleteL3 == "Y" ? "checked" : "";
    ?>
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-9">
        <div class="form-check form-switch py-1">
          <input class="form-check-input" type="checkbox" role="switch" id="_IsCreate" name="_IsCreate" value="Y" <?php echo $isCreate;?>>
          <label class="form-check-label" for="_IsCreate"><?php echo @lang("IS_CREATE"); ?></label>
        </div>
        <div class="form-check form-switch py-1">
          <input class="form-check-input" type="checkbox" role="switch" id="_IsUpdate" name="_IsUpdate" value="Y" <?php echo $isUpdate;?>>
          <label class="form-check-label" for="_IsUpdate"><?php echo @lang("IS_UPDATE"); ?></label>
        </div>
        <div class="form-check form-switch py-1">
          <input class="form-check-input" type="checkbox" role="switch" id="_IsView" name="_IsView" value="Y" <?php echo $isView;?>>
          <label class="form-check-label" for="_IsView"><?php echo @lang("IS_VIEW"); ?></label>
        </div>
        <div class="form-check form-switch py-1">
          <input class="form-check-input" type="checkbox" role="switch" id="_IsDeleteL1" name="_IsDeleteL1" value="Y" <?php echo $isDeleteL1;?>>
          <label class="form-check-label" for="_IsDeleteL1"><?php echo @lang("IS_DELETE_L1"); ?></label>
        </div>
        <div class="form-check form-switch py-1">
          <input class="form-check-input" type="checkbox" role="switch" id="_IsDeleteL2" name="_IsDeleteL2" value="Y" <?php echo $isDeleteL2;?>>
          <label class="form-check-label" for="_IsDeleteL2"><?php echo @lang("IS_DELETE_L2"); ?></label>
        </div>
        <div class="form-check form-switch py-1">
          <input class="form-check-input" type="checkbox" role="switch" id="_IsDeleteL3" name="_IsDeleteL3" value="Y" <?php echo $isDeleteL3;?>>
          <label class="form-check-label" for="_IsDeleteL3"><?php echo @lang("IS_DELETE_L3"); ?></label>
        </div>
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

    $('#roleId').select2( {
        theme: 'bootstrap-5'
    });

    $('#privilegeTypeId').select2( {
        theme: 'bootstrap-5'
    });

    $('#personTypeId').select2( {
        theme: 'bootstrap-5'
    });

    $('#businessUnitCode').select2( {
        theme: 'bootstrap-5'
    });

    $('#groupCompanyId').select2( {
        theme: 'bootstrap-5'
    });

    $('#companyCode').select2( {
        theme: 'bootstrap-5'
    });

    $('#branchCode').select2( {
        theme: 'bootstrap-5'
    });


    var baseUrl = "<?php echo base_url(); ?>page/security-profile";
    var formId = $("#__RequestVerificationId").val();

    // **************************************************************************
    // !validate data ! check duplicate data first
    // **************************************************************************
    // $("#roleId").keyup(function() {
    //   $("#error-message").text("");
    //   $("#buttonSubmit").attr("disabled", false);
    //   let roleCode = encodeURIComponent(this.value);
    //   let validateUrl = `${baseUrl}/validate/${formId}/${roleCode}`;

    //   $.get(validateUrl, function(data) {
    //     let result = JSON.parse(data);
    //     if (!result.duplicate) {
    //       $("#buttonSubmit").attr("disabled", false);
    //       return false;
    //     }

    //     $("#buttonSubmit").attr("disabled", true);
    //     $("#error-message").text(result.message);

    //   });
    // });

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

          // apply checkbox uncheck
          const _IsCreate = $("#_IsCreate").is(":checked") ? "Y" : "N";
          const _IsUpdate = $("#_IsUpdate").is(":checked") ? "Y" : "N";
          const _IsView = $("#_IsView").is(":checked") ? "Y" : "N";
          const _IsDeleteL1 = $("#_IsDeleteL1").is(":checked") ? "Y" : "N";
          const _IsDeleteL2 = $("#_IsDeleteL2").is(":checked") ? "Y" : "N";
          const _IsDeleteL3 = $("#_IsDeleteL3").is(":checked") ? "Y" : "N";
          
          $("#_IsCreate").attr("disabled", true);
          $("#_IsUpdate").attr("disabled", true);
          $("#_IsView").attr("disabled", true);
          $("#_IsDeleteL1").attr("disabled", true);
          $("#_IsDeleteL2").attr("disabled", true);
          $("#_IsDeleteL3").attr("disabled", true);
          
          $("#isCreate").val(_IsCreate);
          $("#isUpdate").val(_IsUpdate);
          $("#isView").val(_IsView);
          $("#isDeleteL1").val(_IsDeleteL1);
          $("#isDeleteL2").val(_IsDeleteL2);
          $("#isDeleteL3").val(_IsDeleteL3);

          // goto somewhere
          $("#formData").submit();
        });
      }

      return false;

    });
  });
</script>