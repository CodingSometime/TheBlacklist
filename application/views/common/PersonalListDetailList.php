<div class="d-flex justify-content-between align-items-center mt-3">
  <?php echo @$breadcrumbs; ?>
  <a href="<?php echo base_url(); ?>page/personal-list-detail/create" class="btn btn-primary"><i class="ti ti-plus icon"></i> New <?php echo @lang("TITLE"); ?></a>
</div>
<div class="shadow bg-body">
  <div class="border-bottom px-3 py-3 d-flex justify-content-between align-items-center">
    <h5><i class="ti ti-align-justified icon"></i> <?php echo @lang("TITLE"); ?></h5>
    <div>
      <form action="<?php echo @$route; ?>">
        <input type="text" name="q" value="<?php echo @$_GET["q"]; ?>" class="form-control  col-md-3" placeholder="Search.." aria-label="Search" />
      </form>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
					<th><?php echo @lang("PERSON_ID");?></th>
					<th><?php echo @lang("SEQUENCE_NO");?></th>
					<th><?php echo @lang("EMPLOYEE_NUMBER");?></th>
					<th><?php echo @lang("BUSINESS_UNIT_CODE");?></th>
					<th><?php echo @lang("COMPANY_CODE");?></th>
					<th><?php echo @lang("BRANCH_CODE");?></th>
					<th><?php echo @lang("COMPANY_OR_VENDOR");?></th>
					<th><?php echo @lang("ORGANIZATION_NAME");?></th>
					<th><?php echo @lang("POSITION_NAME");?></th>
					<th><?php echo @lang("PERSON_TYPE_CODE");?></th>
					<th><?php echo @lang("AGE");?></th>
					<th><?php echo @lang("SERVICE_YEAR");?></th>
					<th><?php echo @lang("MENTAL");?></th>
					<th><?php echo @lang("OCCUPATION");?></th>
					<th><?php echo @lang("MISBEHAVIOR_DATE");?></th>
					<th><?php echo @lang("MISBEHAVIOR_TIME");?></th>
					<th><?php echo @lang("MISBEHAVIOR_PLACE");?></th>
					<th><?php echo @lang("PROVINCE_ID");?></th>
					<th><?php echo @lang("DISTRICT_ID");?></th>
					<th><?php echo @lang("ALLEGATION_TYPE_ID");?></th>
					<th><?php echo @lang("DECISION");?></th>
					<th><?php echo @lang("DETAIL_OF_CASE");?></th>
					<th><?php echo @lang("TERMINATE_DATE");?></th>
					<th><?php echo @lang("TERMINATE_REASON");?></th>
					<th><?php echo @lang("TOTAL_AMOUNT");?></th>
					<th><?php echo @lang("ALLEGATION_STATUS");?></th>
					<th><?php echo @lang("ALLEGATION_REASON");?></th>
					<th><?php echo @lang("DELETE_REASON");?></th>
					<th><?php echo @lang("CREATED_BY");?></th>
					<th><?php echo @lang("CREATED_DATE");?></th>
					<th><?php echo @lang("LASTED_UPDATE_BY_");?></th>
					<th><?php echo @lang("LASTED_UPDATE_DATE");?></th>
					<th><?php echo @lang("DATA_SOURCE_ID");?></th>
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
							<td><?php echo @$rs->personId;?></td>
							<td><?php echo @$rs->sequenceNo;?></td>
							<td><?php echo @$rs->employeeNumber;?></td>
							<td><?php echo @$rs->businessUnitCode;?></td>
							<td><?php echo @$rs->companyCode;?></td>
							<td><?php echo @$rs->branchCode;?></td>
							<td><?php echo @$rs->companyOrVendor;?></td>
							<td><?php echo @$rs->organizationName;?></td>
							<td><?php echo @$rs->positionName;?></td>
							<td><?php echo @$rs->personTypeCode;?></td>
							<td><?php echo @$rs->age;?></td>
							<td><?php echo @$rs->serviceYear;?></td>
							<td><?php echo @$rs->mental;?></td>
							<td><?php echo @$rs->occupation;?></td>
							<td><?php echo @$rs->misbehaviorDate;?></td>
							<td><?php echo @$rs->misbehaviorTime;?></td>
							<td><?php echo @$rs->misbehaviorPlace;?></td>
							<td><?php echo @$rs->provinceId;?></td>
							<td><?php echo @$rs->districtId;?></td>
							<td><?php echo @$rs->allegationTypeId;?></td>
							<td><?php echo @$rs->decision;?></td>
							<td><?php echo @$rs->detailOfCase;?></td>
							<td><?php echo @$rs->terminateDate;?></td>
							<td><?php echo @$rs->terminateReason;?></td>
							<td><?php echo @$rs->totalAmount;?></td>
							<td><?php echo @$rs->allegationStatus;?></td>
							<td><?php echo @$rs->allegationReason;?></td>
							<td><?php echo @$rs->deleteReason;?></td>
							<td><?php echo @$rs->createdBy;?></td>
							<td><?php echo @$rs->createdDate;?></td>
							<td><?php echo @$rs->lastedUpdateBy;?></td>
							<td><?php echo @$rs->lastedUpdateDate;?></td>
							<td><?php echo @$rs->dataSourceId;?></td>
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
  var baseUrl = "<?php echo base_url(); ?>page/personal-list-detail";
  var modalLoading = document.getElementById("modalLoading");
  var modalDeleteConfirm = document.getElementById("modalDeleteConfirm");

  // display modal loading...
  modalLoading.addEventListener("shown.bs.modal", function(event) {
    try {
      // getting attributes
      var button = event.relatedTarget;
      var modalAction = button.getAttribute("data-bs-action");
      var modalId = button.getAttribute("data-bs-id");
      if (!modalAction || !modalId) return false;
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