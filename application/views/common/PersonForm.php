<div class="my-3 p-3 rounded shadow bg-body">
  <h5 class="border-bottom pb-2 mb-0"><i class="ti ti-user icon"></i> <?php echo @lang("title"); ?></h5>
  <div class="my-1 p-3 rounded">
    <?php echo form_open(base_url()."page/person/save", array("id" => "formData", "class" => "row g-3 needs-validation")); ?>
    <input type="hidden" name="formAction" value="<?php echo @$formAction; ?>" />
    <input type="hidden" name="id" value="<?php echo @$items->id; ?>" />
    <span class="pt-1"></span>

    <div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationnationalId" class="form-label">National Id</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationnationalId" name="nationalId" value="<?php echo @$items->nationalId; ?>" required />
    <div class="invalid-feedback">Please enter a valid National Id.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationpassportId" class="form-label">Passport Id</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationpassportId" name="passportId" value="<?php echo @$items->passportId; ?>" required />
    <div class="invalid-feedback">Please enter a valid Passport Id.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationtitleTh" class="form-label">Title Th</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationtitleTh" name="titleTh" value="<?php echo @$items->titleTh; ?>" required />
    <div class="invalid-feedback">Please enter a valid Title Th.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationfirstNameTh" class="form-label">First Name Th</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationfirstNameTh" name="firstNameTh" value="<?php echo @$items->firstNameTh; ?>" required />
    <div class="invalid-feedback">Please enter a valid First Name Th.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationlastNameTh" class="form-label">Last Name Th</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationlastNameTh" name="lastNameTh" value="<?php echo @$items->lastNameTh; ?>" required />
    <div class="invalid-feedback">Please enter a valid Last Name Th.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationtitleEn" class="form-label">Title En</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationtitleEn" name="titleEn" value="<?php echo @$items->titleEn; ?>" required />
    <div class="invalid-feedback">Please enter a valid Title En.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationfirstNameEn" class="form-label">First Name En</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationfirstNameEn" name="firstNameEn" value="<?php echo @$items->firstNameEn; ?>" required />
    <div class="invalid-feedback">Please enter a valid First Name En.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationlastNameEn" class="form-label">Last Name En</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationlastNameEn" name="lastNameEn" value="<?php echo @$items->lastNameEn; ?>" required />
    <div class="invalid-feedback">Please enter a valid Last Name En.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationpicture" class="form-label">Picture</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationpicture" name="picture" value="<?php echo @$items->picture; ?>" required />
    <div class="invalid-feedback">Please enter a valid Picture.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationcountry" class="form-label">Country</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationcountry" name="country" value="<?php echo @$items->country; ?>" required />
    <div class="invalid-feedback">Please enter a valid Country.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationreferenceId" class="form-label">Reference Id</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationreferenceId" name="referenceId" value="<?php echo @$items->referenceId; ?>" required />
    <div class="invalid-feedback">Please enter a valid Reference Id.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationgender" class="form-label">Gender</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationgender" name="gender" value="<?php echo @$items->gender; ?>" required />
    <div class="invalid-feedback">Please enter a valid Gender.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationdataSource" class="form-label">Data Source</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationdataSource" name="dataSource" value="<?php echo @$items->dataSource; ?>" required />
    <div class="invalid-feedback">Please enter a valid Data Source.</div>
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