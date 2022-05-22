<link rel="stylesheet" href="<?php echo base_url(); ?>public/datepicker/css/bootstrap-datepicker.min.css" />
<div class="d-flex justify-content-between align-items-center mt-3">
  <?php echo @$breadcrumbs; ?>
</div>


<div class="shadow bg-body ">
  <div class="px-3 py-3">
    <h5><i class="ti ti-align-justified icon"></i> <?php echo @lang("SUB_TITLE"); ?></h5>
  </div>
  <?php echo form_open("", array("id" => "formData")); ?>
  <div class="px-4 py-3">
    <div class="px-4 mb-2 row">
      <label for="dateFrom" class="col-md-2 col-form-label"><?php echo @lang('DATE_FROM'); ?></label>
      <div class="col-md-3 has-validation">
        <input type="text" class="form-control" id="dateFrom" name="dateFrom" placeholder="dd/mm/yyyy">
      </div>
      <label for="dateTo" class="col-md-2 col-form-label"><?php echo @lang('DATE_TO'); ?></label>
      <div class="col-md-3 has-validation">
        <input type="text" class="form-control" id="dateTo" name="dateTo" placeholder="dd/mm/yyyy">
      </div>
    </div>
    <div class="px-4 mb-2 row">
      <label for="personType" class="col-md-2 col-form-label"><?php echo @lang('PERSON_TYPE'); ?></label>
      <div class="col-md-3 has-validation">
        <?php echo @$selectBoxPersonType; ?>
      </div>
      <label for="groupOfCompany" class="col-md-2 col-form-label"><?php echo @lang('GROUP_OF_COMPANY'); ?></label>
      <div class="col-md-3 has-validation">
        <?php echo @$selectBoxGroupOfCompany; ?>
      </div>
    </div>
    <div class="px-4 mb-2 row">
      <label for="allegationLevel" class="col-md-2 col-form-label"><?php echo @lang('ALLEGATION_LEVEL'); ?></label>
      <div class="col-md-3 has-validation">
        <?php echo @$selectBoxAllegationLevel; ?>
      </div>
      <label for="allegationType" class="col-md-2 col-form-label"><?php echo @lang('ALLEGATION_TYPE'); ?></label>
      <div class="col-md-3 has-validation">
        <?php echo @$selectBoxAllegationType; ?>
      </div>
    </div>

    <div class="px-4 mb-2 row">
      <div class="d-flex justify-content-end align-items-end col-md-10">
        <button type="button" class="btn btn-primary px-4" id="btnDownload" onClick="btnDownloadClick(this.form)"><?php echo @lang("BUTTON_DOWNLOAD"); ?></button>
      </div>
    </div>
  </div>
  </form>
</div>

<!-- Modal Loading-->
<div class="modal fade" id="modalLoading" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
  // datepicker
  $('#dateFrom').datepicker({
    format: "dd/mm/yyyy",
    clearBtn: true,
    // language: "th",
    todayHighlight: true
  });

  $('#dateTo').datepicker({
    format: "dd/mm/yyyy",
    clearBtn: true,
    // language: "th",
    todayHighlight: true
  });
});

$(document).ready(function() {
  $("#allegationLevel").change(function() {
    let allegationLevel = encodeURIComponent(this.value);
    let url = `<?php echo base_url(); ?>page/allegation-type/ajax/${allegationLevel}`;
    $.get(url, function(data) {
      $("#allegationType").html(data);
    });
  });
});

function btnDownloadClick(myForm) {
  $(document).ready(function() {
    let todayDate = new Date().toISOString().slice(0, 10);
    let fileDownload = `Blacklist_Report_${todayDate}.xlsx`;
    let actionUrl = `<?php echo base_url(); ?>page/report/blacklist/export?func=export-xlsx-file`;

    // encode parameters
    let dateFrom = encodeURIComponent($("#dateFrom").val());
    let dateTo = encodeURIComponent($("#dateTo").val());
    let personType = encodeURIComponent($("#personType").val());
    let groupOfCompany = encodeURIComponent($("#groupOfCompany").val());
    let allegationLevel = encodeURIComponent($("#allegationLevel").val());
    let allegationType = encodeURIComponent($("#allegationType").val());

    // formatting url
    if (dateFrom) actionUrl += `&dateFrom=${dateFrom}`;
    if (dateTo) actionUrl += `&dateTo=${dateTo}`;
    if (personType) actionUrl += `&personType=${personType}`;
    if (groupOfCompany) actionUrl += `&groupOfCompany=${groupOfCompany}`;
    if (allegationLevel) actionUrl += `&allegationLevel=${allegationLevel}`;
    if (allegationType) actionUrl += `&allegationType=${allegationType}`;

    // $("#modalLoading").modal("show");
    $("#btnDownload").html("Exporting...");
    
    fetch(actionUrl)
      .then(resp => resp.blob())
      .then(blob => {
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.style.display = 'none';
        a.href = url;
        a.download = fileDownload;
        document.body.appendChild(a);
        a.click();
        window.URL.revokeObjectURL(url);
        $("#btnDownload").html("EXPORT NOW");

      })
      .catch(() => {
        // $("#modalLoading").modal("hide");
        $("#btnDownload").html("EXPORT NOW");

      });
  });
}
</script>

<script src="<?php echo base_url(); ?>public/datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>public/datepicker/locales/bootstrap-datepicker.th.min.js" charset="UTF-8">
</script>