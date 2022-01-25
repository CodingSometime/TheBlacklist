<div class="shadow bg-body">
  <h5 class="border-bottom px-3 pt-3 pb-3 mb-0"><i class="ti ti-user icon"></i> <?php echo @lang("title"); ?></h5>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
			<th><?php echo @lang("ID");?></th>
			<th><?php echo @lang("PRIVILEGE_TYPE_CODE");?></th>
			<th><?php echo @lang("PRIVILEGE_TYPE_NAME");?></th>
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
			<td><?php echo @$rs->privilegeTypeCode;?></td>
			<td><?php echo @$rs->privilegeTypeName;?></td>
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
  var baseUrl = `<?php echo base_url(); ?>page/privilege-type`;

  function btnEditClick(id) {
    window.location = `${baseUrl}/edit/${id}`;
  }

  function btnDeleteClick(id, label) {
    $(document).ready(function() {
      $("#modalMessage").html(`Are you sure you want to delete privilege-type "${label}" ?`);
      $('#formModalConfirmation').modal('show')

      $("#btnSave").on("click", function() {
        $("#formModalConfirmation").modal('hide');
        $("#__RequestVerificationId").val(id);
        $("#formConfirmData").submit();
      });
    });
  }
</script>