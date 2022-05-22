<div class="d-flex justify-content-between align-items-center mt-3">
  <?php echo @$breadcrumbs; ?>
</div>


<div class="shadow bg-body">
  <div class="px-3 py-3">
    <h5><i class="ti ti-align-justified icon"></i> <?php echo @lang("SUB_TITLE1"); ?></h5>
  </div>

  <div class="px-3 py-4">
  <?php echo form_open_multipart(base_url() . "page/person/upload/upload", array("id" => "formData")); ?>

    <div class="mb-2 row">
      <label for="xlsxFile" class="col-sm-2 col-form-label">Microsoft Excel </label>
      <div class="col-sm-3 has-validation">
        <input type="file" class="form-control" id="xlsxFile" name="xlsxFile" required>
      </div>

    </div>

    <div class="mb-2 row">
      <div class="d-flex justify-content-end align-items-end">
      <button class="btn btn-primary me-2" id="btnUpload"><i class="ti ti-upload icon"></i> Upload </button>
      <button type="button" class="btn btn-success" id="btnDownload"><i class="ti ti-download icon"></i> Download Template</button>
      </div>
    </div>
  </form>
  </div>
</div>

<?php
if (isset($results) && is_array($results)) {
    ?>
<div class="mt-4 shadow bg-body">
<div class="px-3 py-3">
    <h5><i class="ti ti-align-justified icon"></i> <?php echo @lang("SUB_TITLE2"); ?></h5>
  </div>

  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>แถวที่</th>
          <th>สถานะ</th>
          <th><?php echo @lang("NATIONAL_ID"); ?>.</th>
          <th><?php echo @lang("PASSPORT_ID"); ?></th>
          <th><?php echo @lang("THAI_NAME"); ?></th>
          <th><?php echo @lang("ENGLISH_NAME"); ?></th>
          <th>รายละเอียด</th>
        </tr>
      </thead>
      <tbody>
        <?php
    $counter = 0;
    foreach ($results as $rs) {
      $className = "text-danger";
      $status = "Error";

      if(@$rs->validateFlag == 1){
        $className = @$totalError > 0 ? "" : "text-success";
        $status = @$totalError > 0 ? "Validated" : "Uploaded";
      }
      
        ?>
            <tr class="<?php echo $className;?>">
              <td class="text-muted"><?php echo @$rs->rowId; ?></td>
              <td><?php echo $status; ?></td>
              <td><?php echo @$rs->nationalId; ?></td>
              <td><?php echo @$rs->passportId; ?></td>
              <td><?php echo @$rs->titleNameTh . "" . @$rs->firstNameTh . "  " . @$rs->lastNameTh; ?></td>
              <td><?php echo @$rs->titleNameEn . "" . @$rs->firstNameEn . "  " . @$rs->lastNameEn; ?></td>
              <td><?php echo @$rs->validateMessages; ?></td>
            </tr>
        <?php
      $counter++;
    }
    ?>
      </tbody>
    </table>
  </div>
  <!--, </span>Validated <span><?php echo @$totalSuccess; ?></span>, Error <span><?php echo @$totalError; ?></span> !-->
  <div class="card-footer d-flex align-items-center bg-body">
    <p class="m-0 text-muted">Total <span><?php echo @$totalRows; ?></span> Rows, Error <span><?php echo @$totalError; ?></span> Rows</p>
  </div>
</div>
<?php }?>

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

    $("#btnUpload").on("click", function() {
      let formData = document.querySelector("#formData");

      if (!formData.checkValidity()) {
        formData.classList.add("was-validated");
        console.log("validated");
      } else {
        console.log("upload");
        $("#modalLoading").modal("show");
        return true;
      }
      return false;
    });


    $("#btnDownload").on("click", function() {
      var fileDownload = `Template-Personal-List.xlsx`;
      var actionUrl = `<?php echo @$fileTemplate; ?>`;
      $("#modalLoading").modal("show");
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

          setTimeout(function() {
            $("#modalLoading").modal("hide");
          }, 3000);

        })
        .catch(() => {
          $("#modalLoading").modal("hide");
        });

    });

    return false;
  });
</script>