<div class="d-flex justify-content-between align-items-center mt-3">
  <?php echo @$breadcrumbs; ?>
</div>


<div class="shadow bg-body">
  <div class="px-3 py-3">
    <h5><i class="ti ti-align-justified icon"></i> <?php echo @lang("SUB_TITLE1"); ?></h5>
  </div>

  <div class="px-4 py-3">
    <div class="mb-2 row">
      <label for="_NationalId" class="col-sm-2 col-form-label"><?php echo @lang('SEARCH_UNIQUE_ID'); ?></label>
      <div class="col-sm-3 has-validation">
        <input type="text" class="form-control" id="_NationalId" name="nationalId" value="<?php echo @$items->nationalId; ?>">
      </div>
      <label for="_ReferenceId" class="col-sm-2 col-form-label"><?php echo @lang('SEARCH_REFERENCE_ID'); ?></label>
      <div class="col-sm-3 has-validation">
        <input type="text" class="form-control" id="_ReferenceId" name="referenceId" value="<?php echo @$items->nationalId; ?>">
      </div>
    </div>
    <div class="mb-2 row">
      <label for="_NameTH" class="col-sm-2 col-form-label"><?php echo @lang('SEARCH_NAME_TH'); ?></label>
      <div class="col-sm-3 has-validation">
        <input type="text" class="form-control" id="_NameTH" name="nameTh" value="<?php echo @$items->nationalId; ?>">
      </div>
      <label for="_NameEN" class="col-sm-2 col-form-label"><?php echo @lang('SEARCH_NAME_EN'); ?></label>
      <div class="col-sm-3 has-validation">
        <input type="text" class="form-control" id="_NameEN" name="nameEn" value="<?php echo @$items->nationalId; ?>">
      </div>
    </div>
    <div class="mb-2 row">
      <div class="d-flex justify-content-end align-items-end col-10">
        <button class="btn btn-primary"><i class="ti ti-search icon"></i> Search</button>
      </div>
    </div>
  </div>
</div>

<div class="mt-4 shadow bg-body">
<div class="px-3 py-3">
    <h5><i class="ti ti-align-justified icon"></i> <?php echo @lang("SUB_TITLE2"); ?></h5>
  </div>

  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th><?php echo @lang("NATIONAL_ID"); ?>.</th>
          <th><?php echo @lang("PASSPORT_ID"); ?></th>
          <th><?php echo @lang("TITLE_TH"); ?></th>
          <th><?php echo @lang("FIRST_NAME_TH"); ?></th>
          <th><?php echo @lang("LAST_NAME_TH"); ?></th>
          <th><?php echo @lang("TITLE_EN"); ?></th>
          <th><?php echo @lang("ACTIONS"); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($results) && is_array($results)) {
          $counter = @$startRow;
          foreach ($results as $rs) {
        ?>
            <tr>
              <td class="text-muted"><?php echo $counter; ?></td>
              <td><?php echo @$rs->nationalId; ?></td>
              <td><?php echo @$rs->passportId; ?></td>
              <td><?php echo @$rs->titleTh; ?></td>
              <td><?php echo @$rs->firstNameTh; ?></td>
              <td><?php echo @$rs->lastNameTh; ?></td>
              <td><?php echo @$rs->titleEn; ?></td>
              <td class="text-nowrap">
                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalLoading" data-bs-action="edit" data-bs-id="<?php echo @$rs->id; ?>"><?php echo @lang('LIST_BUTTON_EDIT'); ?></button>
                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteConfirm" data-bs-action="remove" data-bs-id="<?php echo @$rs->id; ?>" data-bs-label="<?php echo @$rs->companyCode; ?>"><?php echo @lang('LIST_BUTTON_DEL'); ?></button>
              </td>
            </tr>
        <?php
            $counter++;
          }
        } ?>
      </tbody>
    </table>
  </div>
  <div class="card-footer d-flex align-items-center bg-body">
    <?php if (isset($totalRows) && $totalRows > 0) { ?>
      <p class="m-0 text-muted">Showing <span><?php echo @$startRow; ?></span> to <span><?php echo @$endRow; ?></span> of <span><?php echo @$totalRows; ?></span> entries</p>
      <?php echo @$pagination; ?>
    <?php } else { ?>
      <p class="m-0 text-muted">No data found</p>
    <?php } ?>
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

<!-- Modal Delete Confirmation-->
<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="modalDeleteConfirm" tabindex="-1" aria-labelledby="modalDeleteConfirmLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDeleteConfirmLabel">CONFIRMATION</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php echo form_open(base_url(), array("id" => "formConfirmDeleteData")); ?>
        <div class="mb-3">
          <input type="hidden" id="__RequestVerificationAction" name="__RequestVerificationAction" value="__delete__" />
          <input type="hidden" id="__RequestVerificationId" name="__RequestVerificationId" />
          <label for="modalMessage" class="modalMessage h5"></label>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo @lang('CONFIRM_BUTTON_NO'); ?></button>
        <button type="button" id="btnConfirmDelete" class="btn btn-danger"><?php echo @lang('CONFIRM_BUTTON_YES'); ?></button>
      </div>
    </div>
  </div>
</div>

<script>
  var baseUrl = "<?php echo base_url(); ?>page/person";
  var modalLoading = document.getElementById("modalLoading");
  var modalDeleteConfirm = document.getElementById("modalDeleteConfirm");

  // display modal loading...
  modalLoading.addEventListener("shown.bs.modal", function(event) {
    try {
      // getting attributes
      var button = event.relatedTarget;
      var modalAction = button.getAttribute("data-bs-action");
      var modalId = button.getAttribute("data-bs-id");

      if (modalAction == "create")
        window.location = `${baseUrl}/${modalAction}`;
      else
        window.location = `${baseUrl}/${modalAction}/${modalId}`;
    } catch (error) {
      console.log("modalLoading.addEventListener");
    }
  });


  // display modal confirmation
  modalDeleteConfirm.addEventListener("shown.bs.modal", function(event) {
    // getting modal components by id
    const modalTitle = modalDeleteConfirm.querySelector(".modal-title");
    const modalBodyMessage = modalDeleteConfirm.querySelector(".modal-body label");
    // getting attributes
    const button = event.relatedTarget;
    const modalAction = button.getAttribute("data-bs-action");
    const modalId = button.getAttribute("data-bs-id");
    const modalLabel = button.getAttribute("data-bs-label");
    const textMessage = `<?php echo @lang('CONFIRM_MESSAGE_DEL'); ?> company "${modalLabel}"`;

    // update form values
    $("#formConfirmDeleteData").attr("action", `${baseUrl}/${modalAction}/${modalId}`);
    $("#__RequestVerificationId").val(modalId);
    // assign value to html
    // modalTitle.textContent = textTitle;
    modalBodyMessage.innerHTML = `${textMessage}" ?`;
  });

  // button confirm delete handler
  $("#btnConfirmDelete").on("click", function(evt) {
    $("#modalDeleteConfirm").modal("hide");
    $("#modalLoading").modal("show");
    $("#formConfirmDeleteData").submit();
  });
</script>