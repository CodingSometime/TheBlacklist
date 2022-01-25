<div class="shadow bg-body">
  <h5 class="border-bottom px-3 pt-3 pb-3 mb-0"><i class="ti ti-user icon"></i> <?php echo @lang("title"); ?></h5>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
			<th><?php echo @lang("ID");?></th>
			<th><?php echo @lang("PERSON_ID");?></th>
			<th><?php echo @lang("SEQUENCE_NO");?></th>
			<th><?php echo @lang("EMPLOYEE_NUMBER");?></th>
			<th><?php echo @lang("BU");?></th>
			<th><?php echo @lang("COMPANY_CODE");?></th>
			<th><?php echo @lang("BRANCH");?></th>
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
			<th><?php echo @lang("PROVINCE");?></th>
			<th><?php echo @lang("DISTRICT");?></th>
			<th><?php echo @lang("ALLEGATION_TYPE");?></th>
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
			<th><?php echo @lang("DATA_SOURCE");?></th>
			<th><?php echo @lang("REMARKS");?></th>
			<th><?php echo @lang("STATUS_ID");?></th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($results) && is_array($results)) {
          foreach ($results as $rs) {
        ?>
  <tr>
			<td class="text-muted"><?php echo @$rs->id;?></td>
			<td><?php echo @$rs->personId;?></td>
			<td><?php echo @$rs->sequenceNo;?></td>
			<td><?php echo @$rs->employeeNumber;?></td>
			<td><?php echo @$rs->bu;?></td>
			<td><?php echo @$rs->companyCode;?></td>
			<td><?php echo @$rs->branch;?></td>
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
			<td><?php echo @$rs->province;?></td>
			<td><?php echo @$rs->district;?></td>
			<td><?php echo @$rs->allegationType;?></td>
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
			<td><?php echo @$rs->dataSource;?></td>
			<td><?php echo @$rs->remarks;?></td>
			<td><?php echo @$rs->statusId;?></td>
            <td><a href="#" class="btn btn-sm btn-primary me-1" onClick="btnEditClick('<?php echo @$rs->id;?>')">Edit</a>
              <a href="#" class="btn btn-sm btn-danger" onClick="btnDeleteClick('<?php echo @$rs->id;?>','<?php echo @$rs->id;?>')">Del</a>
            </td>
        </tr>
        <?php }
        } ?>
      </tbody>
    </table>
  </div>
  <div class="card-footer d-flex align-items-center bg-body">
    <p class="m-0 text-muted">Showing <span><?php echo @$startRow; ?></span> to <span><?php echo @$endRow; ?></span> of <span><?php echo @$totalRows; ?></span> entries</p>
    <?php echo @$pagination; ?>
  </div>
</div>

<!-- Modal -->
<!-- <div class="modal fade" id="formModalConfirmation" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="formModalConfirmationLabel" aria-hidden="true"> -->
<div class="modal fade" id="formModalConfirmation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> 
<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalConfirmationLabel">CONFIRMATION</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php echo form_open("page/user/delete", array("id" => "formConfirmData")); ?>
        <input type="hidden" id="__RequestVerificationAction" name="__RequestVerificationAction" value="__delete__" />
        <input type="hidden" id="__RequestVerificationId" name="__RequestVerificationId" />
        <label type="text" id="modalMessage" name="modalMessage" class="h5" /></label>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnClose" class="btn btn-secondary" data-bs-dismiss="modal">NO, CANCEL</button>
        <button type="button" id="btnSave" class="btn btn-danger">YES, CONTINUE</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" data-keyboard="false" data-backdrop="static" id="formModalConfirmationLong" tabindex="-1" role="dialog" aria-labelledby="formModalConfirmationLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalConfirmationLongTitle">CONFIRMATION</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open("page/user/delete", array("id" => "formConfirmData")); ?>
        <input type="hidden" id="__RequestVerificationAction" name="__RequestVerificationAction" value="__delete__" />
        <input type="hidden" id="__RequestVerificationId" name="__RequestVerificationId" />
        <label type="text" id="modalMessage" name="modalMessage" class="h5" /></label>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnClose" class="btn btn-secondary" data-bs-dismiss="modal">NO, CANCEL
        </button>
        <button type="button" id="btnSave" class="btn btn-danger">YES, CONTINUE
        </button>
      </div>
    </div>
  </div>
</div>


<script>
  var baseUrl = `<?php echo base_url(); ?>page/personal-list-detail`;

  function btnEditClick(id) {
    window.location = `${baseUrl}/edit/${id}`;
  }

  function btnDeleteClick(id, label) {
    $(document).ready(function() {
      $("#modalMessage").html(`Are you sure you want to delete personal-list-detail "${label}" ?`);
      $('#formModalConfirmation').modal('show')

      $("#btnSave").on("click", function() {
        $("#formModalConfirmation").modal('hide');
        $("#__RequestVerificationId").val(id);
        $("#formConfirmData").submit();
      });
    });
  }
</script>