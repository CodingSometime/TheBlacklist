<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'controllers/BaseController.php';
require APPPATH . 'controllers/Constants.php';

class BusinessUnit extends BaseController
{

  private $title = "BusinessUnit";
  private $route = "page/business-unit";
  private $model_name = "BusinessUnitModel";
  private $view_list = "common/BusinessUnitList";
  private $view_form = "common/BusinessUnitForm";

  // formatting breadcrumbs
  private $breadcrumbs = array(
    array("Home" => "#"),
    array("Business Unit" => null)
  );

  function __construct()
  {
    $object = new stdClass();
    $object->title = $this->title;
    $object->route = $this->route;
    $object->breadcrumbs = $this->breadcrumbs;
    $object->model = $this->model_name;

    // Construct the parent class
    parent::__construct($object);
    // load language
    $this->lang->load("BusinessUnit", "english");
    // load models
    $this->load->model($this->model_name, "BaseModel");
    $this->load->model("StatusModel");

  }


  // home page / index page
  // route: /page/user
  // method: GET
  public function index()
  {
    // Find something
    $conditions = array();
    // preparing pagination
    $totalRows = $this->BaseModel->recordCount($conditions);
    $config = loadPaginationConfig((base_url().$this->route . "/index"), $totalRows, 4, 10);
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    $results = $this->BaseModel->fetchAll($conditions, $config["per_page"], $page, "");

    // render to main layout
    $items["totalRows"] = $totalRows;
    $items["startRow"] = $page + 1;
    $items["endRow"] = $page + 10;
		$items["results"] = $results->result;
		$items["pagination"] = $this->pagination->create_links();
        
    $output = $this->load->view($this->view_list, $items, true);
    $this->render($output);
  }



  // dynamic view for render hrml form create/update/delete
  private function view($action, $id = null)
  {
    if (!$action) return false;

    $statusId = null;
    $userName = null;
    $items = array();
    $items["formAction"] = $action;

    if (isset($id)) {
      $results = $this->BaseModel->fetchOne($id);
      if (!$results || $results->status == false) show_404(); // return false;

      $object = $results->result;
      $items["items"] = $object;
      $userName = @$object->userName;
      $statusId = @$object->statusId;
    }

    if ($action == Constants::ACTION_NEW) $this->addBreadcrumbs(array("New*" => null));
    if ($action == Constants::ACTION_EDIT) $this->addBreadcrumbs(array("Edit: $userName" => null ));
    if ($action == Constants::ACTION_DELETE) $this->addBreadcrumbs(array("Delete: $userName" => null));

    $items["selectBoxStatus"] = $this->StatusModel->selectBox($statusId);
    $output = $this->load->view($this->view_form, $items, true);
    $this->render($output);
  }


  // route: /page/user/create
  // method: GET
  public function create()
  {
    $this->view(Constants::ACTION_NEW);
  }


  // route: /page/user/edit/(:num)
  // method: GET
  public function edit($id)
  {
    $this->view(Constants::ACTION_EDIT, $id);
  }


  // route: /page/user/delete/(:num)
  // method: GET
  public function delete($id)
  {
    $this->view(Constants::ACTION_DELETE, $id);
  }


  

  // save  new or update record to database
  // route: /page/user/save/(:num)
  // method: POST
  public function save()
  {
    $forms = $this->input->post();
    if(!$forms) show_404();

    if ($forms["formAction"] == Constants::ACTION_NEW)
      $this->insert($forms);
      if ($forms["formAction"] == Constants::ACTION_EDIT)
      $this->update($forms);

  }


  // insert new record to database
  // route: /page/user/insert/(:num)
  // method: POST
  public function insert($forms)
  {
    $this->BaseModel->create($forms);
    redirect($this->route);
  }


  // update record to database
  // route: /page/user/update/(:num)
  // method: POST
  public function update($forms)
  {
    if(!$forms || !$forms["id"] ) show_404();

    $this->BaseModel->update($forms["id"], $forms);
    redirect($this->route);
  }


  // delete from database
  // route: /page/user/remove/(:num)
  // method: POST
  public function remove($id)
  {
    redirect($this->route);
  }
}
