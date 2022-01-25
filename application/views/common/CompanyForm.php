<div class="my-3 p-3 rounded shadow bg-body">
  <h5 class="border-bottom pb-2 mb-0"><i class="ti ti-user icon"></i> <?php echo @lang("title"); ?></h5>
  <div class="my-1 p-3 rounded">
    <?php echo form_open(base_url()."page/company/save", array("id" => "formData", "class" => "row g-3 needs-validation")); ?>
    <input type="hidden" name="formAction" value="<?php echo @$formAction; ?>" />
    <input type="hidden" name="id" value="<?php echo @$items->id; ?>" />
    <span class="pt-1"></span>

    <div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationcompanyCode" class="form-label">Company Code</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationcompanyCode" name="companyCode" value="<?php echo @$items->companyCode; ?>" required />
    <div class="invalid-feedback">Please enter a valid Company Code.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationcompanyName" class="form-label">Company Name</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationcompanyName" name="companyName" value="<?php echo @$items->companyName; ?>" required />
    <div class="invalid-feedback">Please enter a valid Company Name.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationbuCode" class="form-label">Bu Code</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationbuCode" name="buCode" value="<?php echo @$items->buCode; ?>" required />
    <div class="invalid-feedback">Please enter a valid Bu Code.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationremarks" class="form-label">Remarks</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationremarks" name="remarks" value="<?php echo @$items->remarks; ?>" required />
    <div class="invalid-feedback">Please enter a valid Remarks.</div>
  </div>
  </div>
</div>
    <div class="row pt-2 pb-2">
      <div class="col-md-5">
        <label for="validationCustomUserName" class="form-label">Status</label>
        <div class="input-group has-validation">
          <?php echo @$selectBoxStatus;?>
          <div class="invalid-feedback">Please enter a valid Status.</div>
        </div>
      </div>
    </div>
        <div class="row pt-4 pb-1">
      <div class="col-12">
        <div class="d-flex justify-content-start">
          <button class="btn btn-primary me-2" type="submit" id="buttonSubmit" onClick="btnSaveClick(this.form)">Submit</button>
          <button class="btn btn-secondary" type="button" onClick="btnCancelClick(this.form)">Cancel</button>
        </div>
      </div>
    </div>
    </form>
  </div>
</div>



<!-- Modal Loading-->
<div class="modal fade" id="modalLoading" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="modalLoadingTitle">PLEASE WAIT</h6>
      </div>
      <div class="modal-body" >
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
    myForm.action = "<?php echo base_url(); ?>page/user";
    myForm.submit();
  }

  function btnSaveClick(myForm) {
    $(document).ready(function() {
      if (myForm.checkValidity()) {
        $('#modalLoading').modal('show');
      }
    });
  }
</script>