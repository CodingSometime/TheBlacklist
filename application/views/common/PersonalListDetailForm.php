<div class="my-3 p-3 rounded shadow bg-body">
  <h5 class="border-bottom pb-2 mb-0"><i class="ti ti-user icon"></i> <?php echo @lang("title"); ?></h5>
  <div class="my-1 p-3 rounded">
    <?php echo form_open(base_url()."page/personal-list-detail/save", array("id" => "formData", "class" => "row g-3 needs-validation")); ?>
    <input type="hidden" name="formAction" value="<?php echo @$formAction; ?>" />
    <input type="hidden" name="id" value="<?php echo @$items->id; ?>" />
    <span class="pt-1"></span>

    <div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationpersonId" class="form-label">Person Id</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationpersonId" name="personId" value="<?php echo @$items->personId; ?>" required />
    <div class="invalid-feedback">Please enter a valid Person Id.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationsequenceNo" class="form-label">Sequence No</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationsequenceNo" name="sequenceNo" value="<?php echo @$items->sequenceNo; ?>" required />
    <div class="invalid-feedback">Please enter a valid Sequence No.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationemployeeNumber" class="form-label">Employee Number</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationemployeeNumber" name="employeeNumber" value="<?php echo @$items->employeeNumber; ?>" required />
    <div class="invalid-feedback">Please enter a valid Employee Number.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationbu" class="form-label">Bu</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationbu" name="bu" value="<?php echo @$items->bu; ?>" required />
    <div class="invalid-feedback">Please enter a valid Bu.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationcompanyCode" class="form-label">Company Code</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationcompanyCode" name="companyCode" value="<?php echo @$items->companyCode; ?>" required />
    <div class="invalid-feedback">Please enter a valid Company Code.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationbranch" class="form-label">Branch</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationbranch" name="branch" value="<?php echo @$items->branch; ?>" required />
    <div class="invalid-feedback">Please enter a valid Branch.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationcompanyOrVendor" class="form-label">Company Or Vendor</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationcompanyOrVendor" name="companyOrVendor" value="<?php echo @$items->companyOrVendor; ?>" required />
    <div class="invalid-feedback">Please enter a valid Company Or Vendor.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationorganizationName" class="form-label">Organization Name</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationorganizationName" name="organizationName" value="<?php echo @$items->organizationName; ?>" required />
    <div class="invalid-feedback">Please enter a valid Organization Name.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationpositionName" class="form-label">Position Name</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationpositionName" name="positionName" value="<?php echo @$items->positionName; ?>" required />
    <div class="invalid-feedback">Please enter a valid Position Name.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationpersonTypeCode" class="form-label">Person Type Code</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationpersonTypeCode" name="personTypeCode" value="<?php echo @$items->personTypeCode; ?>" required />
    <div class="invalid-feedback">Please enter a valid Person Type Code.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationage" class="form-label">Age</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationage" name="age" value="<?php echo @$items->age; ?>" required />
    <div class="invalid-feedback">Please enter a valid Age.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationserviceYear" class="form-label">Service Year</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationserviceYear" name="serviceYear" value="<?php echo @$items->serviceYear; ?>" required />
    <div class="invalid-feedback">Please enter a valid Service Year.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationmental" class="form-label">Mental</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationmental" name="mental" value="<?php echo @$items->mental; ?>" required />
    <div class="invalid-feedback">Please enter a valid Mental.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationoccupation" class="form-label">Occupation</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationoccupation" name="occupation" value="<?php echo @$items->occupation; ?>" required />
    <div class="invalid-feedback">Please enter a valid Occupation.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationmisbehaviorDate" class="form-label">Misbehavior Date</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationmisbehaviorDate" name="misbehaviorDate" value="<?php echo @$items->misbehaviorDate; ?>" required />
    <div class="invalid-feedback">Please enter a valid Misbehavior Date.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationmisbehaviorTime" class="form-label">Misbehavior Time</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationmisbehaviorTime" name="misbehaviorTime" value="<?php echo @$items->misbehaviorTime; ?>" required />
    <div class="invalid-feedback">Please enter a valid Misbehavior Time.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationmisbehaviorPlace" class="form-label">Misbehavior Place</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationmisbehaviorPlace" name="misbehaviorPlace" value="<?php echo @$items->misbehaviorPlace; ?>" required />
    <div class="invalid-feedback">Please enter a valid Misbehavior Place.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationprovince" class="form-label">Province</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationprovince" name="province" value="<?php echo @$items->province; ?>" required />
    <div class="invalid-feedback">Please enter a valid Province.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationdistrict" class="form-label">District</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationdistrict" name="district" value="<?php echo @$items->district; ?>" required />
    <div class="invalid-feedback">Please enter a valid District.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationallegationType" class="form-label">Allegation Type</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationallegationType" name="allegationType" value="<?php echo @$items->allegationType; ?>" required />
    <div class="invalid-feedback">Please enter a valid Allegation Type.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationdecision" class="form-label">Decision</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationdecision" name="decision" value="<?php echo @$items->decision; ?>" required />
    <div class="invalid-feedback">Please enter a valid Decision.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationdetailOfCase" class="form-label">Detail Of Case</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationdetailOfCase" name="detailOfCase" value="<?php echo @$items->detailOfCase; ?>" required />
    <div class="invalid-feedback">Please enter a valid Detail Of Case.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationterminateDate" class="form-label">Terminate Date</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationterminateDate" name="terminateDate" value="<?php echo @$items->terminateDate; ?>" required />
    <div class="invalid-feedback">Please enter a valid Terminate Date.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationterminateReason" class="form-label">Terminate Reason</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationterminateReason" name="terminateReason" value="<?php echo @$items->terminateReason; ?>" required />
    <div class="invalid-feedback">Please enter a valid Terminate Reason.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationtotalAmount" class="form-label">Total Amount</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationtotalAmount" name="totalAmount" value="<?php echo @$items->totalAmount; ?>" required />
    <div class="invalid-feedback">Please enter a valid Total Amount.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationallegationStatus" class="form-label">Allegation Status</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationallegationStatus" name="allegationStatus" value="<?php echo @$items->allegationStatus; ?>" required />
    <div class="invalid-feedback">Please enter a valid Allegation Status.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationallegationReason" class="form-label">Allegation Reason</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationallegationReason" name="allegationReason" value="<?php echo @$items->allegationReason; ?>" required />
    <div class="invalid-feedback">Please enter a valid Allegation Reason.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationdeleteReason" class="form-label">Delete Reason</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationdeleteReason" name="deleteReason" value="<?php echo @$items->deleteReason; ?>" required />
    <div class="invalid-feedback">Please enter a valid Delete Reason.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationcreatedBy" class="form-label">Created By</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationcreatedBy" name="createdBy" value="<?php echo @$items->createdBy; ?>" required />
    <div class="invalid-feedback">Please enter a valid Created By.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationcreatedDate" class="form-label">Created Date</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationcreatedDate" name="createdDate" value="<?php echo @$items->createdDate; ?>" required />
    <div class="invalid-feedback">Please enter a valid Created Date.</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationlastedUpdateBy" class="form-label">Lasted Update By </label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationlastedUpdateBy" name="lastedUpdateBy" value="<?php echo @$items->lastedUpdateBy; ?>" required />
    <div class="invalid-feedback">Please enter a valid Lasted Update By .</div>
  </div>
  </div>
</div><div class="row pt-2 pb-2">
<div class="col-md-5">
  <label for="validationlastedUpdateDate" class="form-label">Lasted Update Date</label>
  <div class="input-group has-validation">
    <input type="text" class="form-control" id="validationlastedUpdateDate" name="lastedUpdateDate" value="<?php echo @$items->lastedUpdateDate; ?>" required />
    <div class="invalid-feedback">Please enter a valid Lasted Update Date.</div>
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