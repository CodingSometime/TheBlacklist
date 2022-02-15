<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'controllers/BaseController.php';
require APPPATH . 'controllers/Constants.php';

class UploadFiles extends BaseController
{
  private $route = "page/upload-personal-list";
  private $language = "PersonUpload";

  // formatting breadcrumbs
  private $breadcrumbs = array(
    array("" => null),
    array("ROOT" => null),
    array("TITLE" => null)
  );

  function __construct()
  {
    $object = new stdClass();
    $object->language = $this->language;
    $object->breadcrumbs = $this->breadcrumbs;

    // Construct the parent class
    parent::__construct($object);

    // load models
    $this->load->model("PersonModel", "BaseModel");
    $this->load->model("TitleModel");
    $this->load->model("CountryModel");
    $this->load->model("DataSourceModel");
    $this->load->model("StatusModel");
  }

  // home page / index page
  // route: /page/person
  // method: GET
  public function index()
  {
    // do something here !!
  }


  // for upload personal list (xlsx)
  public function persons()
  {
    // render view html
    // breadcrumbs
    $items["breadcrumbs"] = $this->_breadcrumbs();

    $output["content"] = $this->load->view("admin/persons/UploadFile", $items, true);
    $this->load->view("layouts/Dashboard", $output);
  }

}