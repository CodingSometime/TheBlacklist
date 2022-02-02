<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'controllers/BaseController.php';
require APPPATH . 'controllers/Constants.php';

class PersonalListDetail extends BaseController
{

  private $title = "PersonalListDetail";
  private $route = "page/personal-list-detail";
  private $language = "PersonalListDetail";
  private $view_list = "common/PersonalListDetailList";
  private $view_form = "common/PersonalListDetailForm";

  // formatting breadcrumbs
  private $breadcrumbs = array(
    array("Home" => "#"),
    array("Personal List Detail" => null)
  );

  function __construct()
  {
    $object = new stdClass();
    $object->language = $this->language;
    $object->breadcrumbs = $this->breadcrumbs;

    // Construct the parent class
    parent::__construct($object);

    // load models
    $this->load->model("PersonalListDetailModel", "BaseModel");
		$this->load->model("BusinessUnitModel");
		$this->load->model("CompanyModel");
		$this->load->model("BranchModel");
		$this->load->model("PersonTypeModel");
		$this->load->model("TimeModel");
		$this->load->model("ProvinceModel");
		$this->load->model("DistrictModel");
		$this->load->model("AllegationTypeModel");
		$this->load->model("PickListModel");
		$this->load->model("DataSourceModel");
		$this->load->model("StatusModel");
  }

  // home page / index page
  // route: /page/personal-list-detail
  // method: GET
  public function index()
  {
    // Find something
    $conditions = array();
    if (isset($_GET["q"]) && !empty($_GET["q"])){
			$conditions["ID"] = $_GET["q"];
			$conditions["PERSON_ID"] = $_GET["q"];
			$conditions["SEQUENCE_NO"] = $_GET["q"];
			$conditions["EMPLOYEE_NUMBER"] = $_GET["q"];
			$conditions["BUSINESS_UNIT_CODE"] = $_GET["q"];
			$conditions["COMPANY_CODE"] = $_GET["q"];
			$conditions["BRANCH_CODE"] = $_GET["q"];
			$conditions["COMPANY_OR_VENDOR"] = $_GET["q"];
			$conditions["ORGANIZATION_NAME"] = $_GET["q"];
			$conditions["POSITION_NAME"] = $_GET["q"];
			$conditions["PERSON_TYPE_CODE"] = $_GET["q"];
			$conditions["AGE"] = $_GET["q"];
			$conditions["SERVICE_YEAR"] = $_GET["q"];
			$conditions["MENTAL"] = $_GET["q"];
			$conditions["OCCUPATION"] = $_GET["q"];
			$conditions["MISBEHAVIOR_DATE"] = $_GET["q"];
			$conditions["MISBEHAVIOR_TIME"] = $_GET["q"];
			$conditions["MISBEHAVIOR_PLACE"] = $_GET["q"];
			$conditions["PROVINCE_ID"] = $_GET["q"];
			$conditions["DISTRICT_ID"] = $_GET["q"];
			$conditions["ALLEGATION_TYPE_ID"] = $_GET["q"];
			$conditions["DECISION"] = $_GET["q"];
			$conditions["DETAIL_OF_CASE"] = $_GET["q"];
			$conditions["TERMINATE_DATE"] = $_GET["q"];
			$conditions["TERMINATE_REASON"] = $_GET["q"];
			$conditions["TOTAL_AMOUNT"] = $_GET["q"];
			$conditions["ALLEGATION_STATUS"] = $_GET["q"];
			$conditions["ALLEGATION_REASON"] = $_GET["q"];
			$conditions["DELETE_REASON"] = $_GET["q"];
			$conditions["CREATED_BY"] = $_GET["q"];
			$conditions["CREATED_DATE"] = $_GET["q"];
			$conditions["LASTED_UPDATE_BY_"] = $_GET["q"];
			$conditions["LASTED_UPDATE_DATE"] = $_GET["q"];
			$conditions["DATA_SOURCE_ID"] = $_GET["q"];
			$conditions["STATUS_ID"] = $_GET["q"];

    }

    // preparing pagination
    $totalRows = $this->BaseModel->recordCount($conditions);
    $config = loadPaginationConfig((base_url() . $this->route . "/index"), $totalRows, 4, 10);
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    $results = $this->BaseModel->fetchAll($conditions, $config["per_page"], $page, "");

    // calculate showing row / page
    $startRow = $page + 1;
    $endRow = $page + 10;
    if ($totalRows < 10) $endRow = $totalRows;
    if ($endRow > $totalRows) $endRow = $totalRows;

    // render to main layout
    $items["totalRows"] = $totalRows;
    $items["startRow"] = $startRow;
    $items["endRow"] = $endRow;
    $items["results"] = $results->result;
    $items["pagination"] = $this->pagination->create_links();

    // breadcrumbs
    $items["breadcrumbs"] = $this->_breadcrumbs();
    // render view html
    $output["content"] = $this->load->view($this->view_list, $items, true);
    $this->load->view("layouts/Dashboard", $output);
  }


  // dynamic view for render hrml form create/update/delete
  private function view($action, $id = null)
  {
    if (!$action) return false;

    $statusId = null;
    $userName = null;
    $items = array();
    $items["__RequestVerificationAction"] = $action;

    if (isset($id)) {
      $results = $this->BaseModel->fetchOne($id);
      if (!$results || $results->status == false) show_404(); // return false;

      $object = $results->result;
      $items["items"] = $object;
			$businessUnitCode = @$object->businessUnitCode;
			$companyCode = @$object->companyCode;
			$branchCode = @$object->branchCode;
			$personTypeCode = @$object->personTypeCode;
			$misbehaviorTime = @$object->misbehaviorTime;
			$provinceId = @$object->provinceId;
			$districtId = @$object->districtId;
			$allegationTypeId = @$object->allegationTypeId;
			$allegationStatus = @$object->allegationStatus;
			$dataSourceId = @$object->dataSourceId;
			$statusId = @$object->statusId;

    }

    if ($action == Constants::ACTION_NEW) $this->addBreadcrumbs(array("New*" => null));
    if ($action == Constants::ACTION_EDIT) $this->addBreadcrumbs(array("Edit: $userName" => null));
    if ($action == Constants::ACTION_DELETE) $this->addBreadcrumbs(array("Delete: $userName" => null));

    // breadcrumbs
    $items["breadcrumbs"] = $this->_breadcrumbs();

    // select box HERE !!
		$items["selectBoxBusinessUnitCode"] = $this->BusinessUnitModel->selectBox("businessUnitCode", @$businessUnitCode);
		$items["selectBoxCompanyCode"] = $this->CompanyModel->selectBox("companyCode", @$companyCode);
		$items["selectBoxBranchCode"] = $this->BranchModel->selectBox("branchCode", @$branchCode);
		$items["selectBoxPersonTypeCode"] = $this->PersonTypeModel->selectBox("personTypeCode", @$personTypeCode);
		$items["selectBoxMisbehaviorTime"] = $this->TimeModel->selectBox("misbehaviorTime", @$misbehaviorTime);
		$items["selectBoxProvinceId"] = $this->ProvinceModel->selectBox("provinceId", @$provinceId);
		$items["selectBoxDistrictId"] = $this->DistrictModel->selectBox("districtId", @$districtId);
		$items["selectBoxAllegationTypeId"] = $this->AllegationTypeModel->selectBox("allegationTypeId", @$allegationTypeId);
		$items["selectBoxAllegationStatus"] = $this->PickListModel->selectBoxYesNo("allegationStatus", @$allegationStatus);
		$items["selectBoxDataSourceId"] = $this->DataSourceModel->selectBox("dataSourceId", @$dataSourceId);
		$items["selectBoxStatusId"] = $this->StatusModel->selectBox("statusId", @$statusId);


    // render view html
    $output["content"] = $this->load->view($this->view_form, $items, true);
    $this->load->view("layouts/Dashboard", $output);
  }


  // route: /page/personal-list-detail/create
  // method: GET
  public function create()
  {
    $this->view(Constants::ACTION_NEW);
  }


  // route: /page/personal-list-detail/edit/(:num)
  // method: GET
  public function edit($id)
  {
    $this->view(Constants::ACTION_EDIT, $id);
  }


  // route: /page/personal-list-detail/delete/(:num)
  // method: GET
  public function delete($id)
  {
    $this->view(Constants::ACTION_DELETE, $id);
  }


  // save  new or update record to database
  // route: /page/personal-list-detail/save/(:num)
  // method: POST
  public function save()
  {
    $forms = $this->input->post();
    if (!$forms) show_404();

    if ($forms["__RequestVerificationAction"] == Constants::ACTION_NEW)
      $this->insert($forms);
    if ($forms["__RequestVerificationAction"] == Constants::ACTION_EDIT)
      $this->update($forms);
  }


  // insert new record to database
  // route: /page/personal-list-detail/insert/(:num)
  // method: POST
  public function insert($forms)
  {
    $this->BaseModel->create($forms);
    redirect($this->route);
  }


  // update record to database
  // route: /page/personal-list-detail/update/(:num)
  // method: POST
  public function update($forms)
  {
    if (!$forms || !$forms["__RequestVerificationId"]) show_404();
    $forms["id"] = $forms["__RequestVerificationId"];
    $this->BaseModel->update($forms["id"], $forms);
    redirect($this->route);
  }


  // delete from database
  // route: /page/personal-list-detail/remove/(:num)
  // method: POST
  public function remove($id)
  {
    $forms = $this->input->post();
    $data = $this->security->xss_clean($forms);

    $action = @$data["__RequestVerificationAction"];
    $id = @$data["__RequestVerificationId"];

    if (!$action || !$id) show_404();
    if ($action != "__delete__") show_404();

    if (!$action || !$id) show_404();
    if ($action != "__delete__") show_404();

    $results = $this->BaseModel->delete($id);
    if ($results->status)
      redirect($this->route);
    else
      show_404();
  }
}
