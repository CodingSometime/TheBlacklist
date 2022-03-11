<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'controllers/BaseController.php';
require APPPATH . 'controllers/Constants.php';

class AllegationType extends BaseController
{
  private $route = "page/allegation-type";
  private $language = "AllegationType";
  private $view_list = "admin/foundations/AllegationTypeList";
  private $view_form = "admin/foundations/AllegationTypeForm";

  // formatting breadcrumbs
  private $breadcrumbs = array(
    array("" => null),
    array("ROOT" => null),
    array("TITLE" => "/page/allegation-type")
  );

  function __construct()
  {
    $object = new stdClass();
    $object->language = $this->language;
    $object->breadcrumbs = $this->breadcrumbs;

    // Construct the parent class
    parent::__construct($object);

    // load models
    $this->load->model("AllegationTypeModel", "BaseModel");
		$this->load->model("StatusModel");
  }

  // home page / index page
  // route: /page/allegation-type
  // method: GET
  public function index()
  {
    // Find something
    $conditions = array();
    if (isset($_GET["q"]) && !empty($_GET["q"])){
			$conditions["ALLEGATION_CODE"] = $_GET["q"];
			$conditions["ALLEGATION_TYPE"] = $_GET["q"];
			$conditions["ALLEGATION_LEVEL"] = $_GET["q"];
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
    $output = $this->load->view($this->view_list, $items, true);
    $this->response($output);
  }


  // dynamic view for render hrml form create/update/delete
  private function view($action, $id = null)
  {
    if (!$action) return false;

    $statusId = 1;
    $displayValue = null;
    $items = array();
    $items["__RequestVerificationAction"] = $action;

    if (isset($id)) {
      $results = $this->BaseModel->fetchOne($id);
      if (!$results || $results->status == false) show_404(); // return false;

      $object = $results->result;
      $items["items"] = $object;
      $displayValue = @$object->allegationCode . " : " . @$object->allegationType;
			$statusId = @$object->statusId;

    }

    if ($action == Constants::ACTION_NEW) $this->addBreadcrumbs(array("BREADCRUMBS_NEW" => null));
    if ($action == Constants::ACTION_EDIT) $this->addBreadcrumbs(array("BREADCRUMBS_EDIT" => null, "$displayValue" => null));
    if ($action == Constants::ACTION_DELETE) $this->addBreadcrumbs(array("BREADCRUMBS_DEL" => null, "$displayValue" => null));

    // breadcrumbs
    $items["breadcrumbs"] = $this->_breadcrumbs();

    // select box HERE !!
		$items["selectBoxStatusId"] = $this->StatusModel->selectBox("statusId", @$statusId);

    // render view html
    $output = $this->load->view($this->view_form, $items, true);
    $this->response($output);
  }


  // route: /page/allegation-type/create
  // method: GET
  public function create()
  {
    $this->view(Constants::ACTION_NEW);
  }


  // route: /page/allegation-type/edit/(:num)
  // method: GET
  public function edit($id)
  {
    $this->view(Constants::ACTION_EDIT, $id);
  }


  // route: /page/allegation-type/delete/(:num)
  // method: GET
  public function delete($id)
  {
    $this->view(Constants::ACTION_DELETE, $id);
  }


  // save  new or update record to database
  // route: /page/allegation-type/save/(:num)
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
  // route: /page/allegation-type/insert/(:num)
  // method: POST
  public function insert($forms)
  {
    $this->BaseModel->create($forms);
    redirect($this->route);
  }


  // update record to database
  // route: /page/allegation-type/update/(:num)
  // method: POST
  public function update($forms)
  {
    if (!$forms || !$forms["__RequestVerificationId"]) show_404();
    $forms["id"] = $forms["__RequestVerificationId"];
    $this->BaseModel->update($forms["id"], $forms);
    redirect($this->route);
  }


  // delete from database
  // route: /page/allegation-type/remove/(:num)
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


  // check data duplicate from this table
  // route: /page/allegation-type/validate/(:id)/(:allegation-typeCode)
  // method: GET
  public function validate($id, $allegationTypeCode)
  {
    // is duplicate ? then return json for javascript validation
    if ($this->BaseModel->isDuplicate($id, $allegationTypeCode)) {
      echo (json_encode(array("duplicate" => true, "message" => @lang("FORM_DUPLICATE_DATA"))));
    } else {
      echo (json_encode(array("duplicate" => false, "message" => "")));
    }
  }
}
