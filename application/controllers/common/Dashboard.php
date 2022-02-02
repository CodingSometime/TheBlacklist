<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'controllers/BaseController.php';
require APPPATH . 'controllers/Constants.php';

class Dashboard extends BaseController
{

  private $title = "Branch";
  private $route = "page/branch";
  private $language = "Dashboard";

  // formatting breadcrumbs
  private $breadcrumbs = array(
    array("Home" => "#"),
    array("Dashboard" => null)
  );

  function __construct()
  {
    $object = new stdClass();
    $object->language = $this->language;
    $object->breadcrumbs = $this->breadcrumbs;

    // Construct the parent class
    parent::__construct($object);

    // load models
		$this->load->model("StatusModel");
  }

  // home page / index page
  // route: /page/branch
  // method: GET
  public function index()
  {
    
    // breadcrumbs
    $items["breadcrumbs"] = $this->_breadcrumbs();
    // render view html
    $output["content"] = $this->load->view("common/Dashboard", $items, true);
    $this->load->view("layouts/Dashboard", $output);
  }

}
